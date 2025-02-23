<nav class="bg-white text-gray-900 shadow-lg fixed top-0 w-full z-50">
  <div class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between">
  <!-- Logo -->
  <div class="flex items-center">
    <div class="w-32 md:w-40 h-auto"> <!-- Adjust width values as needed -->
      <a href="{{ route('home') }}">
        <img 
          src="{{ asset('images/reunion_logo.png') }}" 
          alt="Logo" 
          class="w-full h-full object-contain"
        >
      </a>
    </div>
  </div>
  
    <!-- Menu for large screens -->
    <div class="hidden lg:flex space-x-12 items-center text-lg font-medium">
      <a href="/" class="text-gray-900 hover:text-gray-500 transition-all duration-300">হোম</a>
      @auth('web')
          <a href="{{ route('profile') }}" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">প্রোফাইল</a>
          <a href="{{ route('update.profile') }}" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">হালনাগাদ</a>      
          <a href="{{ route('user.logout') }}" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">লগআউট</a>
      @endauth

      @auth('admin')
        <a href="{{ route('admin.dashboard') }}" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">ড্যাশবোর্ড</a>
        <a href="{{ route('admin.received.opinion') }}" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">প্রাপ্ত মতামত</a>
        <a href="{{ route('admin.logout') }}" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">লগআউট</a>
        <!-- Premium Button -->
        <a href="{{ route('registration') }}" class="block text-center bg-gradient-to-r from-blue-600 to-purple-600 text-white text-lg px-12 py-4 rounded-full shadow-lg hover:from-blue-500 hover:to-purple-500 transition-all duration-300 transform hover:scale-105">
          নিবন্ধন করুন
        </a>
      @endauth

      @if(Auth::guard('web')->check() == false && Auth::guard('admin')->check() == false)
        <a href="{{ route('opinion') }}" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">মতামত</a>
        <a href="{{ route('contact') }}" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">যোগাযোগ</a>
        <a href="{{ route('login') }}" class="text-gray-900 hover:text-gray-500 transition-all duration-300">লগইন</a>
        <!-- Start Registration Button -->
        <div class="flex justify-center mb-8">
            <a href="{{ route('registration') }}" class="bg-green-600 text-white px-6 py-3 md:px-8 md:py-4 rounded-full font-semibold hover:bg-green-700 transition-all text-sm md:text-base shadow-md hover:shadow-lg">
                নিবন্ধন শুরু করুন
            </a>
        </div>
      @endif
    </div>

    <!-- Hamburger Menu for small screens -->
    <div class="lg:hidden">
      <button id="menu-toggle" class="text-gray-900 hover:text-gray-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>
  </div>
  

  <!-- Mobile Menu -->
  <div class="lg:hidden hidden bg-white py-6 shadow-md" id="mobile-menu">
    <a href="/" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">হোম</a>
    @auth('web')
      <a href="{{ route('profile') }}" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">প্রোফাইল</a>
      <a href="{{ route('update.profile') }}" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">হালনাগাদ</a> 
      <a href="{{ route('user.logout') }}" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">লগআউট</a>
    @endauth

    @auth('admin')
      <a href="{{ route('admin.dashboard') }}" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">ড্যাশবোর্ড</a>
      <a href="{{ route('admin.dashboard') }}" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">প্রাপ্ত মতামত</a>
      <a href="{{ route('admin.logout') }}" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">লগআউট</a>
    @endauth

    @if(Auth::guard('web')->check() == false && Auth::guard('admin')->check() == false)
      <a href="{{ route('opinion') }}" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">মতামত</a>
      <a href="{{ route('contact') }}" class="block text-gray-900 hover:text-gray-500 transition-all duration-200 px-6 py-3">যোগাযোগ</a>
      <a href="{{ route('login') }}" class="text-gray-900 hover:text-gray-500 transition-all duration-300 px-6 py-3">লগইন</a>
      <!-- Premium Button -->
       <div class="flex justify-center items-center">
        <a href="{{ route('registration') }}" class="block w-64 bg-green-600 text-white text-center px-6 py-3 md:px-8 md:py-4 rounded-full font-semibold hover:bg-green-700 transition-all text-sm md:text-base shadow-md hover:shadow-lg">
          নিবন্ধন করুন
        </a>
       </div>
      
    @endif

  </div>
</nav>

<script>
  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');

  menuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>
