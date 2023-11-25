<h5>Purchase History:</h5>

<div class="card text-center mb-10">
    <div class="card-body px-0">
        <div class="row">
            <div class="col">
                <div class="nav nav-underline nav-fill bg-dark p-2">
                    <a class="nav-item nav-link text-light active" data-toggle="tab" href="#pending-tab">
                        Pending
                        <span class="position-absolute badge rounded-pill bg-danger ml-1">
                            {{count($pending)}}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                    <a class="nav-item nav-link text-light" data-toggle="tab" href="#completed-tab">Completed</a>
                </div>
            </div>

            <div class="tab-content mt-4">
                {{-- pending tab content --}}
                <div class="tab-pane fade py-2 px-2 show active" id="pending-tab">
                    @if (count($user->purchase) == 0)
                        You haven't place an order yet <i class="bi bi-chevron-double-right"></i>
                        <a href="{{route('index_shop')}}"> Make you first order</a>
                    @endif

                    <div class="row mx-1 mb-2 align-items-center">
                        <div class="col-2 p-0">
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
                        <div class="col-2 p-0">
                            Payment Type
                        </div>
                    </div>
                    @foreach ($user->purchase as $purchase)
                    @if ($purchase->purchase_status == 'pending')
                    <div class="accordion accordion-flush" id="accordionFlush">
                        <div class="accordion-item border">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed d-block py-2" id="trackAccordion" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$purchase->id}}" aria-expanded="false" aria-controls="collapse-{{$purchase->id}}">
                                    <div class="row text-center">
                                        <div class="col-2">
                                            0000{{$purchase->id}}
                                        </div>
                                        <div class="col-4">
                                            {{$purchase->purchase_date}}
                                        </div>
                                        <div class="col-2">
                                            {{count($purchase->purchase_item)}}
                                        </div>
                                        <div class="col-2">
                                            ₱{{$purchase->total_amount}}
                                        </div>
                                        <div class="col-2">
                                            {{$purchase->payment->payment_type}}
                                        </div>
                                        <i class="bi bi-chevron-compact-down text-primary"></i>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapse-{{$purchase->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlush">
                                <div class="accordion-body bg-secondary-subtle p-2">
                                    @foreach ($purchase->purchase_item as $purchase_item)
                                    <div class="visually-hidden">
                                        {{$product = App\Models\Product::find($purchase_item->product_id)}}
                                    </div>
                                    <div class="card my-2">
                                        <div class="row g-0" style="height: 65px">
                                            <div class="col-md-1 justify-content-end">
                                                <img src="{{asset($product->image)}}" class="img-fluid rounded-start mx-auto d-block p-2" alt="" style="max-height: 60px">
                                            </div>
                                            <div class="col-md-11">
                                                <div class="card-body py-2 lh-1">
                                                    <div class="card-title d-flex align-items-center">
                                                        <div class="col-3">
                                                            <h6>{{$product->title}}</h6>
                                                        </div>
                                                        <div class="col-2">
                                                            <small class="text-body-secondary">Status:</small> {{$purchase->purchase_status}}
                                                        </div>
                                                        <div class="col-3">
                                                            <small class="text-body-secondary">Est. Arrival:</small>
                                                            <p>Nov. 30, 2023</p>
                                                        </div>
                                                        <div class="col-2">
                                                            <small class="text-body-secondary">Quantity:</small> {{$purchase_item->quantity}}
                                                        </div>
                                                        <div class="col-2">
                                                            <h5>₱{{$purchase_item->total_price}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div> {{-- accordion item --}}
                    </div>{{-- accordionFlush --}}
                    @endif
                    @endforeach
                    
                </div> {{-- pending tab content --}}

                {{-- completed tab content --}}
                <div class="tab-pane fade py-2 px-2" id="completed-tab">
                    completed here
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