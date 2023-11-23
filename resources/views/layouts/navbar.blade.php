<nav class="navbar padding-remove bg-body-tertiary z-50 " role="navigation">
    <div class="container-fluid  bg-dark text-white content-center py-2 z-50">
        <button class="navbar-toggler outline-none outline-remove py-2 md:hidden" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" viewBox="0 0 30 16" color="white"
                fill="currentColor">
                <rect width="30" height="2"></rect>
                <rect y="7" width="20" height="2"></rect>
                <rect y="14" width="30" height="2"></rect>
            </svg>
        </button>
        <a class="navbar-brand text-white md:hidden" href="#">Offcanvas navbar</a>
        <div class="hidden md:block text-white">
            <ul class="nav">
                <li class="nav-link text-white">
                    <a href="{{ route('index_landing') }}" class="text-white no-underline">
                        <span>HOME</span>
                    </a>
                </li>
                <div x-data="{ open: false }" class="nav-item ">
                    <button @mouseover="open = ! open" type="button" class="nav-link text-white">Products</button>
                    <div x-cloak x-show="open" @mouseover.away="open = false" class="w-full position-absolute left-0"
                        x-transition:enter.duration.250ms x-transition:leave.duration.250ms>
                        <div class="w-full h-auto p-8 bg-white text-black shadow z-50">
                            {{-- <livewire:topbar.products.menu /> --}}
                            <div class="grid grid-cols-2 gap-8">
                                <ul class="grid grid-cols-4 gap-1 column-gap-1 !pl-0">
                                    <li
                                        class="content-center border border-gray-600 p-2 hover:!border-blue-600 hover:bg-blue-50">
                                        <a href="{{ route('collections-category', 'cpu') }}"
                                            class="no-underline text-black text-center">
                                            <img src="{{ asset('navbarshowcase/nav-cpu-2023.png') }}" width="100px"
                                                height="100px" alt="">
                                            CPU
                                        </a>
                                    </li>
                                    <li
                                        class="content-center border border-gray-600 p-2 hover:!border-blue-600 hover:bg-blue-50">
                                        <a href="{{ route('collections-category', 'memory') }}"
                                            class="no-underline text-black text-center">
                                            <img src="{{ asset('navbarshowcase/nav-memory-2023.png') }}" width="100px"
                                                height="100px" alt="">
                                            Memory
                                        </a>
                                    </li>
                                    <li
                                        class="content-center border border-gray-600 p-2 hover:!border-blue-600 hover:bg-blue-50">
                                        <a href="{{ route('collections-category', 'cpu_cooler') }}"
                                            class="no-underline text-black text-center">
                                            <img src="{{ asset('navbarshowcase/nav-cpucooler-2023.png') }}"
                                                width="100px" height="100px" alt="">
                                            CPU Cooler
                                        </a>
                                    </li>
                                    <li
                                        class="content-center border border-gray-600 p-2 hover:!border-blue-600 hover:bg-blue-50">
                                        <a href="{{ route('collections-category', 'computer_case') }}"
                                            class="no-underline text-black text-center">
                                            <img src="{{ asset('navbarshowcase/nav-case-2023.png') }}" width="100px"
                                                height="100px" alt="">
                                            Case
                                        </a>
                                    </li>
                                    <li
                                        class="content-center border border-gray-600 p-2 hover:!border-blue-600 hover:bg-blue-50">
                                        <a href="{{ route('collections-category', 'motherboard') }}"
                                            class="no-underline text-black text-center">
                                            <img src="{{ asset('navbarshowcase/nav-motherboard-2023.png') }}"
                                                width="100px" height="100px" alt="">
                                            Motherboards
                                        </a>
                                    </li>
                                    <li
                                        class="content-center border border-gray-600 p-2 hover:!border-blue-600 hover:bg-blue-50">
                                        <a href="{{ route('collections-category', 'psu') }}"
                                            class="no-underline text-black text-center">
                                            <img src="{{ asset('navbarshowcase/nav-powersupply-2023.png') }}"
                                                width="100px" height="100px" alt="">
                                            Power Supply
                                        </a>
                                    </li>
                                    <li
                                        class="content-center border border-gray-600 p-2 hover:!border-blue-600 hover:bg-blue-50">
                                        <a href="{{ route('collections-category', 'int_storage') }}"
                                            class="no-underline text-black text-center">
                                            <img src="{{ asset('navbarshowcase/nav-ssd-2023.png') }}" width="100px"
                                                height="100px" alt="">
                                            Storage
                                        </a>
                                    </li>
                                    <li
                                        class="content-center border border-gray-600 p-2 hover:!border-blue-600 hover:bg-blue-50">
                                        <a href="{{ route('collections-category', 'video_card') }}"
                                            class="no-underline text-black text-center">
                                            <img src="{{ asset('navbarshowcase/nav-videocard-2023.png') }}"
                                                width="100px" height="100px" alt="">
                                            Video Card
                                        </a>
                                    </li>
                                </ul>
                                <div>
                                    <div class="grid lg:grid-cols-2 lg:gap-6">
                                        <div>
                                            <ul class="list-unstyled ">
                                                <li>
                                                    <p class="text-gray-700 mb-0 text-sm tracking-wide">Peripherals</p>
                                                </li>
                                                <hr class="my-1 text-gray-600">
                                                <li>
                                                    <a href="{{ route('collections-category', 'keyboard') }}"
                                                        class="anchor-unstyled text-sm hover:text-blue-800">Keyboards</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('collections-category', 'headphone') }}"
                                                        class="anchor-unstyled text-sm hover:text-blue-800">Headphones</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('collections-category', 'mouse') }}"
                                                        class="anchor-unstyled text-sm hover:text-blue-800">Mice</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('collections-category', 'speaker') }}"
                                                        class="anchor-unstyled text-sm hover:text-blue-800">Speaker</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('collections-category', 'webcam') }}"
                                                        class="anchor-unstyled text-sm hover:text-blue-800 ">Webcam</a>
                                                </li>
                                            </ul>
                                            <ul class="list-unstyled mt-2">
                                                <li>
                                                    <p class="text-gray-700 mb-0 text-sm tracking-wide">Display</p>
                                                </li>
                                                <hr class="my-1 text-gray-600">
                                                <li>
                                                    <a href="{{ route('collections-category', 'monitor') }}"
                                                        class="anchor-unstyled text-sm hover:text-blue-800">Monitors</a>
                                                </li>

                                            </ul>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <p class="text-gray-700 mb-0 text-sm tracking-wide">Accessories /
                                                        Other</p>
                                                </li>
                                                <hr class="my-1 text-gray-600">
                                                <li>
                                                <li>
                                                    <a href="{{ route('collections-category', 'case_fan') }}"
                                                        class="anchor-unstyled text-sm hover:text-blue-800">Case
                                                        Fans</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('collections-category', 'ext_storage') }}"
                                                        class="anchor-unstyled text-sm hover:text-blue-800">External
                                                        Hard
                                                        Drives</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div x-data="{ open: false }" class="nav-item z-50">
                    <a @mouseover="open = ! open" class="nav-link text-white" role="button">Support</a>

                    <div x-cloak x-show="open" @mouseover.away="open = false"
                        class="position-absolute min-w-[200px] shadow z-[999]" x-transition:enter.duration.250ms
                        x-transition:leave.duration.250ms>
                        <div class="w-full h-full bg-white text-black p-3">
                            <a class="dropdown-item m-2" href="{{ route('contact-us') }}" wire:navigate>Contact
                                Us</a>
                            <a class="dropdown-item m-2" href="{{ route('support-center') }} " wire:navigate>Support
                                Center</a>
                            <a class="dropdown-item m-2" href="{{ route('warranty-information') }}"
                                wire:navigate>Warranty</a>
                            <a class="dropdown-item m-2" href="{{ route('track-order') }}" wire:navigate>Track
                                Order</a>
                            <a class="dropdown-item m-2" href="{{ route('shipping-return-policy') }}"
                                wire:navigate>Shipping
                                and
                                Return Policy</a>
                        </div>
                    </div>
                </div>
                <div x-data="{ open: false }" class="nav-item z-50">
                    <a @mouseover="open = ! open" class="nav-link  text-white user-select-none "
                        role="button">Explore</a>

                    <div x-cloak x-show="open" @mouseover.away="open = false"
                        class="position-absolute min-w-[200px] z-50 shadow" x-transition:enter.duration.250ms
                        x-transition:leave.duration.250ms>
                        <div class="w-full h-full bg-white text-black p-3">
                            <a class="dropdown-item m-2" href="{{ route('about-us') }}" wire:navigate>About Us</a>
                            <a class="dropdown-item m-2" href="{{ route('help') }}" wire:navigate>Help</a>
                            <a class="dropdown-item m-2" href="{{ route('privacy-policy') }}" wire:navigate>Privacy
                                Policy</a>
                            <a class="dropdown-item m-2" href="{{ route('terms-and-conditions') }}"
                                wire:navigate>Terms
                                and
                                Conditions</a>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>

    {{-- responsive offcanvas on the side menu --}}
    <div class="offcanvas offcanvas-start z-50" tabindex="-1" id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex mt-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Search PR-Tech" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
