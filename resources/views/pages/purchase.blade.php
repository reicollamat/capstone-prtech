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
            <div class="row g-3 bg-secondary-subtle my-2 pb-4 rounded">
                <h5 class="text-uppercase">Account Details</h5>
                <div class="col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" value="{{$user->first_name}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" value="{{$user->last_name}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value="{{$user->email}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" value="{{$user->phone_number}}" readonly>
                </div>
            </div>
            <div class="row g-3 bg-secondary-subtle my-2 pb-4 rounded">
                <h5 class="text-uppercase">
                    Delivery Address
                    <button type="button" class="btn text-primary fst-italic p-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Change
                    </button>
                </h5>

                <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delivery Address</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <label for="street_address_1" class="form-label">Street Address</label>
                                    <input type="text" class="form-control bg-secondary-subtle" id="street_address_1" value="{{$user->street_address_1}}">
                                </div>
                                <div class="col-md-5">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control bg-secondary-subtle" id="city" value="{{$user->city}}">
                                </div>
                                <div class="col-md-5">
                                    <label for="state_province" class="form-label">Province</label>
                                    <input type="text" class="form-control bg-secondary-subtle" id="state_province" value="{{$user->state_province}}">
                                </div>
                                <div class="col-md-2">
                                    <label for="postal_code" class="form-label">Postal Code</label>
                                    <input type="text" class="form-control bg-secondary-subtle" id="postal_code" value="{{$user->postal_code}}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Change</button>
                        </div>
                        </div>
                    </div>
                    </div>

                <div class="col-12">
                    <label for="street_address_1" class="form-label">Street Address</label>
                    <input type="text" class="form-control" id="street_address_1" value="{{$user->street_address_1}}" readonly>
                </div>
                <div class="col-md-5">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" value="{{$user->city}}" readonly>
                </div>
                <div class="col-md-5">
                    <label for="state_province" class="form-label">Province</label>
                    <input type="text" class="form-control" id="state_province" value="{{$user->state_province}}" readonly>
                </div>
                <div class="col-md-2">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postal_code" value="{{$user->postal_code}}" readonly>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mt-2 mb-4">
                <h4 class="card-header text-center bg-secondary-subtle">
                    Purchase Summary
                </h4>
                <div class="card-body">
                    <h5 class="mb-3">Products</h5>
                    <div class="d-flex justify-content-between border-bottom">
                        <p>{{$quantity}}x {{$product->title}}</p>
                        <p>₱{{$product->price * $quantity}}</p>
                    </div>
                    <div class="pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>₱{{$subtotal}}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">₱ {{$shipping_value}}</h6>
                        </div>
                    </div>
                    <div class="pt-2 bg-primary-subtle border border-2 border-dark-subtle rounded">
                        <div class="d-flex justify-content-between mt-2 mx-2">
                            <h5>Total</h5>
                            <h5>₱{{$total}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <h4 class="card-header text-center bg-secondary-subtle">
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
                                    class="lg:!h-12 w-full  h-10 flex items-center justify-center uppercase font-semibold px-4 lg:!px-6 border border-black hover:bg-blue-600 hover:text-white transition duration-500 ease-in-out">
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