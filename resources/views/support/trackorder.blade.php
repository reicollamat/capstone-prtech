@extends('layouts.master_layout')
@section('content')
    <div x-data="">
        <div>
            <x-shop.breadcrumb>
                <span class="breadcrumb-item active">Track Order</span>
            </x-shop.breadcrumb>
        </div>

        <div class="card text-center mx-4">
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
                            <a class="nav-item nav-link text-light" data-toggle="tab" href="#tab-pane-2">To Package</a>
                            <a class="nav-item nav-link text-light" data-toggle="tab" href="#tab-pane-2">To Ship</a>
                            <a class="nav-item nav-link text-light" data-toggle="tab" href="#tab-pane-2">To Feedback</a>
                            <a class="nav-item nav-link text-light" data-toggle="tab" href="#tab-pane-2">Completed</a>
                        </div>
                    </div>
                    <div class="tab-content mt-4">
                        <div class="tab-pane fade py-2 px-2 show active" id="tab-pane-1">
                            <div class="row mx-1 mb-2">
                                <div class="col-2">
                                    Purchase ID
                                </div>
                                <div class="col-3">
                                    Date Purchase
                                </div>
                                <div class="col-3">
                                    Estimated Arrival Date
                                </div>
                                <div class="col-2">
                                    # of Items
                                </div>
                                <div class="col-2">
                                    Total Price
                                </div>
                            </div>
                            <div class="accordion accordion-flush" id="accordionFlush">
                                <div class="accordion-item border">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed d-block py-2" id="trackAccordion" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            <div class="row text-center">
                                                <div class="col-2">
                                                    00001
                                                </div>
                                                <div class="col-3">
                                                    Friday
                                                </div>
                                                <div class="col-3">
                                                    Saturday
                                                </div>
                                                <div class="col-2">
                                                    2
                                                </div>
                                                <div class="col-2">
                                                    ₱150
                                                </div>
                                                <i class="bi bi-chevron-compact-down"></i>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlush">
                                        <div class="accordion-body bg-secondary-subtle p-2">
                                            <h5>2 Item/s</h5>
                                            <div class="card">
                                                <div class="row g-0">
                                                    <div class="col-md-1 justify-content-end">
                                                        {{-- <img src="{{asset($product->image)}}" class="img-fluid rounded-start mx-auto d-block py-2" alt="..." style="max-height: 80px"> --}}
                                                        <img src="{{asset("img/showcase4.jpg")}}" class="img-fluid rounded-start mx-auto d-block p-2" alt="" style="max-height: 80px">
                                                    </div>
                                                    <div class="col-md-11">
                                                        <div class="card-body py-2">
                                                            <div class="card-title d-flex pt-3">
                                                                <div class="col-4 d-flex justify-content-start">
                                                                    <h5>Product Title</h5>
                                                                </div>
                                                                <div class="col-4 d-flex justify-content-start">
                                                                    <small class="text-body-secondary">Quantity:</small> 3
                                                                </div>
                                                                <div class="col-4 d-flex justify-content-start">₱150</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="row g-0">
                                                    <div class="col-md-1 justify-content-end">
                                                        {{-- <img src="{{asset($product->image)}}" class="img-fluid rounded-start mx-auto d-block py-2" alt="..." style="max-height: 80px"> --}}
                                                        <img src="{{asset("img/showcase1.jpg")}}" class="img-fluid rounded-start mx-auto d-block p-2" alt="" style="max-height: 80px">
                                                    </div>
                                                    <div class="col-md-11">
                                                        <div class="card-body py-2">
                                                            <div class="card-title d-flex pt-3">
                                                                <div class="col-4 d-flex justify-content-start">
                                                                    <h5>Product Title</h5>
                                                                </div>
                                                                <div class="col-4 d-flex justify-content-start">
                                                                    <small class="text-body-secondary">Quantity:</small> 1
                                                                </div>
                                                                <div class="col-4 d-flex justify-content-start">₱69</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed d-block py-2" id="trackAccordion"type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                <div class="row text-center">
                                                    <div class="col-2">
                                                        00002
                                                    </div>
                                                    <div class="col-3">
                                                        Friday
                                                    </div>
                                                    <div class="col-3">
                                                        Saturday
                                                    </div>
                                                    <div class="col-2">
                                                        3
                                                    </div>
                                                    <div class="col-2">
                                                        ₱650
                                                    </div>
                                                    <i class="bi bi-chevron-compact-down"></i>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlush">
                                            <div class="accordion-body bg-secondary-subtle p-2">
                                                <h5>2 Item/s</h5>
                                                <div class="card">
                                                    <div class="row g-0">
                                                        <div class="col-md-1 justify-content-end">
                                                            {{-- <img src="{{asset($product->image)}}" class="img-fluid rounded-start mx-auto d-block py-2" alt="..." style="max-height: 80px"> --}}
                                                            <img src="{{asset("img/showcase4.jpg")}}" class="img-fluid rounded-start mx-auto d-block p-2" alt="" style="max-height: 80px">
                                                        </div>
                                                        <div class="col-md-11">
                                                            <div class="card-body py-2">
                                                                <div class="card-title d-flex pt-3">
                                                                    <div class="col-4 d-flex justify-content-start">
                                                                        <h5>Product Title</h5>
                                                                    </div>
                                                                    <div class="col-4 d-flex justify-content-start">
                                                                        <small class="text-body-secondary">Quantity:</small> 3
                                                                    </div>
                                                                    <div class="col-4 d-flex justify-content-start">₱150</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="row g-0">
                                                        <div class="col-md-1 justify-content-end">
                                                            {{-- <img src="{{asset($product->image)}}" class="img-fluid rounded-start mx-auto d-block py-2" alt="..." style="max-height: 80px"> --}}
                                                            <img src="{{asset("img/showcase1.jpg")}}" class="img-fluid rounded-start mx-auto d-block p-2" alt="" style="max-height: 80px">
                                                        </div>
                                                        <div class="col-md-11">
                                                            <div class="card-body py-2">
                                                                <div class="card-title d-flex pt-3">
                                                                    <div class="col-4 d-flex justify-content-start">
                                                                        <h5>Product Title</h5>
                                                                    </div>
                                                                    <div class="col-4 d-flex justify-content-start">
                                                                        <small class="text-body-secondary">Quantity:</small> 1
                                                                    </div>
                                                                    <div class="col-4 d-flex justify-content-start">₱69</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade py-2 px-2" id="tab-pane-2">
                            package
                        </div>

                        <div class="tab-pane fade py-2 px-2" id="tab-pane-3">
                            ship
                        </div>

                        <div class="tab-pane fade py-2 px-2" id="tab-pane-4">
                            feedback
                        </div>

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

        <div class="header d-flex justify-center  mt-3 mb-8">
            <h3>Track Order</h3>
        </div>
        <div x-transition.duration.500ms>
            <livewire:tracker.track-order />
        </div>

        </div>
    </div>
@endsection
