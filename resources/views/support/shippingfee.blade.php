@extends('layouts.master_layout')
@section('content')
    <div>
        <x-shop.breadcrumb>
            <span class="breadcrumb-item active">Shipping Fee</span>
        </x-shop.breadcrumb>
    </div>
    <div class="header d-flex justify-content-center my-3">
        <h1>Shipping Fee</h1>
    </div>
    <!-- Content div -->
    <div class="container-fluid px-3">
        <div class="p-3">
            <div class="d-flex justify-content-center text-justify" id="content">
                <div class="row">
                    <div class="">
                        <table class="table border-spacing-2 !bg-transparent">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Weight(kg)</th>
                                    <th scope="col" class="px-6 py-3">Metro Manila<br><i>(Express Delivery)</i></th>
                                    <th scope="col" class="px-6 py-3">Metro Manila<br><i>(Same Day Delivery)</i></th>
                                    <th scope="col" class="px-6 py-3">Metro Manila<br><i>(Standard Delivery)</i></th>
                                    <th scope="col" class="px-6 py-3">Greater Metro Manila<br><i>(Same Day Delivery)</i></th>
                                    <th scope="col" class="px-6 py-3">Greater Metro Manila<br><i>(Standard Delivery)</i></th>
                                    {{-- <th scope="col">Luzon</th> --}}
                                    {{-- <th scope="col">Visayas</th> --}}
                                    {{-- <th scope="col">Mindanao</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row"  class="px-6 py-4"><b>&gt;=3</b></td>
                                    <td class="px-6 py-4">150.00</td>
                                    <td class="px-6 py-4">170.00</td>
                                    <td class="px-6 py-4">150.00</td>
                                    <td class="px-6 py-4">230.00</td>
                                    <td class="px-6 py-4">150.00</td>
                                    {{-- <td>140.00</td> --}}
                                    {{-- <td>160.00</td> --}}
                                    {{-- <td>180.00</td> --}}
                                </tr>
                                <tr>
                                    <td class="px-6 py-4" scope="row"><b>&gt;=5</b></td>
                                    <td class="px-6 py-4">150.00</td>
                                    <td class="px-6 py-4">170.00</td>
                                    <td class="px-6 py-4">150.00</td>
                                    <td class="px-6 py-4">230.00</td>
                                    <td class="px-6 py-4">150.00</td>
                                    {{-- <td>170.00</td> --}}
                                    {{-- <td>190.00</td> --}}
                                    {{-- <td>210.00</td> --}}
                                </tr>
                                <tr>
                                    <td  class="px-6 py-4" scope="row"><b>&gt;=10</b></td>
                                    <td class="px-6 py-4">150.00</td>
                                    <td class="px-6 py-4">170.00</td>
                                    <td class="px-6 py-4">150.00</td>
                                    <td class="px-6 py-4">230.00</td>
                                    <td class="px-6 py-4">170.00</td>
                                    {{-- <td>220.00</td> --}}
                                    {{-- <td>240.00</td> --}}
                                    {{-- <td>260.00</td> --}}
                                </tr>
                                <tr>
                                    <td  class="px-6 py-4" scope="row"><b>&gt;=15</b></td>
                                    <td class="px-6 py-4">150.00</td>
                                    <td class="px-6 py-4">170.00</td>
                                    <td class="px-6 py-4">150.00</td>
                                    <td class="px-6 py-4">230.00</td>
                                    <td class="px-6 py-4">400.00</td>
                                    {{-- <td>500.00</td> --}}
                                    {{-- <td>500.00</td> --}}
                                    {{-- <td>600.00</td> --}}
                                </tr>
                                <tr>
                                    <td class="px-6 py-4" scope="row"><b>&gt;=20</b></td>
                                    <td class="px-6 py-4">150.00</td>
                                    <td class="px-6 py-4">170.00</td>
                                    <td class="px-6 py-4">150.00</td>
                                    <td class="px-6 py-4">230.00</td>
                                    <td class="px-6 py-4">400.00</td>
                                    {{-- <td>500.00</td> --}}
                                    {{-- <td>500.00</td> --}}
                                    {{-- <td>600.00</td> --}}
                                </tr>
                                <tr>
                                    <td  class="px-6 py-4"scope="row"><b>20+</b></td>
                                    <td class="px-6 py-4">250.00</td>
                                    <td class="px-6 py-4">200.00</td>
                                    <td class="px-6 py-4">170.00</td>
                                    <td class="px-6 py-4">N/A</td>
                                    <td class="px-6 py-4">N/A</td>
                                    {{-- <td>N/A</td> --}}
                                    {{-- <td>N/A</td> --}}
                                    {{-- <td>N/A</td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
