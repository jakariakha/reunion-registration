@extends('layouts.app')
@section('title', 'AAMHS Reunion Registration 2025')
@section('content')

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-8">
        <!-- Main Image Section -->
        <section class="relative mb-8 md:mb-12">
            <div class="relative overflow-hidden rounded-2xl shadow-2xl">
                <div class="relative w-full h-full">
                    <!-- Image -->
                    <img 
                    src="{{ asset('images/school_img.jpg') }}" 
                    alt="Reunion Logo" 
                    class="w-full h-full object-cover mx-auto"
                    loading="lazy"
                    style="max-height: min(70vh, 580px);">

                    <!-- Black Overlay -->
                    <div class="absolute inset-0 bg-black/40"></div>

                    <!-- Text Content -->
                    <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white px-6 py-8 space-y-3">
                        <p class="text-2xl md:text-4xl font-extrabold tracking-wide drop-shadow-lg">ফেরার হোক স্মৃতির টানে</p>
                        <p class="text-lg md:text-2xl font-semibold tracking-tight drop-shadow-md">
                            আহমদ আলী মেমোরিয়াল উচ্চ বিদ্যালয় পূর্ণমিলনী ২০২৫
                        </p>
                        <p class="text-base md:text-lg font-medium bg-white/20 px-4 py-1 rounded-xl backdrop-blur-sm">
                            অনুষ্ঠানের তারিখ: ঈদুল আজহার তৃতীয় দিন
                        </p>
                        <p class="text-base md:text-lg font-medium bg-white/20 px-4 py-1 rounded-xl backdrop-blur-sm">
                            গাংগাইল, মধুপুর, টাঙ্গাইল
                        </p>
                    </div>
                </div>
            </div>
        </section>



        

        <!-- Countdown Timer Section -->
        <section class="bg-blue-800 text-white rounded-2xl p-6 md:p-8 text-center mb-8 md:mb-10">
            <h2 class="text-xl md:text-2xl font-bold mb-2">পুনর্মিলনী নিবন্ধন</h2>
            <p class="text-xs md:text-sm mb-4 md:mb-6">নিচের সময়সীমার মধ্যে নিবন্ধন সম্পন্ন করুন</p>
            <div id="countdown" class="flex flex-wrap justify-center gap-3 md:gap-4 text-base md:text-lg font-semibold">
                <div class="flex flex-col items-center">
                    <span id="days" class="text-2xl md:text-4xl">00</span>
                    <span class="text-xs md:text-sm">দিন</span>
                </div>
                <span class="text-2xl md:text-4xl self-center">:</span>
                <div class="flex flex-col items-center">
                    <span id="hours" class="text-2xl md:text-4xl">00</span>
                    <span class="text-xs md:text-sm">ঘন্টা</span>
                </div>
                <span class="text-2xl md:text-4xl self-center">:</span>
                <div class="flex flex-col items-center">
                    <span id="minutes" class="text-2xl md:text-4xl">00</span>
                    <span class="text-xs md:text-sm">মিনিট</span>
                </div>
                <span class="text-2xl md:text-4xl self-center">:</span>
                <div class="flex flex-col items-center">
                    <span id="seconds" class="text-2xl md:text-4xl">00</span>
                    <span class="text-xs md:text-sm">সেকেন্ড</span>
                </div>
            </div>
        </section>

        <!-- Registration Steps Grid -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 md:gap-6 mb-8">
            <!-- Step 1 -->
            <div class="bg-white rounded-2xl shadow p-3 md:p-4 flex flex-col items-center text-center transition-transform hover:scale-[1.02]">
                <div class="bg-green-100 p-2 md:p-3 rounded-full mb-2 md:mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.457 0 4.738.648 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-sm md:text-base font-semibold mb-1">ব্যক্তিগত তথ্য</h3>
                <p class="text-xs md:text-sm text-gray-600">আপনার আপডেটেড তথ্য দিয়ে ফর্মটি পূরণ করুন</p>
                <span class="mt-2 text-green-600 text-xs md:text-sm">ধাপ ১</span>
            </div>

            <!-- Step 2 -->
            <div class="bg-white rounded-2xl shadow p-3 md:p-4 flex flex-col items-center text-center transition-transform hover:scale-[1.02]">
                <div class="bg-cyan-100 p-2 md:p-3 rounded-full mb-2 md:mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 8.25.22-.22a.75.75 0 0 1 1.28.53v6.441c0 .472.214.934.64 1.137a3.75 3.75 0 0 0 4.994-1.77c.205-.428-.152-.868-.627-.868h-.507m-6-2.25h7.5M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                </div>
                <h3 class="text-sm md:text-base font-semibold mb-1">পেমেন্ট বিবরণ</h3>
                <p class="text-xs md:text-sm text-gray-600">পেমেন্ট পরিমাণ ও পদ্ধতি যাচাই করুন</p>
                <span class="mt-2 text-cyan-600 text-xs md:text-sm">ধাপ ২</span>
            </div>

            <!-- Step 3 -->
            <div class="bg-white rounded-2xl shadow p-3 md:p-4 flex flex-col items-center text-center transition-transform hover:scale-[1.02]">
                <div class="bg-blue-100 p-2 md:p-3 rounded-full mb-2 md:mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                    </svg>
                </div>
                <h3 class="text-sm md:text-base font-semibold mb-1">মোবাইল যাচাই</h3>
                <p class="text-xs md:text-sm text-gray-600">ওটিপির মাধ্যমে মোবাইল নম্বর নিশ্চিত করুন</p>
                <span class="mt-2 text-blue-600 text-xs md:text-sm">ধাপ ৩</span>
            </div>

            <!-- Step 4 -->
            <div class="bg-white rounded-2xl shadow p-3 md:p-4 flex flex-col items-center text-center transition-transform hover:scale-[1.02]">
                <div class="bg-orange-100 p-2 md:p-3 rounded-full mb-2 md:mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                    </svg>
                </div>
                <h3 class="text-sm md:text-base font-semibold mb-1">পেমেন্ট</h3>
                <p class="text-xs md:text-sm text-gray-600">নিবন্ধন সম্পূর্ণ করতে পেমেন্ট সম্পূর্ণ করুন</p>
                <span class="mt-2 text-orange-600 text-xs md:text-sm">ধাপ ৪</span>
            </div>

            <!-- Step 5 -->
            <div class="bg-white rounded-2xl shadow p-3 md:p-4 flex flex-col items-center text-center transition-transform hover:scale-[1.02]">
                <div class="bg-purple-100 p-2 md:p-3 rounded-full mb-2 md:mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-sm md:text-base font-semibold mb-1">নিশ্চিতকরণ</h3>
                <p class="text-xs md:text-sm text-gray-600">নিবন্ধন সম্পূর্ণ হয়েছে</p>
                <span class="mt-2 text-purple-600 text-xs md:text-sm">ধাপ ৫</span>
            </div>
        </section>

        <!-- Start Registration Button -->
        <div class="flex justify-center mb-8">
            <a href="{{ route('registration') }}" class="bg-green-500 text-white px-6 py-3 md:px-8 md:py-4 rounded-full font-semibold hover:bg-green-700 transition-all text-sm md:text-base shadow-md hover:shadow-lg">
                নিবন্ধন শুরু করুন →
            </a>
        </div>
    </div>

    <script>
        const countdown = (deadline) => {
            const pad = (n) => n.toString().padStart(2, '0');
            
            const updateCountdown = () => {
                const now = new Date().getTime();
                const distance = deadline - now;

                if (distance < 0) {
                    document.getElementById('countdown').innerHTML = '<p class="text-lg font-semibold">সময় শেষ হয়েছে!</p>';
                    clearInterval(interval);
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById('days').textContent = pad(days);
                document.getElementById('hours').textContent = pad(hours);
                document.getElementById('minutes').textContent = pad(minutes);
                document.getElementById('seconds').textContent = pad(seconds);
            };

            updateCountdown();
            const interval = setInterval(updateCountdown, 1000);
        };

        // Set countdown deadline (YYYY-MM-DDTHH:mm:ss)
        countdown(new Date('2025-04-01T23:59:59').getTime());
    </script>
</body>

@endsection
