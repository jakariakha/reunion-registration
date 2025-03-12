<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function login(Request $request) {


        $turnstileResponse = new UserRegistrationController;
        $response = $turnstileResponse->cfTurnstile($request);
        
        if(!$response) {
            return redirect()->route('admin.login')->with('error', 'ক্যাপচা যাচাইকরণ ব্যর্থ হয়েছে৷');
        }

        $validateData = $request->validate([
            'mobile_number' => 'required|string|min:11|max:11',
            'password' => 'required|string|min:16|max:16'
        ]);

        if(Auth::guard('admin')->attempt($validateData)) {
            return redirect()->intended('admin/dashboard');
        }
        return back()->with('error', 'মোবাইল নম্বর বা পাসওয়ার্ড ভুল।');
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login'); 

    }
}
