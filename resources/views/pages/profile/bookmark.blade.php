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
    <span class="breadcrumb-item active">Bookmark</span>
</x-shop.breadcrumb>
<!-- Breadcrumb End -->


<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-dark table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Image</th>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Condition</th>
                        <th>Remove</th>
                        <th>View Item</th>
                    </tr>
                </thead>
                <tbody class="align-middle">

                    @foreach ($bookmarks as $value)
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
                            @if ($products->where('id', $value->product_id)->first()->condition == 'used')
                                Used
                            @else
                                Brand New
                            @endif
                            
                        </td>
                        <td class="align-middle">
                            <form action="{{route('remove_bookmark')}}" method="POST">
                                @csrf
                                <input type="text" name="bookmark_id" value="{{$value->id}}" hidden>
                                <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                                <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                        <td class="align-middle">
                            <form action="{{route('product_detail', ['product_id' => $value->product_id, 'category' => $products->where('id', $value->product_id)->first()->category])}}" method="GET">
                                @csrf
                                <button class="btn btn-sm btn-info">View</i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
        @if ($bookmarks->isEmpty())
            <div class="col-lg-12 text-center">
                No Cart Items Found
            </div>
        @endif
    </div>
</div>
<!-- Cart End -->


@endsection
