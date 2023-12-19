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
                                    <button class="accordion-button collapsed d-block" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{$key}}-{{$product->id}}" aria-expanded="false" aria-controls="flush-collapse-{{$key}}-{{$product->id}}">
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
                                                <i class="bi bi-star-fill text-yellow-400 my-auto"></i>{{ $product->rating }}
                                            </div>
                                            <div class="col-span-3 mb-0 py-3 !text-gray-800 !font-light">
                                                Model Suggested Restock Amount {{fake()->numberBetween(3, 45)}}
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="flush-collapse-{{$key}}-{{$product->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body flex content-center">
                                        <img src="{{ asset('restock/future_predictions_plot'.fake()->numberBetween(0, 37).'.png') }}" alt="{{asset('img/notenoughdata.png')}}" style="max-height: 500px">
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















    </div>

</div>

@assets
{{--    @vite(['resources/js/chartjs.js'])--}}
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
