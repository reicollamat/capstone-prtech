<nav class="navbar padding-remove bg-body-tertiary z-50 " role="navigation">
    <div class="container-fluid  bg-dark text-white content-center py-2 z-50">
        <button class="navbar-toggler outline-none outline-remove py-2 md:hidden" type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                aria-label="Toggle navigation">
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
                    <a href="{{ route("index_landing") }}" class="text-white no-underline">
                        <span>HOME</span>
                    </a>
                </li>
                <div x-data="{ open: false }" class="nav-item ">
                    <button @mouseover="open = ! open" type="button" class="nav-link text-white">Products</button>
                    <div x-cloak x-show="open" @mouseover.away="open = false" class="w-full position-absolute left-0"
                         x-transition:enter.duration.250ms
                         x-transition:leave.duration.250ms>
                        <div class="w-full h-auto bg-white text-black shadow z-50">
                            <livewire:topbar.products.menu/>
                        </div>
                    </div>
                </div>
                {{--                <div x-data="{ open: false }" class="nav-item ">--}}
                {{--                    <button @mouseover="open = ! open" class="nav-link text-white">New Release</button>--}}

                {{--                    <div x-cloak x-show="open" @mouseover.away="open = false"--}}
                {{--                         class="w-full position-absolute left-0 z-50 shadow"--}}
                {{--                         x-transition:enter.duration.500ms--}}
                {{--                         x-transition:leave.duration.500ms>--}}
                {{--                        <div class="w-full h-[200px] bg-white text-black ">--}}
                {{--                            <a class="dropdown-item" href="#">Action</a>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div x-data="{ open: false }" class="nav-item z-50">
                    <a @mouseover="open = ! open" class="nav-link text-white" role="button">Support</a>

                    <div x-cloak x-show="open" @mouseover.away="open = false"
                         class="position-absolute min-w-[200px] shadow z-[999]"
                         x-transition:enter.duration.250ms
                         x-transition:leave.duration.250ms>
                        <div class="w-full h-full bg-white text-black p-3">
                            <a class="dropdown-item m-2" href="{{ route('contact-us') }}" wire:navigate>Contact Us</a>
                            <a class="dropdown-item m-2" href="{{ route('support-center') }} " wire:navigate>Support
                                Center</a>
                            <a class="dropdown-item m-2" href="{{ route('warranty-information') }}" wire:navigate>Warranty</a>
                            <a class="dropdown-item m-2" href="{{ route('track-order') }}" wire:navigate>Track Order</a>
                            <a class="dropdown-item m-2" href="{{ route('shipping-return-policy') }}" wire:navigate>Shipping
                                and
                                Return Policy</a>
                        </div>
                    </div>
                </div>
                <div x-data="{ open: false }" class="nav-item z-50">
                    <a @mouseover="open = ! open" class="nav-link  text-white user-select-none "
                       role="button">Explore</a>

                    <div x-cloak x-show="open" @mouseover.away="open = false"
                         class="position-absolute min-w-[200px] z-50 shadow"
                         x-transition:enter.duration.250ms
                         x-transition:leave.duration.250ms>
                        <div class="w-full h-full bg-white text-black p-3">
                            <a class="dropdown-item m-2" href="{{ route('about-us') }}" wire:navigate>About Us</a>
                            <a class="dropdown-item m-2" href="{{ route('help') }}" wire:navigate>Help</a>
                            <a class="dropdown-item m-2" href="{{ route('privacy-policy') }}" wire:navigate>Privacy
                                Policy</a>
                            <a class="dropdown-item m-2" href="{{ route('terms-and-conditions') }}" wire:navigate>Terms
                                and
                                Conditions</a>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>


    {{--responsive offcanvas on the side menu--}}
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
                <input class="form-control me-2" type="search" placeholder="Search PR-Tech"
                       aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
