<div class="d-flex justify-content-between mb-2">
    <h5>Return/Refund Items:</h5>
    <a href="{{route('profile.edit', ['profile_activetab' => 'returnrefund'])}}" class="btn bg-primary text-light p-2 rounded mt-0">
        <i class="bi bi-arrow-clockwise">Refresh</i>
    </a>
</div>

<div class="card text-center mb-10">
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
                                @if ($item_returnrefund_info->status == 'returnrefund-pending')
                                    <div class="col-span-2 my-auto !text-blue-500 !font-light">
                                        <i class="bi bi-hourglass-split"></i> Request Pending
                                    </div>
                                @elseif ($item_returnrefund_info->status == 'returnrefund-agreement')
                                    <div class="col-span-2 my-auto !text-blue-500 !font-light">
                                        <i class="bi bi-exclamation-square-fill"></i> Waiting for your confirmation
                                    </div>
                                @else
                                    <div class="col-span-2 my-auto !text-gray-500 !font-light">
                                        <i class="bi bi-exclamation-square-fill"></i> {{$item_returnrefund_info->status}}
                                    </div>
                                @endif
                            </div>
                            <div class="col-2 p-0">
                                @if ($item_returnrefund_info->status == 'returnrefund-pending')
                                    <div class="col-span-2 my-auto !text-gray-500 text-lg !font-light">
                                        <i class="bi bi-hourglass-split"></i>
                                    </div>
                                @elseif ($item_returnrefund_info->refund_option == 'return_product')
                                    <div class="col-span-2 my-auto !text-gray-600 !font-light">
                                        Return Product
                                    </div>
                                @elseif ($item_returnrefund_info->refund_option == 'partial_refund')
                                    <div class="col-span-2 my-auto !text-gray-600 !font-light">
                                        Partial Refund without Return
                                    </div>
                                @elseif ($item_returnrefund_info->refund_option == 'full_refund')
                                    <div class="col-span-2 my-auto !text-gray-600 !font-light">
                                        Full Refund without Return
                                    </div>
                                @elseif ($item_returnrefund_info->refund_option == 'replacement')
                                    <div class="col-span-2 my-auto !text-gray-600 !font-light">
                                        Replacement or Exchange
                                    </div>
                                @else
                                    <div class="col-span-2 my-auto !text-gray-500 !font-light">
                                        {{$item_returnrefund_info->refund_option}}
                                    </div>
                                @endif
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
                        <div class="p-2 flex flex-col lg:flex-row">
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
                                                    class="block text-sm font-light text-gray-500 tracking-tight dark:text-white">Order
                                                    Status
                                                </label>
                                                @if ($item_returnrefund_info->status == 'pending')
                                                    <input type="text" id="purchase_status"
                                                        value="{{ $item_returnrefund_info->status }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-blue-600 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @elseif ($item_returnrefund_info->status == 'completed')
                                                    <input type="text" id="purchase_status"
                                                        value="{{ $item_returnrefund_info->status }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-green-600 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @elseif ($item_returnrefund_info->status == 'failed_delivery')
                                                    <input type="text" id="purchase_status"
                                                        value="{{ $item_returnrefund_info->status }}"
                                                        class="bg-transparent !border-b-2 border-gray-600 text-red-500 text-sm focus:!ring-0 focus:border-0 block w-full !p-1.5"
                                                        placeholder="" disabled>
                                                @elseif ($item_returnrefund_info->status == 'cancellation')
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
                        <div class="grid grid-cols-4 mx-4 mb-3">
                            <div class="col-span-3 border">
                                <h5>Photographic evidence:</h5>
                                <div class="grid grid-flow-col auto-cols-max gap-3">
                                    @foreach ($item_returnrefund_info->returnrefund_images as $image)
                                        <img src="{{ asset($image->img_path) }}"
                                            class="rounded-xl border border-gray-600 d-block h-40"
                                            alt="Product-Thumbnail">
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-span-1 flex flex-col items-start">
                                <h6>Actions:</h6>
                                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white p-2 mb-2 rounded w-full">
                                    button 1
                                </button>
                                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white p-2 mb-2 rounded w-full">
                                    button 2
                                </button>
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
