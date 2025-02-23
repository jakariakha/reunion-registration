@extends('layouts.app')

@section('title', 'পুনর্মিলনী নিবন্ধন')

@section('content')

<body class="bg-white py-20">
  <div class="max-w-md mx-auto px-6 text-center">
  <h2 class="text-4xl font-bold text-black mb-8">পুনর্মিলনী নিবন্ধন</h2> 
    <!-- Registration Form Container -->
    <div class="bg-slate-50 rounded-xl shadow-lg p-8 mb-16 border border-gray-500">
        <form id="profileUpdateForm" action=" {{ route('update.profile.post') }}" method="POST" class="text-left">
            @csrf

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

            <div class="mb-4">
                <label for="t-shirt-size" class="block text-black mb-2">আপনার টি-শার্ট সাইজ নির্বাচন করুন</label>
                <select class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="t-shirt-size" name="t_shirt_size" required>
                    <option value="" disabled>একটি অপশন নির্বাচন করুন</option>
                    <option value="S" {{ $userData->t_shirt_size == 'S' ? 'selected' : ''}}>S</option>
                    <option value="M" {{ $userData->t_shirt_size == 'M' ? 'selected' : ''}}>M</option>
                    <option value="L" {{ $userData->t_shirt_size == 'L' ? 'selected' : ''}}>L</option>
                    <option value="XL" {{ $userData->t_shirt_size == 'XL' ? 'selected' : ''}}>XL</option>
                    <option value="XXL" {{ $userData->t_shirt_size == 'XXL' ? 'selected' : ''}}>XXL</option>
                    <option value="XXXL" {{ $userData->t_shirt_size == 'XXXL' ? 'selected' : ''}}>XXXL</option>
                    <option value="XXXXL" {{ $userData->t_shirt_size == 'XXXXL' ? 'selected' : ''}}>XXXXL</option>
                    <option value="XXXXXL" {{ $userData->t_shirt_size == 'XXXXXL' ? 'selected' : ''}}>XXXXXL</option>
                </select>
            </div>

            <div id="sscBatchLess21" class="mb-4 {{ (21 > $userData->ssc_batch && isset($userData->ssc_batch)) ? '' : 'hidden' }}">
                <label for="participation" class="block text-black mb-2">অংশগ্রহণের ধরন</label>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center text-black">
                        <input class="form-radio" type="radio" name="participation_type" id="single1" value="single">
                        <label for="single" class="ml-2">একা(১০০০ টাকা)</label>
                    </div>
                    <div class="flex items-center text-black">
                        <input class="form-radio" type="radio" name="participation_type" id="couple1" value="couple">
                        <label for="couple" class="ml-2">স্বামী-স্ত্রী(১৩০০ টাকা)</label>
                    </div>
                </div>
            </div>

            <div id="sscBatchLess25" class="mb-4 {{ (21 <= $userData->ssc_batch && $userData->ssc_batch <= 24) ? '' : 'hidden' }}">
                <label for="participation" class="block text-white mb-2">অংশগ্রহণের ধরন</label>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center text-black">
                        <input class="form-radio" type="radio" name="participation_type" id="single2" value="single">
                        <label for="single" class="ml-2">একা(৭৫০ টাকা)</label>
                    </div>
                    <div class="flex items-center text-black">
                        <input class="form-radio" type="radio" name="participation_type" id="couple2" value="couple">
                        <label for="couple" class="ml-2">স্বামী-স্ত্রী(১০৫০ টাকা)</label>
                    </div>
                </div>
            </div>

            <div id="runningStudent" class="mb-4 {{ isset($userData->which_class) ? '' : 'hidden' }}">
                <label for="participation" class="block text-black mb-2">অংশগ্রহণের ধরন</label>
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-3 sm:space-y-0">
                    <div class="flex items-center text-black">
                        <input class="form-radio text-blue-500 focus:ring-blue-400" type="radio" name="participation_type" id="single3" value="single" {{ $userData->participation_type == 'single' ? 'checked' : '' }}>
                        <label for="single3" class="ml-2">একা (২৫০ টাকা)</label>
                    </div>
                    <div class="flex items-center text-black">
                        <input class="form-radio text-blue-500 focus:ring-blue-400" type="radio" name="participation_type" id="couple3" value="couple" {{ $userData->participation_type == 'couple' ? 'checked' : '' }}>
                        <label for="couple3" class="ml-2">স্বামী-স্ত্রী (৫৫০ টাকা)</label>
                    </div>
                </div>
            </div>

            <div id="childSection" class="mb-4 hidden">
                <label class="block text-black mb-2">আপনি কি সন্তান নিয়ে আসতে চান?</label>
                <div class="flex items-center text-black space-x-4">
                    <div class="flex items-center">
                        <input class="form-radio" type="radio" name="take_come_children" id="takeComeChildrenYes" value="yes" {{ $userData->take_come_children == 'yes' ? 'checked' : '' }}>
                        <label for="take_come_children_yes" class="ml-2">হ্যাঁ</label>
                    </div>
                    <div class="flex items-center">
                        <input class="form-radio" type="radio" name="take_come_children" id="takeComeChildrenNo" value="no" {{ $userData->take_come_children == 'no' ? 'checked' : '' }}>
                        <label for="take_come_children_no" class="ml-2">না</label>
                    </div>
                </div>

                <div id="childInfoSection" class="hidden">
                    <div class="mb-4" id="childInputs">
                        <label for="child_name_1" class="block text-black mb-2">আপনার ৫ বছরের কম কয়টি সন্তান রয়েছে? (সংখ্যায় ইংরেজিতে) (প্রতিজন ০ টাকা)</label>
                        <input type="number" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="childAgeLessFive" name="child_age_less_five" value="{{ isset($userData->child_age_less_five) ? $userData->child_age_less_five : '' }}" placeholder="0 অথবা এর বেশি লিখুন">
                        <div class="mt-4">
                            <label for="child_age_1" class="block text-black mb-2">আপনার ৫ বছরের বেশি কয়টি সন্তান রয়েছে? (সংখ্যায় ইংরেজিতে) (প্রতিজন ৩০০ টাকা)</label>
                            <input type="number" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="childAgeMoreFive" name="child_age_more_five" value="{{ isset($userData->child_age_more_five) ? $userData->child_age_more_five : '' }}" placeholder="0 অথবা এর বেশি লিখুন">
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div> -->
            
            <div class="flex justify-center items-center">
                <button id="nextButton" type="submit" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-lg px-12 py-4 rounded-full shadow-lg hover:from-blue-500 hover:to-purple-500 transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed">
                    পরবর্তী
                </button>
            </div>
    </form>
    
    </div>
  </div>
  <script>

     $('#sscBatchLess21').change(function() {
        if($('#single1').is(':checked')) {
            $('#childSection').hide();
            $('#takeComeChildrenYes').removeAttr('required', false);
        }
        if($('#couple1').is(':checked')) {
            $('#childSection').show();
            $('#takeComeChildrenYes').attr('required', true);
        }
    });
    
    $('#sscBatchLess25').change(function() {
        if($('#single2').is(':checked')) {
            $('#childSection').hide();
            $('#takeComeChildrenYes').removeAttr('required');
        }
        if($('#couple2').is(':checked')) {
            $('#childSection').show();
            $('#takeComeChildrenYes').attr('required', true);
        }
    });

    $('#runningStudent').change(function() {
        if($('#single3').is(':checked')) {
            $('#childSection').hide();
            $('#takeComeChildrenYes').removeAttr('required');
        }
        if($('#couple3').is(':checked')) {
            $('#childSection').show();
            $('#takeComeChildrenYes').attr('required', true);
        }
    });

    $('#childSection').change(function() {
        if($('#takeComeChildrenYes').is(':checked')) {
            $('#childInfoSection').show();
            $('#childAgeLessFive').attr('required', true);
            $('#childAgeMoreFive').attr('required', true);
        }
        if($('#takeComeChildrenNo').is(':checked')) {
            $('#childInfoSection').hide();
            $('#childAgeLessFive').removeAttr('required');
            $('#childAgeMoreFive').removeAttr('required');
        }
    });

    window.onload = function() {
        document.getElementById('profileUpdateForm').reset();
    }

  </script>
</body>

@endsection
