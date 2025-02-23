<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\OpinionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\UserRegistrationModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\RateLimiter;
use App\Http\Controllers\BkashPaymentController;

class UserRegistrationController extends Controller
{
    public function paymentAndParticipants(Request $request) {

        $turnstileResponse = $request->input('cf-turnstile-response');

        if(!$turnstileResponse) {
            return redirect()->route('registration')->with('error', 'ক্যাপচা যাচাইকরণ ব্যর্থ হয়েছে৷');
        }

        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'address' => 'required|string',
            'current_job' => 'required|string|max:5000',
            'mobile_number' => 'required|string|max:11',
            't_shirt_size' => 'required|string',
            'ssc_result_status' => 'required|string',
            'ssc_batch' => 'nullable|string',
            'study_status_check' => 'nullable|string',
            'study_year_count' => 'nullable|string',
            'which_class' => 'nullable|string',
            'participation_type' => 'nullable|string',
            'take_come_children' => 'nullable|string',
            'child_age_less_five' => 'nullable|string',
            'child_age_more_five' => 'nullable|string',
            'registrant' => 'nullable|string',
            'registrant_name' => 'nullable|string',
            'registrant_mobile_number' => 'nullable|string'
        ]);

        session()->put([
            'validate_data' => $validateData
        ]);

        $mobileNumberExists = UserRegistrationModel::where('mobile_number', $validateData['mobile_number'])->first();

        if($mobileNumberExists) {
            return redirect()->back()->with('error', 'মোবাইল নম্বর ইতিমধ্যে নিবন্ধিত!');
        }

        $subTotalAmount = 0;
        $totalParticipant = 0;

        if($validateData['ssc_batch'] === null && isset($validateData['which_class'])) {
            $subTotalAmount = 250;
        } else if(isset($validateData['study_year_count'])) {
            $subTotalAmount = 1000;
        } else {
            if(1972 <= $validateData['ssc_batch'] && $validateData['ssc_batch'] <= 2020) {
                $subTotalAmount = 1000;
            } else if(2021 <= $validateData['ssc_batch'] && $validateData['ssc_batch'] <= 2024) {
                $subTotalAmount = 750;
            }
        }

        if($validateData['participation_type'] == 'single') {
            $totalParticipant++;
        } else if($validateData['participation_type'] == 'couple') {
            $subTotalAmount += 300;
            $totalParticipant = 2;
        }

        if($validateData['child_age_less_five'] !== null || $validateData['child_age_more_five'] !== null) {
            $subTotalAmount += $validateData['child_age_less_five'] * 300;
            $subTotalAmount += $validateData['child_age_more_five'] * 300;
            $totalParticipant += $validateData['child_age_less_five'];
            $totalParticipant += $validateData['child_age_more_five'];           
        }
        
        $cashoutCharge = number_format((15*$subTotalAmount)/1000, '2', '.', '');
        $totalAmount = $subTotalAmount+$cashoutCharge;

        session()->put([
            'total_participant' => $totalParticipant,
            'subtotal_amount' => $subTotalAmount,
            'cashout_charge' => $cashoutCharge,
            'total_amount' => $totalAmount
        ]);

        return redirect()->route('payment.summary');
    }

    public function sendOtp() {
        $mobileNumber = session()->get('validate_data')['mobile_number'];
        $limiterKey = 'otp:' . $mobileNumber ;
        if(RateLimiter::tooManyAttempts($limiterKey, 6)) {
            $retryAfter = RateLimiter::availableIn($limiterKey);
            return redirect()->route('payment.summary')->with('error', 'প্রতিদিন সর্বোচ্চ ৬টি ওটিপি অনুমোদিত। আবার চেষ্টা করুন! '. gmdate('H:i:s', $retryAfter).' এই সময়ের পরে।');
        }
        $otpSentexpiryMinutes = Carbon::parse(session()->get('otp_sent'))->addMinutes(2);
        if($otpSentexpiryMinutes->lessThan(Carbon::now()) || empty(session('otp_sent'))) {
            $api_url = config('app.sms_api_url');
            $otp = random_int(100000, 999999);
            $expiryMinutes = 5;
            Cache::put("otp_{$mobileNumber}", $otp, now()->addMinutes($expiryMinutes));

            $message = 'পুনর্মিলনী নিবন্ধন ভেরিফিকেশন কোড: '.$otp.' মেয়াদ ৫ মিনিট';
            $response = Http::timeout(60)->post($api_url, [
                'api_key' => config('app.sms_api_key'),
                'msg' => $message,
                'to' => $mobileNumber
            ]);
    
            if($response->successful() && $response['error'] == 0) {
                RateLimiter::hit($limiterKey, 24 * 60 * 60);
                session()->put([
                    'otp_sent' => Carbon::now()
                ]);
                return redirect()->route('otp.verification')->with('success', 'OTP কোড পাঠানো হয়েছে৷');
                //return $response;
            } else {
                //return $response->json();
                return redirect()->route('payment.summary')->with('error', 'কোন সমস্যা হয়েছে। আবার চেষ্টা করুন!');
            }
        } else {
            return redirect()->route('otp.verification')->with('success', 'OTP কোড পাঠানো হয়েছে৷');
        }
    }

    public function otpVerify(Request $request) {
        $turnstileResponse = new UserRegistrationController;
        $response = $turnstileResponse->cfTurnstile($request);
        
        if(!$response) {
            return redirect()->route('otp.verification')->with('error', 'ক্যাপচা যাচাইকরণ ব্যর্থ হয়েছে৷');
        }

        $mobileNumber = session()->get('validate_data')['mobile_number'];
        $cachedOtp = Cache::get("otp_{$mobileNumber}");

        if (!$cachedOtp) {
            return redirect()->route('otp.verification')->with('error', 'OTP এর মেয়াদ শেষ বা ভুল৷');
        }

        $validateOtp = $request->validate([
            'submitted_otp' => 'required|string|max:6'
        ]);

        if($validateOtp['submitted_otp'] == $cachedOtp) {
            Cache::forget("otp_{$mobileNumber}");
            session()->forget('otp_sent');
            session()->put([
                'otp_verified' => true
            ]);
            return redirect()->route('payment');
        } else {
            return redirect()->back()->with('error', 'OTP এর মেয়াদ শেষ বা ভুল৷');
        }
    }

    public function insertUserData() {
        $validateData = session()->get('validate_data');
        $password = Str::random(8);
        session()->put([
            'password' => $password
        ]);

        $userRegistrationInfo = UserRegistrationModel::create([
            'name' => $validateData['name'],
            'father_name' => $validateData['father_name'],
            'mother_name' => $validateData['mother_name'],
            'address' => $validateData['address'],
            'current_job' => $validateData['current_job'],
            'mobile_number' => $validateData['mobile_number'],
            't_shirt_size' => $validateData['t_shirt_size'],
            'ssc_result_status' => $validateData['ssc_result_status'],
            'ssc_batch' => $validateData['ssc_batch'] ?? null,
            'study_status_check' => $validateData['study_status_check'] ?? null,
            'study_year_count' => $validateData['study_year_count'] ?? null,
            'which_class' => $validateData['which_class'] ?? null,
            'participation_type' => $validateData['participation_type'],
            'take_come_children' => $validateData['take_come_children'] ?? null,
            'child_age_less_five' => $validateData['child_age_less_five'] ?? null,
            'child_age_more_five' => $validateData['child_age_more_five'] ?? null,
            'total_participant' => session()->get('total_participant'),
            'total_amount' => session()->get('total_amount'),
            'payment_status' => 'completed',
            'registrant_ID' => ltrim($validateData['mobile_number'], 0),
            'password' => Hash::make($password),
            'registrant' => $validateData['registrant'] ?? null,
            'registrant_name' => $validateData['registrant_name'] ?? null,
            'registrant_mobile_number' => $validateData['registrant_mobile_number'] ?? null, 
        ]);

        if(!$userRegistrationInfo) {
            return response()->json([
                'status' => 'error',
                'messgae' => 'কোন সমস্যা হয়েছে। আবার চেষ্টা করুন!'
            ]);
        }
        $this->sendPassword();
    }

    public function sendPassword() {
        $api_url = config('app.sms_api_url');
        $password= session()->get('password');
        $message = 'পুনর্মিলনী নিবন্ধন অ্যাকাউন্টের পাসওয়ার্ড: '.$password;
        $response = Http::timeout(30)->post($api_url, [
            'api_key' => config('app.sms_api_key'),
            'msg' => $message,
            'to' => session()->get('validate_data')['mobile_number']
        ]);

        if(!($response->successful() && $response['error'] == 0)) {
            return response()->json([
                'status' => 'error',
                'messgae' => 'কোন সমস্যা হয়েছে। আবার চেষ্টা করুন!'
            ]);
            Session::flush();
        }
    }

    public function usersData() {
        $usersData = UserRegistrationModel::paginate(20);
        if($usersData->isNotEmpty()) {
            return view('admin.dashboard', compact('usersData'));
        } else {
            return view('admin.dashboard', ['usersData' => []]);
        }
    }

    public function userSearch(Request $request) {
        $userSearch = UserRegistrationModel::where('registrant_ID', 'like', '%'.$request->search_value.'%')->paginate(20);
        if($userSearch->isEmpty()) {
            return response()->json([
                'status' => 'notFound',
                'data' => '<tr><td class="text-red-500 text-xl font-bold px-6 py-4 whitespace-nowrap">No Data Found</td></tr>'
            ]);
        } else {
            return response()->json([
                'status' => 'found',
                'data' => view('admin.user_search', compact('userSearch'))->render()
            ]);
        }
    }

    public function userProfileData() {
        $mobileNumber = session()->get('mobile_number');
        $userData = UserRegistrationModel::where('mobile_number', $mobileNumber)->first();
        if ($userData) {
            //return $userData;
            session()->put([
                'user_data' => $userData
            ]);

            return view('profile', compact('userData'));
        } else {
            // If no data is found, return the view with an empty array or a message
            return view('profile', ['userData' => []]); // Or you can pass an error message here
        }
    }

    public function userProfileUpdate($request = null) {
        if(session()->get('profile_update')) {
            $userProfileUpdate = userRegistrationModel::where('id', Auth::user()->id)->update([
                't_shirt_size' => $request->t_shirt_size,
                'participation_type' => $request->participation_type,
                'child_age_less_five' => $request->child_age_less_five,
                'child_age_more_five' => $request->child_age_more_five,
                'total_amount' => session('total_amount', Auth::user()->total_amount),
                'total_participant' => session()->get('total_participant')
            ]);
            session()->forget('profile_update');
            if($userProfileUpdate) {
                return redirect()->route('profile')->with('success', 'প্রোফাইল আপডেট সফল হয়েছে');
            } else {

                return redirect()->route('profile')->with('error', 'প্রোফাইল আপডেট ব্যর্থ হয়েছে');
            }
        }
        if(session()->get('user_data')) {
            $userData = session()->get('user_data');
            return view('profile_update', compact('userData'));
        }  
    }

    public function userProfileUpdatePost(Request $request) {
        $totalAmount = 0;
        $totalParticipant = 1;
        if(isset(Auth::user()->which_class)) {
            if($request->participation_type === 'single') {
                $totalAmount += 250;
            }
            if($request->participation_type === 'couple') {
                $totalAmount += 2;
                $totalParticipant = 550;
            }

            if(0 < $request->child_age_more_five) {
                $totalAmount += $request->child_age_more_five*300;
                $totalParticipant += $request->child_age_more_five;
            }
            $totalParticipant += $request->child_age_less_five;
        }

        if(isset(Auth::user()->ssc_batch)) {
            if(Auth::user()->ssc_batch <= 2021) {
                if($request->participation_type === 'single') {
                    $totalAmount += 1000;
                }
                if($request->participation_type === 'couple') {
                    $totalAmount += 1300;
                    $totalParticipant = 2;
                }
            } else if(2022 <= Auth::user()->ssc_batch && Auth::user()->ssc_batch <= 2024) {
                if($request->participation_type === 'single') {
                    $totalAmount += 750;
                }
                if($request->participation_type === 'couple') {
                    $totalAmount += 1050;
                    $totalParticipant = 2;
                }
            }
        }

        session()->put([
            'user_data' => $request->all(),
            'total_participant' => $totalParticipant,
            'profile_update' => true
        ]);
        
        $totalAmount += number_format((15*$totalAmount)/1000, '2', '.', '');
        if(Auth::user()->total_amount < $totalAmount) {
            session()->put([
                'total_amount' => $totalAmount,
            ]);
            return app(BkashPaymentController::class)->bkashPayment();
        }
        return $this->userProfileUpdate($request);
    }

    public function updateGivenData(Request $request) {
        if(!(Auth::guard('admin')->check())) {
            return response()->json([
                'status' => 'ok'
            ]);
        }
        $userId = $request->validate([
            'user_id' => 'required|numeric'
        ]);

        $type = $request->input('type');
        $value = $request->input('value');

        $user = UserRegistrationModel::find($userId);
        $updateData = UserRegistrationModel::where('id', $userId)->update([$type => $value]);
        if($value === 'yes' && $updateData) {
            return response()->json([
                'value' => 'yes'
            ]);
        } else if($value === 'no' && $updateData) {
            return response()->json([
                'value' => 'no'
            ]);
        }        

    }

    public function opinionSubmit(Request $request) {

        $response = $this->cfTurnstile($request);

        if(!$response) {
            return redirect()->route('opinion')->with('error', 'আপনার মতামত জমা দেওয়া সম্ভব হয়নি৷');
        }

        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'ssc_batch' => 'nullable|numeric|string|max:2025',
            'user_opinion' => 'required|string'
        ]);

        // return $validateData;

        $opinionData = OpinionModel::create([
            'name' => $validateData['name'],
            'ssc_batch' => $validateData['ssc_batch'] ?? null,
            'user_opinion' => $validateData['user_opinion']
        ]);
        
        if($opinionData) {
              return redirect()->route('opinion')->with('success', 'আপনার মতামত সফলভাবে জমা দেওয়া হয়েছে৷');
        } else {
            return redirect()->route('opinion')->with('error', 'আপনার মতামত জমা দেওয়া সম্ভব হয়নি৷');
        }
    }

    public function usersOpinionData() {
        $usersOpinionData = OpinionModel::paginate(20);
        if($usersOpinionData) {
            return view('admin.received_opinion', compact('usersOpinionData'));
        } else {
            return compact('usersOpinionData');
        }
    }

    public function userOpinionDataView($id) {
        $userOpinionData = OpinionModel::find($id);
        if($userOpinionData) {
            $userOpinion = $userOpinionData->user_opinion;
            return view('admin.received_opinion_view', compact('userOpinion'));
        } else {
            return compact('usersOpinionData');
        }
    }

    public function cfTurnstile($request) {

        $turnstileResponse = $request->input('cf-turnstile-response');
        if(!$turnstileResponse) {
            return false;
        }

        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => config('services.turnstile.secret_key'),
            'response' => $request->input('cf-turnstile-response'),
            'remoteip' => $request->ip(),
        ]);
    
        $result = $response->json();
    
        if (!$result['success']) {
            return back()->withErrors(['turnstile' => 'Verification failed. Please try again.']);
        }

        return true;
    }

}
