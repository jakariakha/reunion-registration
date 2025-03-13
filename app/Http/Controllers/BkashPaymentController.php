<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UserRegistrationController;

class BkashPaymentController extends Controller
{
    private  $base_url = 'https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout';
    public function bkashPayment() {
        if(session('total_amount')) {
            $totalAmount = session('total_amount');
            $idToken = $this->grantToken();
            session()->put([
                'id_token' => $idToken
            ]);
            if(!empty($idToken)) {
                $response = $this->createPayment($idToken, $totalAmount);
                if(!empty($response['bkashURL'])) {
                    return redirect()->to($response['bkashURL']);
                }
                return $response;
            }
        }
    }

    public function grantToken() {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'username' => config('app.bkash_username'),
            'password' => config('app.bkash_password'),
        ])->post($this->base_url.'/token/grant', [
            'app_key' => config('app.bkash_app_key'),
            'app_secret' => config('app.bkash_secret_key')
        ]);

        if($response->successful()) {
            $idToken = $response['id_token'];
            return $idToken;
            $this->createPayment($idToken);
        } else return $response;
    }

    public function createPayment($idToken, $totalAmount) {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => $idToken,
            'X-App-Key' => config('app.bkash_app_key')
        ])->post($this->base_url.'/create', [
            'mode' => '0011',
            'payerReference' => '01XXXXXXXXX',
            'callbackURL' => config('app.app_url').'/transaction-status',
            'merchantAssociationInfo' => 'MI05MID54RF09123456One',
            'amount' => $totalAmount,
            'currency' => 'BDT',
            'intent' => 'sale',
            'merchantInvoiceNumber' => 'INV'.time()
        ]);

        if($response->successful()) {
            return $response;
        } else return $response;

    }

    public function executePayment($paymentID) {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => session('id_token'),
            'X-App-Key' => config('app.bkash_app_key')
        ])->post($this->base_url.'/execute', [
            'paymentID' => $paymentID
        ]);
        
        if($response->successful()) {
            return $response;
        } else return $response;
    }

    public function transactionStatus(Request $request) {
        $paymentID = $request->query('paymentID');
        $status = $request->query('status');
        if($status == 'success') {
            $response = $this->executePayment($paymentID);
            if(isset($response['transactionStatus']) && $response['transactionStatus'] === 'Completed') {
                if(!empty(session()->get('profile_update'))) {
                    app(UserRegistrationController::class)->userProfileUpdate(session()->get('user_data'));
                }
                app(UserRegistrationController::class)->insertUserData();
                return redirect()->route('registration.confirmation')->with('status', 'success');
            } else {
                return redirect()->route('home');
            }
        } else if($status == 'failure' || $status == 'cancel') {
            if(!empty(session()->get('profile_update'))) {
                session()->forget('profile_update');
                return redirect()->route('profile')->with('error', 'প্রোফাইল আপডেট ব্যর্থ হয়েছে');  
            }
            return redirect()->route('registration.confirmation')->with('status', 'failed');
        }
    }

}
