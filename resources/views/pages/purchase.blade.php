@extends('layouts.master_layout')
@section('content')

<!-- Breadcrumb Start -->
<x-shop.breadcrumb>
    <a class="breadcrumb-item" href="#">Home</a>
    <a class="breadcrumb-item" href="#">Shop</a>
    <span class="breadcrumb-item active">Purchase</span>
</x-shop.breadcrumb>
<!-- Breadcrumb End -->


<!-- Checkout Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            
            <div class="p-30 mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3 pb-3"><span class=" pr-3">Billing Address</span></h5>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>First Name</label>
                        <input class="form-control bg-primary text-light" type="text" value="{{$user->first_name}}" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Last Name</label>
                        <input class="form-control bg-primary text-light" type="text" value="{{$user->last_name}}" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control bg-primary text-light" type="text" value="{{$user->email}}" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mobile No</label>
                        <input class="form-control bg-primary text-light" type="text" value="{{$user->phone_number}}" readonly>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Street Address</label>
                        <input class="form-control bg-primary text-light" type="text" value="{{$user->street_address}}" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Country</label>
                        <input class="form-control bg-primary text-light" type="text" value="{{$user->country}}" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>City</label>
                        <input class="form-control bg-primary text-light" type="text" value="{{$user->city}}" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Postal Code</label>
                        <input class="form-control bg-primary text-light" type="text" value="{{$user->postal_code}}" readonly>
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="confirm">
                            <label class="custom-control-label" for="confirm">Confirm details</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="shipto">
                            <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse mb-5" id="shipping-address">
                
                <div class="p-30">
                    <h5 class="section-title position-relative text-uppercase mb-3 pb-3"><span class="pr-3">Shipping Address</span></h5>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control bg-primary text-light" type="text" value="{{$user->first_name}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control bg-primary text-light" type="text" value="{{$user->last_name}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control bg-primary text-light" type="text" value="{{$user->email}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control bg-primary text-light" type="text" value="{{$user->phone_number}}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Street Address</label>
                            <input class="form-control bg-primary text-light" type="text" value="{{$user->street_address}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <input class="form-control bg-primary text-light" type="text" value="{{$user->country}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control bg-primary text-light" type="text" value="{{$user->city}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Postal Code</label>
                            <input class="form-control bg-primary text-light" type="text" value="{{$user->postal_code}}">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="confirm">
                                <label class="custom-control-label" for="confirm">Confirm details</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            
            <div class="text-light p-30 mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3 pb-3"><span class="pr-3">Purchase Total</span></h5>
                <div class="border-bottom">
                    <h6 class="mb-3">Products</h6>
                    <div class="d-flex justify-content-between">
                        <p>{{$quantity}}x {{$product->title}}</p>
                        <p>= ₱ {{$product->price * $quantity}}</p>
                    </div>
                </div>
                <div class="border-bottom pt-3 pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>₱{{$subtotal}}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">₱ {{$shipping_value}}</h6>
                    </div>
                </div>
                <div class="pt-2 bg-primary">
                    <div class="d-flex justify-content-between mt-2 mx-2">
                        <h5>Total</h5>
                        <h5>₱ {{$total}}</h5>
                    </div>
                </div>
            </div>
            <div class="text-light mb-5">
                
                <div class="p-30">
                    <h5 class="section-title position-relative text-uppercase mb-3 pb-3"><span class="pr-3">Payment</span></h5>
                    
                    <form action="{{route('purchase_one')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_type" id="paypal" value="paypal" required>
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_type" id="gcash" value="gcash" required>
                                <label class="custom-control-label" for="gcash">GCash</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_type" id="cod" value="cod" required>
                                <label class="custom-control-label" for="cod">COD (Cash On Delivery)</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_type" id="banktransfer" value="banktransfer" required>
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>

                        <input type="text" name="product_id" value="{{$product->id}}" hidden>
                        <input type="text" name="category" value="{{$product->category}}" hidden>
                        <input type="text" name="subtotal" value="{{$subtotal}}" hidden>
                        <input type="text" name="total" value="{{$total}}" hidden>
                        <input type="text" name="quantity" value="{{$quantity}}" hidden>
                        <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>

                        <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit">
                            <div class="text-light">Confirm Purchase</div>
                        </button>
                    </form>
                    <form action="{{route('index_cart')}}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-dark btn-plus mt-4">
                            Cancel
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->

@endsection