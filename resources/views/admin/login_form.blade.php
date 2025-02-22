@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')

<body class="bg-white-to-r from-blue-900 via-indigo-900 to-purple-900 py-20">
  <div class="max-w-md mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold text-white mb-8">অ্যাডমিন লগইন</h2>

    <!-- Login Form Container -->
    <div id="login-box" class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-black transform transition-all duration-500 hover:scale-105 hover:shadow-2xl">
      <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-full flex items-center justify-center mb-6 mx-auto shadow-lg transition-all duration-300 hover:scale-110">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14c2.28 0 4-1.72 4-4s-1.72-4-4-4-4 1.72-4 4 1.72 4 4 4zm0 2c-3.33 0-6 2.67-6 6h12c0-3.33-2.67-6-6-6z"></path>
        </svg>
      </div>

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

      <form action="{{ route('admin.login') }}" method="POST" class="text-left">
        @csrf
        <div class="mb-4">
          <label for="phone" class="block text-black mb-2">১১-সংখ্যার মোবাইল নম্বর (ইংরেজিতে)</label>
          <input type="tel" name="mobile_number" id="mobileNumber" class="w-full px-4 py-3 rounded-lg bg-white/20 text-black border border-black focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="অ্যাডমিন মোবাইল নম্বর লিখুন" required>
        </div>
        @error('mobile_number')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <div class="mb-4 relative">
          <label for="password" class="block text-black mb-2">পাসওয়ার্ড</label>
          <div class="relative">
            <input type="password" name="password" id="password" class="w-full px-4 py-3 rounded-lg bg-white/20 text-black border border-black focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="অ্যাডমিন পাসওয়ার্ড লিখুন" required>
            <span class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePasswordVisibility()">
              <i id="eye-icon" class="fas fa-eye text-white"></i>
            </span>
          </div>
        </div>
        @error('password')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white text-lg px-6 py-3 rounded-lg shadow-lg hover:from-blue-500 hover:to-purple-500 transition-all duration-300 transform hover:scale-105">
          লগইন করুন
        </button>
      </form>

    </div>
  </div>

<script>
   function togglePasswordVisibility() {
  const passwordInput = document.getElementById('password');
  const eyeIcon = document.getElementById('eye-icon');

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    eyeIcon.classList.remove('fa-eye');
    eyeIcon.classList.add('fa-eye-slash');
  } else {
    passwordInput.type = 'password';
    eyeIcon.classList.remove('fa-eye-slash');
    eyeIcon.classList.add('fa-eye');
  }
}
</script>

</body>


@endsection
