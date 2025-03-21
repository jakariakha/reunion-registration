<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UserRegistrationController;

class BkashPaymentController extends Controller
{
    private $base_url;

    public function __construct() {
        $this->base_url = config('app.bkash_base_url');
    }

    // 🏦 Main payment function
    public function bkashPayment()
    {
        if (session('total_amount')) {
            $totalAmount = session('total_amount');

            // 🔄 Ensure we have a fresh token
            $idToken = $this->grantToken();
            session()->put(['id_token' => $idToken]);

            if (!empty($idToken)) {
                $response = $this->createPayment($idToken, $totalAmount);
                
                if (!empty($response['bkashURL'])) {
                    return redirect()->to($response['bkashURL']);
                }
                
                return $response; // Return error response if bKash URL is not received
            }
        }

        return redirect()->route('home')->with('error', 'Payment Failed');
    }

    // 🔑 Get new authentication token
    private function grantToken()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'username' => config('app.bkash_username'),
            'password' => config('app.bkash_password'),
        ])->post($this->base_url . '/token/grant', [
            'app_key' => config('app.bkash_app_key'),
            'app_secret' => config('app.bkash_secret_key')
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return $data['id_token'] ?? null;
        }

        Log::error('bKash Token Grant Failed', ['response' => $response->json()]);
        return null;
    }

    // 💰 Create a new payment request
    private function createPayment($idToken, $totalAmount)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => $idToken,
            'X-App-Key' => config('app.bkash_app_key')
        ])->post($this->base_url . '/create', [
            'mode' => '0011',
            'payerReference' => '01XXXXXXXXX',
            'callbackURL' => config('app.app_url') . '/transaction-status',
            'merchantAssociationInfo' => 'MI05MID54RF09123456One',
            'amount' => $totalAmount,
            'currency' => 'BDT',
            'intent' => 'sale',
            'merchantInvoiceNumber' => 'INV' . time()
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        Log::error('bKash Payment Creation Failed', ['response' => $response->json()]);
        return ['error' => 'Payment request failed'];
    }

    // 🔄 Execute the payment after redirection
    private function executePayment($paymentID)
    {
        // Ensure fresh token before execution
        if (!session()->has('id_token')) {
            session(['id_token' => $this->grantToken()]);
        }

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => session('id_token'),
            'X-App-Key' => config('app.bkash_app_key')
        ])->post($this->base_url . '/execute', [
            'paymentID' => $paymentID
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        Log::error('bKash Payment Execution Failed', ['response' => $response->json()]);
        return ['error' => 'Payment execution failed'];
    }

    // 📌 Handle payment response after redirection
    public function transactionStatus(Request $request)
    {
        $paymentID = $request->query('paymentID');
        $status = $request->query('status');

        if ($status == 'success') {
            $response = $this->executePayment($paymentID);

            if (isset($response['transactionStatus']) && $response['transactionStatus'] === 'Completed') {
                if (!empty(session()->get('profile_update'))) {
                    app(UserRegistrationController::class)->userProfileUpdate(session()->get('user_data'));
                }

                if (session()->has('validate_data')) {
                    // app(UserRegistrationController::class)->insertUserData();
                    return redirect()->route('registration.confirmation')->with('status', 'success');
                } else {
                    return redirect()->route('payment.summary')->with('error', 'কোন সমস্যা হয়েছে। আবার চেষ্টা করুন!');
                }
            } else {
                Log::error('bKash Transaction Incomplete', ['response' => $response]);
                return redirect()->route('home')->with('error', 'Transaction incomplete');
            }
        } else if ($status == 'failure' || $status == 'cancel') {
            if (session()->has('profile_update')) {
                session()->forget('profile_update');
                return redirect()->route('profile')->with('error', 'প্রোফাইল আপডেট ব্যর্থ হয়েছে');
            }

            Log::warning('bKash Transaction Failed', ['status' => $status]);
            return redirect()->route('registration.confirmation')->with('status', 'failed');
        }
    }
}
