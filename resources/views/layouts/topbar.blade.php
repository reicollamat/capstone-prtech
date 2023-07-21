<div class="container-fluid">
    <div class="row bg-dark py-1 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center h-100">
                <a class="text-body mr-3" href="">About</a>
                <a class="text-body mr-3" href="">Contact</a>
                <a class="text-body mr-3" href="">Help</a>
                <a class="text-body mr-3" href="">FAQs</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center d-block d-lg-block">
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge text-light border border-light rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge text-light border border-light rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center bg-dark py-3 px-xl-5">
        <div class="col-lg-4 d-none d-lg-flex">
            <a href="" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary">
                    RE
                    <img class="h1" src="{{ asset('img/icon/retechicon.ico') }}" alt="icon">
                </span>
                <span class="h1 text-uppercase text-primary px-2 ml-n1">TECH</span>
            </a>
        </div>
        <div class="searchbar col-lg-4 col-6 text-left">
            <form action="{{route('search_result')}}" method="GET">
                <div class="input-group">
                    @if (session('to_search'))
                        <input type="text" class="form-control" name="to_search" placeholder="Search for products" value="{{ session('to_search') }}">
                    @else
                        <input type="text" class="form-control" name="to_search" placeholder="Search for products">
                    @endif
                    <button type="submit" class="bg-dark">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-6 text-right">
            <div class="btn-group mx-2">
                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">USD</button>
                <div class="dropdown-menu dropdown-menu-right">
                    <button class="dropdown-item" type="button">EUR</button>
                    <button class="dropdown-item" type="button">GBP</button>
                    <button class="dropdown-item" type="button">CAD</button>
                </div>
            </div>

            @if (Route::has('login'))
            @auth
            <div class="btn-group nav-item dropdown">
                {{-- @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->first_name }}" />
                    </button>
                @else --}}
                <a href="#" class="nav-link dropdown-toggle btn btn-outline-primary" data-toggle="dropdown">
                    {{-- {{ Auth::user()->first_name }} --}}
                    {{ Auth::user()->name }}
                    {{-- <i class="fa fa-angle-down mt-1"></i> --}}
                </a>
                {{-- @endif --}}
                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">Profile</a>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a href="{{ route('logout') }}" class="dropdown-item" @click.prevent="$root.submit();">Log Out</a>
                    </form>
                </div>
            </div>
            
            @else
            <div class="btn-group mx-2">
                <a class="btn btn-outline-light" href="{{ route('register') }}">Sign-up</a>
            </div>
            <div class="btn-group">
                <a class="btn btn-outline-primary" href="{{ route('login') }}">Log In</a>
            </div>

            @endauth
            @endif
            
        </div>
    </div>
</div>