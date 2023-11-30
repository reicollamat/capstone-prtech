@extends('layouts.master_layout')
@section('content')


<div class="card text-center mx-auto my-2 p-5 w-50">
    <div class="card-header">
        <h4 class="mb-4">Leave a review for Order #{{$purchase_id}}</h4>
    </div>
    {{-- <div class="card-body p-5"><small>Your email address will not be published. Required fields are marked *</small> --}}
        <div class="row">
            <div class="col-4 p-4 text-end">
                <p class="">Your Rating:</p>
            </div>
            <div class="col-8">
                <label for="customRange2" class="form-label"></label>
                <input type="range" class="form-range" min="0" max="5" id="customRange2">
            </div>
        </div>
        <form class="text-start">
            <div class="form-group m-4">
                <label for="message">Your Review *</label>
                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group m-4">
                <label for="name">Your Name *</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group m-4">
                <label for="email">Your Email *</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group mb-0 m-4">
                <input type="button" value="Leave Your Review" class="btn btn-primary px-3">
            </div>
        </form>
    </div>
  </div>

@endsection