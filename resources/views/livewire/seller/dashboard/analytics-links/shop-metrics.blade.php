<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="container-fluid p-4">
        <div
            class="block p-3 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex flex-end justify-end">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Generate Sales Report for {{ $seller_name }}
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Report Generation For  {{ $seller_name }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
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
                                                - {{ round($product->average_rating,2)  >= 3 ? 'Positive' : 'Negative' }}</td>
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
                                                - {{ round($product->average_rating, 2)  > 3 ? 'Positive' : 'Negative' }}</td>
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
            {{-- <div class="grid lg:grid-cols-2 gap-3 mb-3"> --}}
            {{--     <div x-data="{ showModal: false }" @keydown.window.escape="showModal = false" --}}
            {{--          wire:init="fetchPositiveCommentsApi"> --}}
            {{--         <button class="w-full h-full" type="button" @click="showModal = !showModal"> --}}
            {{--             <div wire:loading wire:target="fetchPositiveCommentsApi" class="relative w-full h-72"> --}}
            {{--                 <div role="status" --}}
            {{--                      class="flex gap-2.5 flex-column items-center justify-center h-full w-full bg-gray-300 rounded-lg animate-pulse dark:bg-gray-700"> --}}

            {{--                     <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true" --}}
            {{--                          xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20"> --}}
            {{--                         <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" /> --}}
            {{--                         <path --}}
            {{--                             d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM9 13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2Zm4 .382a1 1 0 0 1-1.447.894L10 13v-2l1.553-1.276a1 1 0 0 1 1.447.894v2.764Z" /> --}}
            {{--                     </svg> --}}
            {{--                     <span class="text-center">Image Loading, Please Wait...</span> --}}
            {{--                 </div> --}}
            {{--             </div> --}}
            {{--             <div wire:loading.remove wire:target="fetchPositiveCommentsApi"> --}}
            {{--                 <img src="{{ asset($p_asset) }}" --}}
            {{--                      class="img-fluid img-thumbnail rounded-start border-0 self-center" alt=""> --}}
            {{--             </div> --}}
            {{--         </button> --}}

            {{--         <div x-cloak x-transition.opacity x-show="showModal" class="fixed z-1 inset-0 bg-black/50" --}}
            {{--              wire:loading.remove wire:target="init"> --}}
            {{--         </div> --}}

            {{--         <div x-cloak x-transition.duration.500ms x-show="showModal" --}}
            {{--              class="fixed inset-0 z-50 grid place-content-center"> --}}
            {{--             <div @click.away="showModal = false" --}}
            {{--                  class="min-h-full rounded-xl min-w-[500px] bg-white items-end justify-center p-4 text-center sm:items-center sm:p-0"> --}}
            {{--                 <div class="modal-dialog modal-lg modal-dialog-centered"> --}}
            {{--                     <div class="modal-content"> --}}
            {{--                         <div class="modal-header"> --}}
            {{--                             <h1 class="modal-title fs-5" id="exampleModalLabel">Positive Reviews Wordcloud</h1> --}}

            {{--                         </div> --}}
            {{--                         <div class="flex justify-center modal-body" x-transition.opacity> --}}
            {{--                             <img src="{{ asset($p_asset) }}" --}}
            {{--                                  class="img-fluid img-thumbnail rounded-start border-0 self-center" --}}
            {{--                                  alt=""> --}}
            {{--                         </div> --}}
            {{--                     </div> --}}
            {{--                 </div> --}}
            {{--                 <div class="w-full flex gap-2 pt-3 justify-end"> --}}
            {{--                     <button type="button" class="btn btn-outline-secondary" @click="showModal = false"> --}}
            {{--                         Close --}}
            {{--                     </button> --}}
            {{--                 </div> --}}
            {{--             </div> --}}
            {{--         </div> --}}
            {{--     </div> --}}

            {{--     <div x-data="{ showModal: false }" @keydown.window.escape="showModal = false" --}}
            {{--          wire:init="fetchNegativeCommentsApi"> --}}
            {{--         <button type="button" @click="showModal = !showModal" class="w-full h-72"> --}}
            {{--             <div wire:loading wire:target="fetchNegativeCommentsApi" --}}
            {{--                  class="relative w-full h-full flex items-center justify-center"> --}}
            {{--                 <div role="status" --}}
            {{--                      class="flex gap-2.5 flex-column items-center  justify-center h-full w-full bg-gray-300 rounded-lg animate-pulse dark:bg-gray-700"> --}}
            {{--                     <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true" --}}
            {{--                          xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20"> --}}
            {{--                         <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" /> --}}
            {{--                         <path --}}
            {{--                             d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM9 13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2Zm4 .382a1 1 0 0 1-1.447.894L10 13v-2l1.553-1.276a1 1 0 0 1 1.447.894v2.764Z" /> --}}
            {{--                     </svg> --}}
            {{--                     <span class="text-center">Image Loading, Please Wait...</span> --}}
            {{--                 </div> --}}
            {{--             </div> --}}
            {{--             <div wire:loading.remove wire:target="fetchNegativeCommentsApi"> --}}
            {{--                 <img src="{{ asset($n_asset) }}" --}}
            {{--                      class="img-fluid img-thumbnail rounded-start border-0 self-center" alt=""> --}}
            {{--             </div> --}}
            {{--         </button> --}}

            {{--         <div x-cloak x-transition.opacity x-show="showModal" class="fixed z-1 inset-0 bg-black/50" --}}
            {{--              wire:loading.remove wire:target="init"> --}}
            {{--         </div> --}}

            {{--         <div x-cloak x-transition.duration.500ms x-show="showModal" --}}
            {{--              class="fixed inset-0 z-50 grid place-content-center" wire:loading.remove --}}
            {{--              wire:target="fetchNegativeCommentsApi"> --}}
            {{--             <div @click.away="showModal = false" --}}
            {{--                  class="min-h-full rounded-xl min-w-[500px] bg-white items-end justify-center p-4 text-center sm:items-center sm:p-0"> --}}
            {{--                 <div class="modal-dialog modal-lg modal-dialog-centered"> --}}
            {{--                     <div class="modal-content"> --}}
            {{--                         <div class="modal-header"> --}}
            {{--                             <h1 class="modal-title fs-5" id="exampleModalLabel">Negative Reviews Wordcloud</h1> --}}

            {{--                         </div> --}}
            {{--                         <div class="flex justify-center modal-body" x-transition.opacity> --}}
            {{--                             <img src="{{ asset($n_asset) }}" --}}
            {{--                                  class="img-fluid img-thumbnail rounded-start border-0 self-center" --}}
            {{--                                  alt=""> --}}
            {{--                         </div> --}}
            {{--                     </div> --}}
            {{--                 </div> --}}
            {{--                 <div class="w-full flex gap-2 pt-3 justify-end"> --}}
            {{--                     <button type="button" class="btn btn-outline-secondary" @click="showModal = false"> --}}
            {{--                         Close --}}
            {{--                     </button> --}}
            {{--                 </div> --}}
            {{--             </div> --}}
            {{--         </div> --}}
            {{--     </div> --}}
            {{-- </div> --}}

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
