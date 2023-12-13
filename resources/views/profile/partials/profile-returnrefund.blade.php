<div class="d-flex justify-content-between mb-2">
    <h5>Return/Refund Items:</h5>
    <a href="{{route('profile.edit', ['profile_activetab' => 'returnrefund'])}}" class="btn bg-primary text-light p-2 rounded mt-0">
        <i class="bi bi-arrow-clockwise">Refresh</i>
    </a>
</div>

<div class="card text-center">
    <div class="card-header">
        <div class="row mx-1 mb-2 align-items-center text-center">
            <div class="col-1 p-0">#</div>
            <div class="col-1 p-0">Shop</div>
            <div class="col-3 p-0">Product</div>
            <div class="col-3 p-0">Status</div>
            <div class="col-2 p-0">Agreement</div>
            <div class="col-1 p-0">Actions</div>
            <div class="col-1 p-0">Details</div>
        </div>
    </div>
    <div class="card-body">
        @foreach ($user->item_returnrefund_infos as $key => $item_returnrefund_info)
            <div class="accordion accordion-flush" id="accordionFlush">
                <div class="accordion-item border">
                    <h2 class="accordion-header">
                        <div class="row mx-1 mb-2 align-items-center text-center text-sm">
                            <div class="col-1 p-0">
                                {{$item_returnrefund_info->id}}
                            </div>
                            <div class="col-1 p-0">
                                {{$item_returnrefund_info->seller->shop_name}}
                            </div>
                            <div class="col-3 p-0">
                                {{$item_returnrefund_info->purchase_item->product->title}}
                            </div>
                            <div class="col-3 p-0">
                                {{$item_returnrefund_info->status}}
                            </div>
                            <div class="col-2 p-0">
                                {{$item_returnrefund_info->refund_option}}
                            </div>
                            <div class="col-1 p-0">
                                <button type="button"
                                    class="bg-blue-500 hover:bg-blue-700 text-white p-2 rounded w-full">
                                    test
                                </button>
                            </div>
                            <div class="col-1">
                                <button class="accordion-button collapsed d-block bg-secondary-subtle text-center my-3 py-1 rounded" id="trackAccordion"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-{{$key}}" aria-expanded="false"
                                    aria-controls="collapse-{{$key}}">
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                            </div>
                        </div>
                    </h2>
                </div> {{-- accordion header --}}

                <div id="collapse-{{$key}}" class="accordion-collapse collapse"
                    data-bs-parent="#accordionFlush">
                    <div class="accordion-body bg-secondary-subtle p-2">
                        Details here
                    </div> {{-- accordion items --}}
                </div>
            </div>{{-- accordionFlush --}}
        @endforeach
    </div>
    <div class="card-footer text-body-secondary">
        2 days ago
    </div>
</div>
