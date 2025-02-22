<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function submitLoginForm(Request $request) {

        $turnstileResponse = new UserRegistrationController;
        $response = $turnstileResponse->cfTurnstile($request);
        
        if(!$response) {
            return redirect()->route('login')->with('error', 'ক্যাপচা যাচাইকরণ ব্যর্থ হয়েছে৷');
        }

        $validateData = $request->validate([
            'mobile_number' => 'required|string|min:11|max:11',
            'password' => 'required|string|min:8|max:12'
        ]);

        if(Auth::attempt($validateData)) {
            session()->put([
                'mobile_number' => $validateData
            ]);
            $request->session()->regenerate();
            return redirect()->route('profile');
        }
        return redirect()->route('login')->with('error', 'মোবাইল নম্বর বা পাসওয়ার্ড ভুল।');
    }

    public function isLogin(Request $request) {
        if(Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        if(Auth::guard('web')->check()) {
            return redirect()->route('profile');
        }
        return view('login_form');
    }

    public function logoutUser(Request $request) {
        if(Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        }
        return redirect()->route('home');
    }
}
