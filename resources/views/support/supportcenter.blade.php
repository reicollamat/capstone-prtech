@extends('layouts.master_layout')
@section('content')
<style>
    #content {
        max-width: 1300px;
        margin: 0 auto;
        padding: 8px;
    }

    .card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        transition: box-shadow 0.3s ease-in-out;
    }
</style>
<div>
    <x-shop.breadcrumb>
        <span class="breadcrumb-item active">Support Center</span>
    </x-shop.breadcrumb>
</div>
<div class="header d-flex justify-content-center my-3">
    <h1>Support Center</h1>
</div>
<div class="container-fluid px-5">
    <div class="p-5">
        <div class="justify-content-center" id="content">
            <p class="mb-14 text-center">
                Have questions? You're in the right place! Below is our Frequently
                Asked Questions (FAQ) section. This is designed to provide you with
                quick and comprehensive answers to the most common queries. Whether
                you're a new visitor or a seasoned user, this resource is here to
                guide you through various aspects of our platform, products, or
                services.
            </p>

            <!-- Delivery Info Card -->
            <div class="container mt-5">
                <div class="card p-4">
                    <h5>ORDERING AND DELIVERY INFORMATION</h5>
                    <p>
                        <strong>How to Order:</strong>
                    </p>
                    <ul>
                        <li style="margin-bottom: 10px">
                            &#x2022; Add item to your cart.
                        </li>
                        <li style="margin-bottom: 10px">
                            &#x2022; Click on the Cart icon in the upper right corner to
                            view your cart.
                        </li>
                        <li style="margin-bottom: 10px">
                            &#x2022; Click on the Checkout button.
                        </li>
                        <li style="margin-bottom: 10px">
                            &#x2022; Enter Billing and Shipping Details.
                        </li>
                        <li style="margin-bottom: 10px">
                            &#x2022; Select a payment option.
                        </li>
                        <li style="margin-bottom: 10px">
                            &#x2022; Click on Confirm Order Button.
                        </li>
                    </ul>
                    <p>
                        <strong>Payment Options:</strong>
                        <br />Cash on Delivery (COD) based on your desired courier or
                        GCash.
                    </p>
                    <p>
                        <strong>How do I receive my order?</strong>
                        <br />Orders can be received via delivery.
                    </p>
                    <p>
                        <strong>Shipping:</strong>
                        <br />Shipping is currently available nationwide thru LBC, JRS,
                        J&amp;T, or Lalamove.
                    </p>
                    <p>
                        <strong>How to Track My Order:</strong>
                        <br />When logged in, go to My Account to access your dashboard.
                        You may see the status of your orders on the order history.
                    </p>
                </div>

                <!-- Refund Information Card -->
                <div class="card mt-3 p-4">
                    <h5>Refund Information</h5>
                    <p>
                        To initiate a refund, email sales@prtech.com.ph with the subject
                        "Refund Request" and include your order number, refund amount,
                        and concerns in the body. An Online Sales Representative will
                        contact you within 24 hours. For item returns, contact
                        support@prtech.com.ph or send a message in our
                        <a href="/support/contact-us">contact us</a>
                        page for instructions before proceeding with the return process.
                        Please refer to the warranty information for comprehensive
                        details on our Item Warranty Policy.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection