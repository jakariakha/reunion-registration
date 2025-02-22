<section class="bg-gradient-to-br from-blue-900 via-indigo-900 to-purple-900 py-20 min-h-screen">
  <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Form Container -->
    <div class="bg-white/5 backdrop-blur-xl rounded-3xl p-8 border-2 border-white/10 shadow-2xl space-y-6">
      <!-- Form Header -->
      <div class="text-center space-y-4">
        <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-300 mb-2">
          পুনর্মিলনী নিবন্ধন ফর্ম
        </h2>
        <p class="text-blue-100/80 text-sm">নিবন্ধন সম্পূর্ণ করতে সকল তথ্য সঠিকভাবে প্রদান করুন</p>
      </div>

      <!-- Form Content -->
      <form id="registrationForm" action="{{ route('payment.participants') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Status Messages -->
        @if(session('success'))
        <div class="p-4 bg-emerald-500/20 rounded-xl border border-emerald-500/30 flex items-center">
          <svg class="w-5 h-5 text-emerald-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
          </svg>
          <span class="ml-3 text-emerald-200 text-sm">{{ session('success') }}</span>
        </div>
        @endif

        <!-- Personal Information Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Name Input -->
          <div class="space-y-2">
            <label class="block text-blue-100/80 text-sm font-medium">পুরো নাম</label>
            <div class="relative">
              <input type="text" name="name" required
                     class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-lg text-blue-100 placeholder-blue-400/60 
                            focus:border-blue-400 focus:ring-2 focus:ring-blue-400/30 transition-all">
            </div>
          </div>

          <!-- Mobile Number -->
          <div class="space-y-2">
            <label class="block text-blue-100/80 text-sm font-medium">মোবাইল নম্বর</label>
            <div class="relative">
              <input type="tel" name="mobile_number" required
                     class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-lg text-blue-100 placeholder-blue-400/60
                            focus:border-blue-400 focus:ring-2 focus:ring-blue-400/30 transition-all">
            </div>
          </div>
        </div>

        <!-- Family Information Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div class="space-y-2">
            <label class="block text-blue-100/80 text-sm font-medium">পিতার নাম</label>
            <input type="text" name="father_name" required
                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-lg text-blue-100 placeholder-blue-400/60
                          focus:border-blue-400 focus:ring-2 focus:ring-blue-400/30 transition-all">
          </div>

          <div class="space-y-2">
            <label class="block text-blue-100/80 text-sm font-medium">মাতার নাম</label>
            <input type="text" name="mother_name" required
                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-lg text-blue-100 placeholder-blue-400/60
                          focus:border-blue-400 focus:ring-2 focus:ring-blue-400/30 transition-all">
          </div>
        </div>

        <!-- Address and Profession -->
        <div class="space-y-6">
          <div class="space-y-2">
            <label class="block text-blue-100/80 text-sm font-medium">বর্তমান ঠিকানা</label>
            <input type="text" name="address" required
                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-lg text-blue-100 placeholder-blue-400/60
                          focus:border-blue-400 focus:ring-2 focus:ring-blue-400/30 transition-all">
          </div>

          <div class="space-y-2">
            <label class="block text-blue-100/80 text-sm font-medium">বর্তমান পেশা</label>
            <input type="text" name="current_job" required
                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-lg text-blue-100 placeholder-blue-400/60
                          focus:border-blue-400 focus:ring-2 focus:ring-blue-400/30 transition-all">
          </div>
        </div>

        <!-- T-shirt Size Selector -->
        <div class="space-y-2">
          <label class="block text-blue-100/80 text-sm font-medium">টি-শার্ট সাইজ</label>
          <select name="t_shirt_size" required
                  class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-lg text-blue-100
                         focus:border-blue-400 focus:ring-2 focus:ring-blue-400/30 transition-all appearance-none">
            <option value="" disabled selected>সাইজ নির্বাচন করুন</option>
            <!-- Options remain same -->
          </select>
        </div>

        <!-- SSC Status Section -->
        <div class="bg-white/5 p-6 rounded-xl border border-white/10 space-y-4">
          <label class="block text-blue-100/80 text-sm font-medium">এসএসসি পাশের তথ্য</label>
          
          <div class="grid grid-cols-2 gap-4">
            <label class="flex items-center space-x-3 p-4 bg-white/2 rounded-lg border border-white/10 hover:border-blue-400/40 cursor-pointer">
              <input type="radio" name="ssc_result_status" value="yes" class="text-blue-400 focus:ring-blue-400">
              <span class="text-blue-100">হ্যাঁ, পাশ করেছি</span>
            </label>
            
            <label class="flex items-center space-x-3 p-4 bg-white/2 rounded-lg border border-white/10 hover:border-blue-400/40 cursor-pointer">
              <input type="radio" name="ssc_result_status" value="no" class="text-blue-400 focus:ring-blue-400">
              <span class="text-blue-100">না, এখনও পাশ করিনি</span>
            </label>
          </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" 
                class="w-full py-4 px-6 bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-400 hover:to-purple-400
                       text-white font-semibold rounded-lg shadow-lg transition-all transform hover:scale-[1.02]">
          পরবর্তী ধাপ ➔
        </button>
      </form>
    </div>
  </div>
</section>