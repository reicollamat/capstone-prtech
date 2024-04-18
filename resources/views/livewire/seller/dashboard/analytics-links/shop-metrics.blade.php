<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
{{--    {{ $filterQuarterly }}--}}
{{--    {{ $filterMonth }}--}}
{{--    {{ $filterCategory }}--}}
    <div class="container-fluid p-4">
        <div
            class="block p-3 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex flex-end justify-end">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#salesReportModal">
                    Generate Sales Report for {{ $seller_name }}
                </button>

                <!-- Modal -->
                <div wire:ignore.self x-cloak="true"  class="modal fade" id="salesReportModal" tabindex="-1"
                    aria-labelledby="salesReportModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="salesReportModalLabel">Report Generation For
                                    {{ $seller_name }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body overflow-y-auto" style="max-height: 600px">
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                                aria-controls="panelsStayOpen-collapseOne">
                                                Filter Report Generation
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <div class="grid grid-cols-6">
                                                    <div class="flex justify-center items-center">
                                                        <p class="mb-0">Year Quarter : </p>
                                                    </div>
                                                    <div>
                                                        <input type="radio" class="btn-check" name="options-base"
                                                            id="all" value="all"
                                                            wire:model.live.debounce="filterQuarterly"
                                                            autocomplete="off" checked>
                                                        <label class="btn" for="all">Other</label>
                                                    </div>

                                                    <div>

                                                        <input type="radio" class="btn-check" name="options-base"
                                                            id="q1" value="q1"
                                                            wire:model.live.debounce="filterQuarterly"
                                                            autocomplete="off">
                                                        <label class="btn" for="q1">Quarter 1</label>
                                                    </div>

                                                    <div>
                                                        <input type="radio" class="btn-check" name="options-base"
                                                            id="q2" value="q2"
                                                            wire:model.live.debounce="filterQuarterly"
                                                            autocomplete="off">
                                                        <label class="btn" for="q2">Quarter 2</label>
                                                    </div>

                                                    <div>
                                                        <input type="radio" class="btn-check" name="options-base"
                                                            id="q3" value="q3"
                                                            wire:model.live.debounce="filterQuarterly"
                                                            autocomplete="off">
                                                        <label class="btn" for="q3">Quarter 3</label>
                                                    </div>

                                                    <div>
                                                        <input type="radio" class="btn-check" name="options-base"
                                                            id="q4" value="q4"
                                                            wire:model.live.debounce="filterQuarterly"
                                                            autocomplete="off">
                                                        <label class="btn" for="q4">Quarter 4</label>
                                                    </div>

                                                </div>
                                                <hr>
                                                <p class="text-center">Or</p>
                                                <hr>
                                                <div class="grid grid-cols-2 gap-2">
                                                    <div>
                                                        @php
                                                            $currentMonth = now()->month;
                                                        @endphp

                                                        <select class="form-select form-select-sm p-2" id="monthselect"
                                                            aria-label="Small select example"
                                                            wire:model.live.debounce="filterMonth">
                                                            <option value="{{ null }}">Select Month</option>
                                                            @for ($i = 1; $i <= $currentMonth; $i++)
                                                                <option value="{{ $i }}">
                                                                    {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div>
                                                        @php
                                                            $currentMonth = now()->month;
                                                        @endphp

                                                        <select class="form-select form-select-sm p-2" id="monthselect"
                                                            aria-label="Small select example"
                                                            wire:model.live.debounce="filterCategory">
                                                            <option value="{{ null }}">Select Category</option>
                                                            @foreach (CustomHelper::categoryList() as $category_key => $category_value)
                                                                <option value="{{ $category_key }}">
                                                                    {{ $category_value }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>

                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 gap-3   flex justify-center">
                                    <button type="button" class="btn btn-outline-primary" wire:click="generateAll">Generate report without Filter
                                    </button>
                                    <button type="button" class="btn btn-primary" wire:click="generateFilter">Generate report with Filter
                                    </button>
                                </div>

                                <div class="my-2">
                                    <div class="row justify-content-center w-full">
                                        @if($showIframe)
                                            <iframe src="{{ asset('sales.pdf') }}" width="100%" height="600"
                                                    id="myPdfIframe">
                                                This browser does not support PDFs. Please download the PDF to view it: <a
                                                    href="{{ asset('sales.pdf') }}">Download PDF</a>
                                            </iframe>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                </button>
                                {{-- <button type="button" class="btn btn-primary"  id="savePDFButton">Save Report --}}
                                {{-- </button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="mt-2 row">
            <h5 class="text-lg font-bold tracking-tight text-gray-600 dark:text-white">Product Analytics</h5>
            {{-- Most Bought Products --}}
            {{-- Most Bought Products --}}
            <div class="grid grid-cols-1 gap-3 lg:grid-cols-2 mb-3">
                {{-- most bought --}}
                <div
                    class="block p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <h5 class="!mb-0 text-base font-bold tracking-tight text-gray-700 dark:text-white">Most Bought
                            Products</h5>
                    </div>

                    <div class="max-h-64 overflow-y-auto">
                        @if (sizeof($this->getMostBoughtProducts) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col" class="text-sm !bg-gray-50">Products</th>
                                        <th scope="col" class="text-sm !bg-gray-50">Categories</th>
                                        <th scope="col" class="text-sm !bg-gray-50">Order Times</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->getMostBoughtProducts as $product)
                                        <tr wire:key="{{ $product->id }}">
                                            <th scope="row">{{ $product->id }}</th>
                                            <td class="text-sm">{{ $product->title }}</td>
                                            <td class="text-sm">
                                                {{ \App\Helpers\CustomHelper::maptopropercatetory($product->category) }}
                                            </td>
                                            <td class="text-sm">{{ $product->purchase_count }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="flex content-center text-gray-500 p-6">
                                <h4>Not Enough Data</h4>
                            </div>
                        @endif
                    </div>
                </div>
                {{-- recently most bought --}}
                <div
                    class="block p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <h5 class="!mb-0 text-lg font-bold tracking-tight text-gray-700 dark:text-white">Recently Sold
                            Products</h5>
                        <div class="btn-group btn-group-sm" role="group">
                            <div class="input-group-text" id="btnGroupAddon">Filter</div>
                            <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $recentlyBoughtProductsFilter }} Days Filter
                            </button>
                            <ul class="dropdown-menu !pl-0">
                                <li>
                                    <button type="button" wire:click="$set('recentlyBoughtProductsFilter', '7')"
                                        class="dropdown-item" href="#">7 Days
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('recentlyBoughtProductsFilter', '30')"
                                        class="dropdown-item" href="#">1 Month
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('recentlyBoughtProductsFilter', '90')"
                                        class="dropdown-item" href="#">2 Months
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('recentlyBoughtProductsFilter', '180')"
                                        class="dropdown-item" href="#">3 Months
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="max-h-64 overflow-y-auto">
                        @if (sizeof($this->getRecentlyBoughtProducts()) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">#</th> --}}
                                        <th scope="col" class="text-sm !bg-gray-50">Products</th>
                                        <th scope="col" class="text-sm !bg-gray-50">Categories</th>
                                        <th scope="col" class="text-sm !bg-gray-50">Order Times</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->getRecentlyBoughtProducts as $product)
                                        <tr wire:key="{{ $product->id }}">
                                            {{-- <th scope="row">{{ $product->id }}</th> --}}
                                            <td class="text-sm">{{ $product->title }}</td>
                                            <td class="text-sm">
                                                {{ \App\Helpers\CustomHelper::maptopropercatetory($product->category) }}
                                            </td>
                                            <td class="text-sm">{{ $product->total_quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="flex content-center text-gray-500 p-6">
                                <h4>Not Enough Data</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-3 mb-3">
                {{-- product Returns --}}
                <div
                    class="block p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <h5 class="!mb-0 text-lg font-bold tracking-tight text-gray-700 dark:text-white">Product
                            Returns </h5>
                        <div class="flex items-center gap-3">
                            <div class="btn-group btn-group-sm" role="group">
                                <div class="input-group-text" id="btnGroupAddon">Filter</div>
                                <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $productsReturnsFilter }} Days Filter
                                </button>
                                <ul class="dropdown-menu !pl-0">
                                    <li>
                                        <button type="button" wire:click="$set('productsReturnsFilter', '7')"
                                            class="dropdown-item" href="#">7 Days
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" wire:click="$set('productsReturnsFilter', '30')"
                                            class="dropdown-item" href="#">1 Month
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" wire:click="$set('productsReturnsFilter', '90')"
                                            class="dropdown-item" href="#">2 Months
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" wire:click="$set('productsReturnsFilter', '180')"
                                            class="dropdown-item" href="#">3 Months
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="btn-group btn-group-sm" role="group">
                                <div class="input-group-text" id="btnGroupAddon">Filter</div>
                                <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $productsReturnsOrderFilter == 'asc' ? 'Ascending' : 'Descending' }}
                                </button>
                                <ul class="dropdown-menu !pl-0">
                                    <li>
                                        <button type="button" wire:click="$set('productsReturnsOrderFilter', 'asc')"
                                            class="dropdown-item" href="#">Ascending
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" wire:click="$set('productsReturnsOrderFilter', 'desc')"
                                            class="dropdown-item" href="#">Descending
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="max-h-64 overflow-y-auto">
                        @if (sizeof($this->getReturnsProducts) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col" class="text-sm">#</th> --}}
                                        <th scope="col" class="text-sm !bg-gray-50">Products</th>
                                        <th scope="col" class="text-sm !bg-gray-50">Categories</th>
                                        <th scope="col" class="text-sm !bg-gray-50">Returned Items Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->getReturnsProducts as $product)
                                        <tr wire:key="{{ $product->id }}">
                                            {{-- <th scope="row">{{ $product->id }}</th> --}}
                                            <td class="text-sm">{{ $product->title }}</td>
                                            <td class="text-sm">
                                                {{ \App\Helpers\CustomHelper::maptopropercatetory($product->category) }}
                                            </td>
                                            <td class="text-sm">{{ $product->total_quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="flex content-center text-gray-500 p-6">
                                <h4>Not Enough Data</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- sentiment analytics --}}
            <h5 class="text-lg font-bold tracking-tight text-gray-600 dark:text-white py-1.5">Sentiment Analytics</h5>
            <div class="grid grid-cols-1 gap-3 lg:grid-cols-2 mb-3">
                {{-- most positive --}}
                <div
                    class="block p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <h5 class="!mb-0 text-lg font-bold tracking-tight text-gray-700 dark:text-white">Positive
                            Reviewed Products</h5>
                        <div class="btn-group btn-group-sm" role="group">
                            <div class="input-group-text" id="btnGroupAddon">Filter</div>
                            <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $mostPositiveReviewFilter }} Days Filter
                            </button>
                            <ul class="dropdown-menu !pl-0">
                                <li>
                                    <button type="button" wire:click="$set('mostPositiveReviewFilter', '7')"
                                        class="dropdown-item" href="#">7 Days
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('mostPositiveReviewFilter', '30')"
                                        class="dropdown-item" href="#">1 Month
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('mostPositiveReviewFilter', '90')"
                                        class="dropdown-item" href="#">2 Months
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('mostPositiveReviewFilter', '180')"
                                        class="dropdown-item" href="#">3 Months
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="max-h-64 overflow-y-auto">
                        @if (sizeof($this->getMostPositiveReviewedProducts) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">#</th> --}}
                                        <th scope="col" class="text-sm !bg-gray-50">Products</th>
                                        <th scope="col" class="text-sm !bg-gray-50">Categories</th>
                                        <th scope="col" class="text-sm !bg-gray-50">Ratings</th>
                                        <th scope="col" class="text-sm !bg-gray-50"># of Review</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->getMostPositiveReviewedProducts as $product)
                                        <tr wire:key="{{ $product->product_id }}">
                                            {{-- <th scope="row">{{ $product->product_id }}</th> --}}
                                            <td class="text-sm">{{ $product->title }}</td>
                                            <td class="text-sm">
                                                {{ \App\Helpers\CustomHelper::maptopropercatetory($product->category) }}
                                            </td>
                                            <td class="text-sm">{{ round($product->average_rating, 2) }}
                                                -
                                                {{ round($product->average_rating, 2) >= 3 ? 'Positive' : 'Negative' }}
                                            </td>
                                            <td class="text-sm">
                                                {{ $product->total_comment }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="flex content-center text-gray-500 p-6">
                                <h4>No Reviews Available</h4>
                            </div>
                        @endif
                    </div>
                </div>
                {{-- Most Negative Reviewed --}}
                <div
                    class="block p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <h5 class="!mb-0 text-lg font-bold tracking-tight text-gray-700 dark:text-white">Negative
                            Reviewed Products</h5>
                        <div class="btn-group btn-group-sm" role="group">
                            <div class="input-group-text" id="btnGroupAddon">Filter</div>
                            <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $mostNegativeReviewFilter }} Days Filter
                            </button>
                            <ul class="dropdown-menu !pl-0">
                                <li>
                                    <button type="button" wire:click="$set('mostNegativeReviewFilter', '7')"
                                        class="dropdown-item" href="#">7 Days
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('mostNegativeReviewFilter', '30')"
                                        class="dropdown-item" href="#">1 Month
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('mostNegativeReviewFilter', '90')"
                                        class="dropdown-item" href="#">2 Months
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('mostNegativeReviewFilter', '180')"
                                        class="dropdown-item" href="#">3 Months
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="max-h-64 overflow-y-auto">
                        @if (sizeof($this->getMostNegativeReviewedProducts) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">#</th> --}}
                                        <th scope="col" class="text-sm !bg-gray-50">Products</th>
                                        <th scope="col" class="text-sm !bg-gray-50">Categories</th>
                                        <th scope="col" class="text-sm !bg-gray-50">Ratings</th>
                                        <th scope="col" class="text-sm !bg-gray-50"># of Review</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--                            {{ dd($this->getMostNegativeReviewedProducts) }} --}}
                                    @foreach ($this->getMostNegativeReviewedProducts as $product)
                                        {{--                                {{ var_dump($product->product_id) }} --}}
                                        <tr wire:key="{{ $product->product_id }}">
                                            {{-- <th scope="row">{{ $product->product_id }}</th> --}}
                                            <td class="text-sm">{{ $product->title }}</td>
                                            <td class="text-sm">
                                                {{ \App\Helpers\CustomHelper::maptopropercatetory($product->category) }}
                                            </td>
                                            <td class="text-sm">{{ round($product->average_rating, 2) }}
                                                -
                                                {{ round($product->average_rating, 2) > 3 ? 'Positive' : 'Negative' }}
                                            </td>
                                            <td class="text-sm">
                                                {{ $product->total_comment }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="flex content-center text-gray-500 p-6">
                                <h4>No Reviews Available</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <h5 class="text-lg font-bold tracking-tight text-gray-600 dark:text-white py-1.5">Order & Shipment
                Analytics</h5>
            {{-- Order Analytics --}}
            <div class="grid grid-cols-1 gap-3 lg:grid-cols-2 mb-3">
                {{-- most ordewred --}}
                <div
                    class="block p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <h5 class="!mb-0 text-lg font-bold tracking-tight text-gray-700 dark:text-white">Most Ordered
                            Products</h5>
                        <div class="btn-group btn-group-sm" role="group">
                            <div class="input-group-text" id="btnGroupAddon">Filter</div>
                            <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $mostOrderedProductsFilter }} Days Filter
                            </button>
                            <ul class="dropdown-menu !pl-0">
                                <li>
                                    <button type="button" wire:click="$set('mostOrderedProductsFilter', '7')"
                                        class="dropdown-item" href="#">7 Days
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('mostOrderedProductsFilter', '30')"
                                        class="dropdown-item" href="#">1 Month
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('mostOrderedProductsFilter', '90')"
                                        class="dropdown-item" href="#">2 Months
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('mostOrderedProductsFilter', '180')"
                                        class="dropdown-item" href="#">3 Months
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="max-h-64 overflow-y-auto">
                        @if (sizeof($this->getMostOrderedProducts()) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Products</th>
                                        <th scope="col">Categories</th>
                                        <th scope="col">Purchase Times</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->getMostOrderedProducts as $product)
                                        <tr wire:key="{{ $product->product_id }}">
                                            <th scope="row">{{ $product->product_id }}</th>
                                            <td class="text-ellipsis overflow-hidden">{{ $product->title }}</td>
                                            <td> {{ \App\Helpers\CustomHelper::maptopropercatetory($product->category) }}
                                            </td>
                                            <td>{{ $product->total_quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="flex content-center text-gray-500 p-6">
                                <h4>Not Enough Data</h4>
                            </div>
                        @endif
                    </div>
                </div>

                <div
                    class="block p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <h5 class="!mb-0 text-lg font-bold tracking-tight text-gray-700 dark:text-white">Most Shipped
                            Products</h5>
                        <div class="btn-group btn-group-sm" role="group">
                            <div class="input-group-text" id="btnGroupAddon">Filter</div>
                            <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $mostShippedProductsFilter }} Days Filter
                            </button>
                            <ul class="dropdown-menu !pl-0">
                                <li>
                                    <button type="button" wire:click="$set('mostShippedProductsFilter', '7')"
                                        class="dropdown-item" href="#">7 Days
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('mostShippedProductsFilter', '30')"
                                        class="dropdown-item" href="#">1 Month
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('mostShippedProductsFilter', '90')"
                                        class="dropdown-item" href="#">2 Months
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('mostShippedProductsFilter', '180')"
                                        class="dropdown-item" href="#">3 Months
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="max-h-64 overflow-y-auto">
                        @if (sizeof($this->getMostShippedProducts()) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-sm !bg-gray-50">#</th>
                                        <th scope="col" class="text-sm !bg-gray-50">Products</th>
                                        <th scope="col" class="text-sm !bg-gray-50">Categories</th>
                                        <th scope="col" class="text-sm !bg-gray-50">Purchase Times</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->getMostShippedProducts as $product)
                                        <tr wire:key="{{ $product->id }}">
                                            <th scope="row">{{ $product->id }}</th>
                                            <td class="text-ellipsis overflow-hidden">{{ $product->title }}</td>
                                            <td> {{ \App\Helpers\CustomHelper::maptopropercatetory($product->category) }}
                                            </td>
                                            <td>{{ $product->total_quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="flex content-center text-gray-500 p-6">
                                <h4>Not Enough Data</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@script
    <script>
        counter = 0;

        Livewire.on('reload-iframe', () => {
            console.log('reload iframe');
            var iframe = document.getElementById("myPdfIframe");
            var doc = iframe.contentDocument || iframe.contentWindow;
            doc.location.reload(true);
        });


        const savePDFButton = document.getElementById("savePDFButton");
        const iframe = document.getElementById("myPdfIframe");

        savePDFButton.addEventListener("click", () => {
            iframe.contentWindow.print(); // Trigger browser print dialog
        });
    </script>
@endscript
