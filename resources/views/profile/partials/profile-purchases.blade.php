<div class="d-flex justify-content-between mb-2">
    <h5>Purchase History:</h5>
    <a href="{{ route('profile.edit', ['profile_activetab' => 'purchases']) }}"
        class="btn bg-primary text-light p-2 rounded mt-0">
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

            <div class="tab-content">
                {{-- pending tab content --}}
                <div class="tab-pane bg-secondary-subtle fade py-4 px-2 show active" id="pending-tab">
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
                            <div class="accordion accordion-flush my-2 border rounded" id="accordionFlushPending">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed d-block py-2"
                                            id="trackAccordionPending" type="button" data-bs-toggle="collapse"
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
                                    <div class="accordion-body bg-light p-2">
                                        <div class="flex justify-content-between">
                                            @if ($purchase->purchase_status == 'pending')
                                                <h6 class="my-auto ml-4">Status: Pending order</h6>
                                            @elseif ($purchase->purchase_status == 'to_ship')
                                                <h6 class="my-auto ml-4">Status: Preparing order for shipment</h6>
                                            @endif
                                            <!-- Button trigger modal -->
                                            <button type="button"
                                                class="mt-2 mb-3 bg-red-500 hover:bg-red-700 text-white p-2 rounded"
                                                data-bs-toggle="modal"
                                                data-bs-target="#requestCancelModal-{{ $key }}-{{ $purchase->reference_number }}">
                                                Cancel Order
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade"
                                                id="requestCancelModal-{{ $key }}-{{ $purchase->reference_number }}"
                                                tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="modalLabel"><i
                                                                    class="bi bi-exclamation-triangle-fill"></i>
                                                                Confirmation</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-start mx-2">
                                                            <p class="text-gray-500 text-center mx-2">Reference
                                                                Number: {{ $purchase->reference_number }}</p>
                                                            Are you sure you want to cancel this order
                                                            from {{ $purchase->seller->shop_name }}?
                                                            <div class="mx-2 mt-2">
                                                                Items:
                                                                @foreach ($purchase->purchase_items as $purchase_item)
                                                                    <div class="mx-4">
                                                                        - {{ $purchase_item->product->title }}
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">No
                                                            </button>
                                                            <form action="{{ route('profile.request_cancel_order') }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="text" name="purchase_id"
                                                                    value="{{ $purchase->id }}" hidden>
                                                                <input type="text" name="user_id"
                                                                    value="{{ $user->id }}" hidden>
                                                                <input type="text" name="profile_activetab"
                                                                    value="purchases" hidden>

                                                                <button type="submit" class="btn btn-danger">Yes
                                                                </button>
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
                <div class="tab-pane bg-secondary-subtle fade py-4 px-2" id="shipping-tab">
                    <h6 class="text-yellow-700 italic mb-4">You can not cancel orders anymore after
                        shipment <i class="bi bi-exclamation-triangle-fill"></i>
                        <p class="text-gray-500">Please read our <a
                                href="{{ route('shipping-return-policy') }}">policy</a>.</p>
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
                                Shipment Fee
                            </div>
                            <div class="col-1 p-0">
                                Payment
                            </div>
                            <div class="col-2 p-0">
                                Shipment Date
                            </div>
                            <div class="col-1 p-0">
                                Est. Arrival
                            </div>
                        </div>
                    @endif

                    @foreach ($user->purchase as $key => $purchase)
                        @if ($purchase->purchase_status == 'shipping')
                            <div class="accordion accordion-flush my-2 border rounded" id="accordionFlushShipping">
                                <div class="accordion-item border">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed d-block py-2"
                                            id="trackAccordionShipping" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseShipping-{{ $key }}"
                                            aria-expanded="false"
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
                                                    ₱{{ $purchase->shipping_fee }}
                                                </div>
                                                <div class="col-1">
                                                    {{ $purchase->payment->payment_type }}
                                                </div>
                                                <div class="col-2">
                                                    {{ date('m-d-y (h:i a)', strtotime($purchase->shipment->start_date)) }}
                                                </div>
                                                <div class="col-1">
                                                    {{ $date = date('m-d-y', strtotime($purchase->shipment->start_date . ' +3 days')) }}
                                                </div>
                                                <i class="bi bi-chevron-compact-down text-primary"></i>
                                            </div>
                                        </button>
                                    </h2>
                                </div> {{-- accordion header --}}

                                <div id="collapseShipping-{{ $key }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushShipping">
                                    <div class="accordion-body bg-light p-2">
                                        <form action="{{ route('status-order-update') }}" method="post">
                                            @method('PATCH')
                                            @csrf
                                            <div class="w-full text-end">
                                                <label>
                                                    <input type="text" name="purchase_id" value="{{ $purchase->id }}" hidden>
                                                </label>
                                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white text-sm p-2 px-4 rounded">
                                                    Arrive
                                                </button>
                                            </div>
                                        </form>
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
                                                                <div class="col-7 text-start">
                                                                    <h5>{{ $product->title }}</h5>
                                                                </div>
                                                                <div class="col-3 text-start">
                                                                    <h6>
                                                                        Quantity: {{ $purchase_item->quantity }}
                                                                    </h6>
                                                                </div>
                                                                <div class="col-2 text-start">
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
                <div class="tab-pane bg-secondary-subtle fade py-4 px-2" id="completed-tab">
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
                                Shipment Fee
                            </div>
                            <div class="col-1 p-0">
                                Payment
                            </div>
                            <div class="col-2 p-0">
                                Shipment Date
                            </div>
                            <div class="col-1 p-0">
                                Arrival Date
                            </div>
                        </div>
                    @endif

                    @foreach ($user->purchase as $key => $purchase)
                        @if ($purchase->purchase_status == 'completed')
                            <div class="accordion accordion-flush my-2 border rounded" id="accordionFlushCompleted">
                                <div class="accordion-item border">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed d-block py-2"
                                            id="trackAccordionCompleted-{{ $key }}" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapseCompleted-{{ $key }}"
                                            aria-expanded="false"
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
                                                    ₱{{ $purchase->shipping_fee }}
                                                </div>
                                                <div class="col-1">
                                                    {{ $purchase->payment->payment_type }}
                                                </div>
                                                <div class="col-2">
                                                    {{ date('m-d-y (h:i a)', strtotime($purchase->shipment->start_date)) }}
                                                </div>
                                                <div class="col-1">
                                                    {{ date('m-d-y', strtotime($purchase->shipment->shipped_date)) }}
                                                </div>
                                                <i class="bi bi-chevron-compact-down text-primary"></i>
                                            </div>
                                        </button>
                                    </h2>
                                </div> {{-- accordion header --}}

                                <div id="collapseCompleted-{{ $key }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushCompleted">
                                    <div class="accordion-body bg-light p-2">
                                        @foreach ($purchase->purchase_items as $key => $purchase_item)
                                            <div class="card my-2">
                                                <div class="row g-0" style="height: 65px">
                                                    <div class="col-1 justify-content-end">
                                                        <img src="{{ asset($purchase_item->product->product_images[0]->image_paths) }}"
                                                            class="img-fluid rounded-end mx-auto d-block p-2"
                                                            alt="" style="max-height: 60px">
                                                    </div>
                                                    <div class="col-md-11">
                                                        <div class="card-body py-2 lh-1">
                                                            <div class="card-title d-flex p-2">
                                                                <div class="col-4 text-start">
                                                                    <a href="{{route('collections-details', ['product_id' => $purchase_item->product->id, 'category' => $purchase_item->product->category])}}">
                                                                        <h6>{{ $purchase_item->product->title }}</h6>
                                                                    </a>
                                                                </div>
                                                                <div class="col-2 text-center">
                                                                    <h6>
                                                                        Quantity: {{ $purchase_item->quantity }}
                                                                    </h6>
                                                                </div>
                                                                <div class="col-2 text-center">
                                                                    <h5>₱{{ $purchase_item->total_price }}</h5>
                                                                </div>
                                                                <div class="col-2 text-center" x-data="{ isOpen: false }">
                                                                    @if ($purchase_item->comment_id)
                                                                        <p class="text-blue-600 text-sm">
                                                                            <i class="bi bi-check2-circle"></i> Product Review Completed
                                                                        </p>
                                                                    @else
                                                                        <button @click="isOpen = !isOpen" type="button" class="bg-blue-500 hover:bg-blue-700 text-white p-2 rounded w-full">
                                                                            Review Product
                                                                        </button>
                                                                    @endif

                                                                    @livewire('leave_review', ['purchase_item_id' => $purchase_item->id], key($purchase_item->id))
                                                                </div>
                                                                <div class="col-2 text-center">
                                                                    @if ($purchase_item->item_returnrefund_info)
                                                                        @if ($purchase_item->item_returnrefund_info->status == 'returnrefund-pending')
                                                                            <p class="text-red-500 text-sm"><i class="bi bi-info-square-fill"></i>
                                                                                Pending return/refund request</p>
                                                                        @elseif ($purchase_item->item_returnrefund_info->status == 'returnrefund-completed')
                                                                            <p class="text-green-600 text-sm">
                                                                                <i class="bi bi-check2-circle"></i> Return/Refund Completed
                                                                            </p>
                                                                        @else
                                                                            <a class="btn bg-secondary text-light p-2 rounded"
                                                                                href="{{ route('profile.edit', ['profile_activetab' => 'returnrefund']) }}">
                                                                                <p class="text-sm mb-0">Processing
                                                                                    <sup><i
                                                                                            class="bi bi-box-arrow-up-right"></i></sup>
                                                                                </p>
                                                                            </a>
                                                                        @endif
                                                                    @else
                                                                        <!-- Button trigger modal -->
                                                                        <button type="button"
                                                                            class="bg-secondary-subtle text-sm p-2 rounded"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#returnRefundModal-{{ $key }}-{{ $purchase_item->purchase->reference_number }}">
                                                                            Return/Refund
                                                                        </button>

                                                                        <!-- Modal -->
                                                                        <div class="modal fade"
                                                                            id="returnRefundModal-{{ $key }}-{{ $purchase_item->purchase->reference_number }}"
                                                                            data-bs-backdrop="static"
                                                                            data-bs-keyboard="false" tabindex="-1"
                                                                            aria-labelledby="modalLabel"
                                                                            aria-hidden="true">
                                                                            <div
                                                                                class="modal-dialog modal-dialog-centered modal-lg">
                                                                                <div class="modal-content">
                                                                                    <form
                                                                                        action="{{ route('profile.request_returnrefund') }}"
                                                                                        method="POST"
                                                                                        enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <div class="modal-header">
                                                                                            <h1 class="modal-title fs-5"
                                                                                                id="modalLabel">Reason
                                                                                                for return/refund:</h1>
                                                                                            <button type="button"
                                                                                                class="btn-close"
                                                                                                data-bs-dismiss="modal"
                                                                                                aria-label="Close"></button>
                                                                                        </div>
                                                                                        <div
                                                                                            class="modal-body text-start mx-4">
                                                                                            <p
                                                                                                class="text-gray-500 text-center text-lg mx-2">
                                                                                                {{ $purchase_item->product->title }}
                                                                                            </p>
                                                                                            {{-- Are you sure you want to cancel this order from {{ $purchase->seller->shop_name }}? --}}
                                                                                            Please complete thefollowing form in requestinga return/refund itemto
                                                                                            {{ $purchase->seller->shop_name }}shop.
                                                                                            @if ($purchase_item->quantity > 1)
                                                                                                <div class="mx-2 my-2">
                                                                                                    <h5>Quantity of the product for return/refund:</h5>
                                                                                                    <div class="mx-5">
                                                                                                        <div>
                                                                                                            <label for="return_refund_quantity" class="form-label d-flex flex-row justify-content-between gap-5 text-xl text-gray-900 w-full">
                                                                                                                @for ($i = 1; $i <= $purchase_item->quantity; $i++)
                                                                                                                    <div>
                                                                                                                        {{$i}}
                                                                                                                    </div>
                                                                                                                @endfor
                                                                                                            </label>
                                                                                        
                                                                                                            <input type="range" name="item_quantity" class="form-range" min="1" max="{{$purchase_item->quantity}}" id="return_refund_quantity" required>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            @endif
                                                                                            <div class="mx-2 my-2">
                                                                                                <h5>Reason for
                                                                                                    return/refund:</h5>
                                                                                                <div class="ml-4">
                                                                                                    <div
                                                                                                        class="form-check">
                                                                                                        <input
                                                                                                            class="form-check-input"
                                                                                                            type="radio"
                                                                                                            name="reason"
                                                                                                            id="reason1-{{ $key }}-{{ $purchase->id }}"
                                                                                                            value="Product Defect or Damage"
                                                                                                            required>
                                                                                                        <label
                                                                                                            class="form-check-label"
                                                                                                            for="reason1-{{ $key }}-{{ $purchase->id }}">
                                                                                                            Product
                                                                                                            Defect or
                                                                                                            Damage
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="form-check">
                                                                                                        <input
                                                                                                            class="form-check-input"
                                                                                                            type="radio"
                                                                                                            name="reason"
                                                                                                            id="reason2-{{ $key }}-{{ $purchase->id }}"
                                                                                                            value="Wrong Product Received"
                                                                                                            required>
                                                                                                        <label
                                                                                                            class="form-check-label"
                                                                                                            for="reason2-{{ $key }}-{{ $purchase->id }}">
                                                                                                            Wrong
                                                                                                            Product
                                                                                                            Received
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="form-check">
                                                                                                        <input
                                                                                                            class="form-check-input"
                                                                                                            type="radio"
                                                                                                            name="reason"
                                                                                                            id="reason3-{{ $key }}-{{ $purchase->id }}"
                                                                                                            value="Product Not Compatible"
                                                                                                            required>
                                                                                                        <label
                                                                                                            class="form-check-label"
                                                                                                            for="reason3-{{ $key }}-{{ $purchase->id }}">
                                                                                                            Product Not
                                                                                                            Compatible
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="form-check">
                                                                                                        <input
                                                                                                            class="form-check-input"
                                                                                                            type="radio"
                                                                                                            name="reason"
                                                                                                            id="reason4-{{ $key }}-{{ $purchase->id }}"
                                                                                                            value="Quality Concerns"
                                                                                                            required>
                                                                                                        <label
                                                                                                            class="form-check-label"
                                                                                                            for="reason4-{{ $key }}-{{ $purchase->id }}">
                                                                                                            Quality
                                                                                                            Concerns
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="mx-2 my-4">
                                                                                                <h5>Condition of the
                                                                                                    product:</h5>
                                                                                                <div class="ml-4">
                                                                                                    <div
                                                                                                        class="form-check">
                                                                                                        <input
                                                                                                            class="form-check-input"
                                                                                                            type="radio"
                                                                                                            name="condition"
                                                                                                            id="condition1-{{ $key }}-{{ $purchase->id }}"
                                                                                                            value="Original Packaging"
                                                                                                            required>
                                                                                                        <label
                                                                                                            class="form-check-label"
                                                                                                            for="condition1-{{ $key }}-{{ $purchase->id }}">
                                                                                                            Original
                                                                                                            Packaging
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="form-check">
                                                                                                        <input
                                                                                                            class="form-check-input"
                                                                                                            type="radio"
                                                                                                            name="condition"
                                                                                                            id="condition2-{{ $key }}-{{ $purchase->id }}"
                                                                                                            value="Unused/Unworn"
                                                                                                            required>
                                                                                                        <label
                                                                                                            class="form-check-label"
                                                                                                            for="condition2-{{ $key }}-{{ $purchase->id }}">
                                                                                                            Unused/Unworn
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="mx-2 my-4">
                                                                                                <h5>Photographic
                                                                                                    evidence:</h5>
                                                                                                <small>You can select
                                                                                                    multiple images
                                                                                                    (5.12 MB
                                                                                                    max)
                                                                                                </small>
                                                                                                <input type="file"
                                                                                                    class="form-control mt-2 @error('files') is-invalid @enderror"
                                                                                                    name="evidence_imgs[]"
                                                                                                    id="evidence_imgs-{{ $key }}-{{ $purchase->id }}"
                                                                                                    multiple required>
                                                                                                @error('evidence_imgs')
                                                                                                    <small
                                                                                                        class="text-red-500">{{ $message }}</small>
                                                                                                @enderror
                                                                                            </div>
                                                                                            <input type="text"
                                                                                                name="user_id"
                                                                                                value="{{ Auth::user()->id }}"
                                                                                                hidden>
                                                                                            <input type="text"
                                                                                                name="purchase_item_id"
                                                                                                value="{{ $purchase_item->id }}"
                                                                                                hidden>
                                                                                            <input type="text"
                                                                                                name="profile_activetab"
                                                                                                value="purchases"
                                                                                                hidden>

                                                                                            <div
                                                                                                class="form-check ml-28">
                                                                                                <input
                                                                                                    class="form-check-input"
                                                                                                    type="checkbox"
                                                                                                    value=""
                                                                                                    id="accept_policy-{{ $key }}-{{ $purchase->id }}"
                                                                                                    required>
                                                                                                <label
                                                                                                    class="form-check-label text-sm"
                                                                                                    for="accept_policy-{{ $key }}-{{ $purchase->id }}">
                                                                                                    I have read and
                                                                                                    accept the <a
                                                                                                        href="{{ route('shipping-return-policy') }}">Return/Refund
                                                                                                        Policy</a> of
                                                                                                    PR-Tech.
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-bs-dismiss="modal">
                                                                                                Cancel
                                                                                            </button>
                                                                                            <button type="submit"
                                                                                                class="btn btn-danger">
                                                                                                Submit
                                                                                            </button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
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

            </div>
        </div>
    </div>
    <div class="card-footer text-body-secondary">
        {{-- <nav aria-label="track_order_pagination">
            <ul class="pagination pagination-sm m-0 justify-content-center">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav> --}}
    </div>
</div>
