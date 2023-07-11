<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        @if (Route::is('index_landing'))
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 46px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-primary" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Storage <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="" class="dropdown-item">Hard Drives</a>
                                <a href="" class="dropdown-item">Solid State Drive</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Processor(CPUs)</a>
                        <a href="" class="nav-item nav-link">Graphics Cards</a>
                        <a href="" class="nav-item nav-link">Motherboards</a>
                        <a href="" class="nav-item nav-link">RAM (Memory)</a>
                        <a href="" class="nav-item nav-link">Power Supply Unit (PSU)</a>
                        <a href="" class="nav-item nav-link">Computer Cases</a>
                        <a href="" class="nav-item nav-link">Cooling Solutions</a>
                        <a href="" class="nav-item nav-link">Monitors</a>
                        <a href="" class="nav-item nav-link">Keyboards</a>
                        <a href="" class="nav-item nav-link">Mouse</a>
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Others <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="" class="dropdown-item">Headsets/Speakers</a>
                                <a href="" class="dropdown-item">Microphones</a>
                                <a href="" class="dropdown-item">Cable Managemnet</a>
                                <a href="" class="dropdown-item">Gaming Chairs</a>
                                <a href="" class="dropdown-item">Lighting</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        @endif
        
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-uppercase text-primary bg-dark">
                        RE
                        <img class="h1" src="img/icon/retechicon.ico" alt="icon">
                    </span>
                    <span class="h1 text-uppercase text-primary bg-dark px-2 ml-n1">TECH</span>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between bg-primary" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ route('index_landing') }}" class="nav-item nav-link {{ (request()->routeIs('index_landing')) ? 'active' : '' }}">Home</a>
                        <a href="{{ route('index_shop') }}" class="nav-item nav-link {{ (request()->routeIs('index_shop')) ? 'active' : '' }}">Shop</a>
                        <a href="#" class="nav-item nav-link">Purchases</a>
                        <a href="#" class="nav-item nav-link">Bookmark</a>
                        @auth
                            <a href="{{ route('index_cart', [ 'name' => Auth::user()->name ]) }}" class="nav-item nav-link">Cart</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-item nav-link">Cart</a>
                        @endauth
                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                            <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                <a href="checkout.html" class="dropdown-item">Checkout</a>
                            </div>
                        </div> --}}
                        {{-- <a href="contact.html" class="nav-item nav-link">Contact</a> --}}
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>