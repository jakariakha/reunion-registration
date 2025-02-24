@extends('layouts.app')
@section('title', 'নিবন্ধন ব্যর্থ')
@section('content')
<div class="flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div class="bg-white rounded-3xl shadow-2xl p-8 sm:p-10 border border-gray-200 transition-transform duration-300 hover:scale-[1.02]">
      
      <!-- Failure Icon -->
      <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gradient-to-br from-red-500 to-red-200 text-white rounded-full flex items-center justify-center mb-6 mx-auto shadow-lg">
        <svg class="w-10 h-10 sm:w-12 sm:h-12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
          <path d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </div>

      <!-- Failure Message -->
      <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-800 text-center mb-4">❌ নিবন্ধন ব্যর্থ!</h2>
      <p class="text-gray-600 text-center text-base sm:text-lg leading-relaxed mb-6">
      😞 দুঃখিত, আপনার পূর্ণমিলনী নিবন্ধন ব্যর্থ হয়েছে। 
       অনুগ্রহ করে আবার চেষ্টা করুন।
      </p>

      <!-- Button -->
      <a href="{{ route('home') }}" class="w-full block text-center bg-gradient-to-r from-blue-600 to-purple-600 text-white text-base sm:text-lg font-semibold px-6 py-3 rounded-xl shadow-md hover:from-blue-500 hover:to-purple-500 transition-transform duration-200 transform hover:scale-105">
        হোমে ফিরে যান
      </a>
    </div>
  </div>
</div>
@endsection
