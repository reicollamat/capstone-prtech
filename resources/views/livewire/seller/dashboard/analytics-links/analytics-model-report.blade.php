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
