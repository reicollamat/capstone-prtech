@extends('layouts.seller.seller-layout')
@section('content')
<!-- Page content wrapper-->
<div id="page-content-wrapper">
    <!-- Top navigation-->
    {{-- title bar --}}
    <x-seller.titlebar>
        Dashboard
    </x-seller.titlebar>

    <!-- Page content-->
    Popular Produts - Restock Analysis

    <div class="card m-4">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Feedback Score</th>
                        <th scope="col">Restock</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($products as $product)
                    <tr class="clickable-row" data-bs-toggle="dropdown" aria-expanded="false">
                        <th>{{ $product->title }}</th>
                        <td>{{ $product->category }}</td>
                        <td>Mostly Positive with n% Score</td>
                        <td>High Commodity / Suggested for Restock</td>
                        <td>
                            <div class="dropdown-center">
                                {{-- <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button> --}}
                                <ul class="dropdown-menu bg-primary">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection