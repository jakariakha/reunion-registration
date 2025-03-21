@extends('layouts.app')
@section('title', 'Payment Summary')
@section('content')

 <!-- Payment Summary Section -->

 <body class="bg-white-to-r from-blue-900 via-indigo-900 to-purple-900 py-20">
  <div class="max-w-md mx-auto px-6 text-center">
  <h2 class="text-4xl font-bold text-black mb-8">পেমেন্ট সারাংশ</h2> 
    <!-- Login Form Container -->
    <div class="bg-slate-50 backdrop-blur-lg rounded-2xl p-8 border border-black transform transition-all duration-500 hover:scale-105 hover:shadow-2xl">

        <div class="p-6">
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
            <div class="mt-2">
                <div class="flex justify-between">
                    <span class="text-black">মোট অংশগ্রহণকারী</span>
                    <span class="text-black">{{session('total_participant')}} জন</span>
                </div>
                <div class="flex justify-between mt-2">
                    <span class="text-black">আনুমানিক মোট</span>
                    <span class="text-black">৳{{session('subtotal_amount')}}</span>
                </div>
                <div class="flex justify-between mt-2">
                    <span class="text-black">ক্যাশ আউট চার্জ</span>
                    <span class="text-black">৳{{ session('cashout_charge') }}</span>
                </div>
                <div class="flex justify-between mt-2">
                    <span class="text-black">পেমেন্ট পদ্ধতি</span>
                    <span class="text-black">বিকাশ</span>
                </div>
                <div class="border-t border-black mt-4 pt-4 flex justify-between">
                    <span class="text-lg font-semibold text-black">মোট</span>
                    <span class="text-lg font-semibold text-black">৳{{ session('total_amount') }}</span>
                </div>
            </div>
        </div>
        <a href="{{ route('send.otp') }}" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white text-lg px-6 py-3 rounded-lg shadow-lg hover:from-blue-500 hover:to-purple-500 transition-all duration-300 transform hover:scale-105">
        পরবর্তী
        </a>
    </div>
  </div>
</body>

@endsection