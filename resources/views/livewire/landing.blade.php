<div>
    <div class="sticky-top">
        <nav class="navbar padding-remove bg-body-tertiary bg-dark sticky-top py-2">
            <div class="w-full container-fluid mx-4 justify-between align-items-center my-1">
                <div class=" ">
                    <a class="navbar-brand" href="#">
                        <img src="/img/brand/svg/logo-no-background.svg" alt="Logo" width="150" height="150"
                             class="d-inline-block align-text-top">
                    </a>
                </div>
                <div class="w-1/2 position-relative" x-data="{ open: false }" @mouseover="open = true" @mouseleave="open = false">
                    <div class="input-group rounded-none" >
                        <select wire:model.live="selected_category" class="form-control form-select max-w-[200px]" aria-label="Default select example" >
                            <option value="all_products" selected default>All Categories</option>
                            @foreach ($categories as $key => $value)
                                <p>Key: {{ $key }}, Value: {{ $value }}</p>/
                                <option value={{ $key }} wire:key={{ $key }}>{{ $value }}</option>
                            @endforeach


                        </select>
                        <input type="text" class="form-control p-2 rounded-none" placeholder="Search PR-Tech"
                               aria-label="Recipient's username" aria-describedby="button-addon2" >
                        <button class="btn btn-outline-secondary rounded-none d-flex items-center gap-2" type="button"
                                id="button-addon2">
                            <svg xmlns="http://www.w3.org/2000/svg" width=20 height="20" fill="currentColor"
                                 class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                            Search
                        </button>
                    </div>
                    <div x-show="open" class="position-absolute h-80 w-[700px] bg-white shadow start-50 translate-middle-x "
                         x-transition:enter.duration.750ms
                         x-transition:leave.duration.300ms>
                        <ul>
                            <p>this where the products are listed by categories selected best product or most positive</p>
                        </ul>
                    </div>
                </div>



                <div class="flex gap-2">
                    {{--profile account button--}}
                    <button class="btn  outline-remove position-relative" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptions_account" aria-controls="offcanvasWithBothOptions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                             class="bi bi-person  position-relative"
                             viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>

                        </svg>
                        <span class="visually-hidden">unread messages</span>
                    </button>

                    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1"
                         id="offcanvasWithBothOptions_account"
                         aria-labelledby="offcanvasWithBothOptionsLabel">
                        <div>
                            <div class="offcanvas-header">
                                <h4 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Login</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>

                            </div>
                            <hr>
                            <div class="offcanvas-body">
                                <p class="text-center font-bold">Please enter your e-mail and password</p>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <!-- Email Address -->
                                    <div>
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-input-label for="password" :value="__('Password')" />

                                        <x-text-input id="password" class="block mt-1 w-full"
                                                      type="password"
                                                      name="password"
                                                      required autocomplete="current-password" />

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div class="flex flex-col items-center justify-start mt-4 gap-3">
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif

                                        <x-primary-button class="ml-3 w-full text-center p-3">
                                            {{ __('Log in') }}
                                        </x-primary-button>
{{--                                            <button href="#_" class="relative inline-flex items-center justify-start px-6 py-3 overflow-hidden font-medium transition-all bg-white rounded hover:bg-white group ">--}}
{{--                                                <span class="w-48 h-48 rounded rotate-[-40deg] bg-primary absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>--}}
{{--                                                <span class="relative w-full text-left text-black transition-colors duration-300 ease-in-out group-hover:text-white">Log in</span>--}}
{{--                                            </button>--}}
                                    </div>

                                    <div class="flex items-center justify-end mt-2">
                                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                                            {{ __('Don\'t have an account?') }}
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    {{--wishlist heart button--}}
                    <button class="btn  outline-remove position-relative" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptions_wishlist"
                            aria-controls="offcanvasWithBothOptions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                             class="bi bi-suit-heart" viewBox="0 0 16 16">
                            <path
                                d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                        </svg>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light border border-info-subtle text-black text-xs">
                    99+
                    <span class="visually-hidden">unread messages</span>
                  </span>
                    </button>

                    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1"
                         id="offcanvasWithBothOptions_wishlist"
                         aria-labelledby="offcanvasWithBothOptionsLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">WISHLIST</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <p>You don't have any products in the wishlist yet.
                                You will find a lot of interesting products on our "Shop" page.</p>
                        </div>
                    </div>

                    {{--cart button--}}
                    <button class="btn outline-remove position-relative" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptions_cart" aria-controls="offcanvasWithBothOptions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                             class="bi bi-cart"
                             viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light border border-info-subtle text-black text-xs">
                    99+
                    <span class="visually-hidden">unread messages</span>
                  </span>
                    </button>

                    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1"
                         id="offcanvasWithBothOptions_cart"
                         aria-labelledby="offcanvasWithBothOptionsLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">SHOPPING CART</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <p>Your cart is empty.</p>
                        </div>
                    </div>
                </div>
            </div>
        </nav>


        <nav class="navbar padding-remove bg-body-tertiary " role="navigation">
            <div class="container-fluid  bg-dark text-white content-center py-2">
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
                            <button @mouseover="open = ! open" class="nav-link text-white">Products</button>

                            <div x-show="open" @mouseover.away="open = false" class="w-full position-absolute left-0"
                                 x-transition:enter.duration.500ms
                                 x-transition:leave.duration.500ms>
                                <div class="w-full h-[300px] bg-white text-black shadow">
                                    <div class="d-flex h-full ">
                                        <div class="">
                                            <div class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300" style="width: 15rem!important;">
                                                <a class="dropdown-item" href="#">Components</a>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                </svg>
                                            </div>
                                            <div class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300" style="width: 15rem!important;">
                                                <a class="dropdown-item" href="#">Peripherals</a>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                </svg>
                                            </div>
                                            <div class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300" style="width: 15rem!important;">
                                                <a class="dropdown-item" href="#">Accessories</a>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                </svg>
                                            </div>
                                            <div class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300" style="width: 15rem!important;">
                                                <a class="dropdown-item" href="#">Best Sellers</a>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                                </svg>
                                            </div>
                                            <div class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300" style="width: 15rem!important;">
                                                <a class="dropdown-item" href="#">All Products</a>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
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

                            <div x-show="open" @mouseover.away="open = false" class="w-full position-absolute left-0"
                                 x-transition:enter.duration.500ms
                                 x-transition:leave.duration.500ms>
                                <div class="w-full h-[200px] bg-dark">
                                    <a class="dropdown-item" href="#">Action</a>
                                </div>
                            </div>
                        </div>
                        <div x-data="{ open: false }" class="nav-item">
                            <a @mouseover="open = ! open" class="nav-link text-white" role="button">Support</a>

                            <div x-show="open" @mouseover.away="open = false" class="position-absolute min-w-[200px]"
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

                            <div x-show="open" @mouseover.away="open = false" class="position-absolute min-w-[200px]"
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
    </div>
    <div>
        <p>@json($selected_category)</p>
    </div>
</div>
{{--    <div class="position-relative w-fit">--}}
{{--        <h1>--}}
{{--            hello--}}
{{--            <span class="badge rounded-pill text-bg-light">Light</span>--}}
{{--        </h1>--}}
{{--    </div>--}}


{{--    <h1>Example heading <span class="badge rounded-pill bg-secondary vh-100">New</span></h1>--}}




