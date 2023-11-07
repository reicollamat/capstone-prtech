<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> {{ $title ?? 'PR - TECH' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="PR-Tech, E-commerce" name="keywords">
    <meta content="PR-Tech is an E-commerce website that provides products for all your needs." name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{ asset('img/icon/retechicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('multishop/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <main>
        @yield('content', $slot ?? '')
    </main>

    {{-- Footer --}}
    <footer>
        @include('layouts.footer')
    </footer>

    {{-- This directive is used to include the Livewire scripts --}}
    {{-- @livewireScripts --}}

</body>

</html>
