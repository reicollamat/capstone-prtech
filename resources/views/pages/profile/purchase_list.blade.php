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
    <span class="breadcrumb-item active">Purchases</span>
</x-shop.breadcrumb>
<!-- Breadcrumb End -->


<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-dark table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Purchase No.</th>
                        <th>Date Purchased</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Products</th>
                    </tr>
                </thead>
                <tbody class="align-middle">

                    @foreach ($purchases as $value)
                    <tr>
                        <td class="align-middle">
                            {{$value->id}}
                        </td>
                        <td class="align-middle">
                            {{Carbon\Carbon::parse($value->purchase_date)->format('F d, Y - H:i')}}
                        </td>
                        <td class="align-middle">
                            ₱ {{$value->total_amount}}
                        </td>
                        <td class="align-middle">
                            @if ($value->purchase_status == 'processing')
                                Processing
                            @elseif ($value->purchase_status == 'shipped')
                                Shipped
                            @elseif ($value->purchase_status == 'delivered')
                                Delivered
                            @elseif ($value->purchase_status == 'completed')
                                Completed
                            @endif
                        </td>
                        <td class="align-middle">
                            <ul style="list-style-type:none">
                                @foreach ($purchase_items as $item)
                                    <li>
                                        <a href="{{route('product_detail',['product_id'=>$products->where('id', $item->product_id)->first()->id, 'category'=>$products->where('id', $item->product_id)->first()->category])}}">
                                            {{$products->where('id', $item->product_id)->first()->title}}
                                        </a>
                                        
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
        @if ($purchases->isEmpty())
            <div class="col-lg-12 text-center">
                No Purchases Found!
            </div>
        @endif
    </div>
</div>
<!-- Cart End -->


@endsection
