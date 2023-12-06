<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

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
            <div class="container-fluid !justify-start gap-3 md:!justify-between">
                {{--                 responsive navbar  --}}
                <div class="block lg:hidden">
                    <button class="content-center" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <span class="sr-only">Open main menu</span>
                        <i class="bi bi-list text-3xl"></i>
                    </button>
                </div>

                <div class="offcanvas offcanvas-start !w-[300px]" tabindex="-1" id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel"> {{ $page_header ?? 'Seller Dashboard' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <hr class="m-0">
                    <div class="relative flex flex-col justify-between offcanvas-body">
                        <div role="navigation">
                            <ul>
                                <li class="py-2.5">
                                    <div class="flex justify-between items-center">
                                        <a wire:navigate href="{{ route('seller-landing') }}"
                                            class="w-full no-underline flex justify-between items-center text-base font-medium {{ Route::is('seller-landing') ? '!text-blue-600' : 'text-gray-600' }} mb-1.5  transition">
                                            <div class="flex items-center gap-2">
                                                <i
                                                    class="bi bi-house-fill text-xl {{ Route::is('seller-landing') ? '!text-blue-600' : 'text-gray-600' }}"></i>
                                                <p class="mb-0">Dashboard</p>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            </ul>

                            <div>
                                <div class="flex items-center gap-1.5 mb-1.5">
                                    <p class="mb-0 text-xs  text-gray-500 font-semibold">Product Management</p>
                                </div>

                                <ul>
                                    <li class="p-1.5 text-sm rounded-sm">
                                        <a href="{{ route('product-list') }}"
                                            class="no-underline decoration-0 {{ Route::is('product-list') ? '!text-blue-800 font-semibold' : 'text-gray-800' }} "
                                            wire:navigate>
                                            <div class="flex items-center gap-1.5">
                                                <i class="bi bi-box2-heart text-lg"></i>
                                                <span>My Products</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="p-1.5 text-sm">
                                        <a href="{{ route('product-new') }}"
                                            class="no-underline decoration-0 {{ Route::is('product-new') ? '!text-blue-800 font-semibold transition duration-500' : 'text-gray-800' }}"
                                            wire:navigate>
                                            <div class="flex items-center gap-1.5">
                                                <i class="bi bi-plus-square text-lg"></i>
                                                <span>Add New Product</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <div class="flex items-center gap-1.5 mb-1.5">
                                    <p class="mb-0 text-xs  text-gray-500 font-semibold">Shipment Management</p>
                                </div>
                                <ul>
                                    <li class="p-1.5 text-sm rounded-sm">
                                        <a href="{{ route('shipment-list') }}"
                                            class="no-underline transition decoration-0 text-gray-800" wire:navigate>
                                            <div class="flex items-center gap-1.5">
                                                <i class="bi bi-truck text-lg"></i>
                                                <span>My Shipments</span>
                                            </div>

                                        </a>
                                    </li>
                                    <li class="p-1.5 text-sm" text-sm>
                                        <a href="{{ route('shipment-options') }}"
                                            class="no-underline transition decoration-0 text-gray-800" wire:navigate>
                                            <div class="flex items-center gap-1.5">
                                                <i class="bi bi-gear text-lg"></i>
                                                <span>Shipment Options</span>
                                            </div>

                                        </a>
                                    </li>
                                    {{-- <li class="p-1.5 text-sm" text-sm> --}}
                                    {{--     <a href="{{ route('shipment-history') }}" --}}
                                    {{--         class="no-underline transition decoration-0 text-gray-800" wire:navigate> --}}
                                    {{--         <div class="flex items-center gap-1.5"> --}}
                                    {{--             <i class="bi bi-plus-square  text-lg"></i> --}}
                                    {{--             <span>Shipment History</span> --}}
                                    {{--         </div> --}}

                                    {{--     </a> --}}
                                    {{-- </li> --}}
                                </ul>
                            </div>
                            <div>
                                <div class="flex items-center gap-1.5 mb-1.5">
                                    <p class="mb-0 text-xs  text-gray-500 font-semibold">Order Management</p>
                                </div>
                                <ul>
                                    <li class="p-1.5 text-sm">
                                        <a href="{{ route('order-list') }}"
                                            class="no-underline decoration-0 text-gray-800" wire:navigate>
                                            <div class="flex items-center gap-1.5">
                                                <i class="bi bi-truck text-lg"></i>
                                                <span>My Orders</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="p-1.5 text-sm">
                                        <a href="{{ route('order-cancellations') }}"
                                            class="no-underline decoration-0 text-gray-800" wire:navigate>
                                            <div class="flex items-center gap-1.5">
                                                <i class="bi bi-truck text-lg"></i>
                                                <span>Cancellations</span>
                                            </div>

                                        </a>
                                    </li>
                                    <li class="p-1.5 text-sm">
                                        <a href="{{ route('order-returns') }}"
                                            class="no-underline decoration-0 text-gray-800" wire:navigate>
                                            <div class="flex items-center gap-1.5">
                                                <i class="bi bi-truck text-lg"></i>
                                                <span> Refunds / Returns</span>
                                            </div>

                                        </a>
                                    </li>
                                    {{-- <li class="p-1.5 text-sm"> --}}
                                    {{--     <a href="{{ route('order-history') }}" --}}
                                    {{--         class="no-underline decoration-0 text-gray-800" wire:navigate> --}}
                                    {{--         <div class="flex items-center gap-1.5"> --}}
                                    {{--             <i class="bi bi-truck text-lg"></i> --}}
                                    {{--             <span>Order History</span> --}}
                                    {{--         </div> --}}

                                    {{--     </a> --}}
                                    {{-- </li> --}}
                                </ul>

                            </div>
                            <div>
                                <div class="flex items-center gap-1.5 mb-1.5">
                                    <p class="mb-0 text-xs text-gray-500 font-semibold">Shop Management</p>
                                </div>
                                <ul>
                                    <li class="p-1.5 text-sm">
                                        <a href="{{ route('shop-management') }}"
                                            class="no-underline decoration-0 text-gray-800" wire:navigate>
                                            <div class="flex items-center gap-1.5">
                                                <i class="bi bi-truck text-lg"></i>
                                                <span> Shop Information</span>
                                            </div>

                                        </a>
                                    </li>
                                    {{-- <li class="p-1.5 text-sm"> --}}
                                    {{--     <a href="{{ route('shop-management-category') }}" --}}
                                    {{--         class="no-underline decoration-0 text-gray-800" wire:navigate> --}}
                                    {{--         <div class="flex items-center gap-1.5"> --}}
                                    {{--             <i class="bi bi-truck text-lg"></i> --}}
                                    {{--             <span>Shop Categories</span> --}}
                                    {{--         </div> --}}
                                    {{--     </a> --}}
                                    {{-- </li> --}}
                                    <li class="p-1.5 text-sm">
                                        <a href="{{ route('shop-management-category') }}"
                                           class="no-underline decoration-0 text-gray-800" wire:navigate>
                                            <div class="flex items-center gap-1.5">
                                                <i class="bi bi-truck text-lg"></i>
                                                <span>Shop Metrics Settings</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="w-full">
                            <div
                                class="flex items-center p-2.5 text-sm text-gray-600 transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                <img class="flex-shrink-0 object-cover mx-1 rounded-full w-9 h-9"
                                    src="https://images.unsplash.com/photo-1523779917675-b6ed3a42a561?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8d29tYW4lMjBibHVlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=face&w=500&q=200"
                                    alt="jane avatar">
                                <div class="flex  flex-column text-start justify-start mx-1">
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
                <div class="flex items-center">
                    <a class="navbar-brand" href="{{ route('seller-landing') }}">
                        <div class="w-[100px] sm:w-[120px] h-auto">
                            <img src="/img/brand/svg/logo-no-background.svg" alt="Logo" width="100%"
                                height="100%" class="d-inline-block align-text-top" />
                        </div>
                    </a>
                    <h class="hidden d-sm-block tracking-tight text-center text-base md:text-lg">
                        {{ $page_header ?? 'Seller Dashboard' }}
                    </h>
                </div>
                <div class="hidden md:block">
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
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90"
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

            </div>
        </nav>

        <div class="flex w-full h-full" id="wrapper">
            <div class="h-full flex-1 lg:min-w-[220px] lg:max-w-[220px] !bg-white border-end overflow-y-auto"
                id="sidebar">
                @include('layouts.seller.seller-sidebar')
            </div>
            <div class="w-full h-full overflow-y-auto bg-background">
                @yield('content', $slot ?? '')
            </div>
        </div>
    </main>

    @livewire('wire-elements-modal')

    {{--    This directive is used to include the Livewire scripts --}}
    @livewireScriptConfig
    {{--    @livewireScripts --}}

    {{--  Livewire Alert  --}}
    <x-livewire-alert::scripts />

    <script>
        // this will remove the navbar height from the page height to remove scrolling
        function setChildContainerHeight() {
            // get the height if main wrapper
            let parentHeight = document.getElementById("main").clientHeight;
            // get the height of navigation bar
            let otherElementHeight =
                document.getElementById("navigationbar").clientHeight + 1;
            // get the child container where we need to set the height
            let childContainer = document.getElementById("wrapper");
            // apply the height to the element
            childContainer.style.height = parentHeight - otherElementHeight + "px";

            console.log(parentHeight, otherElementHeight, childContainer.style.height);
        }

        // event listener to adjust the height of the child container
        window.addEventListener("load", setChildContainerHeight);
        window.addEventListener("resize", setChildContainerHeight);
        window.addEventListener("livewire:navigated", setChildContainerHeight);
    </script>

</body>

</html>
