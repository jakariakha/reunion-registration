@extends('layouts.app')

@section('title', 'পুনর্মিলনী নিবন্ধন')

@section('content')

<body class="bg-white py-20">
  <div class="max-w-md mx-auto px-6 text-center">
  <h2 class="text-4xl font-bold text-black mb-8">পুনর্মিলনী নিবন্ধন ফর্ম</h2> 
    <!-- Registration Form Container -->
    <div class="bg-slate-50 rounded-xl shadow-lg p-8 mb-16 border border-gray-500">
        <form id="registrationForm" action="{{ route('payment.participants') }}" method="POST" class="text-left">
            @csrf
            <p class="text-red-500 text-sm text-center mb-4">নিবন্ধন সম্পূর্ণ করতে সকল তথ্য প্রদান করা বাধ্যতামূলক।</p>
            <p class="text-red-500 text-sm text-center hidden" id="requiredAlert">সকল তথ্য প্রদান করা বাধ্যতামূলক।</p>

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
                <label for="name" class="block text-black mb-2">নাম</label>
                <input type="text" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="name" name="name" placeholder="আপনার পুরো নাম লিখুন" required>
            </div>
            <div class="mb-4">
                <label for="fathername" class="block text-black mb-2">পিতার নাম</label>
                <input type="text" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="fathername" name="father_name" placeholder="আপনার পিতার নাম লিখুন" required>
            </div>
            <div class="mb-4">
                <label for="mothername" class="block text-black mb-2">মাতার নাম</label>
                <input type="text" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="mothername" name="mother_name" placeholder="আপনার মাতার নাম লিখুন" required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-black mb-2">ঠিকানা</label>
                <input type="text" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="address" name="address" placeholder="আপনার ঠিকানা লিখুন" required>
            </div>

            <div class="mb-4">
                <label for="job" class="block text-black mb-2">বর্তমান পেশা</label>
                <input type="text" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="job" name="current_job" placeholder="আপনার বর্তমান পেশা লিখুন" required>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-black mb-2">১১-সংখ্যার মোবাইল নম্বর (ইংরেজিতে)</label>
                <input type="tel" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="mobileNumber" name="mobile_number" placeholder="মোবাইল নম্বর লিখুন" required>
            </div>

            <div class="mb-4">
                <label for="t-shirt-size" class="block text-black mb-2">আপনার টি-শার্ট সাইজ নির্বাচন করুন</label>
                <select class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="t-shirt-size" name="t_shirt_size" required>
                    <option value="" disabled selected>একটি অপশন নির্বাচন করুন</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="XXXL">XXXL</option>
                    <option value="XXXXL">XXXXL</option>
                    <option value="XXXXXL">XXXXXL</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="ssc-result-check" class="block text-black mb-2">আপনি কি এসএসসি পাশ করেছেন?</label>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center text-black">
                        <input class="form-radio" type="radio" name="ssc_result_status" id="ssc-pass-yes" value="yes" required>
                        <label for="ssc_pass_yes" class="ml-2">হ্যাঁ</label>
                    </div>
                    <div class="flex items-center text-black">
                        <input class="form-radio" type="radio" name="ssc_result_status" id="ssc-pass-no" value="no" required>
                        <label for="ssc_pass_no" class="ml-2">না</label>
                    </div>
                </div>
            </div>

            <div class="mb-4" id="sscBatchSection" style="display: none;">
                <label for="ssc_batch" class="block text-black mb-2">আপনার এসএসসি পাশের সাল কত?</label>
                <input type="number" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="sscBatch" name="ssc_batch" placeholder="সাল লিখুন (১৯৭২-২০২৪)">
                <div class="text-red-600 mt-1" id="sscBatchYearAlert" style="display: none;">এসএসসি পাশের সাল ১৯৭২-২০২৪ এর মধ্যে হতে হবে</div>
            </div>

            <div class="mb-4" id="studyStatusSection" style="display: none;">
                <label for="study-status-check" class="block text-black mb-2">আপনি কি বর্তমানে পড়াশোনা করেন?</label>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center text-black">
                        <input class="form-radio" type="radio" name="study_status_check" id="studyStatusYes" value="yes">
                        <label for="study-status-yes" class="ml-2">হ্যাঁ</label>
                    </div>
                    <div class="flex items-center text-black">
                        <input class="form-radio" type="radio" name="study_status_check" id="studyStatusNo" value="no">
                        <label for="study-status-no" class="ml-2">না</label>
                    </div>
                </div>
            </div>

            <div class="mb-4" id="studyYearCount" style="display: none;">
                <label for="study-year-count" class="block text-black mb-2">আপনি কি এই বিদ্যালয়ে এক বছর বা তার বেশি পড়াশোনা করেছেন?</label>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center text-black">
                        <input class="form-radio" type="radio" name="study_year_count" id="studyYearCountYes" value="yes">
                        <label for="study-year-one" class="ml-2">হ্যাঁ</label>
                    </div>
                    <div class="flex items-center text-black">
                        <input class="form-radio" type="radio" name="study_year_count" id="studyYearCountNo" value="no">
                        <label for="study-year-more-one" class="ml-2">না</label>
                    </div>                    
                </div>
                <p class="text-red-500 text-sm text-left hidden" id="notEligible">দুঃখিত! আপনি এই পুনর্মিলনী নিবন্ধনের জন্য যোগ্য নন।</p>
            </div>

            <div class="mb-4" id="whichClassSection" style="display: none;">
                <label for="which_class" class="block text-black mb-2">আপনি কোন শ্রেণীতে পড়াশোনা করেন?</label>
                <select class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="whichClass" name="which_class">
                    <option value="" disabled selected>আপনার শ্রেণী নির্বাচন করুন</option>
                    <option value="6">ষষ্ঠ শ্রেণী</option>
                    <option value="7">সপ্তম শ্রেণী</option>
                    <option value="8">অষ্টম শ্রেণী</option>
                    <option value="9">নবম শ্রেণী</option>
                    <option value="10">দশম শ্রেণী</option>
                </select>
            </div>

            <div id="sscBatchLess21" class="mb-4 hidden">
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

            <div id="ssc-batch-less-25" class="mb-4 hidden">
                <label for="participation" class="block text-white mb-2">অংশগ্রহণের ধরন</label>
                <div class="">
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

            <div id="runningStudent" class="mb-4 hidden">
                <label for="participation" class="block text-black mb-2">অংশগ্রহণের ধরন</label>
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-3 sm:space-y-0">
                    <div class="flex items-center text-black">
                        <input class="form-radio text-blue-500 focus:ring-blue-400" type="radio" name="participation_type" id="single3" value="single">
                        <label for="single3" class="ml-2">একা (২৫০ টাকা)</label>
                    </div>
                    <div class="flex items-center text-black">
                        <input class="form-radio text-blue-500 focus:ring-blue-400" type="radio" name="participation_type" id="couple3" value="couple">
                        <label for="couple3" class="ml-2">স্বামী-স্ত্রী (৫৫০ টাকা)</label>
                    </div>
                </div>
            </div>


            <div id="childSection" class="mb-4" style="display: none;">
                <label class="block text-black mb-2">আপনি কি সন্তান নিয়ে আসতে চান?</label>
                <div class="flex items-center text-black space-x-4">
                    <div class="flex items-center">
                        <input class="form-radio" type="radio" name="take_come_children" id="takeComeChildrenYes" value="yes">
                        <label for="take_come_children_yes" class="ml-2">হ্যাঁ</label>
                    </div>
                    <div class="flex items-center">
                        <input class="form-radio" type="radio" name="take_come_children" id="takeComeChildrenNo" value="no">
                        <label for="take_come_children_no" class="ml-2">না</label>
                    </div>
                </div>

                <div id="childInfoSection" style="display: none;">
                    <div class="mb-4" id="childInputs">
                        <label for="child_name_1" class="block text-black mb-2">আপনার ৫ বছরের কম কয়টি সন্তান রয়েছে? (সংখ্যায় ইংরেজিতে) (প্রতিজন ০ টাকা)</label>
                        <input type="number" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="childAgeLessFive" name="child_age_less_five" placeholder="0 অথবা এর বেশি লিখুন">
                        <div class="mt-4">
                            <label for="child_age_1" class="block text-black mb-2">আপনার ৫ বছরের বেশি কয়টি সন্তান রয়েছে? (সংখ্যায় ইংরেজিতে) (প্রতিজন ৩০০ টাকা)</label>
                            <input type="number" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="childAgeMoreFive" name="child_age_more_five" placeholder="0 অথবা এর বেশি লিখুন">
                        </div>
                    </div>
                </div>
            </div>

            <div id="registrantSection" class="mb-4">
                <label class="block text-black mb-2">নিবন্ধনকারী?</label>
                <div class="flex items-center text-black space-x-4">
                    <div class="flex items-center">
                        <input class="form-radio" type="radio" name="registrant" id="registrantMyself" value="yes" required>
                        <label for="registrant_myself" class="ml-2">নিজ</label>
                    </div>
                    <div class="flex items-center">
                        <input class="form-radio" type="radio" name="registrant" id="registrantOthers" value="no" required>
                        <label for="registrant_others" class="ml-2">অন্যজন</label>
                    </div>
                </div>
                
                <div id="registrantInfoSection" class="hidden">
                    <label for="registrant_name" class="block text-black mb-2 mt-2">নিবন্ধনকারীর নাম</label>
                    <input type="text" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="registrantName" name="registrant_name" placeholder="আপনার নাম লিখুন">
                    <label for="registrant_mobile_number" class="block text-black mb-2 mt-2">নিবন্ধনকারীর মোবাইল নম্বর</label>
                    <input type="tel" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="registrantMobileNumber" name="registrant_mobile_number" placeholder="আপনার মোবাইল নম্বর লিখুন">
                </div>
            </div>

            <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
            
            <div class="flex justify-center items-center">
                <button id="nextButton" type="submit" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white text-lg px-12 py-4 rounded-full shadow-lg hover:from-blue-500 hover:to-purple-500 transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed">
                    পরবর্তী
                </button>
            </div>
    </form>
    
    </div>
  </div>
</body>

<script>
    const sscBatchLess21 = document.getElementById('sscBatchLess21');
    const sscBatchLess25 = document.getElementById('ssc-batch-less-25');
    const runningStudent = document.getElementById('runningStudent');
    const sscPassYesOption = document.getElementById('ssc-pass-yes');
    const sscPassNoOption = document.getElementById('ssc-pass-no');
    const sscBatchSection = document.getElementById('sscBatchSection');
    const sscBatch = document.getElementById('sscBatch');
    const sscBatchYearAlert = document.getElementById('sscBatchYearAlert');
    const studyStatusSection = document.getElementById('studyStatusSection');
    const studyStatusYesOption = document.getElementById('studyStatusYes');
    const studyStatusNoOption = document.getElementById('studyStatusNo');
    const studyYearCountSection = document.getElementById('studyYearCount');
    const studyYearCountYesOption = document.getElementById('studyYearCountYes');
    const studyYearCountNoOption = document.getElementById('studyYearCountNo');
    const notEligible = document.getElementById('notEligible');
    const whichClassSection = document.getElementById('whichClassSection');
    const whichClass = document.getElementById('whichClass');
    const coupleOption1 = document.getElementById('couple1');
    const coupleOption2 = document.getElementById('couple2');
    const coupleOption3 = document.getElementById('couple3');
    const singleOption1 = document.getElementById('single1');
    const singleOption2 = document.getElementById('single2');
    const singleOption3 = document.getElementById('single3');
    const childSection = document.getElementById('childSection');
    const childrenYes = document.getElementById('takeComeChildrenYes');
    const childrenNo = document.getElementById('takeComeChildrenNo');
    const childInfoSection = document.getElementById('childInfoSection');
    const childInputs = document.getElementById('childInputs');
    const childAgeLessFive = document.getElementById('childAgeLessFive');
    const childAgeMoreFive = document.getElementById('childAgeMoreFive');
    const registrantSection = document.getElementById('registrantSection');
    const registrantMyself = document.getElementById('registrantMyself');
    const registrantOthers = document.getElementById('registrantOthers');
    const registrantName = document.getElementById('registrantName');
    const registrantMobileNumber = document.getElementById('registrantMobileNumber');
    const registrantInfoSection = document.getElementById('registrantInfoSection');

    sscPassYesOption.addEventListener('change', () => {
        if (sscPassYesOption.checked) {
            sscBatch.required = true;
            studyStatusYes.required = false;
            whichClass.required = false;
            sscBatchSection.style.display = 'block';
            studyYearCountSection.style.display = 'none';
            runningStudent.style.display = 'none';
            whichClassSection.style.display = 'none';
            studyStatusSection.style.display = 'none';
            sscBatchLess21.style.display = 'none';
            sscBatchLess25.style.display = 'none';
            childSection.style.display = 'none';
            childInfoSection.style.display = 'none';
            nextButton.disabled = false;
        }
    });

    sscPassNoOption.addEventListener('change', () => {
        if (sscPassNoOption.checked) {
            sscBatch.required = false;
            studyStatusYes.required = true;
            sscBatchSection.style.display = 'none';
            studyStatusSection.style.display = 'block';
            sscBatchLess21.style.display = 'none';
            sscBatchLess25.style.display = 'none';
            childSection.style.display = 'none';
            childInfoSection.style.display = 'none';
            nextButton.disabled = false;
        }
    });

    studyStatusYesOption.addEventListener('change', () => {
        if (studyStatusYesOption.checked) {
            whichClass.required = true;
            single3.required = true;
            studyYearCountYesOption.required = false;
            sscBatchLess21.style.display = 'none';
            whichClassSection.style.display = 'block';
            runningStudent.style.display = 'block';
            childSection.style.display = 'none';
            childInfoSection.style.display = 'none';
            studyYearCountSection.style.display = 'none';
            nextButton.disabled = false;
        }
    });

    studyStatusNoOption.addEventListener('change', () => {
        if (studyStatusNoOption.checked) {
            whichClass.required = false;
            single3.required = false;
            studyYearCountYesOption.required = true;
            sscBatchLess21.style.display = 'none';
            whichClassSection.style.display = 'none';
            runningStudent.style.display = 'none';
            childSection.style.display = 'none';
            childInfoSection.style.display = 'none';
            studyYearCountSection.style.display = 'block';
            nextButton.disabled = false;
        }
    });

    studyYearCountYesOption.addEventListener('change', () => {
        if (studyYearCountYesOption.checked) {
            single3.required = true;
            couple3.required = true;
            whichClassSection.style.display = 'none';
            sscBatchLess21.style.display = 'block';
            notEligible.style.display = 'none';
            registrantSection.style.display = 'block';
            nextButton.disabled = false;
        }
    });

    studyYearCountNoOption.addEventListener('change', () => {
        if (studyYearCountNoOption.checked) {
            single3.required = false;
            couple3.required = false;
            whichClassSection.style.display = 'none';
            sscBatchLess21.style.display = 'none';
            childInfoSection.style.display = 'none';
            childSection.style.display = 'none';
            notEligible.style.display = 'block';
            registrantSection.style.display = 'none';
            nextButton.disabled = true;
        }
    });

    registrantSection.addEventListener('change', () => {
        if (registrantMyself.checked) {
            registrantInfoSection.style.display = 'none';
            registrantName.required = false;
            registrantMobileNumber.required = false;
        }
    });

    registrantSection.addEventListener('change', () => {
        if (registrantOthers.checked) {
            registrantName.required = true;
            registrantMobileNumber.required = true;
            registrantInfoSection.style.display = 'block';
        }
    });

    sscBatch.addEventListener('input', () => {
    const batchYear = parseInt(sscBatch.value, 10);

    if (isNaN(batchYear) || batchYear === '') {
        sscBatchYearAlert.style.display = 'none';
        single1.required = false;
        couple1.required = false;
        single2.required = false;
        couple2.required = false;
    } else if (batchYear < 2021) {
        single1.required = true;
        couple1.required = true;
        sscBatchLess21.style.display = 'block';
        sscBatchLess25.style.display = 'none';
        sscBatchYearAlert.style.display = 'none';
    } else if (batchYear >= 2021 && batchYear < 2025) {
        single2.required = true;
        couple2.required = true;
        sscBatchLess21.style.display = 'none';
        sscBatchLess25.style.display = 'block';
        sscBatchYearAlert.style.display = 'none';
    } else {
        sscBatchLess21.style.display = 'none';
        sscBatchLess25.style.display = 'none';
        sscBatchYearAlert.style.display = 'block';
    }
});

    singleOption1.addEventListener('change', () => {
        if (singleOption1.checked) {
            childrenYes.required = false;
            childAgeLessFive.required = false;
            childAgeMoreFive.required = false;
            childSection.style.display = 'none';
            childInfoSection.style.display = 'none';
            registrantSection.style.display = 'block';
        }
    });
    singleOption2.addEventListener('change', () => {
        if (singleOption2.checked) {
            childrenYes.required = false;
            childAgeLessFive.required = false;
            childAgeMoreFive.required = false;
            childSection.style.display = 'none';
            childInfoSection.style.display = 'none';
            registrantSection.style.display = 'block';
        }
    });
    singleOption3.addEventListener('change', () => {
        if (singleOption3.checked) {
            childrenYes.required = false;
            childAgeLessFive.required = false;
            childAgeMoreFive.required = false;
            childSection.style.display = 'none';
            childInfoSection.style.display = 'none';
            registrantSection.style.display = 'block';
        }
    });

    coupleOption1.addEventListener('change', () => {
        if (coupleOption1.checked) {
            childrenYes.required = true;
            childSection.style.display = 'block';
            registrantSection.style.display = 'block';
        }
    });
    coupleOption2.addEventListener('change', () => {
        if (coupleOption2.checked) {
            childrenYes.required = true;
            childSection.style.display = 'block';
            registrantSection.style.display = 'block';
        }
    });
    coupleOption3.addEventListener('change', () => {
        if (coupleOption3.checked) {
            childrenYes.required = true;
            childSection.style.display = 'block';
            registrantSection.style.display = 'block';
        }
    });

    childrenYes.addEventListener('change', () => {
        if (childrenYes.checked) {
            childAgeLessFive.required = true;
            childAgeMoreFive.required = true;
            childInfoSection.style.display = 'block';
        }
    });

    childrenNo.addEventListener('change', () => {
        if (childrenNo.checked) {
            childInfoSection.style.display = 'none';
        }
    });

     window.onload = function() {
        document.getElementById('registrationForm').reset();
    };

</script>

@endsection
