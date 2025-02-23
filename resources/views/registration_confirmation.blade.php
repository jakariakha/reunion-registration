@extends('layouts.app')
@if(session('status') && session('status') == 'success')
  @section('title', 'নিবন্ধন সফল')
  @section('content')
  <section class="bg-gradient-to-r from-blue-900 via-indigo-900 to-purple-900 py-20">
  <div class="max-w-md mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold text-white mb-8">নিবন্ধন সফল</h2>

    <!-- Registration Success Container -->
    <div id="success-box" class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20 transform transition-all duration-500 hover:scale-105 hover:shadow-2xl">
      <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-blue-500 text-white rounded-full flex items-center justify-center mb-6 mx-auto shadow-lg transition-all duration-300 hover:scale-110">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
      </div>

      <div class="text-center text-white">
        <p class="mb-4">আপনার নিবন্ধন সফলভাবে সম্পন্ন হয়েছে!</p>
        <a href="{{ route('home') }}" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white text-lg px-6 py-3 rounded-lg shadow-lg hover:from-blue-500 hover:to-purple-500 transition-all duration-300 transform hover:scale-105">
        হোমে ফিরে যান
        </a>
      </div>
    </div>
  </div>
</section>
  @endsection
@elseif(session('status') && session('status') == 'failed')
  @section('title', 'নিবন্ধন ব্যর্থ')
  @section('content')
  <section class="bg-gradient-to-r from-blue-900 via-indigo-900 to-purple-900 py-20">
  <div class="max-w-md mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold text-white mb-8">নিবন্ধন ব্যর্থ</h2>

    <!-- Registration Failure Container -->
    <div id="failure-box" class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20 transform transition-all duration-500 hover:scale-105 hover:shadow-2xl">
      <div class="w-20 h-20 bg-gradient-to-r from-red-500 to-yellow-500 text-white rounded-full flex items-center justify-center mb-6 mx-auto shadow-lg transition-all duration-300 hover:scale-110">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </div>

      <div class="text-center text-white">
        <p class="mb-4">দুঃখিত, আপনার নিবন্ধন প্রক্রিয়া সম্পূর্ণ করা যায়নি।</p>
        <p class="mb-6">অনুগ্রহ করে আবার চেষ্টা করুন অথবা আমাদের সমর্থন দলকে যোগাযোগ করুন।</p>
        <a href="{{ route('home') }}" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white text-lg px-6 py-3 rounded-lg shadow-lg hover:from-blue-500 hover:to-purple-500 transition-all duration-300 transform hover:scale-105">
          হোমে ফিরে যান
        </a>
      </div>
    </div>
  </div>
</section>
  @endsection
@endif
