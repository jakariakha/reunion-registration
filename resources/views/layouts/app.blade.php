<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <!-- Load Turnstile Script -->
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <!-- Ajax jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Main Content -->
    <div class="container mx-auto mt-36">
        @yield('content')
    </div>

    <!-- Footer -->
    <!-- @include('layouts.footer') -->
</body>
</html>
