<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="container-fluid p-4">
        {{-- <div class="flex flex-column flex-lg-row justify-between gap-2 "> --}}
        {{--     <div --}}
        {{--         class="bg-white w-full p-1 h-full border-gray-200 !rounded-lg text-sm focus:outline-none lg:items-center mb-3"> --}}
        {{--         <div class="grid grid-cols-5"> --}}
        {{--             <button @click="activeTab = 0" class="tab-control p-2.5 rounded hover:bg-blue-300" --}}
        {{--                 :class="{ 'active bg-blue-300': activeTab === 0 }">Overview --}}
        {{--             </button> --}}
        {{--             <button @click="activeTab = 1" class="tab-control p-2.5 rounded" --}}
        {{--                 :class="{ 'active bg-gray-300': activeTab === 1 }">Most Bought Products --}}
        {{--             </button> --}}
        {{--             <button @click="activeTab = 1" class="tab-control p-2.5 rounded" --}}
        {{--                 :class="{ 'active bg-gray-300': activeTab === 1 }">Recently Bought Products --}}
        {{--             </button> --}}
        {{--             <button @click="activeTab = 0" class="tab-control p-2.5 rounded" --}}
        {{--                 :class="{ 'active bg-blue-300': activeTab === 0 }">Product Returns --}}
        {{--             </button> --}}
        {{--             <button @click="activeTab = 1" class="tab-control p-2.5 rounded" --}}
        {{--                 :class="{ 'active bg-gray-300': activeTab === 1 }">Product Reviews --}}
        {{--             </button> --}}
        {{--         </div> --}}
        {{--     </div> --}}
        {{-- </div> --}}
        {{-- <div --}}
        {{--     class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700"> --}}
        {{--     <ul class="flex flex-wrap -mb-px"> --}}
        {{--         <li class="me-2"> --}}
        {{--             <a href="#" --}}
        {{--                 class="border-blue-600 no-underline inline-block p-3 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Overview</a> --}}
        {{--         </li> --}}
        {{--         <li class="me-2"> --}}
        {{--             <a href="#" --}}
        {{--                 class="no-underline inline-block p-3 text-blue-600 border-b-2  rounded-t-lg active dark:text-blue-500 hover:border-gray-300 dark:border-blue-500" --}}
        {{--                 aria-current="page">Most Bought Products</a> --}}
        {{--         </li> --}}
        {{--         <li class="me-2"> --}}
        {{--             <a href="#" --}}
        {{--                 class="no-underline inline-block p-3 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Recently Bought Products</a> --}}
        {{--         </li> --}}
        {{--         <li class="me-2"> --}}
        {{--             <a href="#" --}}
        {{--                 class="no-underline inline-block p-3 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Product Returns</a> --}}
        {{--         </li> --}}
        {{--         <li class="me-2"> --}}
        {{--             <a href="#" --}}
        {{--                 class="no-underline inline-block p-3 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Positive Reviewed Products</a> --}}
        {{--         </li> --}}
        {{--         <li class="me-2"> --}}
        {{--             <a href="#" --}}
        {{--                 class="no-underline inline-block p-3 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Negative Reviewed Products</a> --}}
        {{--         </li> --}}
        {{--     </ul> --}}
        {{-- </div> --}}

        <div class="row">
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
                                        {{-- <th scope="col">#</th> --}}
                                        <th scope="col" class="text-sm !bg-gray-50">Products</th>
                                        <th scope="col" class="text-sm !bg-gray-50">Categories</th>
                                        <th scope="col" class="text-sm !bg-gray-50">Order Times</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->getMostBoughtProducts as $product)
                                        <tr wire:key="{{ $product->id }}">
                                            {{-- <th scope="row">{{ $product->id }}</th> --}}
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
                        <h5 class="!mb-0 text-lg font-bold tracking-tight text-gray-700 dark:text-white">Recently Bought
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
                                            <td class="text-sm">{{ $product->average_rating }}
                                                - {{ $product->average_rating >= 3 ? 'Positive' : 'Negative' }}</td>
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
                                                - {{ $product->average_rating > 3 ? 'Positive' : 'Negative' }}</td>
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

            {{-- <h5 class="text-lg font-bold tracking-tight text-gray-600 dark:text-white py-1.5">Shipment Analytics</h5> --}}
            {{-- Shipment Analytics --}}
            {{-- <div class="grid grid-cols-1 gap-3 lg:grid-cols-1 mb-3"> --}}
            {{-- most shipped --}}

        </div>
    </div>
</div>
</div>
