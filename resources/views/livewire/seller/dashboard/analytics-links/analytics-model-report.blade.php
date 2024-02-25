<div class="relative container-fluid p-4 w-full ">
    <div class="w-full grid grid-cols-4 gap-3">
        <div class="p-3 border border-gray-200 bg-white rounded-lg">
            <div class="h-full flex flex-wrap items-center">
                <div class="relative h-full w-full max-w-full flex-grow flex-1 justify-end">
                    <h6 class="uppercase mb-1 text-sm font-semibold text-green-600">Restock Now</h6>
                    <hr class="m-0 w-16 text-green-900">
                    <div class="absolute bottom-0 right-0">
                        <div class="w-full flex justify-end">
                            <button type="button" class="text-sm text-green-900">View</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-3 border border-gray-200 bg-white rounded-lg">
            <div class="h-full flex flex-wrap items-center">
                <div class="relative h-full w-full max-w-full flex-grow flex-1 justify-end">
                    <h6 class="uppercase mb-1 text-sm font-semibold text-yellow-600">Restock Soon</h6>
                    <hr class="m-0 w-16 text-yellow-900">
                    <div class="absolute bottom-0 right-0">
                        <div class="w-full flex justify-end">
                            <button type="button" class="text-sm text-yellow-900">View</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-3 col-span-2 border border-gray-200 bg-white rounded-lg">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full max-w-full flex-grow flex-1">
                    <h6 class="uppercase mb-1 text-sm font-semibold text-blueGray-500">REVENUE</h6>
                    <div class="pt-2">
                        {{-- <h4 class="mb-0 tracking-tighter text-lg text-gray-500">REVENUE</h4> --}}
                        <div class="">
                            <h4 class="mb-0 text-gray-700"><span class="text-gray-500">₱</span>12334.59</h4>
                            <div class="flex items-center">
                                <span class="text-sm text-green-800 tracking-wide">3+ </span>
                                <span class="text-sm tracking-tighter text-gray-500">&nbsp;Since Last Week</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="p-3 border border-gray-200 bg-white rounded-xl"> --}}
        {{--     <div class="flex flex-wrap items-center"> --}}
        {{--         <div class="relative w-full max-w-full flex-grow flex-1 pb-2"> --}}
        {{--             <h6 class="uppercase mb-1 text-xs font-semibold text-blueGray-500">Performance</h6> --}}
        {{--         </div> --}}
        {{--     </div> --}}
        {{-- </div> --}}
    </div>
    <div class="mt-3 p-3 border border-gray-200 bg-white rounded-lg">
        <div class="flex items-center justify-between pb-3">
            <div>
                <h4 class="mb-0 text-2xl tracking-wide text-gray-600">Forecast : </h4>
            </div>
            <div class="flex gap-2 items-center">
                <div class="flex gap-1.5 items-center">
                    <p class="mb-0 text-gray-600 text-xs tracking-tight">Total summary in</p>
                    <div class="btn-group btn-group-sm" role="group">
                        <button type="button" class="!font-medium btn btn-outline-primary dropdown-toggle "
                                data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $summary }}
                        </button>
                        <ul class="dropdown-menu !pl-0">
                            <li>
                                <button type="button" wire:click="$set('summary', 'Weekly')" class="dropdown-item"
                                        href="#">Weekly
                                </button>
                            </li>
                            <li>
                                <button type="button" wire:click="$set('summary', 'Monthly')" class="dropdown-item"
                                        href="#">Monthly
                                </button>
                            </li>
                            <li>
                                <button type="button" wire:click="$set('summary', 'Yearly')" class="dropdown-item"
                                        href="#">Yearly
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="btn-group btn-group-sm" role="group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        {{ $productselected != null ? $productselected : 'Select Product' }}
                    </button>
                    <ul class="dropdown-menu !pl-0">
                        <li>
                            <button type="button" wire:click="$set('recentlyBoughtProductsFilter', '7')"
                                    class="dropdown-item" href="#">Weekly
                            </button>
                        </li>
                        <li>
                            <button type="button" wire:click="$set('recentlyBoughtProductsFilter', '30')"
                                    class="dropdown-item" href="#">Monthly
                            </button>
                        </li>
                        <li>
                            <button type="button" wire:click="$set('recentlyBoughtProductsFilter', '90')"
                                    class="dropdown-item" href="#">Yearly
                            </button>
                        </li>
                    </ul>
                </div>
                <div>
                    <form action="#" class="d-flex" role="search">
                        <input class="form-control " type="search" placeholder="Search Product"
                               aria-label="Search Product">
                    </form>
                </div>
            </div>
        </div>
        <div>
            <div class="block xl:flex gap-2">

                {{-- <div class="p-2 relative flex-1"> --}}
                {{--     <div class="inset-0"> --}}
                {{--         <div class="flex items-end w-full h-full overflow-hidden" wire:ignore> --}}
                {{--             <canvas class="w-full h-full" id="productSalesChart"></canvas> --}}
                {{--         </div> --}}
                {{--     </div> --}}
                {{-- </div> --}}
                <div class="flex-auto border border-gray-200">
                    <div class="p-2 h-full w-full relative flex justify-center items-center" wire:ignore>
                        <canvas class="!w-full !h-[300px]" id="productSalesChart"></canvas>
                        {{-- <div> --}}
                        {{--     <h5 class="text-gray-600 text-3xl tracking-wider">Awaiting User Input</h5> --}}
                        {{--     <h6 class="text-gray-500 text-xl text-center tracking-tighter">Select Product to View</h6> --}}
                        {{-- </div> --}}
                    </div>
                </div>
                {{-- <div class="p-2 "> --}}
                {{--     <div class="relative"> --}}
                {{--         <canvas class="!w-full !h-[350px]" id="productSalesChart"></canvas> --}}
                {{--     </div> --}}

                {{--      --}}{{-- <div class="relative "> --}}
                {{--      --}}{{--     <div class="inset-0"> --}}
                {{--      --}}{{--         <div class="flex items-end w-full h-full overflow-hidden" wire:ignore> --}}
                {{--      --}}{{--             <canvas class="h-full w-full" id="productSalesChart"></canvas> --}}
                {{--      --}}{{--         </div> --}}
                {{--      --}}{{--     </div> --}}
                {{--      --}}{{--      --}}{{--  --}}{{-- <canvas width="496" height="291" --}}
                {{--      --}}{{--      --}}{{--  --}}{{--     style="display: block; box-sizing: border-box; height: 300px; width: 100%;" --}}
                {{--      --}}{{--      --}}{{--  --}}{{--     id="shop-sales-chart"> --}}
                {{--      --}}{{--      --}}{{--  --}}{{-- </canvas>  --}}
                {{--      --}}{{-- </div> --}}
                {{-- </div> --}}
                <div class="pt-2 px-2">
                    <div>
                        <label for="inputPassword5"
                               class="form-label tracking-tight uppercase text-sm font-medium">Selected
                            Product</label>
                        <input type="text" placeholder="Selected Product" id="inputPassword5"
                               class="form-control form-control-sm" aria-describedby="passwordHelpBlock">
                    </div>

                    <div class="mt-2">
                        <label for="inputPassword5"
                               class="form-label tracking-tight uppercase text-sm font-medium">Price</label>
                        <input type="text" placeholder="Product Price" id="inputPassword5"
                               class="form-control form-control-sm" aria-describedby="passwordHelpBlock">
                    </div>

                    <div class="mt-2">
                        <label for="predictrange"
                               class="form-label tracking-tight uppercase text-sm font-medium">Predict
                            for the next</label>

                        <select class="form-select form-select-sm" id="predictrange"
                                aria-label="Small select example" wire:model.live.debounce="predictrange">
                            <option>Select Range</option>
                            <option value="week">Week</option>
                            <option value="month">Month</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>

                    @if ($predictrange == 'custom')
                        <div class="mt-2">
                            <label for="inputPassword5"
                                   class="form-label tracking-tight uppercase text-sm font-medium sr-only">custome
                                date</label>
                            <input type="number" placeholder="Type here" id="inputPassword5"
                                   class="form-control form-control-sm" aria-describedby="passwordHelpBlock">
                        </div>
                    @endif

                    <div class="mt-2">
                        <label for="predictinterval"
                               class="form-label tracking-tight uppercase text-sm font-medium">Dataset
                            Interval</label>

                        <select class="form-select form-select-sm" id="predictinterval"
                                aria-label="Small select example" wire:model.live.debounce="predictinterval">
                            <option>Select Interval</option>
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-2 mt-2">
                        <div class="p-2">
                            <button type="button" class="w-full btn btn-sm btn-outline-secondary ">Clear</button>
                        </div>
                        <div class="p-2">
                            <button type="button" class="w-full btn btn-sm btn-primary ">Run</button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="w-full mt-3 flex justify-between">
                <div class="flex gap-3">
                    {{-- <button type="button" class="btn btn-sm btn-outline-secondary ">View Accuracy Report</button> --}}
                    <div x-data="{ showModal: false }" @keydown.window.escape="showModal = false">
                        <div class="h-auto">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                    @click="showModal = !showModal" data-bs-target="#exampleModal">View Accuracy Report
                            </button>
                        </div>

                        <div x-cloak x-transition.opacity x-show="showModal" class="fixed inset-0 bg-black/50"></div>

                        <div x-cloak x-transition.duration.500ms x-show="showModal"
                             class="fixed inset-0 z-50 grid place-content-center">
                            <div @click.away="showModal = false"
                                 class="min-h-full rounded-xl min-w-[500px] bg-white items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Accuracy Report</h1>
                                        </div>
                                        <div class="flex justify-center modal-body" x-transition.opacity>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full flex gap-2 pt-3 justify-end">
                                    <button type="button" class="btn btn-outline-secondary"
                                            @click="showModal = false">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <button id="charttoimageexport" type="button" class="btn btn-sm btn-info">Save to Image
                    </button>


                    <div x-data="{ showModal: false }" @keydown.window.escape="showModal = false">
                        <div class="h-auto">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-secondary"
                                    @click="showModal = !showModal" data-bs-target="#exampleModal">Generate Purchase
                                Order
                            </button>
                        </div>

                        <div x-cloak x-transition.opacity x-show="showModal" class="fixed inset-0 bg-black/50"></div>

                        <div x-cloak x-transition.duration.500ms x-show="showModal"
                             class="fixed inset-0 z-50 grid place-content-center">
                            <div @click.away="showModal = false"
                                 class="min-h-full rounded-xl min-w-[500px] bg-white items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Accuracy Report</h1>
                                        </div>
                                        <div class="flex justify-center modal-body" x-transition.opacity>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full flex gap-2 pt-3 justify-end">
                                    <button type="button" class="btn btn-outline-secondary"
                                            @click="showModal = false">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- <button type="button" class="btn btn-sm btn-outline-secondary ">Print</button> --}}
                {{-- <div> --}}
                {{--     <button type="button" class="btn btn-sm btn-outline-secondary ">Print</button> --}}
                {{-- </div> --}}
                {{-- <div class="flex gap-2"> --}}
                {{--     <button type="button" class="btn btn-sm btn-outline-secondary ">Clear</button> --}}
                {{--     <button type="button" class="btn btn-sm btn-primary ">Run Prediction</button> --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <div class="mt-3 p-3 border border-gray-200 bg-white rounded-lg">
        test
    </div>
</div>
{{--@script--}}
<script>
    // Sample data for product sales
    // let dates = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28,
    //     29, 30
    // ];
    // let productSales = [
    //     5,
    //     15,
    //     2,
    //     12,
    //     12,
    //     11,
    //     3,
    //     9,
    //     7,
    //     4,
    //     16,
    //     20,
    //     8,
    //     19,
    //     19,
    //     16,
    //     3,
    //     13,
    //     3,
    //     10,
    //     13,
    //     8,
    //     5,
    //     7,
    //     18,
    //     15,
    //     20,
    //     12,
    //     18,
    //     4
    // ];

    // // Generate product sales between 1 and 20
    // for (let i = 0; i < dates.length; i++) {
    //     productSales.push(Math.floor(Math.random() * 20) + 1);
    // }

    // console.log(dates, productSales);

    {{-- new Chart(document.getElementById('productSalesChart'), { --}}
    {{--    type: 'line', --}}
    {{--    data: { --}}
    {{--        labels: {!! json_encode($test_a) !!}, --}}
    {{--        datasets: [{ --}}
    {{--            label: 'Product Sold Quantity', --}}
    {{--            data: {!! json_encode($test_b) !!}, --}}
    {{--            backgroundColor: 'rgba(54, 162, 235, 0.2)', --}}
    {{--            borderColor: 'rgba(54, 162, 235, 1)', --}}
    {{--            pointRadius: 5, --}}
    {{--            pointHoverRadius: 7, --}}
    {{--            pointBackgroundColor: 'rgba(54, 162, 235, 1)', --}}
    {{--            pointBorderColor: 'white', --}}
    {{--        }] --}}
    {{--    }, --}}
    {{--    options: { --}}
    {{--        responsive: true, --}}
    {{--        maintainAspectRatio: false, --}}
    {{--        plugins: { --}}
    {{--            legend: { --}}
    {{--                display: false, --}}
    {{--            }, --}}
    {{--        }, --}}
    {{--    } --}}
    {{-- }); --}}

    let chart = new Chart(document.getElementById('productSalesChart'), {
        type: "line",
        data: {
            labels: {!! json_encode($test_a) !!},
            datasets: [{
                label: 'Product Sold Quantity',
                borderColor: '#009aff',
                data: {!! json_encode($test_b) !!},
                backgroundColor: '#bae0ff',
                pointStyle: 'circle',
                pointRadius: 5,
                pointHoverRadius: 4,
                tension: 0.2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
            },
        }
    });

</script>
{{--@endscript--}}
