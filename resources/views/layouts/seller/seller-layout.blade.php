<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PR Tech</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="PR-Tech, E-commerce" name="keywords">
    <meta content="PR-Tech is an E-commerce website that provides products for all your needs." name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{ asset('img/icon/retechicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('multishop/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('multishop/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- This directive is used to include the Livewire styles --}}
    @livewireStyles

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('multishop/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('multishop/css/seller.css') }}" rel="stylesheet">


</head>

<body>

    <main>
        {{-- <div class="sidebar-heading border-bottom bg-light py-2 d-flex">
            <div class="">
                <a class="navbar-brand" href="#">
                    <img src="/img/brand/svg/logo-no-background.svg" alt="Logo" width="150" height="150"
                        class="d-inline-block align-text-top">
                </a>
            </div>
            <div>
                @yield('title')
            </div>
        </div> --}}
        <div class="d-flex" id="wrapper">
            @include('layouts.seller.sidebar')
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    <footer>
        @include('layouts.footer')
    </footer>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top mb-3"><i class="fa fa-angle-double-up"></i></a>

    {{-- This directive is used to include the Livewire scripts --}}
    @livewireScripts

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('multishop/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('multishop/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('multishop/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('multishop/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('multishop/js/main.js') }}"></script>
    <script src="{{ asset('multishop/js/seller.js') }}"></script>
</body>

</html>