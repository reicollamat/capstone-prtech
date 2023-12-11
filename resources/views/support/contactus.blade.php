@extends('layouts.master_layout')
@section('content')
<div>
    <x-shop.breadcrumb>
        <span class="breadcrumb-item active">Contact Us</span>
    </x-shop.breadcrumb>
</div>
<div class="header d-flex justify-content-center my-3">
    <h1>Contact Us</h1>
</div>
<!-- Content div -->
<div class="container-fluid px-5">
    <div class="p-4">
        <div class="d-flex justify-content-center text-justify" id="content">
            <p class="mb-0 text-center">
                Feel free to reach out to us if you have any concerns or problems;
                we're here to assist you.
            </p>
        </div>
    </div>
</div>
<!-- Image and Contact us div -->
<div class="container d-flex flex-column mt-8 mb-16">
    <img src="https://cdn.baseus.cn/admin/other/XljcS3GWwbmkoRnIRNMRo7hd5EGqSvY7.jpg" alt="Contact Us"
        class="img-fluid mb-4" />
    <h4>Send us your concerns!</h4>
    <form>
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="name" name="name" required />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" class="form-control" id="email" name="email" required />
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Your Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection