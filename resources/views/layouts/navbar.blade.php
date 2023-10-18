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
                    <a href="#" class="text-white no-underline">
                        <span>HOME</span>
                    </a>
                </li>
                <div x-data="{ open: false }" class="nav-item ">
                    <button @mouseover="open = ! open" type="button" class="nav-link text-white">Products</button>

                    <div x-show="open" @mouseover.away="open = false" class="w-full position-absolute left-0"
                         x-transition:enter.duration.500ms
                         x-transition:leave.duration.500ms>
                        <div class="w-full h-[300px] bg-white text-black shadow z-50">
                            <div class="d-flex h-full z-50">
                                <div class="">
                                    <div
                                        class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300"
                                        style="width: 15rem!important;">
                                        <a class="dropdown-item" href="#">Components</a>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                        </svg>
                                    </div>
                                    <div
                                        class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300"
                                        style="width: 15rem!important;">
                                        <a class="dropdown-item" href="#">Peripherals</a>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                        </svg>
                                    </div>
                                    <div
                                        class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300"
                                        style="width: 15rem!important;">
                                        <a class="dropdown-item" href="#">Accessories</a>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                        </svg>
                                    </div>
                                    <div
                                        class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300"
                                        style="width: 15rem!important;">
                                        <a class="dropdown-item" href="#">Best Sellers</a>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                        </svg>
                                    </div>
                                    <div
                                        class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300"
                                        style="width: 15rem!important;">
                                        <a class="dropdown-item" href="#">All Products</a>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                        </svg>
                                    </div>

                                    {{--                                            <a class="dropdown-item p-2" href="#">Peripherals</a>--}}
                                    {{--                                            <a class="dropdown-item p-2" href="#">Accessories</a>--}}
                                    {{--                                            <a class="dropdown-item p-2" href="#">Best Sellers</a>--}}
                                    {{--                                            <a class="dropdown-item p-2 hover:bg-gray-900" href="#">All Products</a>--}}
                                </div>
                                <div class="vr" style="opacity: .10 !important"></div>
                                <div class="p-2 flex-grow-1">Flex item</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-data="{ open: false }" class="nav-item ">
                    <button @mouseover="open = ! open" class="nav-link text-white">New Release</button>

                    <div x-show="open" @mouseover.away="open = false" class="w-full position-absolute left-0 z-50"
                         x-transition:enter.duration.500ms
                         x-transition:leave.duration.500ms>
                        <div class="w-full h-[200px] bg-dark">
                            <a class="dropdown-item" href="#">Action</a>
                        </div>
                    </div>
                </div>
                <div x-data="{ open: false }" class="nav-item">
                    <a @mouseover="open = ! open" class="nav-link text-white" role="button">Support</a>

                    <div x-show="open" @mouseover.away="open = false" class="position-absolute min-w-[200px] z-50"
                         x-transition:enter.duration.500ms
                         x-transition:leave.duration.500ms>
                        <div class="w-full h-full bg-dark p-3">
                            <a class="dropdown-item m-1.5" href="">Contact Us</a>
                            <a class="dropdown-item m-1.5" href="">Support Center</a>
                            <a class="dropdown-item m-1.5" href="">Shipping and Delivery</a>
                            <a class="dropdown-item m-1.5" href="">Warranty</a>
                            <a class="dropdown-item m-1.5" href="">Returns</a>
                        </div>
                    </div>
                </div>
                <div x-data="{ open: false }" class="nav-item ">
                    <a @mouseover="open = ! open" class="nav-link  text-white user-select-none " role="button">Explore</a>

                    <div x-show="open" @mouseover.away="open = false" class="position-absolute min-w-[200px] z-50"
                         x-transition:enter.duration.500ms
                         x-transition:leave.duration.500ms>
                        <div class="w-full h-full bg-dark p-3">
                            <a class="dropdown-item m-1.5" href="">About</a>
                            <a class="dropdown-item m-1.5" href="">Help</a>
                            <a class="dropdown-item m-1.5" href="">Privacy Policy</a>
                            <a class="dropdown-item m-1.5" href="">Terms and Conditions</a>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>


    {{--responsive offcanvas on the side menu--}}
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
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
