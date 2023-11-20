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
                <h5 class="section-title position-relative text-uppercase"><span class=" pr-3">Account Details</span></h5>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>First Name</label>
                        <input class="form-control bg-secondary text-light" type="text" value="{{$user->first_name}}" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Last Name</label>
                        <input class="form-control bg-secondary text-light" type="text" value="{{$user->last_name}}" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control bg-secondary text-light" type="text" value="{{$user->email}}" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mobile No</label>
                        <input class="form-control bg-secondary text-light" type="text" value="{{$user->phone_number}}" readonly>
                    </div>
                    <h5 class="section-title position-relative text-uppercase mt-4">
                        Delivery Address
                        <button type="button" class="btn text-primary p-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Change
                        </button>
                    </h5>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delivery Address</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>City</label>
                                    <input class="form-control bg-secondary text-light" type="text" value="{{$user->country}}" readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Barangay</label>
                                    <input class="form-control bg-secondary text-light" type="text" value="{{$user->city}}" readonly>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Street Address</label>
                                    <input class="form-control bg-secondary text-light" type="text" value="{{$user->street_address}}" readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Postal Code</label>
                                    <input class="form-control bg-secondary text-light" type="text" value="{{$user->postal_code}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Change</button>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>City</label>
                        <input class="form-control bg-secondary text-light" type="text" value="{{$user->country}}" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Barangay</label>
                        <input class="form-control bg-secondary text-light" type="text" value="{{$user->city}}" readonly>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Street Address</label>
                        <input class="form-control bg-secondary text-light" type="text" value="{{$user->street_address}}" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Postal Code</label>
                        <input class="form-control bg-secondary text-light" type="text" value="{{$user->postal_code}}" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-2">
                <h4 class="card-header text-center">
                    Purchase Summary
                </h4>
                <div class="card-body">
                    <h5 class="mb-3">Products</h5>
                    <div class="d-flex justify-content-between border-bottom">
                        <p>{{$quantity}}x {{$product->title}}</p>
                        <p>₱{{$product->price * $quantity}}</p>
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
                    <div class="pt-2 bg-primary-subtle">
                        <div class="d-flex justify-content-between mt-2 mx-2">
                            <h5>Total</h5>
                            <h5>₱{{$total}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <h4 class="card-header text-center">
                    Payment
                </h4>
                <div class="card-body mx-auto">
                    <form action="{{route('purchase_one')}}" method="POST">
                        @csrf

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_type" id="cod" value="cod" required checked>
                            <label class="form-check-label" for="cod">
                                COD (Cash On Delivery)
                            </label>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="radio" name="payment_type" id="gcash" value="gcash" required>
                            <label class="form-check-label" for="gcash">
                                Gcash
                            </label>
                        </div>
                        
                        <input type="text" name="product_id" value="{{$product->id}}" hidden>
                        <input type="text" name="category" value="{{$product->category}}" hidden>
                        <input type="text" name="subtotal" value="{{$subtotal}}" hidden>
                        <input type="text" name="total" value="{{$total}}" hidden>
                        <input type="text" name="quantity" value="{{$quantity}}" hidden>
                        <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>

                        <div class="w-full mb-4">
                            <button class="flex w-full no-underline decoration-0 text-black" type="submit">
                                <span
                                    class="lg:!h-12 w-full  h-10 flex items-center justify-center uppercase font-semibold px-4 lg:!px-6 border border-black hover:bg-blue-500 hover:text-white transition duration-500 ease-in-out">
                                    Confirm Purchase
                                </span>
                            </button>
                        </div>
                    </form>
                    <form action="{{route('index_cart')}}" method="GET">
                        @csrf
                        <div class="w-full">
                            <button class="flex w-full no-underline decoration-0 text-light" type="submit">
                                <span
                                    class="lg:!h-12 w-full  h-10 flex items-center justify-center uppercase font-semibold px-4 lg:!px-6 border border-black bg-gray-800 hover:bg-white hover:text-black transition duration-500 ease-in-out">
                                    Cancel
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->

@endsection