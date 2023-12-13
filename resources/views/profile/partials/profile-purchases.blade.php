
<div class="d-flex justify-content-between mb-2">
    <h5>Purchase History:</h5>
    <a href="{{route('profile.edit', ['profile_activetab' => 'purchases'])}}" class="btn bg-primary text-light p-2 rounded mt-0">
        <i class="bi bi-arrow-clockwise">Refresh</i>
    </a>
</div>

<div class="card text-center mb-10">
    <div class="card-body px-0">
        <div class="row">
            <div class="col">
                <div class="nav nav-underline nav-fill bg-dark p-2">
                    <a class="nav-item nav-link text-light active" data-toggle="tab" href="#pending-tab">
                        Pending
                        <span class="position-absolute badge rounded-pill bg-danger ml-1">
                            {{ count($user->purchase->where('purchase_status', 'pending')) + count($user->purchase->where('purchase_status', 'to_ship')) }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                    <a class="nav-item nav-link text-light" data-toggle="tab" href="#shipping-tab">
                        Shipping
                        <span class="position-absolute badge rounded-pill bg-danger ml-1">
                            {{ count($user->purchase->where('purchase_status', 'shipping')) }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                    <a class="nav-item nav-link text-light" data-toggle="tab" href="#completed-tab">
                        Completed
                        <span class="position-absolute badge rounded-pill bg-success ml-1">
                            {{ count($user->purchase->where('purchase_status', 'completed')) }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                </div>
            </div>

            <div class="tab-content mt-4">
                {{-- pending tab content --}}
                <div class="tab-pane fade py-2 px-2 show active" id="pending-tab">
                    @if (count($user->purchase->where('purchase_status', 'pending')) == 0)
                        <div class="mb-4">
                            You have no pending orders yet <i class="bi bi-chevron-double-right"></i>
                            <a href="{{ route('index_shop') }}"> Start shopping </a>
                        </div>
                    @else
                        <div class="row mx-1 mb-2 align-items-center">
                            <div class="col-2 p-0">
                                Reference #
                            </div>
                            <div class="col-3 p-0">
                                Shop
                            </div>
                            <div class="col-1 p-0">
                                # of Items
                            </div>
                            <div class="col-2 p-0">
                                Total Price
                            </div>
                            <div class="col-1 p-0">
                                Payment
                            </div>
                            <div class="col-3 p-0">
                                Date Purchased
                            </div>
                        </div>
                    @endif

                    @foreach ($user->purchase as $key => $purchase)
                        @if ($purchase->purchase_status == 'pending' || $purchase->purchase_status == 'to_ship')
                            <div class="accordion accordion-flush" id="accordionFlushPending">
                                <div class="accordion-item border">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed d-block py-2" id="trackAccordion"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapsePending-{{ $key }}" aria-expanded="false"
                                            aria-controls="collapsePending-{{ $key }}">
                                            <div class="row text-center">
                                                <div class="col-2">
                                                    {{ $purchase->reference_number }}
                                                </div>
                                                <div class="col-3">
                                                    {{ $purchase->seller->shop_name }}
                                                </div>
                                                <div class="col-1">
                                                    {{ count($purchase->purchase_items) }}
                                                </div>
                                                <div class="col-2">
                                                    ₱{{ $purchase->total_amount }}
                                                </div>
                                                <div class="col-1">
                                                    {{ $purchase->payment->payment_type }}
                                                </div>
                                                <div class="col-3">
                                                    {{ date('m-d-y (h:i a)', strtotime($purchase->purchase_date)) }}
                                                </div>
                                                <i class="bi bi-chevron-compact-down text-primary"></i>
                                            </div>
                                        </button>
                                    </h2>
                                </div> {{-- accordion header --}}

                                <div id="collapsePending-{{ $key }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushPending">
                                    <div class="accordion-body bg-secondary-subtle p-2">
                                        <div class="flex justify-content-between">
                                            @if ($purchase->purchase_status == 'pending')
                                                <h6 class="my-auto ml-4">Status: Pending order</h6>
                                            @elseif ($purchase->purchase_status == 'to_ship')
                                                <h6 class="my-auto ml-4">Status: Preparing order for shipment</h6>
                                            @endif
                                            <!-- Button trigger modal -->
                                            <button type="button" class="mt-2 mb-3 bg-red-500 hover:bg-red-700 text-white p-2 rounded" data-bs-toggle="modal" data-bs-target="#requestCancelModal{{$key}}">
                                                Cancel Order
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="requestCancelModal{{$key}}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modalLabel"><i class="bi bi-exclamation-triangle-fill"></i> Confirmation</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start mx-2">
                                                    <p class="text-gray-500 text-center mx-2">Reference Number: {{$purchase->reference_number}}</p>
                                                    Are you sure you want to cancel this order from {{ $purchase->seller->shop_name }}?
                                                    <div class="mx-2 mt-2">
                                                        Items:
                                                        @foreach ($purchase->purchase_items as $purchase_item)
                                                            <div class="mx-4">
                                                                - {{$purchase_item->product->title}}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                    <form action="{{route('profile.request_cancel_order')}}" method="POST">
                                                        @csrf
                                                        <input type="text" name="purchase_id" value="{{ $purchase->id }}" hidden>
                                                        <input type="text" name="user_id" value="{{ $user->id }}" hidden>
                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        @foreach ($purchase->purchase_items as $purchase_item)
                                            <div class="visually-hidden">
                                                {{ $product = App\Models\Product::find($purchase_item->product_id) }}
                                            </div>
                                            <div class="card my-2">
                                                <div class="row g-0" style="height: 65px">
                                                    <div class="col-md-1 justify-content-end">
                                                        <img src="{{ asset($product->product_images[0]->image_paths) }}"
                                                            class="img-fluid rounded-start mx-auto d-block p-2"
                                                            alt="" style="max-height: 60px">
                                                    </div>
                                                    <div class="col-md-11">
                                                        <div class="card-body py-2 lh-1">
                                                            <div class="card-title d-flex p-2">
                                                                <div class="col-5 text-start">
                                                                    <h5>{{ $product->title }}</h5>
                                                                </div>
                                                                <div class="col-3 text-start">
                                                                    <h6>
                                                                        Quantity: {{ $purchase_item->quantity }}
                                                                    </h6>
                                                                </div>
                                                                <div class="col-4 text-start">
                                                                    <h4>₱{{ $purchase_item->total_price }}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div> {{-- accordion items --}}
                                </div>
                            </div>{{-- accordionFlush --}}
                        @endif
                    @endforeach
                </div> {{-- pending tab content --}}

                {{-- shipping tab content --}}
                <div class="tab-pane fade py-2 px-2" id="shipping-tab">
                    <h6 class="text-yellow-500 italic mb-4">You can not cancel orders anymore after
                        shipment <i class="bi bi-exclamation-triangle-fill"></i>
                        <p class="text-gray-500">Please read our <a href="{{route('shipping-return-policy')}}">policy</a>.</p>
                    </h6>
                    @if (count($user->purchase->where('purchase_status', 'shipping')) == 0)
                        <div class="mb-4">
                            You have no shipping orders.
                        </div>
                    @else
                        <hr>
                        <div class="row mx-1 mb-2 align-items-center">
                            <div class="col-2 p-0">
                                Reference #
                            </div>
                            <div class="col-2 p-0">
                                Shop
                            </div>
                            <div class="col-1 p-0">
                                # of Items
                            </div>
                            <div class="col-2 p-0">
                                Total Price
                            </div>
                            <div class="col-1 p-0">
                                Payment
                            </div>
                            <div class="col-2 p-0">
                                Shipment Date
                            </div>
                            <div class="col-2 p-0">
                                Est. Arrival
                            </div>
                        </div>
                    @endif

                    @foreach ($user->purchase as $key => $purchase)
                        @if ($purchase->purchase_status == 'shipping')
                            <div class="accordion accordion-flush" id="accordionFlushShipping">
                                <div class="accordion-item border">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed d-block py-2" id="trackAccordion"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseShipping-{{ $key }}" aria-expanded="false"
                                            aria-controls="collapseShipping-{{ $key }}">
                                            <div class="row text-center">
                                                <div class="col-2">
                                                    {{ $purchase->reference_number }}
                                                </div>
                                                <div class="col-2">
                                                    {{ $purchase->seller->shop_name }}
                                                </div>
                                                <div class="col-1">
                                                    {{ count($purchase->purchase_items) }}
                                                </div>
                                                <div class="col-2">
                                                    ₱{{ $purchase->total_amount }}
                                                </div>
                                                <div class="col-1">
                                                    {{ $purchase->payment->payment_type }}
                                                </div>
                                                <div class="col-2">
                                                    {{ date('m-d-y (h:i a)', strtotime($purchase->shipment->start_date)) }}
                                                </div>
                                                <div class="col-2">
                                                    {{ date('m-d-y', strtotime($purchase->shipment->start_date)) }}(sample)
                                                </div>
                                                <i class="bi bi-chevron-compact-down text-primary"></i>
                                            </div>
                                        </button>
                                    </h2>
                                </div> {{-- accordion header --}}

                                <div id="collapseShipping-{{ $key }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushShipping">
                                    <div class="accordion-body bg-secondary-subtle p-2">
                                        @foreach ($purchase->purchase_items as $purchase_item)
                                            <div class="visually-hidden">
                                                {{ $product = App\Models\Product::find($purchase_item->product_id) }}
                                            </div>
                                            <div class="card my-2">
                                                <div class="row g-0" style="height: 65px">
                                                    <div class="col-md-1 justify-content-end">
                                                        <img src="{{ asset($product->product_images[0]->image_paths) }}"
                                                            class="img-fluid rounded-start mx-auto d-block p-2"
                                                            alt="" style="max-height: 60px">
                                                    </div>
                                                    <div class="col-md-11">
                                                        <div class="card-body py-2 lh-1">
                                                            <div class="card-title d-flex p-2">
                                                                <div class="col-5 text-start">
                                                                    <h5>{{ $product->title }}</h5>
                                                                </div>
                                                                <div class="col-3 text-start">
                                                                    <h6>
                                                                        Quantity: {{ $purchase_item->quantity }}
                                                                    </h6>
                                                                </div>
                                                                <div class="col-4 text-start">
                                                                    <h4>₱{{ $purchase_item->total_price }}</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div> {{-- accordion items --}}
                                </div>
                            </div>{{-- accordionFlush --}}
                        @endif
                    @endforeach
                </div>

                {{-- completed tab content --}}
                <div class="tab-pane fade py-2 px-2" id="completed-tab">
                    @if (count($user->purchase->where('purchase_status', 'completed')) == 0)
                        <div class="mb-4">
                            You have no completed order yet.
                        </div>
                    @else
                        <div class="row mx-1 mb-2 align-items-center">
                            <div class="col-2 p-0">
                                Reference #
                            </div>
                            <div class="col-2 p-0">
                                Shop
                            </div>
                            <div class="col-1 p-0">
                                # of Items
                            </div>
                            <div class="col-2 p-0">
                                Total Price
                            </div>
                            <div class="col-1 p-0">
                                Payment
                            </div>
                            <div class="col-2 p-0">
                                Shipment Date
                            </div>
                            <div class="col-2 p-0">
                                Arrival Date
                            </div>
                        </div>
                    @endif

                    @foreach ($user->purchase as $key => $purchase)
                        @if ($purchase->purchase_status == 'completed')
                            <div class="accordion accordion-flush" id="accordionFlushCompleted">
                                <div class="accordion-item border">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed d-block py-2" id="trackAccordion"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseCompleted-{{ $key }}" aria-expanded="false"
                                            aria-controls="collapseCompleted-{{ $key }}">
                                            <div class="row text-center">
                                                <div class="col-2">
                                                    {{ $purchase->reference_number }}
                                                </div>
                                                <div class="col-2">
                                                    {{ $purchase->seller->shop_name }}
                                                </div>
                                                <div class="col-1">
                                                    {{ count($purchase->purchase_items) }}
                                                </div>
                                                <div class="col-2">
                                                    ₱{{ $purchase->total_amount }}
                                                </div>
                                                <div class="col-1">
                                                    {{ $purchase->payment->payment_type }}
                                                </div>
                                                <div class="col-2">
                                                    {{ date('m-d-y (h:i a)', strtotime($purchase->shipment->start_date)) }}
                                                </div>
                                                <div class="col-2">
                                                    {{ date('m-d-y', strtotime($purchase->shipment->shipped_date)) }}
                                                </div>
                                                <i class="bi bi-chevron-compact-down text-primary"></i>
                                            </div>
                                        </button>
                                    </h2>
                                </div> {{-- accordion header --}}

                                <div id="collapseCompleted-{{ $key }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushCompleted">
                                    <div class="accordion-body bg-secondary-subtle p-2">
                                        @foreach ($purchase->purchase_items as $key => $purchase_item)
                                            <div class="visually-hidden">
                                                {{ $product = App\Models\Product::find($purchase_item->product_id) }}
                                            </div>
                                            <div class="card my-2">
                                                <div class="row g-0" style="height: 65px">
                                                    <div class="col-md-1 justify-content-end">
                                                        <img src="{{ asset($product->product_images[0]->image_paths) }}"
                                                            class="img-fluid rounded-end mx-auto d-block p-2"
                                                            alt="" style="max-height: 60px">
                                                    </div>
                                                    <div class="col-md-11">
                                                        <div class="card-body py-2 lh-1">
                                                            <div class="card-title d-flex p-2">
                                                                <div class="col-4 text-start">
                                                                    <h6>{{ $product->title }}</h6>
                                                                </div>
                                                                <div class="col-2 text-center">
                                                                    <h6>
                                                                        Quantity: {{ $purchase_item->quantity }}
                                                                    </h6>
                                                                </div>
                                                                <div class="col-2 text-center">
                                                                    <h5>₱{{ $purchase_item->total_price }}</h5>
                                                                </div>
                                                                <div class="col-2 text-center">
                                                                    <button type="button"
                                                                        class="bg-blue-500 hover:bg-blue-700 text-white p-2 rounded">
                                                                        Review Product
                                                                    </button>
                                                                </div>
                                                                @if ($purchase_item->item_returnrefund_info)
                                                                    <div class="col-2 text-center">
                                                                        <p class="text-red-500 text-sm"><i class="bi bi-info-square-fill"></i> Pending return/refund request</p>
                                                                    </div>
                                                                @else
                                                                    <div class="col-2 text-center">
                                                                        <!-- Button trigger modal -->
                                                                        <button type="button" class="bg-secondary text-light text-sm p-2 rounded" data-bs-toggle="modal" data-bs-target="#returnRefundModal{{$key}}">
                                                                            Return/Refund
                                                                        </button>

                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="returnRefundModal{{$key}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                                <div class="modal-content">
                                                                                    <form action="{{ route('profile.request_returnrefund') }}" method="POST" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <div class="modal-header">
                                                                                            <h1 class="modal-title fs-5" id="modalLabel">Reason for return/refund:</h1>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <div class="modal-body text-start mx-2">
                                                                                            <p class="text-gray-500 text-center mx-2">{{$purchase_item->product->title}}</p>
                                                                                            {{-- Are you sure you want to cancel this order from {{ $purchase->seller->shop_name }}? --}}
                                                                                            Please complete the following form in requesting a return/refund item to {{ $purchase->seller->shop_name }} shop.
                                                                                            <div class="mx-2 my-4" x-data="{lists: [{id: 1, name: 'Product Defect or Damage'}, {id: 2, name: 'Wrong Product Received'}, {id: 3, name: 'Not Compatible'}, {id: 4, name: 'Quality Concerns'}], reason: ''}">
                                                                                                <h4>Reason for return/refund:</h4>
                                                                                                <template x-for="list in lists" :key="list.id">
                                                                                                    <div class="form-check ml-4">
                                                                                                        <input class="form-check-input" x-model="reason" type="radio" :value="list.name" :id="list.name" required>
                                                                                                        <label :for="list.name" x-text="list.name"></label>
                                                                                                    </div>
                                                                                                </template>
                                                                                                <p>Selected value: <code x-text="reason"></code></p>
                                                                                            </div>
                                                                                            <div class="mx-2 my-4" x-data="{lists: [{id: 1, name: 'Original Packaging'}, {id: 2, name: 'Unused/Unworn'}], condition: ''}">
                                                                                                <h4>Condition of the product:</h4>
                                                                                                <template x-for="list in lists" :key="list.id">
                                                                                                    <div class="form-check ml-4">
                                                                                                        <input class="form-check-input" x-model="condition" type="radio" :value="list.name" :id="list.name" required>
                                                                                                        <label :for="list.name" x-text="list.name"></label>
                                                                                                    </div>
                                                                                                </template>
                                                                                                <p>Selected value: <code x-text="condition"></code></p>
                                                                                            </div>

                                                                                            <div class="mx-2 my-4">
                                                                                                <h4>Photographic evidence:</h4>
                                                                                                <small>You can select multiple images (5.12 MB max)</small>
                                                                                                <input type="file" class="form-control mt-2 @error('files') is-invalid @enderror" name="evidence_imgs[]" id="evidence_imgs" multiple required>
                                                                                                @error('evidence_imgs')
                                                                                                    <small class="text-red-500">{{$message}}</small>
                                                                                                @enderror
                                                                                            </div>

                                                                                            <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                                                                                            <input type="text" name="purchase_item_id" value="{{$purchase_item->id}}" hidden>

                                                                                            <div class="form-check ml-28">
                                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                                                                                <label class="form-check-label text-sm" for="flexCheckDefault">
                                                                                                    I have read and accept the <a href="#">Return/Refund Policy</a> of PR-Tech.
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                            <button type="submit" class="btn btn-danger">Submit</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div> {{-- accordion items --}}
                                </div>
                            </div>{{-- accordionFlush --}}
                        @endif
                    @endforeach
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
