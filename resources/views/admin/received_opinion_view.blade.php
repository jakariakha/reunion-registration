@extends('layouts.app')

@section('title', 'Received Opinion View')

@section('content')

<div class="w-full sm:w-3/4 lg:w-1/2 mx-auto bg-white p-4 sm:p-6 lg:p-8 rounded-lg shadow-md">
  <p class="text-base sm:text-lg text-gray-800 font-semibold leading-relaxed">{{ $userOpinion }}</p>
</div>


@endsection