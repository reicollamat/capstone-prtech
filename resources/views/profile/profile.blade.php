@extends('layouts.master_layout')
@section('content')

    {{-- display notif errors --}}
    @if ($errors->any())
        <div id="notif-alert" class="alert alert-danger rounded alert-dismissible fade show" role="alert"
            style="position: fixed; top: 20px; right: 25px; width: 25%; z-index:9999; font-size: 14px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- session flash notification --}}
    <x-notification-alert>
        @if (session('notification-livewire'))
            {{ session('notification-livewire') }}
        @else
            {{ session('notification') }}
        @endif
    </x-notification-alert>

    <div class="card text-bg-dark rounded-0">
        <img src="{{ asset('img/profilebanner1.jpg') }}" class="card-img" alt="..." style="max-height: 200px">
        <div class="card-img-overlay text-center d-block align-items-center mt-2">
            <h1 class="card-title fw-bold">MY PROFILE</h1>
            <p class="card-text">
            <h6>
                {{ $user->first_name }} {{ $user->last_name }}
            </h6>
            <small>{{ $user->email }}</small>
            </p>
        </div>
    </div>

    @if ($profile_activetab == 'purchases')
        <div class="row mx-5 my-4">
            <div class="col-3">
                <ul class="list-group" id="profile-nav">
                    <a class="btn list-group-item rounded-0 text-start" data-toggle="tab" href="#accountdetails-tab">
                        <i class="bi bi-person-fill"></i> Account Details
                    </a>
                    <a class="btn list-group-item rounded-0 text-start" data-toggle="tab" href="#addresses-tab">
                        <i class="bi bi-geo-alt-fill"></i> Addresses
                    </a>
                    <a class="btn list-group-item rounded-0 text-start active" data-toggle="tab"
                        href="#purchasehistory-tab">
                        <i class="bi bi-bag-fill"></i> Purchases
                    </a>
                    <a class="btn list-group-item rounded-0 text-start" data-toggle="tab" href="#returnrefund-tab">
                        <i class="bi bi-box-fill"></i> Return/Refund
                    </a>
                    {{-- <a class="btn list-group-item rounded-0 text-start" data-toggle="tab" href="#cart-tab"> --}}
                    {{--     <i class="bi bi-cart-fill"></i> Cart --}}
                    {{-- </a> --}}
                    {{-- <a class="btn list-group-item rounded-0 text-start" data-toggle="tab" href="#wishlist-tab"> --}}
                    {{--     <i class="bi bi-heart-fill"></i> Wishlist --}}
                    {{-- </a> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full btn list-group-item rounded-0 text-start text-danger">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </button>
                    </form>

                </ul>
            </div>
            <div class="col-9 px-4">
                <div class="tab-content">
                    {{-- Account Details content --}}
                    <div class="tab-pane fade" id="accountdetails-tab">
                        @include('profile.partials.account-details')
                    </div>

                    {{-- ReturnRefund content --}}
                    <div class="tab-pane fade" id="returnrefund-tab">
                        @include('profile.partials.profile-returnrefund')
                    </div>

                    {{-- Cart content --}}
                    <div class="tab-pane fade" id="cart-tab">
                        <h5>Cart:</h5>
                    </div>

                    {{-- Wishlist content --}}
                    <div class="tab-pane fade" id="wishlist-tab">
                        <h5>Wishlist:</h5>
                    </div>

                    {{-- Addresses content --}}
                    <div class="tab-pane fade" id="addresses-tab">
                        <h5>Addresses:</h5>
                    </div>

                    {{-- Purchases content --}}
                    <div class="tab-pane fade show active" id="purchasehistory-tab">
                        @include('profile.partials.profile-purchases')
                    </div>
                </div>
            </div>
        </div>
    @elseif ($profile_activetab == 'returnrefund')
        <div class="row mx-5 my-4">
            <div class="col-3">
                <ul class="list-group" id="profile-nav">
                    <a class="btn list-group-item rounded-0 text-start" data-toggle="tab" href="#accountdetails-tab">
                        <i class="bi bi-person-fill"></i> Account Details
                    </a>
                    <a class="btn list-group-item rounded-0 text-start" data-toggle="tab" href="#addresses-tab">
                        <i class="bi bi-geo-alt-fill"></i> Addresses
                    </a>
                    <a class="btn list-group-item rounded-0 text-start" data-toggle="tab" href="#purchasehistory-tab">
                        <i class="bi bi-bag-fill"></i> Purchases
                    </a>
                    <a class="btn list-group-item rounded-0 text-start active" data-toggle="tab" href="#returnrefund-tab">
                        <i class="bi bi-box-fill"></i> Return/Refund
                    </a>
                    {{-- <a class="btn list-group-item rounded-0 text-start" data-toggle="tab" href="#cart-tab"> --}}
                    {{--     <i class="bi bi-cart-fill"></i> Cart --}}
                    {{-- </a> --}}
                    {{-- <a class="btn list-group-item rounded-0 text-start" data-toggle="tab" href="#wishlist-tab"> --}}
                    {{--     <i class="bi bi-heart-fill"></i> Wishlist --}}
                    {{-- </a> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full btn list-group-item rounded-0 text-start text-danger">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </button>
                    </form>
                </ul>
            </div>
            <div class="col-9 px-4">
                <div class="tab-content">
                    {{-- Account Details content --}}
                    <div class="tab-pane fade" id="accountdetails-tab">
                        @include('profile.partials.account-details')
                    </div>

                    {{-- ReturnRefund content --}}
                    <div class="tab-pane fade show active" id="returnrefund-tab">
                        @include('profile.partials.profile-returnrefund')
                    </div>

                    {{-- Cart content --}}
                    <div class="tab-pane fade" id="cart-tab">
                        <h5>Cart:</h5>
                    </div>

                    {{-- Wishlist content --}}
                    <div class="tab-pane fade" id="wishlist-tab">
                        <h5>Wishlist:</h5>
                    </div>

                    {{-- Addresses content --}}
                    <div class="tab-pane fade" id="addresses-tab">
                        <h5>Addresses:</h5>
                    </div>

                    {{-- Purchases content --}}
                    <div class="tab-pane fade" id="purchasehistory-tab">
                        @include('profile.partials.profile-purchases')
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row mx-5 my-4">
            <div class="col-3">
                <ul class="list-group" id="profile-nav">
                    <a class="btn list-group-item rounded-0 text-start active" data-toggle="tab"
                        href="#accountdetails-tab">
                        <i class="bi bi-person-fill"></i> Account Details
                    </a>
                    <a class="btn list-group-item rounded-0 text-start" data-toggle="tab" href="#addresses-tab">
                        <i class="bi bi-geo-alt-fill"></i> Addresses
                    </a>
                    <a class="btn list-group-item rounded-0 text-start" data-toggle="tab" href="#purchasehistory-tab">
                        <i class="bi bi-bag-fill"></i> Purchases
                    </a>
                    <a class="btn list-group-item rounded-0 text-start" data-toggle="tab" href="#returnrefund-tab">
                        <i class="bi bi-box-fill"></i> Return/Refund
                    </a>
                    {{-- <a class="btn list-group-item rounded-0 text-start" data-toggle="tab" href="#cart-tab"> --}}
                    {{--     <i class="bi bi-cart-fill"></i> Cart --}}
                    {{-- </a> --}}
                    {{-- <a class="btn list-group-item rounded-0 text-start" data-toggle="tab" href="#wishlist-tab"> --}}
                    {{--     <i class="bi bi-heart-fill"></i> Wishlist --}}
                    {{-- </a> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full btn list-group-item rounded-0 text-start text-danger">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </button>
                    </form>
                </ul>
            </div>
            <div class="col-9 px-4">
                <div class="tab-content">
                    {{-- Account Details content --}}
                    <div class="tab-pane fade show active" id="accountdetails-tab">
                        @include('profile.partials.account-details')
                    </div>

                    {{-- ReturnRefund content --}}
                    <div class="tab-pane fade" id="returnrefund-tab">
                        <h5>Return Refund:</h5>
                    </div>

                    {{-- Cart content --}}
                    <div class="tab-pane fade" id="cart-tab">
                        <h5>Cart:</h5>
                    </div>

                    {{-- Wishlist content --}}
                    <div class="tab-pane fade" id="wishlist-tab">
                        <h5>Wishlist:</h5>
                    </div>

                    {{-- Addresses content --}}
                    <div class="tab-pane fade" id="addresses-tab">
                        <h5>Addresses:</h5>
                        <form action="{{ route('profile.update-address') }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="p-3 bg-white border-1 border-gray-300 rounded">
                                <input type="text" value="testtest" hidden name="" ">
                                <div class="mb-4">
                                    <label for="line_1"
                                        class="block mb-1 text-base font-medium text-gray-800 dark:text-white pl-1">Address
                                        Line 1</label>
                                    <input type="text" id="line_1" value="{{ $user->street_address_1 }}"
                                           name="address_line_1"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Address Line 1" required>
                                    @error('productName')
                                        <span class="font-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="line_2"
                                        class="block mb-1 text-base font-medium text-gray-800 dark:text-white pl-1">Address
                                        Line 2</label>
                                    <input type="text" id="line_2" value="{{ $user->street_address_2 }}"
                                           name="address_line_2"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Address Line 2" required>
                                    @error('productName')
                                        <span class="font-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 py-1 flex justify-end items-center bg-white rounded-lg">
                                    <button type="submit" class="btn btn-outline-danger">Save Changes</button>
                                </div>
                            </div>
                        </form>

                    </div>

                    {{-- Purchase History content --}}
                    <div class="tab-pane fade" id="purchasehistory-tab">
                        @include('profile.partials.profile-purchases')
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
