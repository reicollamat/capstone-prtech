<div class="d-flex justify-content-between mb-2">
    <h5>Return/Refund Items:</h5>
    <a href="{{route('profile.edit', ['profile_activetab' => 'returnrefund'])}}" class="btn bg-primary text-light p-2 rounded mt-0">
        <i class="bi bi-arrow-clockwise">Refresh</i>
    </a>
</div>

<div class="card mb-10">
    <div class="card-header">
        <div class="row mx-1 mb-2 align-items-center text-start">
            <div class="col-1 p-0 text-center">#</div>
            <div class="col-1 p-0 text-start">Shop</div>
            <div class="col-3 p-0">Product</div>
            <div class="col-2 p-0">Status</div>
            <div class="col-2 p-0 text-center">Agreement</div>
            <div class="col-2 p-0 text-center">Actions</div>
            <div class="col-1 p-0 text-center">Details</div>
        </div>
    </div>
    <div class="card-body bg-secondary-subtle">
        @foreach ($user->item_returnrefund_infos as $key => $item_returnrefund_info)
            <div class="accordion accordion-flush my-3 border rounded" id="accordionFlush">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <div class="row mx-1 mb-2 align-items-center text-start text-sm">
                            <div class="col-1 p-0 text-center">
                                {{$item_returnrefund_info->id}}
                            </div>
                            <div class="col-1 p-0 text-start">
                                {{$item_returnrefund_info->seller->shop_name}}
                            </div>
                            <div class="col-3 p-0">
                                {{$item_returnrefund_info->purchase_item->product->title}}
                            </div>

                            {{-- Status --}}
                            <div class="col-2 p-0">
                                @if ($item_returnrefund_info->status == 'returnrefund-pending')
                                    <div class="col-span-2 my-auto !text-gray-500 !font-light">
                                        <i class="bi bi-hourglass-split"></i> Request Pending
                                    </div>
                                @elseif ($item_returnrefund_info->status == 'returnrefund-agreement')
                                    <div class="col-span-2 my-auto !text-blue-500 !font-light">
                                        <i class="bi bi-exclamation-square-fill"></i> Waiting for your confirmation
                                    </div>
                                @elseif ($item_returnrefund_info->status == 'returnrefund-approved')
                                    @if ($item_returnrefund_info->refund_option == 'return_product')
                                        <div class="col-span-2 my-auto !text-blue-500 !font-light">
                                            <i class="bi bi-box-seam-fill"></i> Please prepare return product for shipment
                                        </div>
                                    @elseif ($item_returnrefund_info->refund_option == 'partial_refund')
                                        <div class="col-span-2 my-auto !text-green-500 !font-light">
                                            <i class="bi bi-exclamation-square-fill"></i> Please wait for your partial refund payment
                                        </div>
                                    @elseif ($item_returnrefund_info->refund_option == 'full_refund')
                                        <div class="col-span-2 my-auto !text-green-500 !font-light">
                                            <i class="bi bi-exclamation-square-fill"></i> Please wait for your full refund payment
                                        </div>
                                    @elseif ($item_returnrefund_info->refund_option == 'replacement')
                                        <div class="col-span-2 my-auto !text-blue-500 !font-light">
                                            <i class="bi bi-box-seam-fill"></i> Please prepare replacement product for shipment
                                        </div>
                                    @else
                                        {{--  --}}
                                    @endif
                                @elseif ($item_returnrefund_info->status == 'returnrefund-shipping')
                                    <div class="col-span-2 my-auto !text-gray-600 !font-light">
                                        <i class="bi bi-truck"></i> Shipping
                                    </div>
                                @elseif ($item_returnrefund_info->status == 'returnrefund-inspection')
                                    <div class="col-span-2 my-auto !text-gray-600 !font-light">
                                        <i class="bi bi-search"></i> Replacement Inspection
                                    </div>
                                @elseif ($item_returnrefund_info->status == 'returnrefund-shipping_replace')
                                    <div class="col-span-2 my-auto !text-gray-600 !font-light">
                                        <i class="bi bi-truck"></i> Shipping replacement
                                    </div>
                                @elseif ($item_returnrefund_info->status == 'returnrefund-completed')
                                    <div class="col-span-2 my-auto !text-green-600 !font-light">
                                        <i class="bi bi-check2-circle"></i> Request Completed
                                    </div>
                                @elseif ($item_returnrefund_info->status == 'returnrefund-rejected')
                                    <div class="col-span-2 my-auto !text-red-600 !font-light">
                                        <i class="bi bi-ban"></i> Request Rejeted
                                    </div>
                                @else
                                    <div class="col-span-2 my-auto !text-gray-500 !font-light">
                                        <i class="bi bi-exclamation-square-fill"></i> {{$item_returnrefund_info->status}}
                                    </div>
                                @endif
                            </div>

                            {{-- Agreement --}}
                            <div class="col-2 p-0 text-center">
                                @if ($item_returnrefund_info->status == 'returnrefund-pending')
                                    <div class="col-span-2 my-auto !text-gray-500 text-lg !font-light">
                                        <i class="bi bi-hourglass-split"></i>
                                    </div>
                                @elseif ($item_returnrefund_info->refund_option == 'return_product')
                                    <div class="col-span-2 my-auto !text-gray-900 !font-black">
                                        Return Product
                                    </div>
                                @elseif ($item_returnrefund_info->refund_option == 'partial_refund')
                                    <div class="col-span-2 my-auto !text-gray-900 !font-black">
                                        Partial Refund without Return
                                    </div>
                                @elseif ($item_returnrefund_info->refund_option == 'full_refund')
                                    <div class="col-span-2 my-auto !text-gray-900 !font-black">
                                        Full Refund without Return
                                    </div>
                                @elseif ($item_returnrefund_info->refund_option == 'replacement')
                                    <div class="col-span-2 my-auto !text-gray-900 !font-black">
                                        Replacement or Exchange
                                    </div>
                                @else
                                    <div class="col-span-2 my-auto !text-gray-500 !font-black">
                                        {{$item_returnrefund_info->refund_option}}
                                    </div>
                                @endif
                            </div>

                            {{-- Actions --}}
                            <div class="col-2 p-0 pt-2 text-center">
                                @if ($item_returnrefund_info->status == 'returnrefund-pending')
                                    <button type="button" class="bg-red-500 hover:bg-red-700 text-white p-2 rounded w-full" data-bs-toggle="modal" data-bs-target="#cancelRequest-{{$key}}">
                                        Cancel Request
                                    </button>
                                @elseif ($item_returnrefund_info->status == 'returnrefund-agreement')
                                    <div class="my-2">
                                        <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white p-2 rounded w-full mb-2" data-bs-toggle="modal" data-bs-target="#confirmAgreement-{{$key}}">
                                            Confirm Agreement
                                        </button>
                                        <button type="button" class="bg-red-500 hover:bg-red-700 text-white p-2 rounded w-full" data-bs-toggle="modal" data-bs-target="#cancelRequest-{{$key}}">
                                            Cancel
                                        </button>
                                    </div>
                                @elseif ($item_returnrefund_info->status == 'returnrefund-approved')
                                        @if ($item_returnrefund_info->refund_option == 'return_product')
                                            <form action="{{route('profile.shipping_returnrefund')}}" method="POST">
                                                @csrf
                                                <div class="my-2">
                                                    <input type="text" name="item_returnrefund_id" value="{{ $item_returnrefund_info->id }}" hidden>
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white p-2 rounded w-full mb-2">
                                                        Ship back to seller
                                                    </button>
                                                </div>
                                            </form>
                                        @elseif ($item_returnrefund_info->refund_option == 'partial_refund')
                                            <form action="{{route('profile.refundcompleted_returnrefund')}}" method="POST">
                                                @csrf
                                                <div class="my-2">
                                                    <input type="text" name="item_returnrefund_id" value="{{ $item_returnrefund_info->id }}" hidden>
                                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white p-2 rounded w-full mb-2">
                                                        <i class="bi bi-credit-card-2-back-fill"></i> Refund Received
                                                    </button>
                                                </div>
                                            </form>
                                        @elseif ($item_returnrefund_info->refund_option == 'full_refund')
                                            <form action="{{route('profile.refundcompleted_returnrefund')}}" method="POST">
                                                @csrf
                                                <div class="my-2">
                                                    <input type="text" name="item_returnrefund_id" value="{{ $item_returnrefund_info->id }}" hidden>
                                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white p-2 rounded w-full mb-2">
                                                        <i class="bi bi-credit-card-2-back-fill"></i> Refund Received
                                                    </button>
                                                </div>
                                            </form>
                                        @elseif ($item_returnrefund_info->refund_option == 'replacement')
                                            <form action="{{route('profile.shipping_returnrefund')}}" method="POST">
                                                @csrf
                                                <div class="my-2">
                                                    <input type="text" name="item_returnrefund_id" value="{{ $item_returnrefund_info->id }}" hidden>
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white p-2 rounded w-full mb-2">
                                                        Ship Back to Seller
                                                    </button>
                                                </div>
                                            </form>
                                        @else
                                            {{--  --}}
                                        @endif
                                @elseif ($item_returnrefund_info->status == 'returnrefund-shipping')
                                    <div class="col-span-2 my-auto !text-gray-500 text-lg !font-light">
                                        ...<i class="bi bi-truck"></i>
                                    </div>
                                @elseif ($item_returnrefund_info->status == 'returnrefund-inspection')
                                    <div class="col-span-2 my-auto !text-gray-500 text-lg !font-light">
                                        <i class="bi bi-search"></i>
                                    </div>
                                @elseif ($item_returnrefund_info->status == 'returnrefund-shipping_replace')
                                    <form action="{{route('profile.replacement_arrived')}}" method="POST">
                                        @csrf
                                        <div class="my-2">
                                            <input type="text" name="item_returnrefund_id" value="{{ $item_returnrefund_info->id }}" hidden>
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white p-2 rounded w-full mb-2">
                                                Replacement Arrived
                                            </button>
                                        </div>
                                    </form>
                                @elseif ($item_returnrefund_info->status == 'returnrefund-completed')
                                    <div class="col-span-2 my-auto !text-green-500 text-lg !font-light">
                                        <i class="bi bi-check2-circle"></i>
                                    </div>
                                @elseif ($item_returnrefund_info->status == 'returnrefund-rejected')
                                    {{--  --}}
                                @else
                                    <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white p-2 rounded w-full">
                                        Action
                                    </button>
                                @endif
                                <!-- Agree Modal -->
                                <div class="modal fade" id="confirmAgreement-{{$key}}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalLabel"><i class="bi bi-exclamation-triangle-fill"></i> Confirmation</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{route('profile.confirm_returnrefund')}}" method="POST">
                                            @csrf
                                            <div class="modal-body text-start mx-2">
                                                Please confirm return/refund request details to proceed with agreement.
                                                <div class="mx-2 mt-2">
                                                    <ul>
                                                        <li>Shop: {{$item_returnrefund_info->seller->shop_name}}</li>
                                                        <li>Product: {{$item_returnrefund_info->purchase_item->product->title}}</li>
                                                        <li>
                                                            @if ($item_returnrefund_info->refund_option == 'return_product')
                                                                Refund Agreement: Return Product
                                                            @elseif ($item_returnrefund_info->refund_option == 'partial_refund')
                                                                Refund Agreement: Partial Refund without Return
                                                            @elseif ($item_returnrefund_info->refund_option == 'full_refund')
                                                                Refund Agreement: Full Refund without Return
                                                            @elseif ($item_returnrefund_info->refund_option == 'replacement')
                                                                Refund Agreement: Replacement or Exchange
                                                            @else
                                                                {{$item_returnrefund_info->refund_option}}
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="form-check mt-5">
                                                    <input class="form-check-input" type="checkbox" value="" id="accept_policy-{{$key}}" required>
                                                    <label class="form-check-label text-sm" for="accept_policy-{{$key}}">
                                                        <small>I have read and accept the <a href="{{route('shipping-return-policy')}}">Return/Refund Policy</a> of PR-Tech.</small>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                                    <input type="text" name="item_returnrefund_id" value="{{ $item_returnrefund_info->id }}" hidden>
                                                    
                                                    <button type="submit" class="btn btn-danger">Confirm</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Cancel Modal -->
                                <div class="modal fade" id="cancelRequest-{{$key}}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalLabel"><i class="bi bi-exclamation-triangle-fill"></i> Confirmation</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-start mx-2">
                                            Are you sure you want to cancel this return/refund request?
                                            <div class="mx-2 mt-2">
                                                <ul>
                                                    <li>Shop: {{$item_returnrefund_info->seller->shop_name}}</li>
                                                    <li>Product: {{$item_returnrefund_info->purchase_item->product->title}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                            <form action="{{route('profile.cancel_returnrefund_request')}}" method="POST">
                                                @csrf
                                                <input type="text" name="item_returnrefund_id" value="{{ $item_returnrefund_info->id }}" hidden>
                                                
                                                <button type="submit" class="btn btn-danger">Yes</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Details --}}
                            <div class="col-1 text-center">
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
                    <div class="accordion-body bg-light p-2">
                        Details here
                        <div class="p-2 flex flex-col lg:flex-row text-start">
                            <div class="flex-1">
                                <div class="w-full flex flex-col lg:flex-row gap-1.5">
                                    <div class="p-1.5 lg:w-1/2">
                                        <div class="mb-3">
                                            <label for="product_name"
                                                class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                Product Name
                                            </label>
                                            <input type="text" id="product_name" value="{{ $item_returnrefund_info->purchase_item->product->title }}"
                                                class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                placeholder="" disabled>
                                        </div>
                                    </div>
                                    {{-- second half --}}
                                    <div class="p-1.5 lg:w-1/2">
                                        <div class="mb-3 grid lg:grid-cols-2 gap-4">
                                            <div>
                                                <label for="quantity"
                                                    class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                    Product Condition
                                                </label>
                                                <input type="text" id="quantity" value="{{ $item_returnrefund_info->condition }}"
                                                    class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                    placeholder="" disabled>
                                            </div>
                                            <div>
                                                <label for="order_status"
                                                    class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                    Order Status
                                                </label>
                                                @if ($item_returnrefund_info->status == 'returnrefund-pending')
                                                    <input type="text" id="purchase_status"
                                                        value="Request pending"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-gray-600 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @elseif ($item_returnrefund_info->status == 'returnrefund-agreement')
                                                    <input type="text" id="purchase_status"
                                                        value="Approved return/refund request"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-blue-600 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @elseif ($item_returnrefund_info->status == 'returnrefund-')
                                                    <input type="text" id="purchase_status"
                                                        value="{{ $item_returnrefund_info->status }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-red-500 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @elseif ($item_returnrefund_info->status == 'returnrefund-')
                                                    <input type="text" id="purchase_status"
                                                        value="{{ $item_returnrefund_info->status }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-red-500 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @else
                                                    <input type="text" id="purchase_status"
                                                        value="{{ $item_returnrefund_info->status }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full flex flex-col lg:flex-row gap-1.5">
                                    <div class="p-1.5 lg:w-1/3">
                                        <div class="mb-3">
                                            <label for="product_name"
                                                class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                Customer Name
                                            </label>
                                            <input type="text" id="product_name" value="{{ $item_returnrefund_info->user->first_name }} {{ $item_returnrefund_info->user->last_name }}"
                                                class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                placeholder="" disabled>
                                        </div>
                                    </div>
                                    {{-- second half --}}
                                    <div class="p-1.5 lg:w-3/4">
                                        <div class="mb-3">
                                            <div>
                                                <label for="quantity"
                                                    class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">
                                                    Reason of Return/Refund
                                                </label>
                                                <input type="text" id="quantity" value="{{ $item_returnrefund_info->reason }}"
                                                    class="bg-transparent !border-b-2 border-gray-600 text-gray-900 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                    placeholder="" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-5 mx-4 mb-3 text-start">
                            <div class="col-span-4 content-start">
                                <h5>Photographic evidence:</h5>
                                <div class="flex flex-wrap justify-start gap-4">
                                    @foreach ($item_returnrefund_info->returnrefund_images as $image)
                                        <img src="{{ asset($image->img_path) }}"
                                            class="rounded-xl border d-block h-40"
                                            alt="Product-Thumbnail">
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-span-1 flex flex-col items-start">
                                @if ($item_returnrefund_info->status == 'returnrefund-agreement' || $item_returnrefund_info->status == 'returnrefund-approved' || $item_returnrefund_info->status == 'returnrefund-shipping')
                                    <p class="text-sm text-gray-600">Return/Refund Agreement:</p>
                                    @if ($item_returnrefund_info->refund_option == 'return_product')
                                        <div class="col-span-2 !text-gray-900 !font-black !border-b-2 border-gray-600 w-full">
                                            Return Product
                                        </div>
                                    @elseif ($item_returnrefund_info->refund_option == 'partial_refund')
                                        <div class="col-span-2 !text-gray-900 !font-black !border-b-2 border-gray-600 w-full">
                                            Partial Refund without Return
                                        </div>
                                    @elseif ($item_returnrefund_info->refund_option == 'full_refund')
                                        <div class="col-span-2 !text-gray-900 !font-black !border-b-2 border-gray-600 w-full">
                                            Full Refund without Return
                                        </div>
                                    @elseif ($item_returnrefund_info->refund_option == 'replacement')
                                        <div class="col-span-2 !text-gray-900 !font-black !border-b-2 border-gray-600 w-full">
                                            Replacement or Exchange
                                        </div>
                                    @else
                                        <div class="col-span-2 !text-gray-500 !font-black !border-b-2 border-gray-600 w-full">
                                            {{$item_returnrefund_info->refund_option}}
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div> {{-- accordion items --}}
                </div>
            </div>{{-- accordionFlush --}}
        @endforeach
    </div>
    <div class="card-footer text-body-secondary">
        {{--  --}}
    </div>
</div>
