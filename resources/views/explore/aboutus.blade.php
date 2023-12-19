@extends('layouts.master_layout')
@section('content')
<style>
    #content {
        max-width: 1300px;
        margin: 0 auto;
        padding: 8px;
    }

    .image-card {
        width: 480px;
        height: 360px;
        object-fit: cover;
    }

    .card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        transition: box-shadow 0.3s ease-in-out;
    }
</style>
<div>
    <x-shop.breadcrumb>
        <span class="breadcrumb-item active">About Us</span>
    </x-shop.breadcrumb>
</div>
<div class="header d-flex justify-content-center my-3">
    <h1>About Us</h1>
</div>
<!-- Content div -->
<div class="container-fluid px-5">
    <div class="p-5">
        <div class="d-flex justify-content-center" id="content">
            <p class="mb-0 text-center">
                At PR-TECH, we are on a mission to redefine e-commerce with our
                advanced Repurchase Intention Forecasting Model. By harnessing the
                power of product reviews, we enhance customer loyalty and retention.
                Our data-driven approach employs cutting-edge data mining techniques
                to provide actionable insights and informed decision-making. We help
                businesses attract and retain customers through market analysis,
                optimize their online performance, and understand the factors
                influencing consumer behavior. Our commitment to quality is
                reflected in our ISO 25010-based model, ensuring it excels in
                performance efficiency, compatibility, and reliability. Join us in
                this journey of innovation, customer-centric excellence, and the
                future of e-commerce!
            </p>
        </div>
    </div>
</div>
<!-- Features div -->
<div class="container mb-20">
    <div class="row justify-content-center">
        <!-- Card 1 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://www.interdiligence.com/wp-content/uploads/2021/11/analiza-de-piata.jpg"
                    class="card-img-top image-card" alt="Card Image" />
                <div class="card-body">
                    <h5 class="card-title">Repurchase Intention Forecasting Model</h5>
                    <p class="card-text">
                        PR-TECH prioritizes customer loyalty and retention in e-commerce
                        by employing product reviews to inform its predictive analytics,
                        emphasizing its commitment to enhancing customer relationships.
                    </p>
                </div>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://images.jpost.com/image/upload/f_auto,fl_lossy/c_fill,g_faces:center,h_428,w_640/472557"
                    class="card-img-top image-card" alt="Card Image" />
                <div class="card-body">
                    <h5 class="card-title">Data-Driven Market Analysis</h5>
                    <p class="card-text">
                        PR-TECH uses cutting-edge data mining for market analysis,
                        helping businesses attract and retain customers while optimizing
                        online performance through a deep understanding of consumer
                        behavior.
                    </p>
                </div>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://www.perforce.com/sites/default/files/image/2021-05/image-blog-iso.jpg"
                    class="card-img-top image-card" alt="Card Image" />
                <div class="card-body">
                    <h5 class="card-title">ISO 25010-Based Quality Assurance</h5>
                    <p class="card-text">
                        PR-TECH's Repurchase Intention Forecasting Model, based on ISO
                        25010, ensures high performance, compatibility, and reliability,
                        emphasizing the company's commitment to quality in e-commerce.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection