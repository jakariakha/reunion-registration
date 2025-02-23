@extends('layouts.app')

@section('title', 'Opinion')

@section('content')

<body class="bg-white-to-r from-blue-900 via-indigo-900 to-purple-900 py-20">
  <div class="max-w-md mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold text-black mb-8">আপনার মতামত দিন</h2>

    <!-- Opinion Form Container -->
    <div id="opinion-box" class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-black transform transition-all duration-500 hover:scale-105 hover:shadow-2xl">

      @if(session('success'))
        <div class="flex items-center bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md shadow-md">
            <span class="flex-1">{{ session('success') }}</span>
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

      <form action="{{ route('opinion.submit') }}" method="POST" class="text-left">
        @csrf
        <div class="mb-4">
          <label for="name" class="block text-black mb-2">আপনার নাম</label>
          <input type="text" name="name" id="name" class="w-full px-4 py-3 rounded-lg bg-white/20 text-black border border-black focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="আপনার নাম লিখুন" required>
        </div>
        <div class="mb-4">
          <label for="ssc-batch" class="block text-black mb-2">এসএসসি ব্যাচ</label>
          <input type="number" name="ssc_batch" id="sscBatch" class="w-full px-4 py-3 rounded-lg bg-white/20 text-black border border-black focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="আপনার এসএসসি ব্যাচ লিখুন">
        </div>
        <div class="mb-4">
          <label for="opinion" class="block text-black mb-2">আপনার মতামত</label>
          <textarea name="user_opinion" id="opinion" class="w-full px-4 py-3 rounded-lg bg-white/20 text-black border border-black focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="আপনার মতামত লিখুন" rows="4" required></textarea>
        </div>

        <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>

        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white text-lg px-6 py-3 rounded-lg shadow-lg hover:from-blue-500 hover:to-purple-500 transition-all duration-300 transform hover:scale-105">
          জমা দিন
        </button>
      </form>
    </div>
  </div>
</body>

@endsection