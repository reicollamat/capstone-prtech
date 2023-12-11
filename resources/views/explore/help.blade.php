@extends('layouts.master_layout')
@section('content')
<style>
    #content {
        max-width: 1300px;
        margin: 0 auto;
        padding: 8px;
    }
</style>
<div>
    <x-shop.breadcrumb>
        <span class="breadcrumb-item active">Help And FAQs</span>
    </x-shop.breadcrumb>
</div>
<div class="header d-flex justify-content-center my-3">
    <h1>Help</h1>
</div>
<div class="container-fluid px-5">
    <div class="p-5">
        <div class="justify-content-center" id="content">
            <p class="mb-0 text-center">
                Welcome to PR-TECH's comprehensive Help Center! Navigate through our
                user-friendly Frequently Asked Questions (FAQ) section to discover
                swift and insightful solutions to common queries. Click through
                <a href="/support/support-center">here</a> to
                explore and find answers promptly, saving valuable time. Need
                personalized assistance or have specific inquiries? Our dedicated
                support team is readily available; simply visit our Contact Page
                <a href="/support/contact-us">here</a> to connect
                with us. Engage with a dynamic user community in our Facebook
                <a href="https://www.facebook.com/PR-TECH">here</a> — share your
                experiences, seek advice, and contribute valuable feedback to help
                us continually enhance your experience. We appreciate your choice in
                PR-TECH, and we're here to support you every step of the way. Your
                suggestions for additional topics on this help page are always
                welcomed, as we strive to tailor our support to your needs.
            </p>
        </div>
    </div>
</div>
@endsection