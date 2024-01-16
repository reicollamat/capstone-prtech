<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="container-fluid py-4">
        {{-- <div class=""> --}}
        {{--     <div class="Graph w-full"> --}}
        {{--         <div class="relative"> --}}
        {{--             <p>test</p> --}}
        {{--         </div> --}}
        {{--         <div id="chart" class="chartBox"> --}}
        {{--             <canvas id="myChart"></canvas> --}}
        {{--         </div> --}}
        {{--     </div> --}}
        {{-- </div> --}}

        {{-- <div class="grid lg:grid-cols-4 gap-4 px-4">
            <div class="relative col-span-2 bg-white rounded shadow shadow-cyan-500/50">
                <div class="px-3 pt-6 pb-6 text-center relative z-10">
                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Shop Perception</h4>
                    <h3 class="text-2xl text-gray-700 font-semibold leading-tight my-1.5">3,682</h3>
                    <p class="text-xs text-green-500 leading-tight">▲ 57.1%</p>
                </div>
                <div class="absolute inset-0 pt-12">
                    <div class="flex items-end w-full h-full overflow-hidden">
                        <canvas id="user-perception-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="relative bg-white rounded shadow shadow-cyan-500/50">
                <div class="px-3 pt-6 pb-6 text-center relative z-10">
                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Shop Engagement</h4>
                    <h3 class="text-2xl text-gray-700 font-semibold leading-tight my-1.5">3,682</h3>
                    <p class="text-xs text-green-500 leading-tight">▲ 57.1%</p>
                </div>
                <div class="absolute inset-0 pt-12">
                    <div class="flex items-end w-full h-full overflow-hidden">
                        <canvas id="shop-perception-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="relative bg-white rounded shadow shadow-cyan-500/50">
                <div class="px-3 pt-6 pb-6 text-center relative z-10">
                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Shop Sentiment</h4>
                    <h3 class="text-2xl text-gray-700 font-semibold leading-tight my-1.5">3,682</h3>
                    <p class="text-xs text-green-500 leading-tight">▲ 57.1%</p>
                </div>
                <div class="absolute inset-0 pt-12">
                    <div class="flex items-end w-full h-full overflow-hidden">
                        <canvas id="shop-sentiment-chart"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="bg-white overflow-x-auto rounded-lg p-3 m-4">
            <h5>Product Restock Recommender</h5>
            <div class="grid grid-cols-12 text-center text-sm">
                <div class="col-span-1 p-1 !text-gray-400 !font-light border-b-2 border-blue-300">ID</div>
                <div class="col-span-3 p-3 !text-gray-400 !font-light border-b-2 border-blue-300">Product</div>
                <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Category</div>
                <div class="col-span-2 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Status</div>
                <div class="col-span-1 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Rating</div>
                <div class="col-span-3 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Prediction</div>
            </div>

            <div wire:loading.remove x-transition>
                @if ($this->getTopProducts->count() > 0)
                    @foreach ($this->getTopProducts as $key => $product)
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed d-block" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapse-{{ $key }}-{{ $product->id }}"
                                        aria-expanded="false"
                                        aria-controls="flush-collapse-{{ $key }}-{{ $product->id }}">
                                        {{-- @dd($product) --}}
                                        <div class="grid grid-cols-12 text-center">
                                            <div class="col-span-1 mb-0 py-3 !text-gray-800 !font-light">
                                                {{ $product->id }}
                                            </div>
                                            <div class="col-span-3 mb-0 py-3 !text-gray-800 !font-light">
                                                {{ $product->title }}
                                            </div>
                                            <div class="col-span-2 mb-0 py-3 !text-gray-800 !font-light">
                                                {{ $product->category }}
                                            </div>
                                            <div class="col-span-2 mb-0 py-3 text-sm !text-gray-800 !font-light">
                                                {{ $product->status }}
                                            </div>
                                            <div class="col-span-1 mb-0 py-3 !text-gray-800 !font-light">
                                                <i
                                                    class="bi bi-star-fill text-yellow-400 my-auto"></i>{{ $product->rating }}
                                            </div>
                                            <div class="col-span-3 mb-0 py-3 !text-gray-800 !font-light">
                                                Model Suggested Restock Amount {{ fake()->numberBetween(3, 45) }}
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="flush-collapse-{{ $key }}-{{ $product->id }}"
                                    class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body flex content-center">
                                        <img src="{{ asset('restock/future_predictions_plot' . fake()->numberBetween(0, 37) . '.png') }}"
                                            alt="" style="max-height: 500px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="flex content-center text-gray-500 p-6">
                        <h4>Not Enough Data</h4>
                    </div>
                @endif
            </div>

            {{--            @dd($this->getMostPositiveReviewedProducts) --}}
            {{--            @dd($this->getMostBoughtProducts) --}}

            {{-- loading indicator --}}
            <div class="w-full !hidden " wire:loading.class.remove="!hidden" x-transition>
                <div class="w-full" wire:loading wire:target="gotoPage, category_filter, ">
                    <div role="status"
                        class="w-full my-2 p-4 space-y-4 border border-gray-200 divide-y divide-gray-200 rounded  animate-pulse">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                                <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                            </div>
                            <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                        </div>
                        <div class="flex items-center justify-between pt-4">
                            <div>
                                <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                                <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                            </div>
                            <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                        </div>
                        <div class="flex items-center justify-between pt-4">
                            <div>
                                <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                                <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                            </div>
                            <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                        </div>
                        <div class="flex items-center justify-between pt-4">
                            <div>
                                <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                                <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                            </div>
                            <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                        </div>
                        <div class="flex items-center justify-between pt-4">
                            <div>
                                <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                                <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                            </div>
                            <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                        </div>
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- <div class="col-4"> --}}
            {{--     <div class="bg-white overflow-x-auto rounded-lg p-3 m-1"> --}}
            {{--         <h5>Most Positive Reviewed</h5> --}}
            {{--         <div class="grid grid-cols-12 text-center text-sm"> --}}
            {{--             <div class="col-span-5 p-3 !text-gray-400 !font-light border-b-2 border-blue-300">Product</div> --}}
            {{--             <div class="col-span-4 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Category</div> --}}
            {{--             <div class="col-span-3 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Rating</div> --}}
            {{--         </div> --}}

            {{--          --}}{{-- @dd($this->getMostPositiveReviewedProducts) --}}

            {{--         <div wire:loading.remove x-transition> --}}
            {{--             @if ($this->getMostPositiveReviewedProducts->count() > 0) --}}
            {{--                 @foreach ($this->getMostPositiveReviewedProducts as $key => $product) --}}
            {{--                     <div class="accordion accordion-flush" id="accordionFlushExample"> --}}
            {{--                         <div class="accordion-item"> --}}
            {{--                             <h2 class="accordion-header"> --}}
            {{--                                 <button class="accordion-button collapsed d-block" type="button" --}}
            {{--                                     data-bs-toggle="collapse" --}}
            {{--                                     data-bs-target="#flush-collapse-{{ $key }}-{{ $product->id }}" --}}
            {{--                                     aria-expanded="false" --}}
            {{--                                     aria-controls="flush-collapse-{{ $key }}-{{ $product->id }}"> --}}
            {{--                                      --}}{{-- @dd($product) --}}
            {{--                                     <div class="grid grid-cols-12 text-center"> --}}
            {{--                                         <div class="col-span-5 mb-0 py-3 !text-gray-800 !font-light"> --}}
            {{--                                             {{ $product->title }} --}}
            {{--                                         </div> --}}
            {{--                                         <div class="col-span-4 mb-0 py-3 !text-gray-800 !font-light"> --}}
            {{--                                             {{ $product->category }} --}}
            {{--                                         </div> --}}
            {{--                                         <div class="col-span-3 mb-0 py-3 !text-gray-800 !font-light"> --}}
            {{--                                             <i --}}
            {{--                                                 class="bi bi-star-fill text-yellow-400 my-auto"></i>{{ $product->rating }} --}}
            {{--                                         </div> --}}
            {{--                                     </div> --}}
            {{--                                 </button> --}}
            {{--                             </h2> --}}
            {{--                             <div id="flush-collapse-{{ $key }}-{{ $product->id }}" --}}
            {{--                                 class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample"> --}}
            {{--                                 <div class="accordion-body flex content-center"> --}}
            {{--                                     <img src="{{ asset('restock/future_predictions_plot' . fake()->numberBetween(0, 37) . '.png') }}" --}}
            {{--                                         alt="" style="max-height: 500px"> --}}
            {{--                                 </div> --}}
            {{--                             </div> --}}
            {{--                         </div> --}}
            {{--                     </div> --}}
            {{--                 @endforeach --}}
            {{--             @else --}}
            {{--                 <div class="flex content-center text-gray-500 p-6"> --}}
            {{--                     <h4>Not Enough Data</h4> --}}
            {{--                 </div> --}}
            {{--             @endif --}}
            {{--         </div> --}}

            {{--          --}}{{-- loading indicator --}}
            {{--         <div class="w-full !hidden " wire:loading.class.remove="!hidden" x-transition> --}}
            {{--             <div class="w-full" wire:loading wire:target="gotoPage, category_filter, "> --}}
            {{--                 <div role="status" --}}
            {{--                     class="w-full my-2 p-4 space-y-4 border border-gray-200 divide-y divide-gray-200 rounded  animate-pulse"> --}}
            {{--                     <div class="flex items-center justify-between"> --}}
            {{--                         <div> --}}
            {{--                             <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div> --}}
            {{--                             <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div> --}}
            {{--                         </div> --}}
            {{--                         <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div> --}}
            {{--                     </div> --}}
            {{--                     <div class="flex items-center justify-between pt-4"> --}}
            {{--                         <div> --}}
            {{--                             <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div> --}}
            {{--                             <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div> --}}
            {{--                         </div> --}}
            {{--                         <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div> --}}
            {{--                     </div> --}}
            {{--                     <div class="flex items-center justify-between pt-4"> --}}
            {{--                         <div> --}}
            {{--                             <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div> --}}
            {{--                             <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div> --}}
            {{--                         </div> --}}
            {{--                         <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div> --}}
            {{--                     </div> --}}
            {{--                     <div class="flex items-center justify-between pt-4"> --}}
            {{--                         <div> --}}
            {{--                             <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div> --}}
            {{--                             <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div> --}}
            {{--                         </div> --}}
            {{--                         <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div> --}}
            {{--                     </div> --}}
            {{--                     <div class="flex items-center justify-between pt-4"> --}}
            {{--                         <div> --}}
            {{--                             <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div> --}}
            {{--                             <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div> --}}
            {{--                         </div> --}}
            {{--                         <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div> --}}
            {{--                     </div> --}}
            {{--                     <span class="sr-only">Loading...</span> --}}
            {{--                 </div> --}}
            {{--             </div> --}}
            {{--         </div> --}}
            {{--     </div> --}}
            {{-- </div> --}}

            {{-- <div class="col-4"> --}}
            {{--     <div class="bg-white overflow-x-auto rounded-lg p-3 m-1"> --}}
            {{--         <h5>Most Bought</h5> --}}
            {{--         <div class="grid grid-cols-12 text-center text-sm"> --}}
            {{--             <div class="col-span-5 p-3 !text-gray-400 !font-light border-b-2 border-blue-300">Product</div> --}}
            {{--             <div class="col-span-4 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Category --}}
            {{--             </div> --}}
            {{--             <div class="col-span-3 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Purchase --}}
            {{--                 Count --}}
            {{--             </div> --}}
            {{--         </div> --}}

            {{--         <div wire:loading.remove x-transition> --}}
            {{--             @if ($this->getMostBoughtProducts->count() > 0) --}}
            {{--                 @foreach ($this->getMostBoughtProducts as $key => $product) --}}
            {{--                     <div class="accordion accordion-flush" id="accordionFlushExample"> --}}
            {{--                         <div class="accordion-item"> --}}
            {{--                             <h2 class="accordion-header"> --}}
            {{--                                 <button class="accordion-button collapsed d-block" type="button" --}}
            {{--                                     data-bs-toggle="collapse" --}}
            {{--                                     data-bs-target="#flush-collapse-{{ $key }}-{{ $product->id }}" --}}
            {{--                                     aria-expanded="false" --}}
            {{--                                     aria-controls="flush-collapse-{{ $key }}-{{ $product->id }}"> --}}
            {{--                                      --}}{{-- @dd($product) --}}
            {{--                                     <div class="grid grid-cols-12 text-center"> --}}
            {{--                                         <div class="col-span-5 mb-0 py-3 !text-gray-800 !font-light"> --}}
            {{--                                             {{ $product->title }} --}}
            {{--                                         </div> --}}
            {{--                                         <div class="col-span-4 mb-0 py-3 !text-gray-800 !font-light"> --}}
            {{--                                             {{ $product->category }} --}}
            {{--                                         </div> --}}
            {{--                                         <div class="col-span-3 mb-0 py-3 !text-gray-800 !font-light"> --}}
            {{--                                             {{ $product->purchase_count }} --}}
            {{--                                         </div> --}}
            {{--                                     </div> --}}
            {{--                                 </button> --}}
            {{--                             </h2> --}}
            {{--                             <div id="flush-collapse-{{ $key }}-{{ $product->id }}" --}}
            {{--                                 class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample"> --}}
            {{--                                 <div class="accordion-body flex content-center"> --}}
            {{--                                     <img src="{{ asset('restock/future_predictions_plot' . fake()->numberBetween(0, 37) . '.png') }}" --}}
            {{--                                         alt="" style="max-height: 500px"> --}}
            {{--                                 </div> --}}
            {{--                             </div> --}}
            {{--                         </div> --}}
            {{--                     </div> --}}
            {{--                 @endforeach --}}
            {{--             @else --}}
            {{--                 <div class="flex content-center text-gray-500 p-6"> --}}
            {{--                     <h4>Not Enough Data</h4> --}}
            {{--                 </div> --}}
            {{--             @endif --}}
            {{--         </div> --}}

            {{--          --}}{{-- loading indicator --}}
            {{--         <div class="w-full !hidden " wire:loading.class.remove="!hidden" x-transition> --}}
            {{--             <div class="w-full" wire:loading wire:target="gotoPage, category_filter, "> --}}
            {{--                 <div role="status" --}}
            {{--                     class="w-full my-2 p-4 space-y-4 border border-gray-200 divide-y divide-gray-200 rounded  animate-pulse"> --}}
            {{--                     <div class="flex items-center justify-between"> --}}
            {{--                         <div> --}}
            {{--                             <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div> --}}
            {{--                             <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div> --}}
            {{--                         </div> --}}
            {{--                         <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div> --}}
            {{--                     </div> --}}
            {{--                     <div class="flex items-center justify-between pt-4"> --}}
            {{--                         <div> --}}
            {{--                             <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div> --}}
            {{--                             <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div> --}}
            {{--                         </div> --}}
            {{--                         <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div> --}}
            {{--                     </div> --}}
            {{--                     <div class="flex items-center justify-between pt-4"> --}}
            {{--                         <div> --}}
            {{--                             <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div> --}}
            {{--                             <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div> --}}
            {{--                         </div> --}}
            {{--                         <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div> --}}
            {{--                     </div> --}}
            {{--                     <div class="flex items-center justify-between pt-4"> --}}
            {{--                         <div> --}}
            {{--                             <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div> --}}
            {{--                             <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div> --}}
            {{--                         </div> --}}
            {{--                         <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div> --}}
            {{--                     </div> --}}
            {{--                     <div class="flex items-center justify-between pt-4"> --}}
            {{--                         <div> --}}
            {{--                             <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div> --}}
            {{--                             <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div> --}}
            {{--                         </div> --}}
            {{--                         <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div> --}}
            {{--                     </div> --}}
            {{--                     <span class="sr-only">Loading...</span> --}}
            {{--                 </div> --}}
            {{--             </div> --}}
            {{--         </div> --}}
            {{--     </div> --}}
            {{-- </div> --}}

            {{-- <div class="col-4"> --}}
            {{-- <div class="bg-white overflow-x-auto rounded-lg p-3 m-1"> --}}
            {{--     <h5>Most Negative Reviewed</h5> --}}
            {{--     <div class="grid grid-cols-12 text-center text-sm"> --}}
            {{--         <div class="col-span-5 p-3 !text-gray-400 !font-light border-b-2 border-blue-300">Product</div> --}}
            {{--         <div class="col-span-4 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Category --}}
            {{--         </div> --}}
            {{--         <div class="col-span-3 p-2 !text-gray-400 !font-light border-b-2 border-blue-300">Rating</div> --}}
            {{--     </div> --}}

            {{--     <div wire:loading.remove x-transition> --}}
            {{--         @if ($this->getMostNegativeReviewedProducts > 0) --}}
            {{--             @foreach ($this->getMostNegativeReviewedProducts as $key => $product) --}}
            {{--                 <div class="accordion accordion-flush" id="accordionFlushExample"> --}}
            {{--                     <div class="accordion-item"> --}}
            {{--                         <h2 class="accordion-header"> --}}
            {{--                             <button class="accordion-button collapsed d-block" type="button" --}}
            {{--                                 data-bs-toggle="collapse" --}}
            {{--                                 data-bs-target="#flush-collapse-{{ $key }}-{{ $product->id }}" --}}
            {{--                                 aria-expanded="false" --}}
            {{--                                 aria-controls="flush-collapse-{{ $key }}-{{ $product->id }}"> --}}
            {{--                                  --}}{{-- @dd($product) --}}
            {{--                                 <div class="grid grid-cols-12 text-center"> --}}
            {{--                                     <div class="col-span-5 mb-0 py-3 !text-gray-800 !font-light"> --}}
            {{--                                         {{ $product->title }} --}}
            {{--                                     </div> --}}
            {{--                                     <div class="col-span-4 mb-0 py-3 !text-gray-800 !font-light"> --}}
            {{--                                         {{ $product->category }} --}}
            {{--                                     </div> --}}
            {{--                                     <div class="col-span-3 mb-0 py-3 !text-gray-800 !font-light"> --}}
            {{--                                         <i --}}
            {{--                                             class="bi bi-star-fill text-yellow-400 my-auto"></i>{{ $product->rating }} --}}
            {{--                                     </div> --}}
            {{--                                 </div> --}}
            {{--                             </button> --}}
            {{--                         </h2> --}}
            {{--                         <div id="flush-collapse-{{ $key }}-{{ $product->id }}" --}}
            {{--                             class="accordion-collapse collapse" --}}
            {{--                             data-bs-parent="#accordionFlushExample"> --}}
            {{--                             <div class="accordion-body flex content-center"> --}}
            {{--                                 <img src="{{ asset('restock/future_predictions_plot' . fake()->numberBetween(0, 37) . '.png') }}" --}}
            {{--                                     alt="" style="max-height: 500px"> --}}
            {{--                             </div> --}}
            {{--                         </div> --}}
            {{--                     </div> --}}
            {{--                 </div> --}}
            {{--             @endforeach --}}
            {{--         @else --}}
            {{--             <div class="flex content-center text-gray-500 p-6"> --}}
            {{--                 <h4>Not Enough Data</h4> --}}
            {{--             </div> --}}
            {{--         @endif --}}
            {{--     </div> --}}

            {{-- loading indicator --}}
            {{--         <div class="w-full !hidden " wire:loading.class.remove="!hidden" x-transition> --}}
            {{--             <div class="w-full" wire:loading wire:target="gotoPage, category_filter, "> --}}
            {{--                 <div role="status" --}}
            {{--                     class="w-full my-2 p-4 space-y-4 border border-gray-200 divide-y divide-gray-200 rounded  animate-pulse"> --}}
            {{--                     <div class="flex items-center justify-between"> --}}
            {{--                         <div> --}}
            {{--                             <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div> --}}
            {{--                             <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div> --}}
            {{--                         </div> --}}
            {{--                         <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div> --}}
            {{--                     </div> --}}
            {{--                     <div class="flex items-center justify-between pt-4"> --}}
            {{--                         <div> --}}
            {{--                             <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div> --}}
            {{--                             <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div> --}}
            {{--                         </div> --}}
            {{--                         <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div> --}}
            {{--                     </div> --}}
            {{--                     <div class="flex items-center justify-between pt-4"> --}}
            {{--                         <div> --}}
            {{--                             <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div> --}}
            {{--                             <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div> --}}
            {{--                         </div> --}}
            {{--                         <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div> --}}
            {{--                     </div> --}}
            {{--                     <div class="flex items-center justify-between pt-4"> --}}
            {{--                         <div> --}}
            {{--                             <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div> --}}
            {{--                             <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div> --}}
            {{--                         </div> --}}
            {{--                         <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div> --}}
            {{--                     </div> --}}
            {{--                     <div class="flex items-center justify-between pt-4"> --}}
            {{--                         <div> --}}
            {{--                             <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div> --}}
            {{--                             <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div> --}}
            {{--                         </div> --}}
            {{--                         <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div> --}}
            {{--                     </div> --}}
            {{--                     <span class="sr-only">Loading...</span> --}}
            {{--                 </div> --}}
            {{--             </div> --}}
            {{--         </div> --}}
            {{--     </div> --}}
            {{-- </div> --}}

            <h5 class="text-lg font-bold tracking-tight text-gray-600 dark:text-white">Product Analytics</h5>
            {{-- Most Bought Products --}}
            <div class="grid grid-cols-1 gap-3 lg:grid-cols-2 mb-3">
                {{-- most bought --}}
                <div
                    class="block p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <h5 class="!mb-0 text-lg font-bold tracking-tight text-gray-700 dark:text-white">Most Bought
                            Products</h5>
                        {{-- <div class="btn-group btn-group-sm" role="group"> --}}
                        {{--     <div class="input-group-text" id="btnGroupAddon">Filter</div> --}}
                        {{--     <button type="button" class="btn btn-outline-primary dropdown-toggle" --}}
                        {{--         data-bs-toggle="dropdown" aria-expanded="false"> --}}
                        {{--         {{ $mostBoughtProductsFilter }} Days Filter --}}
                        {{--     </button> --}}
                        {{--     <ul class="dropdown-menu !pl-0"> --}}
                        {{--         <li> --}}
                        {{--             <button type="button" wire:click="$set('mostBoughtProductsFilter', '7')" --}}
                        {{--                 class="dropdown-item" href="#">7 Days --}}
                        {{--             </button> --}}
                        {{--         </li> --}}
                        {{--         <li> --}}
                        {{--             <button type="button" wire:click="$set('mostBoughtProductsFilter', '30')" --}}
                        {{--                 class="dropdown-item" href="#">1 Month --}}
                        {{--             </button> --}}
                        {{--         </li> --}}
                        {{--         <li> --}}
                        {{--             <button type="button" wire:click="$set('mostBoughtProductsFilter', '90')" --}}
                        {{--                 class="dropdown-item" href="#">2 Months --}}
                        {{--             </button> --}}
                        {{--         </li> --}}
                        {{--         <li> --}}
                        {{--             <button type="button" wire:click="$set('mostBoughtProductsFilter', '180')" --}}
                        {{--                 class="dropdown-item" href="#">3 Months --}}
                        {{--             </button> --}}
                        {{--         </li> --}}
                        {{--     </ul> --}}
                        {{-- </div> --}}
                    </div>

                    <div class="max-h-64 overflow-y-auto">
                        @if (sizeof($this->getMostBoughtProducts) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Products</th>
                                        <th scope="col">Categories</th>
                                        <th scope="col">Order Times</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->getMostBoughtProducts as $product)
                                        <tr wire:key="{{ $product->id }}">
                                            <th scope="row">{{ $product->id }}</th>
                                            <td class="text-ellipsis overflow-hidden">{{ $product->title }}</td>
                                            <td> {{ \App\Helpers\CustomHelper::maptopropercatetory($product->category) }}
                                            </td>
                                            <td>{{ $product->purchase_count }}</td>
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
                                    <th scope="col">#</th>
                                    <th scope="col">Products</th>
                                    <th scope="col">Categories</th>
                                    <th scope="col">Order Times</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($this->getRecentlyBoughtProducts as $product)
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

            <div class="grid grid-cols-1 gap-3 mb-3">
                {{-- product Returns --}}
                <div
                    class="block p-4 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <h5 class="!mb-0 text-lg font-bold tracking-tight text-gray-700 dark:text-white">Product Returns </h5>
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
                                     {{ $productsReturnsOrderFilter }}
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
                                    <th scope="col">#</th>
                                    <th scope="col">Products</th>
                                    <th scope="col">Categories</th>
                                    <th scope="col">Returned Items Count</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($this->getReturnsProducts as $product)
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

            {{-- sentiment analytics --}}
            <h5 class="text-lg font-bold tracking-tight text-gray-600 dark:text-white">Sentiment Analytics</h5>
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
                                        <th scope="col">#</th>
                                        <th scope="col">Products</th>
                                        <th scope="col">Categories</th>
                                        <th scope="col">Ratings</th>
                                        <th scope="col"># of Review</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($this->getMostPositiveReviewedProducts as $product)
                                        <tr wire:key="{{ $product->product_id }}">
                                            <th scope="row">{{ $product->product_id }}</th>
                                            <td class="text-ellipsis overflow-hidden">{{ $product->title }}</td>
                                            <td> {{ \App\Helpers\CustomHelper::maptopropercatetory($product->category) }}
                                            </td>
                                            <td>{{ $product->average_rating }}
                                                - {{ $product->average_rating >= 3 ? 'Positive' : 'Negative' }}</td>
                                            <td>
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
                                        <th scope="col">#</th>
                                        <th scope="col">Products</th>
                                        <th scope="col">Categories</th>
                                        <th scope="col">Ratings</th>
                                        <th scope="col"># of Review</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--                            {{ dd($this->getMostNegativeReviewedProducts) }} --}}
                                    @foreach ($this->getMostNegativeReviewedProducts as $product)
                                        {{--                                {{ var_dump($product->product_id) }} --}}
                                        <tr wire:key="{{ $product->product_id }}">
                                            <th scope="row">{{ $product->product_id }}</th>
                                            <td>{{ $product->title }}</td>
                                            <td> {{ \App\Helpers\CustomHelper::maptopropercatetory($product->category) }}
                                            </td>
                                            <td>{{ round($product->average_rating, 2)  }}
                                                - {{ $product->average_rating > 3 ? 'Positive' : 'Negative' }}</td>
                                            <td>
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
            <h5 class="text-lg font-bold tracking-tight text-gray-600 dark:text-white">Order Analytics</h5>
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
            </div>

            <h5 class="text-lg font-bold tracking-tight text-gray-600 dark:text-white">Shipment Analytics</h5>
            {{-- Shipment Analytics --}}
            <div class="grid grid-cols-1 gap-3 lg:grid-cols-2 mb-3">
                {{-- most shipped --}}
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
                                    <th scope="col">#</th>
                                    <th scope="col">Products</th>
                                    <th scope="col">Categories</th>
                                    <th scope="col">Purchase Times</th>
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

    {{-- </div> --}}

    @assets
        {{--    @vite(['resources/js/chartjs.js']) --}}
        {{--     import Chart from 'chart.js/auto'; --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    @endassets

    @script
        <script>
            const data = {
                labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                datasets: [{
                    lineTension: 0.35,
                    fill: true,
                    label: "Weekly Sales",
                    pointRadius: 0,
                    data: [18, 12, 6, 9, 12, 3, 9],
                    backgroundColor: [
                        // "rgba(255, 26, 104, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        // "rgba(255, 206, 86, 0.2)",
                        // "rgba(75, 192, 192, 0.2)",
                        // "rgba(153, 102, 255, 0.2)",
                        // "rgba(255, 159, 64, 0.2)",
                        // "rgba(0, 0, 0,  0.2)",
                    ],
                    borderColor: [
                        // "rgba(255, 26, 104, 1)",
                        "rgba(54, 162, 235, 1)",
                        // "rgba(255, 206, 86, 1)",
                        // "rgba(75, 192, 192, 1)",
                        // "rgba(153, 102, 255, 1)",
                        // "rgba(255, 159, 64, 1)",
                        // "rgba(0, 0, 0, 1)",
                    ],
                    borderWidth: 1,
                }, ],
            };

            // config
            const config = {
                type: "line",
                data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            display: false,
                        },
                        x: {
                            display: false,
                        },
                    },
                    plugins: {
                        legend: {
                            display: false,
                        },
                        tooltip: {
                            enabled: false,
                        },
                    },
                },
            };

            const myChart_2 = new Chart(
                document.getElementById("shop-perception-chart"),
                config,
            );
            const myChart_3 = new Chart(
                document.getElementById("shop-sentiment-chart"),
                config,
            );
        </script>
    @endscript
