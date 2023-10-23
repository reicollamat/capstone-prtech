@extends('layouts.master_layout')
@section('content')

    @if (session('message'))
        <div id="notification" class="alert bg-primary text-light {{ session('alert-class', 'alert-info') }}">
            {{ session('message') }}
        </div>
    @endif

    <!-- Breadcrumb Start -->
    <x-shop.breadcrumb>
        <a class="breadcrumb-item" href="#">Home</a>
        <a class="breadcrumb-item" href="#">Shop</a>
        <span class="breadcrumb-item active">Product Detail</span>
    </x-shop.breadcrumb>
    <!-- Breadcrumb End -->

    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{asset($product->image)}}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('img/showcase1.jpg')}}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('img/showcase2.jpg')}}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('img/showcase3.jpg')}}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('img/showcase4.jpg')}}" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-primary"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-primary"></i>
                    </a>
                </div>
            </div>


            <div class="col-lg-7 h-auto mb-30 text-dark">
                <div class="h-100">
                    <h3>{{ $product->name }}</h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 Reviews)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">₱{{ $product->price }}</h3>
                    <p class="mb-4">{{ $product->description }}</p>

                    @includeWhen($category === 'computer_case', 'pages.product_details.computer_case')
                    @includeWhen($category === 'case_fan', 'pages.product_details.case_fan')
                    @includeWhen($category === 'cpu', 'pages.product_details.cpu')
                    @includeWhen($category === 'cpu_cooler', 'pages.product_details.cpu_cooler')
                    @includeWhen($category === 'ext_storage', 'pages.product_details.ext_storage')
                    @includeWhen($category === 'int_storage', 'pages.product_details.int_storage')
                    @includeWhen($category === 'headphone', 'pages.product_details.headphone')
                    @includeWhen($category === 'keyboard', 'pages.product_details.keyboard')
                    @includeWhen($category === 'memory', 'pages.product_details.memory')
                    @includeWhen($category === 'monitor', 'pages.product_details.monitor')
                    @includeWhen($category === 'motherboard', 'pages.product_details.motherboard')
                    @includeWhen($category === 'mouse', 'pages.product_details.mouse')
                    @includeWhen($category === 'psu', 'pages.product_details.psu')
                    @includeWhen($category === 'speaker', 'pages.product_details.speaker')
                    @includeWhen($category === 'video_card', 'pages.product_details.video_card')
                    @includeWhen($category === 'webcam', 'pages.product_details.webcam')

                    <div class="d-flex align-items-center mb-4 pt-2">
                        @auth
                            <form id="cartFormAuth" action="{{route('add_to_cart')}}" method="POST">
                                @csrf
                                <input type="text" name="product_id" value="{{$product->product_id}}" hidden>
                                <input type="text" name="category" value="{{$product->category}}" hidden>
                                <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                                <div class="input-group quantity mr-3" style="width: 130px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control bg-light border-0 text-center"
                                           name="quantity" value="1" id="cartQuantityInput">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <form id="formLogin" action="{{route('login')}}">
                                @csrf
                            </form>
                            <div class="input-group quantity mr-3" style="width: 130px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control bg-light border-0 text-center" name="quantity"
                                       value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        @endauth

                        <button class="btn btn-primary px-3" id="addToCartBtn">
                            <div class="text-light">
                                <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                            </div>
                        </button>
                        @auth
                            <div class="px-3 ml-auto">
                                <form action="{{route('add_bookmark')}}" method="POST">
                                    @csrf
                                    <input type="text" name="product_id" value="{{$product->product_id}}" hidden>
                                    <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                                    <button type="submit" class="btn btn-outline-primary btn-square">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="px-3 ml-auto">
                                <form action="{{route('login')}}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary btn-square">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </form>
                            </div>
                        @endauth
                    </div>

                    @auth
                        <form id="purchaseFormAuth" action="{{route('purchase_page')}}" method="GET">
                            @csrf
                            <input type="text" name="product_id" value="{{$product->product_id}}" hidden>
                            <input type="text" name="category" value="{{$product->category}}" hidden>
                            <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                            <input type="text" class="form-control bg-light border-0 text-center" name="quantity"
                                   value="" id="purchaseQuantityInput" hidden>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary btn-lg btn-block" id="purchaseBtn">
                                    <div class="text-light">
                                        <i class="fa fa-shopping-bag mr-1"></i> Purchase Now
                                    </div>
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary btn-lg btn-block" id="purchaseBtn">
                                <div class="text-light">
                                    <i class="fa fa-shopping-bag mr-1"></i> Purchase Now
                                </div>
                            </button>
                        </div>
                    @endauth

                </div>
            </div>
        </div>


        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab"
                           href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (3)</a>
                    </div>
                    <div class="tab-content text-dark">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p>Upgrade your computing experience with the High-Performance Computer Part - Model HPX500.
                                This cutting-edge component is designed to enhance your system's capabilities, offering
                                superior performance and reliability for all your computing needs.</p>
                            <p>Dolore magna est eirmod sanctus dolor, amet diam et eirmod et ipsum. Amet dolore tempor
                                consetetur sed lorem dolor sit lorem tempor. Gubergren amet amet labore sadipscing clita
                                clita diam clita. Sea amet et sed ipsum lorem elitr et, amet et labore voluptua sit
                                rebum. Ea erat sed et diam takimata sed justo. Magna takimata justo et amet magna
                                et.</p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
                            <p>Upgrade your computer's performance and unlock its full potential with the
                                High-Performance Computer Part - Model HPX500. Whether you're a gamer, creative
                                professional, or casual user, this computer part will elevate your computing experience
                                to new heights.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Versatile Compatibility: The Model HPX500 is designed for universal
                                            compatibility, making it a seamless fit with a wide range of computer
                                            systems and configurations.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Reliable Build: Built to last, the Model HPX500 boasts a durable
                                            construction, providing years of reliable performance.
                                        </li>
                                        <li class="list-group-item px-0">
                                            User-Friendly Installation: The Model HPX500 features a user-friendly
                                            installation process, making it easy for both tech enthusiasts and beginners
                                            to upgrade their systems.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Next-Gen Performance: The Model HPX500 is powered by state-of-the-art
                                            technology, delivering next-generation performance for seamless
                                            multitasking, gaming, and content creation.
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{--                    <div class="tab-pane fade" id="tab-pane-3">--}}
                        {{--                        <h4 class="mb-4">3 reviews for "{{$product->name}}"</h4>--}}
                        {{--                        <!-- dummy customer reviews -->--}}

                        {{--                        <x-shop.cus_review>--}}
                        {{--                            <x-slot:img_path>img/user1.png</x-slot:img_path>--}}
                        {{--                            <x-slot:cus_name>Leaz Goe Gauys</x-slot:cus_name>--}}
                        {{--                            <x-slot:cus_date>09 Feb 2021</x-slot:cus_date>--}}
                        {{--                            <x-slot:cus_star>--}}
                        {{--                                <i class="fas fa-star"></i>--}}
                        {{--                                <i class="fas fa-star"></i>--}}
                        {{--                                <i class="fas fa-star"></i>--}}
                        {{--                                <i class="fas fa-star"></i>--}}
                        {{--                                <i class="fas fa-star-half-alt"></i>--}}
                        {{--                            </x-slot:cus_star>--}}
                        {{--                            <p>Fully protected ang item. Super ganda at mabilis lang dumating. And thank you sa nag deliver napakabait..  Diko pa na testing pero the best sa packaging Godbless.</p>--}}
                        {{--                        </x-shop.cus_review>--}}

                        {{--                        <x-shop.cus_review>--}}
                        {{--                            <x-slot:img_path>img/user2.png</x-slot:img_path>--}}
                        {{--                            <x-slot:cus_name>Eyho Waht</x-slot:cus_name>--}}
                        {{--                            <x-slot:cus_date>24 May 2019</x-slot:cus_date>--}}
                        {{--                            <x-slot:cus_star>--}}
                        {{--                                <i class="fas fa-star"></i>--}}
                        {{--                                <i class="fas fa-star"></i>--}}
                        {{--                                <i class="fas fa-star-half-alt"></i>--}}
                        {{--                                <i class="far fa-star"></i>--}}
                        {{--                                <i class="far fa-star"></i>--}}
                        {{--                            </x-slot:cus_star>--}}
                        {{--                            <p>Ayos naman kompleto ang mga items na inorder ko. So far di ko pa na natest kasi wala pa processor. Dismaya lang  ako kasi bubble wrap lang ginamit at di ito nilagay sa malaking box  knowing almost 20K ang amount ng order ko kasi merong monitor na baka mabasag at matupi ang motherboard.</p>--}}
                        {{--                        </x-shop.cus_review>--}}

                        {{--                        <x-shop.cus_review>--}}
                        {{--                            <x-slot:img_path>img/user3.png</x-slot:img_path>--}}
                        {{--                            <x-slot:cus_name>Nhoe Caph Foereal</x-slot:cus_name>--}}
                        {{--                            <x-slot:cus_date>14 Mar 2019</x-slot:cus_date>--}}
                        {{--                            <x-slot:cus_star>--}}
                        {{--                                <i class="fas fa-star"></i>--}}
                        {{--                                <i class="fas fa-star"></i>--}}
                        {{--                                <i class="fas fa-star"></i>--}}
                        {{--                                <i class="fas fa-star-half-alt"></i>--}}
                        {{--                                <i class="far fa-star"></i>--}}
                        {{--                            </x-slot:cus_star>--}}
                        {{--                            <p>Item was shipped immediately, well packaged, connector for mic is not working, maybe its compatible with the OS installed in computer but the connector foe headphone is functioning well.</p>--}}
                        {{--                        </x-shop.cus_review>--}}
                        {{--                        --}}
                        {{--                    </div>--}}
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4 text-dark">1 review for "{{$product->name}}"</h4>

                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                class="pr-3">You May Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    @foreach($random_models as $value)
                        <x-home.product_showcase>
                            <a class="h6 text-decoration-none text-truncate" style="font-size: 0.9rem"
                               href="{{route('product_detail', ['product_id' => $value->product_id, 'category' => $value->category])}}">
                                {{ $value->name }}
                            </a>
                            <x-slot:image>{{ $value->image }}</x-slot:image>
                            <x-slot:price>{{ $value->price }}</x-slot:price>
                            <x-slot:purchasecount>{{ $value->purchase_count }}</x-slot:purchasecount>
                        </x-home.product_showcase>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

@endsection
