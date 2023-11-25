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
        <div class="grid lg:grid-cols-4 gap-4 px-4">
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
        </div>

    </div>
</div>

@assets
    @vite(['resources/js/charts/analytics-model-report-header.js'])
@endassets
