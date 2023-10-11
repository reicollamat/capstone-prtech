<div>
    <div class="relative nav justify-content-center  bg-gray-300">
        <div class="my-2 mx-2">
            <li>Sale <strong>10%</strong> off Use code <strong>#sale10</strong></li>
        </div>
    </div>

    <div class="sticky-top">
        <nav class="navbar padding-remove bg-body-tertiary bg-dark sticky-top py-2">
            <div class="w-full container-fluid mx-4 justify-between align-items-center my-1">
                <div class=" ">
                    <a class="navbar-brand" href="#">
                        <img src="/img/brand/svg/logo-no-background.svg" alt="Logo" width="150" height="150"
                             class="d-inline-block align-text-top">
                    </a>
                </div>
                <div class="w-1/3">
                    <div class="input-group rounded-none">
                    <span class="input-group-text" id="basic-addon1">
                         <svg xmlns="http://www.w3.org/2000/svg" width=20 height="20" fill="currentColor"
                              class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </span>
                        <input type="text" class="form-control p-2 rounded-none" placeholder="Search PR-Tech"
                               aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary rounded-none d-flex items-center gap-2" type="button"
                                id="button-addon2">

                            Search
                        </button>
                    </div>
                </div>


                <div class="flex gap-2">
                    {{--profile account button--}}
                    <div class="dropdown">
                        <button class="btn outline-remove" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                 class="bi bi-person  position-relative"
                                 viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>

                            </svg>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>

                    {{--wishlist heart button--}}
                    <button class="btn  outline-remove position-relative" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
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
                         id="offcanvasWithBothOptions"
                         aria-labelledby="offcanvasWithBothOptionsLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <p>Try scrolling the rest of the page to see this option in action.</p>
                        </div>
                    </div>

                    {{--cart button--}}
                    <button class="btn  outline-remove position-relative" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
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
                         id="offcanvasWithBothOptions"
                         aria-labelledby="offcanvasWithBothOptionsLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <p>Try scrolling the rest of the page to see this option in action.</p>
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
                    <ul class="nav nav-underline">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="#">Active</a>

                        </li>
                        <div x-data="{ open: false }" class="nav-item position-relative" >
                            <button @mouseover="open = ! open" class="nav-link text-white">Support</button>

                            <div x-show="open" @mouseover.away="open = false"  class="w-full position-absolute"
                                 x-transition:enter.duration.500ms
                                 x-transition:leave.duration.400ms>
                                <div class="w-full h-[200px] bg-dark">
                                    <a class="dropdown-item" href="#">Action</a>
                                </div>
                            </div>
                        </div>
                        <div x-data="{ open: false }" class="nav-item " >
                            <button @mouseover="open = ! open" class="nav-link text-white">Explore</button>

                            <div x-show="open" @mouseover.away="open = false"  class="w-[100vw] position-absolute"
                                 x-transition:enter.duration.500ms
                                 x-transition:leave.duration.500ms>
                                <div class="w-full h-[200px] bg-dark">
                                    <a class="dropdown-item" href="#">Action</a>
                                </div>
                            </div>
                        </div>

                    </ul>
                </div>

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
            </div>
        </nav>
    </div>
    <div class="position-relative w-fit">
        <h1>
            hello
            <span class="badge rounded-pill text-bg-light">Light</span>
        </h1>
    </div>


    <h1>Example heading <span class="badge rounded-pill bg-secondary vh-100">New</span></h1>


</div>
