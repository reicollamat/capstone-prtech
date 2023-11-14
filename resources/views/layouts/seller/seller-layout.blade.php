<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> {{ $title ?? 'PR - TECH Seller Hub' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="PR-Tech, E-commerce" name="keywords">
    <meta content="PR-Tech is an E-commerce website that provides products for all your needs." name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        [x-cloak] {
            visibility: hidden !important;
            overflow: hidden !important;
            display: none !important;
        }
    </style>

    <!-- Favicon -->
    <link href="{{ asset('img/icon/retechicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- This directive is used to include the Livewire styles --}}
    @livewireStyles

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('multishop/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <main class="relative w-full h-screen" id="main">
        <nav class="navbar sticky-top bg-white border-bottom md:!px-6" id="navigationbar">
            <div class="container-fluid lg:!justify-between">
                <div class="flex items-center">
                    <a class="navbar-brand" href="{{ route('seller-landing') }}">
                        <div class="w-[100px] sm:w-[120px] h-auto">
                            <img src="/img/brand/svg/logo-no-background.svg" alt="Logo" width="100%"
                                height="100%" class="d-inline-block align-text-top" />
                        </div>
                    </a>
                    <h class="tracking-tight text-center text-lg md:text-lg">
                        {{ $page_header ?? 'Seller Dashboard' }}
                    </h>
                </div>
                @if (Auth::user())
                    <div x-data="{ isOpen: false }" class="relative inline-block ">
                        <!-- Dropdown toggle button -->
                        <button @click="isOpen = !isOpen"
                            class="relative z-10 flex items-center p-2 text-sm text-gray-600 gap-1">

                            <span class="mx-1">{{ Auth::user()->name ?? 'John Doe' }}</span>
                            <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                    fill="currentColor"></path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div x-cloak x-show="isOpen" @click.away="isOpen = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                            class="absolute right-0 z-20 w-56 py-3 overflow-hidden origin-top-right bg-transparent rounded-md shadow-xl dark:bg-gray-800 front">
                            <div class="dropdown-arrow bg-white  rounded shadow border-1 border-gray-300">
                                <div
                                    class="flex items-center p-2.5 text-sm text-gray-600 transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <img class="flex-shrink-0 object-cover mx-1 rounded-full w-9 h-9"
                                        src="https://images.unsplash.com/photo-1523779917675-b6ed3a42a561?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8d29tYW4lMjBibHVlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=face&w=500&q=200"
                                        alt="jane avatar">
                                    <div class="flex items-center flex-column text-start justify-start mx-1">
                                        <h1 class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                                            {{ Auth::user()->name ?? 'John Doe' }}</h1>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 text-start mb-0">
                                            {{ Auth::user()->email ?? 'john.doe@gmail.com' }}</p>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="block w-full text-start font-semibold px-3 py-2.5 text-sm text-gray-800 capitalize no-underline transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <div class="flex gap-2 items-center">

                                        <i class="bi bi-question-lg text-gray-800 text-lg"></i>
                                        <span>Help</span>
                                    </div>
                                </button>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-start font-semibold px-3 py-2.5 text-sm text-gray-800 capitalize no-underline transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <div class="flex gap-2 items-center">
                                            <i class="bi bi-box-arrow-left text-gray-800 text-lg"></i>
                                            <span>Sign Out</span>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </nav>

        <div class="flex w-full h-full" id="wrapper">
            <div class="h-full flex-1 min-w-[220px] max-w-[220px] !bg-white border-end overflow-y-scroll"
                id="sidebar">
                @include('layouts.seller.seller-sidebar')
            </div>
            <div class=" w-full overflow-y-scroll bg-[#F2F2F2]">
                @yield('content', $slot ?? '')
            </div>
        </div>
    </main>

    {{--    This directive is used to include the Livewire scripts --}}
    @livewireScripts
    <script>
        function setChildContainerHeight() {
            // get the height if main wrapper
            let parentHeight = document.getElementById('main').clientHeight;
            // get the height of navigation bar
            let otherElementHeight = document.getElementById('navigationbar').clientHeight;
            // get the child container where we need to set the height
            let childContainer = document.getElementById('wrapper');
            // apply the height to the element
            childContainer.style.height = (parentHeight - otherElementHeight) + 'px';

            // console.log(parentHeight, otherElementHeight, childContainer);
        }

        // event listener to adjust the height of the child container
        window.addEventListener('load', setChildContainerHeight);
        window.addEventListener('resize', setChildContainerHeight);
    </script>

</body>

</html>

{{-- <!DOCTYPE html> --}}
{{-- <html lang="en"> --}}

{{-- <head> --}}
{{--    <meta charset="utf-8"> --}}
{{--    <title>PR Tech</title> --}}
{{--    <meta content="width=device-width, initial-scale=1.0" name="viewport"> --}}
{{--    <meta content="PR-Tech, E-commerce" name="keywords"> --}}
{{--    <meta content="PR-Tech is an E-commerce website that provides products for all your needs." name="description"> --}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

{{--    <!-- Favicon --> --}}
{{--    <link href="{{ asset('img/icon/retechicon.ico') }}" rel="icon"> --}}

{{--    <!-- Google Web Fonts --> --}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com"> --}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> --}}

{{--    <!-- Font Awesome --> --}}
{{--    --}}{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> --}}

{{--    <!-- Libraries Stylesheet --> --}}
{{--    <link href="{{ asset('multishop/lib/animate/animate.min.css') }}" rel="stylesheet"> --}}
{{--    <link href="{{ asset('multishop/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet"> --}}

{{--    <!-- Scripts --> --}}
{{--    @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

{{--    --}}{{-- This directive is used to include the Livewire styles --}}
{{--    @livewireStyles --}}

{{--    <!-- Customized Bootstrap Stylesheet --> --}}
{{--    <link href="{{ asset('multishop/css/style.css') }}" rel="stylesheet"> --}}
{{--    <link href="{{ asset('multishop/css/seller.css') }}" rel="stylesheet"> --}}

{{-- </head> --}}

{{-- <body> --}}

{{-- <main> --}}
{{--    --}}{{-- <div class="sidebar-heading border-bottom bg-light py-2 d-flex"> --}}
{{--        <div class=""> --}}
{{--            <a class="navbar-brand" href="#"> --}}
{{--                <img src="/img/brand/svg/logo-no-background.svg" alt="Logo" width="150" height="150" --}}
{{--                    class="d-inline-block align-text-top"> --}}
{{--            </a> --}}
{{--        </div> --}}
{{--        <div> --}}
{{--            @yield('title') --}}
{{--        </div> --}}
{{--    </div> --}}
{{--    <div class="d-flex" id="wrapper"> --}}
{{--        @include('layouts.seller.sidebar') --}}
{{--        @yield('content') --}}
{{--    </div> --}}
{{-- </main> --}}

{{-- Footer --}}
{{-- <footer> --}}
{{--    @include('layouts.footer') --}}
{{-- </footer> --}}

{{-- <!-- Back to Top --> --}}
{{-- <a href="#" class="btn btn-primary back-to-top mb-3"><i class="bi bi-caret-up-square"></i></a> --}}

{{-- This directive is used to include the Livewire scripts --}}
{{-- @livewireScripts --}}

{{-- <!-- JavaScript Libraries --> --}}
{{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
{{-- <script src="{{ asset('multishop/lib/easing/easing.min.js') }}"></script> --}}
{{-- <script src="{{ asset('multishop/lib/owlcarousel/owl.carousel.min.js') }}"></script> --}}

{{-- <!-- Contact Javascript File --> --}}
{{-- <script src="{{ asset('multishop/mail/jqBootstrapValidation.min.js') }}"></script> --}}
{{-- <script src="{{ asset('multishop/mail/contact.js') }}"></script> --}}

{{-- <!-- Template Javascript --> --}}
{{-- <script src="{{ asset('multishop/js/main.js') }}"></script> --}}
{{-- <script src="{{ asset('multishop/js/seller.js') }}"></script> --}}
{{-- </body> --}}

{{-- </html> --}}
