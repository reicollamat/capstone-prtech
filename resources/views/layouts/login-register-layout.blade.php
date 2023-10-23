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
    {{--    @livewireStyles--}}

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('multishop/css/style.css') }}" rel="stylesheet">


</head>

<body>

<main>
    <div class="card mx-auto my-3" style="max-width: 600px">
        <div class="card-header">
            {{-- <div class="d-flex justify-content-center m-2"> --}}
                <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Register</button>
                    </li>
                </ul>
            {{-- </div> --}}
        </div>
    
        <div class="card-body">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    {{-- <div class="d-flex justify-content-center"> --}}
                        @include('pages.login')
                    {{-- </div> --}}
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    {{-- <div class="d-flex justify-content-center"> --}}
                        @include('pages.register')
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
    
</main>

{{-- Footer --}}
<footer>
    @include('layouts.footer')
</footer>

<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top mb-3"><i class="fa fa-angle-double-up"></i></a>

{{-- This directive is used to include the Livewire scripts --}}
{{--@livewireScripts--}}

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{ asset('multishop/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('multishop/lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Contact Javascript File -->
<script src="{{ asset('multishop/mail/jqBootstrapValidation.min.js') }}"></script>
<script src="{{ asset('multishop/mail/contact.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('multishop/js/main.js') }}"></script>

</body>

</html>
