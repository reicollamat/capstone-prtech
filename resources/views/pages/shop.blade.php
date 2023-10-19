@extends('layouts.master_layout')
@section('content')

<!-- Breadcrumb Start -->
<x-shop.breadcrumb>
    <span class="breadcrumb-item">Shop List</span>
    <span class="breadcrumb-item active {{ request()->hasAny(['computer_case','case_fan','cpus','cpu_cooler','ext_storage','int_storage','headphone','keyboard','memory','monitor','motherboard','mouse','psu','speaker','video_card','webcam']) ? 'hide' : '' }}">All Category</span>
    <span class="breadcrumb-item active {{ !request()->filled('computer_case') ? 'hide' : '' }}">Computer Case</span>
    <span class="breadcrumb-item active {{ !request()->filled('case_fan') ? 'hide' : '' }}">Case Fan</span>
    <span class="breadcrumb-item active {{ !request()->filled('cpu') ? 'hide' : '' }}">CPU</span>
    <span class="breadcrumb-item active {{ !request()->filled('cpu_cooler') ? 'hide' : '' }}">CPU Cooler</span>
    <span class="breadcrumb-item active {{ !request()->filled('ext_storage') ? 'hide' : '' }}">External Storage</span>
    <span class="breadcrumb-item active {{ !request()->filled('int_storage') ? 'hide' : '' }}">Internal Storage</span>
    <span class="breadcrumb-item active {{ !request()->filled('headphone') ? 'hide' : '' }}">Headphone</span>
    <span class="breadcrumb-item active {{ !request()->filled('keyboard') ? 'hide' : '' }}">Keyboard</span>
    <span class="breadcrumb-item active {{ !request()->filled('memory') ? 'hide' : '' }}">Memory</span>
    <span class="breadcrumb-item active {{ !request()->filled('monitor') ? 'hide' : '' }}">Monitor</span>
    <span class="breadcrumb-item active {{ !request()->filled('motherboard') ? 'hide' : '' }}">Motherboard</span>
    <span class="breadcrumb-item active {{ !request()->filled('mouse') ? 'hide' : '' }}">Mouse</span>
    <span class="breadcrumb-item active {{ !request()->filled('psu') ? 'hide' : '' }}">Power Supply</span>
    <span class="breadcrumb-item active {{ !request()->filled('speaker') ? 'hide' : '' }}">Speaker</span>
    <span class="breadcrumb-item active {{ !request()->filled('video_card') ? 'hide' : '' }}">GPU</span>
    <span class="breadcrumb-item active {{ !request()->filled('webcam') ? 'hide' : '' }}">Webcam</span>
</x-shop.breadcrumb>
<!-- Breadcrumb End -->

<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        @include('layouts.shopsidebar')
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sort</button>
                                <div class="dropdown-menu dropdown-menu-right bg-light">
                                    <div class="dropdown-item">@sortablelink('title')</div>
                                    <div class="dropdown-item">@sortablelink('price')</div>
                                    <div class="dropdown-item">@sortablelink('purchase_count', 'Purchase Count')</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- product list --}}
                @foreach ($products as $value)
                    <x-shop.display_product>
                        <a class="h6 text-decoration-none text-truncate" href="{{route('product_detail', ['product_id' => $value->id, 'category' => $value->category])}}">
                            {{ $value->title }}
                        </a>
                        <x-slot:price>{{ $value->price }}</x-slot:price>
                        <x-slot:image>{{ $value->image }}</x-slot:image>
                        <x-slot:purchasecount>{{ $value->purchase_count }}</x-slot:purchasecount>
                    </x-shop.display_product>
                @endforeach

                {{-- pagination --}}
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        <p>
                            Displaying {{$products->count()}} of {{ $products->total() }} product(s).
                        </p>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $products->appends(Request::except('page'))->render() !!}
                    </div>
                </div>

            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->
test
test2
@endsection
