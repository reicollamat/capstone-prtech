@extends('layouts.seller.seller-layout')
@section('content')
<!-- Page content wrapper-->
<div id="page-content-wrapper">
    <!-- Top navigation-->
    {{-- title bar --}}
    <x-seller.titlebar>
        Product Inventory
    </x-seller.titlebar>

    <!-- Page content-->

    <div class="mx-4">
        <label for="exampleDataList" class="form-label">Search Product</label>
        <div class="d-flex">
            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
            <datalist id="datalistOptions">
                <option value="San Francisco">
                <option value="New York">
                <option value="Seattle">
                <option value="Los Angeles">
                <option value="Chicago">
            </datalist>
            <button type="button" class="btn btn-outline-primary btn-sm ml-2">Add Product</button>
        </div>
    </div>

    <div class="card m-4">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Purchase Count</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Last Modified</th>
                        {{-- <th scope="col">Ations</th> --}}
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($products as $product)
                    <tr class="clickable-row" data-bs-toggle="dropdown" aria-expanded="false">
                        <th>{{ $product->title }}</th>
                        <td>{{ $product->category }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->status }}</td>
                        <td>{{ $product->condition }}</td>
                        <td>{{ $product->purchase_count }}</td>
                        <td>1</td>
                        <td>{{ $product->updated_at }}</td>
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
    <div class="d-flex justify-content-center">
        {{ $products->links(data: ['scrollTo' => false]) }}
    </div>
  


</div>
@endsection