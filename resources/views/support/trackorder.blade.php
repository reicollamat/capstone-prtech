@extends('layouts.master_layout')
@section('content')
    <div x-data="">
        <div>
            <x-shop.breadcrumb>
                <span class="breadcrumb-item active">Track Order</span>
            </x-shop.breadcrumb>
        </div>

        {{-- if account logged in --}}
        @if (Auth::user())
        <div class="card text-center mx-4 mb-10">
            <div class="card-header">
                <h3>Track Order</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="nav nav-underline nav-fill bg-dark p-2">
                            <a class="nav-item nav-link text-light active" data-toggle="tab" href="#tab-pane-1">
                                Pending
                                <span class="position-absolute badge rounded-pill bg-danger">
                                    2
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>
                            <a class="nav-item nav-link text-light" data-toggle="tab" href="#tab-pane-2">Completed</a>
                        </div>
                    </div>
                    <div class="tab-content mt-4">
                        
                        {{-- pending tab content --}}
                        <div class="tab-pane fade py-2 px-2 show active" id="tab-pane-1">
                            <div class="row mx-1 mb-2 align-items-center">
                                <div class="col-4 p-0">
                                    Purchase ID
                                </div>
                                <div class="col-4 p-0">
                                    Date Purchased
                                </div>
                                <div class="col-2 p-0">
                                    # of Items
                                </div>
                                <div class="col-2 p-0">
                                    Total Price
                                </div>
                            </div>
                            <div class="accordion accordion-flush" id="accordionFlush">
                                <div class="accordion-item border">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed d-block py-2" id="trackAccordion" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            <div class="row text-center">
                                                <div class="col-4">
                                                    00001
                                                </div>
                                                <div class="col-4">
                                                    November 30, 2023
                                                </div>
                                                <div class="col-2">
                                                    2
                                                </div>
                                                <div class="col-2">
                                                    ₱150
                                                </div>
                                                <i class="bi bi-chevron-compact-down text-primary"></i>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlush">
                                        <div class="accordion-body bg-secondary-subtle p-2">
                                            <div class="card my-2">
                                                <div class="row g-0" style="height: 80px">
                                                    <div class="col-md-1 justify-content-end">
                                                        <img src="{{asset("img/showcase4.jpg")}}" class="img-fluid rounded-start mx-auto d-block p-2" alt="">
                                                    </div>
                                                    <div class="col-md-11">
                                                        <div class="card-body py-2">
                                                            <div class="card-title d-flex pt-3">
                                                                <div class="col-4 d-flex justify-content-start">
                                                                    <h5>Product Title</h5>
                                                                </div>
                                                                <div class="col-2 d-flex justify-content-start">
                                                                    <small class="text-body-secondary mr-1">Status:</small> To Ship
                                                                </div>
                                                                <div class="col-3 d-flex justify-content-start">
                                                                    <small class="text-body-secondary mr-1">Est. Arrival:</small> November 30, 2023
                                                                </div>
                                                                <div class="col-2 d-flex justify-content-start">
                                                                    <small class="text-body-secondary mr-1">Quantity:</small> 3
                                                                </div>
                                                                <div class="col-1 d-flex justify-content-start">
                                                                    <h5>₱150</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card my-2">
                                                <div class="row g-0" style="height: 80px">
                                                    <div class="col-md-1 justify-content-end">
                                                        <img src="{{asset("img/showcase1.jpg")}}" class="img-fluid rounded-start mx-auto d-block p-2" alt="">
                                                    </div>
                                                    <div class="col-md-11">
                                                        <div class="card-body py-2">
                                                            <div class="card-title d-flex pt-3">
                                                                <div class="col-4 d-flex justify-content-start">
                                                                    <h5>Product Title</h5>
                                                                </div>
                                                                <div class="col-2 d-flex justify-content-start">
                                                                    <small class="text-body-secondary mr-1">Status:</small> To Ship
                                                                </div>
                                                                <div class="col-3 d-flex justify-content-start">
                                                                    <small class="text-body-secondary mr-1">Est. Arrival:</small> November 25, 2023
                                                                </div>
                                                                <div class="col-2 d-flex justify-content-start">
                                                                    <small class="text-body-secondary mr-1">Quantity:</small> 2
                                                                </div>
                                                                <div class="col-1 d-flex justify-content-start">
                                                                    <h5>₱69</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> {{-- accordion item --}}

                                <div class="accordion-item border">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed d-block py-2" id="trackAccordion"type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            <div class="row text-center">
                                                <div class="col-4">
                                                    00002
                                                </div>
                                                <div class="col-4">
                                                    November 25, 2023
                                                </div>
                                                <div class="col-2">
                                                    3
                                                </div>
                                                <div class="col-2">
                                                    ₱650
                                                </div>
                                                <i class="bi bi-chevron-compact-down text-primary"></i>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlush">
                                        <div class="accordion-body bg-secondary-subtle p-2">
                                            test
                                        </div>
                                    </div>
                                </div> {{-- accordion item --}}
                            </div>{{-- accordionFlush --}}
                            
                        </div> {{-- pending tab content --}}

                        {{-- completed tab content --}}
                        <div class="tab-pane fade py-2 px-2" id="tab-pane-5">
                            completed
                        </div>
                        
                    </div>
                </div>
                <div class="card-footer text-body-secondary">
                    <nav aria-label="track_order_pagination">
                        <ul class="pagination pagination-sm m-0 justify-content-center">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
            
        {{-- if no account logged in --}}
        @else
            <div class="header d-flex justify-center  mt-3 mb-8">
                <h3>Track Order</h3>
            </div>
            <div x-transition.duration.500ms>
                <livewire:tracker.track-order />
            </div>
        @endif

    </div>
@endsection
