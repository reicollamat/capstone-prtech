@extends('layouts.master_layout')
@section('content')

<!-- Carousel Start -->
<div class="container-fluid mb-3 mt-4">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#header-carousel" data-slide-to="1"></li>
                    <li data-target="#header-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <x-home.carousel_item>
                        active
                        <x-slot:img_path>img/showcase1.jpg</x-slot:img_path>
                        <x-slot:title>Your Trusted PC Components Shop</x-slot:title>
                        <x-slot:description>
                            Embrace the power of customization with our unmatched collection of PC parts, perfect for building your dream gaming rig or upgrading your existing setup.
                        </x-slot:description>
                        <x-slot:href>{{ route('index_shop') }}</x-slot:href>
                        <x-slot:btn_title>Shop Now</x-slot:btn_title>
                    </x-home.carousel_item>
                    <x-home.carousel_item>
                        <x-slot:img_path>img/showcase3.jpg</x-slot:img_path>
                        <x-slot:title>Gaming Peripherals</x-slot:title>
                        <x-slot:description>
                            Dependable and secure online shopping experience for customers seeking high-quality computer parts and peripherals.
                        </x-slot:description>
                        <x-slot:href>{{ route('index_shop') }}</x-slot:href>
                        <x-slot:btn_title>Shop Now</x-slot:btn_title>
                    </x-home.carousel_item>
                    <x-home.carousel_item>
                        <x-slot:img_path>img/showcase2.jpg</x-slot:img_path>
                        <x-slot:title>Quality Assurance</x-slot:title>
                        <x-slot:description>
                            Experience a seamless blend of premium quality and unbeatable value with our curated range of PC parts and gaming peripherals. Why compromise when you can have it all?
                        </x-slot:description>
                        <x-slot:href>{{ route('index_shop') }}</x-slot:href>
                        <x-slot:btn_title>Shop Now</x-slot:btn_title>
                    </x-home.carousel_item>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src="img/showcase4.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Save 10%</h6>
                    <h3 class="text-white mb-3">Voucher Offer</h3>
                    <a href="" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src="img/showcase5.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Save 25%</h6>
                    <h3 class="text-white mb-3">Voucher Offer</h3>
                    <a href="" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Featured Start -->
<div class="container-fluid mt-5 bg-primary">
    <div class="row px-xl-5" style="height: 100px">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-light m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0 text-dark">Quality Product</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-light m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0 text-dark">Free Shipping</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-light m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0 text-dark">Warranty</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-light m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0 text-dark">24/7 Support</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->


<!-- Categories Start -->
<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="text-dark pr-3">Categories</span></h2>
    <div class="row px-xl-5 pb-3">
        <x-home.category>
            <x-slot:cat_value>href="{{route('index_shop', ['computer_case' => 'on'])}}"</x-slot:cat_value>
            img/components/case/case (1).png
            <x-slot:category>Case</x-slot:category>
            <x-slot:count>{{ $computer_case->count() }}</x-slot:count>
        </x-home.category>

        <x-home.category>
            <x-slot:cat_value>href="{{route('index_shop', ['case_fan' => 'on'])}}"</x-slot:cat_value>
            img/components/casefan/casefan (1).png
            <x-slot:category>Case Fan</x-slot:category>
            <x-slot:count>{{ $case_fan->count() }}</x-slot:count>
        </x-home.category>

        <x-home.category>
            <x-slot:cat_value>href="{{route('index_shop', ['cpu' => 'on'])}}"</x-slot:cat_value>
            img/components/cpu/cpu (2).png
            <x-slot:category>CPU</x-slot:category>
            <x-slot:count>{{ $cpu->count() }}</x-slot:count>
        </x-home.category>

        <x-home.category>
            <x-slot:cat_value>href="{{route('index_shop', ['cpu_cooler' => 'on'])}}"</x-slot:cat_value>
            img/components/cpucooler/cpucooler (1).png
            <x-slot:category>CPU Cooler</x-slot:category>
            <x-slot:count>{{ $cpu_cooler->count() }}</x-slot:count>
        </x-home.category>

        <x-home.category>
            <x-slot:cat_value>href="{{route('index_shop', ['ext_storage' => 'on'])}}"</x-slot:cat_value>
            img/components/extstorage/extstorage (1).png
            <x-slot:category>External Storage</x-slot:category>
            <x-slot:count>{{ $ext_storage->count() }}</x-slot:count>
        </x-home.category>

        <x-home.category>
            <x-slot:cat_value>href="{{route('index_shop', ['video_card' => 'on'])}}"</x-slot:cat_value>
            img/components/gpu/gpu (1).png
            <x-slot:category>Video Card</x-slot:category>
            <x-slot:count>{{ $video_card->count() }}</x-slot:count>
        </x-home.category>

        <x-home.category>
            <x-slot:cat_value>href="{{route('index_shop', ['headphone' => 'on'])}}"</x-slot:cat_value>
            img/components/headphone/headphone (1).png
            <x-slot:category>Headphone</x-slot:category>
            <x-slot:count>{{ $headphone->count() }}</x-slot:count>
        </x-home.category>

        <x-home.category>
            <x-slot:cat_value>href="{{route('index_shop', ['int_storage' => 'on'])}}"</x-slot:cat_value>
            img/components/intstorage/ssd-sata (1).png
            <x-slot:category>Internal storage</x-slot:category>
            <x-slot:count>{{ $int_storage->count() }}</x-slot:count>
        </x-home.category>

        <x-home.category>
            <x-slot:cat_value>href="{{route('index_shop', ['keyboard' => 'on'])}}"</x-slot:cat_value>
            img/components/keyboard/keyboard (1).png
            <x-slot:category>Keyboard</x-slot:category>
            <x-slot:count>{{ $keyboard->count() }}</x-slot:count>
        </x-home.category>

        <x-home.category>
            <x-slot:cat_value>href="{{route('index_shop', ['motherboard' => 'on'])}}"</x-slot:cat_value>
            img/components/mobo/mobo (1).png
            <x-slot:category>Motherboard</x-slot:category>
            <x-slot:count>{{ $motherboard->count() }}</x-slot:count>
        </x-home.category>

        <x-home.category>
            <x-slot:cat_value>href="{{route('index_shop', ['monitor' => 'on'])}}"</x-slot:cat_value>
        img/components/monitor/monitor (1).png
            <x-slot:category>Monitor</x-slot:category>
            <x-slot:count>{{ $monitor->count() }}</x-slot:count>
        </x-home.category>

        <x-home.category>
            <x-slot:cat_value>href="{{route('index_shop', ['mouse' => 'on'])}}"</x-slot:cat_value>
            img/components/mouse/mouse (1).png
            <x-slot:category>Mouse</x-slot:category>
            <x-slot:count>{{ $mouse->count() }}</x-slot:count>
        </x-home.category>

        <x-home.category>
            <x-slot:cat_value>href="{{route('index_shop', ['psu' => 'on'])}}"</x-slot:cat_value>
            img/components/psu/psu (1).png
            <x-slot:category>Power Supply</x-slot:category>
            <x-slot:count>{{ $psu->count() }}</x-slot:count>
        </x-home.category>

        <x-home.category>
            <x-slot:cat_value>href="{{route('index_shop', ['memory' => 'on'])}}"</x-slot:cat_value>
            img/components/ram/ram (1).png
            <x-slot:category>Memory</x-slot:category>
            <x-slot:count>{{ $memory->count() }}</x-slot:count>
        </x-home.category>

        <x-home.category>
            <x-slot:cat_value>href="{{route('index_shop', ['speaker' => 'on'])}}"</x-slot:cat_value>
            img/components/speaker/speaker (1).png
            <x-slot:category>Speaker</x-slot:category>
            <x-slot:count>{{ $speaker->count() }}</x-slot:count>
        </x-home.category>

        <x-home.category>
            <x-slot:cat_value>href="{{route('index_shop', ['webcam' => 'on'])}}"</x-slot:cat_value>
            img/components/webcam/webcam (1).png
            <x-slot:category>Webcam</x-slot:category>
            <x-slot:count>{{ $webcam->count() }}</x-slot:count>
        </x-home.category>

    </div>
</div>
<!-- Categories End -->


<!-- Featured Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="text-dark pr-3">Featured Products</span></h2>

    {{-- owl-carousel --}}
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    @foreach($featured_products as $value)
                    <x-home.product_showcase>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 0.9rem" href="{{route('product_detail', ['product_id' => $value->product_id, 'category' => $value->category])}}">
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

</div>
<!-- Featured Products End -->


<!-- Offer Start -->
<div class="container-fluid pt-5 pb-3">
    <div class="row px-xl-5">
        <div class="col-md-6">
            <div class="product-offer mb-30" style="height: 300px;">
                <img class="img-fluid" src="img/showcase4.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Save 10%</h6>
                    <h3 class="text-white mb-3">Special Offer</h3>
                    <a href="" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-offer mb-30" style="height: 300px;">
                <img class="img-fluid" src="img/showcase5.jpg" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Save 25%</h6>
                    <h3 class="text-white mb-3">Special Offer</h3>
                    <a href="" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->


<!-- Recent Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="text-dark pr-3">Recent Products</span></h2>

    {{-- owl-carousel --}}
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    @foreach($recent_products as $value)
                    <x-home.product_showcase>
                        <a class="h6 text-decoration-none text-truncate" style="font-size: 0.9rem" href="{{route('product_detail', ['product_id' => $value->product_id, 'category' => $value->category])}}">
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

</div>
<!-- Recent Products End -->


<!-- Vendor Start -->
{{-- <div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                <div class="bg-light p-4">
                    <img src="multishop/img/vendor-1.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="multishop/img/vendor-2.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="multishop/img/vendor-3.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="multishop/img/vendor-4.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="multishop/img/vendor-5.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="multishop/img/vendor-6.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="multishop/img/vendor-7.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="multishop/img/vendor-8.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Vendor End -->

@endsection
