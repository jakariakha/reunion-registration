@extends('layouts.app')

@section('title', 'OTP Verification')

@section('content')

<body class="bg-white-to-r from-blue-900 via-indigo-900 to-purple-900 py-20">
  <div class="max-w-md mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold text-black mb-8">OTP ভেরিফিকেশন</h2>

    <!-- OTP Verification Form Container -->
    <div id="otp-box" class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-black transform transition-all duration-500 hover:scale-105 hover:shadow-2xl">
      <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-full flex items-center justify-center mb-6 mx-auto shadow-lg transition-all duration-300 hover:scale-110">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
      </div>

      @if(session('success'))
        <div class="flex items-center bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md shadow-md">
            <!-- Message Content -->
            <span class="flex-1">{{ session('success') }}</span>
            
            <!-- Close Button -->
            <button class="ml-4 text-green-700 hover:text-green-900" onclick="this.parentElement.style.display='none'">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
      @endif

      @if(session('error'))
        <div class="flex items-center bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-md shadow-md">
            <!-- Message Content -->
            <span class="flex-1">{{ session('error') }}</span>
            
            <!-- Close Button -->
            <button class="ml-4 text-red-700 hover:text-red-900" onclick="this.parentElement.style.display='none'">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div> 
      @endif

      <form action="{{ route('submitted.otp.verification') }}" method="POST" class="text-left">
        @csrf
        <div class="mb-4">
          <label for="otp" class="block text-black mb-2">একটি OTP কোড পাঠানো হয়েছে</label>
          <input type="text" name="submitted_otp" id="otp" class="w-full px-4 py-3 rounded-lg bg-white/20 text-black border border-black focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="OTP কোড এখানে লিখুন" required>
        </div>
        <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white text-lg px-6 py-3 rounded-lg shadow-lg hover:from-blue-500 hover:to-purple-500 transition-all duration-300 transform hover:scale-105">
          OTP যাচাই করুন
        </button>
      </form>
      
    </div>
  </div>
</body>

@endsection
