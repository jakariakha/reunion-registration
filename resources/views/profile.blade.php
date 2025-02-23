@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<body class="bg-white py-20">
  <div class="max-w-md mx-auto px-6 text-center">
  <h2 class="text-4xl font-bold text-black mb-8">পুনর্মিলনী নিবন্ধন</h2> 
    <!-- Registration Form Container -->
    <div class="bg-slate-50 rounded-xl shadow-lg p-8 mb-16 border border-gray-500">
        <div id="registrationForm" class="text-left">

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
                <label for="registrant_id" class="block text-black mb-2">নিবন্ধনকারীর আইডি</label>
                <input type="text" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="registrantId" name="registrant_id" value="{{ $userData->registrant_ID }}" disabled>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-black mb-2">নাম</label>
                <input type="text" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="name" name="name" value="{{ $userData->name }}" disabled>
            </div>
            <div class="mb-4">
                <label for="fathername" class="block text-black mb-2">পিতার নাম</label>
                <input type="text" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="fathername" name="father_name" value="{{ $userData->father_name }}" disabled>
            </div>
            <div class="mb-4">
                <label for="mothername" class="block text-black mb-2">মাতার নাম</label>
                <input type="text" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="mothername" name="mother_name" value="{{ $userData->mother_name }}" disabled>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-black mb-2">ঠিকানা</label>
                <input type="text" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="address" name="address" value="{{ $userData->address }}" disabled>
            </div>

            <div class="mb-4">
                <label for="job" class="block text-black mb-2">বর্তমান পেশা</label>
                <input type="text" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="job" name="current_job" value="{{ $userData->current_job }}" disabled>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-black mb-2">১১-সংখ্যার মোবাইল নম্বর (ইংরেজিতে)</label>
                <input type="tel" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="mobileNumber" name="mobile_number" value="{{ $userData->mobile_number }}" disabled>
            </div>

            <div class="mb-4">
                <label for="t-shirt-size" class="block text-black mb-2">আপনার টি-শার্ট সাইজ নির্বাচন করুন</label>
                <select class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="t-shirt-size" name="t_shirt_size" disabled>
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

            <div class="mb-4">
                <label for="ssc-result-check" class="block text-black mb-2">আপনি কি এসএসসি পাশ করেছেন?</label>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center text-black">
                        <input class="form-radio" type="radio" name="ssc_result_status" id="ssc-pass-yes" value="yes" {{ $userData->ssc_result_status == 'yes' ? 'checked' : ''}} disabled>
                        <label for="ssc_pass_yes" class="ml-2">হ্যাঁ</label>
                    </div>
                    <div class="flex items-center text-black">
                        <input class="form-radio" type="radio" name="ssc_result_status" id="ssc-pass-no" value="no" {{ $userData->ssc_result_status == 'no' ? 'checked' : ''}} disabled>
                        <label for="ssc_pass_no" class="ml-2">না</label>
                    </div>
                </div>
            </div>

            <div class="mb-4 {{ isset($userData->ssc_batch) ? '' : 'hidden' }}" id="sscBatchSection">
                <label for="ssc_batch" class="block text-black mb-2">আপনার এসএসসি পাশের সাল কত?</label>
                <input type="number" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" 
                    id="sscBatch" 
                    name="ssc_batch" 
                    value="{{ isset($userData->ssc_batch) ? $userData->ssc_batch : '' }}" 
                    disabled>
            </div>


            <div class="mb-4" id="studyStatusSection">
                <label for="study-status-check" class="block text-black mb-2">আপনি কি বর্তমানে পড়াশোনা করেন?</label>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center text-black">
                        <input class="form-radio" type="radio" name="study_status_check" id="studyStatusYes" value="yes" 
                            {{ $userData->study_status_check == 'yes' ? 'checked' : '' }} disabled>
                        <label for="studyStatusYes" class="ml-2">হ্যাঁ</label>
                    </div>
                    <div class="flex items-center text-black">
                        <input class="form-radio" type="radio" name="study_status_check" id="studyStatusNo" value="no" 
                            {{ $userData->study_status_check == 'no' ? 'checked' : '' }} disabled>
                        <label for="studyStatusNo" class="ml-2">না</label>
                    </div>
                </div>
            </div>

            <div class="mb-4 {{ isset($userData->study_year_count) ? '' : 'hidden' }}" id="studyYearCount">
                <label for="study-year-count" class="block text-black mb-2">আপনি কি এই বিদ্যালয়ে এক বছর বা তার বেশি পড়াশোনা করেছেন?</label>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center text-black">
                        <input class="form-radio" type="radio" name="study_year_count" id="studyYearCountYes" value="yes" {{ $userData->study_year_count == 'yes' ? 'checked' : '' }} disabled>
                        <label for="study-year-one" class="ml-2">হ্যাঁ</label>
                    </div>
                    <div class="flex items-center text-black">
                        <input class="form-radio" type="radio" name="study_year_count" id="studyYearCountNo" value="no" {{ $userData->study_year_count == 'no' ? 'checked' : '' }} disabled>
                        <label for="study-year-more-one" class="ml-2">না</label>
                    </div>                    
                </div>
            </div>

            <div class="mb-4 {{ isset($userData->which_class) ? '' : 'hidden' }}" id="whichClassSection">
                <label for="which_class" class="block text-black mb-2">আপনি কোন শ্রেণীতে পড়াশোনা করেন?</label>
                <select class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-black focus:outline-none focus:ring-2 focus:ring-blue-400" id="whichClass" name="which_class" disabled>
                    <option value="{{ isset($userData->which_class) ? $userData->which_class : '' }}">{{ isset($userData->which_class) ? $userData->which_class : '' }}</option>
                </select>
            </div>

            <div id="ssc-batch-less-22" class="mb-4 hidden">
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

            <div id="runningStudent" class="mb-4">
                <label for="participation" class="block text-black mb-2">অংশগ্রহণের ধরন</label>
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-3 sm:space-y-0">
                    <div class="flex items-center text-black">
                        <input class="form-radio text-blue-500 focus:ring-blue-400" type="radio" name="participation_type" id="single3" value="single" {{ $userData->participation_type == 'single' ? 'checked' : '' }} disabled>
                        <label for="single3" class="ml-2">একা</label>
                    </div>
                    <div class="flex items-center text-black">
                        <input class="form-radio text-blue-500 focus:ring-blue-400" type="radio" name="participation_type" id="couple3" value="couple" {{ $userData->participation_type == 'couple' ? 'checked' : '' }} disabled>
                        <label for="couple3" class="ml-2">স্বামী-স্ত্রী</label>
                    </div>
                </div>
            </div>

            <div id="childSection" class="mb-4 {{ isset($userData->take_come_children) ? '' : 'hidden' }}">
                <label class="block text-black mb-2">আপনি কি সন্তান নিয়ে আসতে চান?</label>
                <div class="flex items-center text-black space-x-4">
                    <div class="flex items-center">
                        <input class="form-radio" type="radio" name="take_come_children" id="takeComeChildrenYes" value="yes" {{ $userData->take_come_children == 'yes' ? 'checked' : '' }} >
                        <label for="take_come_children_yes" class="ml-2">হ্যাঁ</label>
                    </div>
                    <div class="flex items-center">
                        <input class="form-radio" type="radio" name="take_come_children" id="takeComeChildrenNo" value="no" {{ $userData->take_come_children == 'no' ? 'checked' : '' }}>
                        <label for="take_come_children_no" class="ml-2">না</label>
                    </div>
                </div>

                <div id="childInfoSection">
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

            <div id="registrantSection" class="mb-4">
                <label class="block text-black mb-2">নিবন্ধনকারী?</label>
                <div class="flex items-center text-black space-x-4">
                    <div class="flex items-center">
                        <input class="form-radio" type="radio" name="registrant" id="registrantMyself" value="yes" {{ $userData->registrant == 'yes' ? 'checked' : '' }} disabled>
                        <label for="registrant_myself" class="ml-2">নিজ</label>
                    </div>
                    <div class="flex items-center">
                        <input class="form-radio" type="radio" name="registrant" id="registrantOthers" value="no" {{ $userData->registrant == 'no' ? 'checked' : '' }} disabled>
                        <label for="registrant_others" class="ml-2">অন্যজন</label>
                    </div>
                </div>
                
                <div class="mb-4 {{ isset($userData->registrant_name) ? '' : 'hidden' }}" id="registrantInfoSection">
                    <label for="registrant_name" class="block text-black mb-2 mt-2">নিবন্ধনকারীর নাম</label>
                    <input type="text" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-white focus:outline-none focus:ring-2 focus:ring-blue-400" id="registrantName" name="registrant_name" value="{{ isset($userData->registrant_name) ? $userData->registrant_name : '' }}">
                    <label for="registrant_mobile_number" class="block text-black mb-2 mt-2">নিবন্ধনকারীর মোবাইল নম্বর</label>
                    <input type="tel" class="w-full border-black border-2 px-4 py-3 rounded-lg bg-white/20 text-white focus:outline-none focus:ring-2 focus:ring-blue-400" id="registrantMobileNumber" name="registrant_mobile_number" value="{{ isset($userData->registrant_mobile_number) ? $userData->registrant_mobile_number : '' }}">
                </div>
            </div>
    </div>
    
    </div>
  </div>
</body>

@endsection
