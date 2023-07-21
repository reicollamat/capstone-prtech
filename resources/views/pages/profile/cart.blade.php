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
    <a class="breadcrumb-item" href="#">{{ Auth::user()->name }}</a>
    <span class="breadcrumb-item active">Shopping Cart</span>
</x-shop.breadcrumb>
<!-- Breadcrumb End -->


<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-dark table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Image</th>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                        <th>View Item</th>
                    </tr>
                </thead>
                <tbody class="align-middle">

                    @foreach ($cart_items as $value)
                    <tr>
                        <td>
                            <img src="{{asset($products->where('id', $value->product_id)->first()->image)}}" alt="" style="width: 100px;">
                        </td>
                        <td class="align-middle">
                            {{$products->where('id', $value->product_id)->first()->title}}
                        </td>
                        <td class="align-middle">
                            ₱ {{$products->where('id', $value->product_id)->first()->price}}
                        </td>
                        <td class="align-middle">
                            x{{$value->quantity}}
                        </td>
                        <td class="align-middle">₱ {{$value->total_price}}</td>
                        <td class="align-middle">
                            <form action="{{route('remove_cartitem')}}" method="POST">
                                @csrf
                                <input type="text" name="cart_id" value="{{$value->id}}" hidden>
                                <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                                <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                        <td class="align-middle">
                            <form action="{{route('purchase_page')}}" method="GET">
                                @csrf
                                <input type="text" name="product_id" value="{{$value->product_id}}" hidden>
                                <input type="text" name="quantity" value="{{$value->quantity}}" hidden>
                                <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                                <button class="btn btn-sm btn-info">Purchase</i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
        @if (!$cart_items->isEmpty())
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Voucher</button>
                        </div>
                    </div>
                </form>

                <div class="p-30 mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="pr-3">Cart Summary</span></h5>
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>₱ {{$subtotal}}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">₱ {{$shipping_value}}</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>₱ {{$total}}</h5>
                        </div>
                        <form action="{{route('purchasecart_page')}}" method="GET">
                            @csrf
                            @foreach ($cart_items as $value)
                                <input type="text" name="cart_ids[]" value="{{$value->id}}" hidden>
                            @endforeach
                            <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                            <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">
                                <div class="text-light">
                                    Purchase All
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="col-lg-12 text-center">
                No Cart Items Found
            </div>
        @endif
    </div>
</div>
<!-- Cart End -->


@endsection
