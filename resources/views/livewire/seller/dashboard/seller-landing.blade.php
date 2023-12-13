<div class="h-full w-full">
    {{-- Stop trying to control. --}}
    <div class="relatve bg-blue-500 pb-44 pt-8">
        <div>
            <div class="header welcome transition duration-300 ease-in-out px-4">
                <div class="p-2 d-md-flex lg:!justify-between gap-2 items-center bg-transparent rounded mb-2">
                    <div>
                        <header class="gap-2 flex items-center col-xs-12 col-md p-0 ">
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                                data-dropdown-placement="bottom">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-9 h-9 rounded-full"
                                    src="https://images.unsplash.com/photo-1523779917675-b6ed3a42a561?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8d29tYW4lMjBibHVlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=face&w=500&q=200"
                                    alt="user photo">
                            </button>
                            <h1
                                class="text-base lg:text-xl mb-0  tracking-normal font-bold text-white title dark:text-gray-100">
                                Good {{ CustomHelper::getTimeOfDay() }} {{ Auth::user()->first_name ?? 'Rafael' }}
                            </h1>
                            <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                                class="d-none d-md-block  w-7 h-7 -rotate-12">
                                <path
                                    d="m16.1 48.5c-.5-.1-.9-.2-1.4-.4s-.9-.3-1.3-.5c-.9-.4-1.7-.9-2.5-1.5-1.6-1.1-2.9-2.6-3.9-4.4-1-1.7-1.6-3.7-1.7-5.6-.1-1 0-1.9.1-2.9.1-.5.2-.9.3-1.4s.3-.9.4-1.4l.1 1.4c0 .5.1.9.2 1.4.1.9.3 1.8.5 2.6.4 1.7 1 3.3 1.9 4.8s1.9 2.9 3.2 4.2c.6.6 1.3 1.2 2 1.8.3.3.7.6 1.1.9zm-.3 3.6c-.3.2-.7.3-1.1.4s-.7.2-1.1.2c-.7.1-1.5.2-2.3.1-1.5-.1-3.1-.5-4.4-1.2-1.4-.7-2.6-1.8-3.4-3.1-.4-.6-.8-1.3-1.1-2-.1-.3-.2-.7-.3-1.1 0-.3-.1-.6-.1-1 .3.3.5.6.7.8.3.3.5.6.7.8.5.5.9 1 1.4 1.4 1 .9 2 1.7 3.2 2.3 1.1.6 2.4 1.1 3.6 1.5.6.2 1.3.3 2 .5.3.1.7.1 1 .2.5.1.8.1 1.2.2m22.6-48.6c.5.1.9.3 1.4.5s.9.4 1.3.6c.9.5 1.7 1 2.5 1.6 1.6 1.2 2.9 2.8 3.8 4.6s1.4 3.8 1.4 5.7c0 1-.1 1.9-.3 2.9-.1.5-.2.9-.4 1.4s-.3.9-.5 1.3l-.1-1.4c0-.5 0-.9-.1-1.4l-.3-2.7c-.3-1.7-.9-3.4-1.7-5s-1.8-3-3-4.3c-.6-.7-1.3-1.3-1.9-2-.3-.3-.7-.6-1.1-.9zm8.7-.4c.4.1.7.2 1 .4.3.1.7.3 1 .5.6.4 1.2.8 1.8 1.3 1.1 1 2 2.2 2.5 3.6.6 1.4.8 2.9.6 4.4-.1.7-.3 1.4-.5 2.1-.1.3-.3.7-.4 1-.2.3-.3.6-.6.9v-1-1c0-.7-.1-1.3-.1-1.9-.2-1.3-.4-2.5-.9-3.6-.5-1.2-1.1-2.2-1.8-3.3-.4-.5-.8-1.1-1.2-1.6-.2-.3-.4-.5-.7-.8-.2-.5-.5-.8-.7-1"
                                    fill="#42ade2" />
                                <path
                                    d="m10 18c-2 .9-2.7 3.3-1.8 5.3l12.6 26.3 7-3.3-12.6-26.4c-.9-2-3.2-2.9-5.2-1.9m33.1 20.9 7.4-3.5-14.4-30c-1-2-3.4-2.9-5.5-1.9-2 1-2.9 3.4-1.9 5.5z"
                                    fill="#ffdd67" />
                                <path
                                    d="m30.7 3.4c-.2.1-.4.2-.6.4 1.9-.5 3.9.4 4.8 2.2l14.4 30 1.3-.6-14.4-30c-1-2.1-3.4-3-5.5-2"
                                    fill="#eba352" />
                                <path d="m27.8 46.2 7.7-3.7-14.7-30.6c-1-2.1-3.6-3.1-5.7-2.1s-3 3.6-2 5.7z"
                                    fill="#ffdd67" />
                                <path
                                    d="m15.1 9.9c-.2.1-.4.2-.6.4 1.9-.5 4.1.4 5 2.3l9.1 19.1 2.2 1.3-10-21c-1-2.2-3.5-3.1-5.7-2.1"
                                    fill="#eba352" />
                                <path d="m34.3 40.1 7.7-3.7-14.7-30.6c-1-2.1-3.6-3.1-5.7-2-2.1 1-3 3.6-2 5.7z"
                                    fill="#ffdd67" />
                                <path
                                    d="m21.6 3.7c-.2.1-.4.3-.6.4 1.9-.5 4.1.4 5 2.3l10.3 21.6 2.2 1.3-11.2-23.5c-1-2.2-3.6-3.1-5.7-2.1m-11.6 14.3c-.2.1-.4.2-.6.4 1.8-.5 3.7.4 4.5 2.2l7.5 15.7 2.2 1.3-8.4-17.6c-.9-2.1-3.2-3-5.2-2"
                                    fill="#eba352" />
                                <path
                                    d="m60.8 15c-2.7-2.1-7.1.2-9.3 7.4-1.5 5-1.7 6.5-4.9 8l-1.8-3.7s-28.4 13.7-27.3 15.9c0 0 3.4 10.6 9.2 15.5 8.6 7.4 28.7-.5 29.6-19.6.5-11.1 7.4-21.2 4.5-23.5"
                                    fill="#ffdd67" />
                                <g fill="#eba352">
                                    <path
                                        d="m60.8 15c-.5-.4-1.1-.6-1.7-.7.1.1.3.1.4.2 3 2.3-.1 7.6-1.8 12.4-1.4 3.8-2.6 7.7-2.4 11.5.8 16.6-15.9 24.5-25.9 21.5 9.8 4.1 28-3.7 27.2-21-.2-3.8.9-7.5 2.4-11.5 1.6-4.8 4.7-10.1 1.8-12.4" />
                                    <path
                                        d="m47.5 30c-6.2.7-15.3 9.6-8.9 19.3-4.7-9.8 3-16.4 7.9-18.7.5-.4 1-.6 1-.6" />
                                </g>
                            </svg>
                        </header>
                    </div>
                    <div>
                        <div x-data="{ isNotificationOpen: false }" class="relative" @mouseleave="isNotificationOpen = false">
                            <button
                                class="flex gap-1.5 p-1.5 items-center self-center align-middle text-white font-semibold text-lg"
                                @mouseover="isNotificationOpen = true">
                                <i class="bi bi-bell text-yellow-400"></i>
                                <span>
                                    Notifications
                                </span>
                            </button>
                            <div x-cloak x-show="isNotificationOpen" @mouseleave="isNotificationOpen = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90"
                                class="absolute right-0 z-20 w-96 py-3 overflow-hidden origin-top-right bg-transparent front rounded">
                                <div class="dropdown-arrow bg-white rounded shadow border-1 border-gray-300 ">

                                    <div class="flex justify-center gap-2 py-2 px-2">
                                        <p class="mb-0 font-base text-gray-700 ">My Notifications</p>
                                        <i class="bi bi-bell"></i>
                                    </div>
                                    <hr class="my-0">
                                    <div class="w-full h-full flex justify-center">
                                        <div class="flex justify-center items-center p-3 text-gray-700">
                                            <h6 class="mb-0">Notifications Empty</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--         content --}}
            <div class="row mb-2 g-2 g-mb-4 px-8 mx-0">
                <div class="col">
                    <div class="p-3 bg-white rounded shadow-md h-100 d-flex flex-column border !border-red-500">
                        <small class="text-muted d-block mb-1">Sales Today</small>
                        <p class="h3 text-black fw-light mt-auto">
                            {{ $this->getSalesToday() ?? 0 }}

                            <small class="text-base text-success">
                                {{ number_format($this->getSalesTodayPercentage(), 2) }} %
                            </small>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 bg-white rounded shadow-md h-100 d-flex flex-column">
                        <small class="text-muted d-block mb-1">Visitors</small>
                        <p class="h3 text-black fw-light mt-auto">
                            {{ $this->getVisitors() ?? 0 }}

                            {{-- <small class="text-base text-danger"> --}}
                            {{--     -30.76 % --}}
                            {{-- </small> --}}
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 bg-white rounded shadow-md h-100 d-flex flex-column">
                        <small class="text-muted d-block mb-1">Pending Orders</small>
                        <p class="h3 text-black fw-light mt-auto">
                            {{ $this->getTotalOrders ?? 0 }}
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 bg-white rounded shadow-md h-100 d-flex flex-column" wire:poll.300s>
                        <small class="text-muted d-block mb-1">Total Earnings <span
                                class="text-xs text-gray-500">Updated every 5 minutes</span></small>
                        <p class="h3 text-black fw-light mt-auto">
                            {{ $this->getTotalEarnings->total_earnings ?? 0 }}
                            {{--                            @dd($this->getTotalEarnings->total_earnings) --}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        {{--         fiest chart --}}
        <div class="-my-32 px-3">
            <div class="flex flex-wrap xl:gap-0">
                <div class="w-full xl:w-8/12 ">
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full h-full mb-8 shadow-md rounded-lg bg-blueGray-800">
                        <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full max-w-full flex-grow flex-1">
                                    <h6 class="uppercase mb-1 text-xs font-semibold text-blueGray-200">Overview</h6>
                                    <h2 class="text-xl font-semibold text-white">Sales value</h2>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 flex-auto">
                            <div class="relative h-350-px">
                                <div class="inset-0">
                                    <div class="flex items-end w-full h-full overflow-hidden" wire:ignore>
                                        <canvas width="496" height="291" id="shop-sales-chart"></canvas>
                                    </div>
                                </div>
                                {{-- <canvas width="496" height="291" --}}
                                {{--     style="display: block; box-sizing: border-box; height: 300px; width: 100%;" --}}
                                {{--     id="shop-sales-chart"> --}}
                                {{-- </canvas>  --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full xl:w-4/12 xl:pl-6 margin-top">
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full h-full mb-8 shadow-md rounded-lg bg-white">
                        <div class="rounded-t mb-0 px-4 pt-3 bg-transparent">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full max-w-full flex-grow flex-1">
                                    <h6 class="uppercase mb-1 text-xs font-semibold text-blueGray-500">Performance</h6>
                                    <h2 class="text-xl font-semibold text-blueGray-800">Total orders</h2>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 flex-auto">
                            <div class="relative h-350-px" style="height:auto">
                                <div class="relative overflow-x-auto sm:rounded-lg">
                                    <table
                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs py-2.5 text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="py-1.5">
                                                    Reference #
                                                </th>
                                                <th scope="col" class="py-1.5">
                                                    Amount
                                                </th>
                                                <th scope="col" class="py-1.5">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($this->getOrders as $item)
                                                <tr
                                                    class="bg-white text-base dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                    <th scope="row"
                                                        class="py-2.5 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $item->reference_number }}
                                                    </th>
                                                    <td class="py-2.5 text-base">
                                                        {{ $item->total_amount }}
                                                    </td>
                                                    <td class="py-2.5 text-base">
                                                        <a class="decoration-0 no-underline text-gray-600"
                                                            href="{{ route('order-list') }}">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{--                                @foreach ($this->getOrders as $item) --}}
                                {{--                                    <p>{{ $item->reference_number }}</p> --}}
                                {{--                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-40 w-full">
        <h4 class="tracking-tight font-light text-gray-500 text-center">Shop Sentiment Analysis</h4>
    </div>
    <div class="w-full pb-8 mt-4 px-3 gap-4">
        <div class="grid lg:grid-cols-2 gap-4">
            <div class="relative bg-white rounded shadow shadow-cyan-500/50">
                <div class="px-3 pt-6 pb-6 text-center relative z-10">
                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Shop Positive Sentiment Overtime</h4>
                    <h3 class="text-2xl font-semibold leading-tight my-1.5 text-green-600">{{ $this->getPositveCommentsCount() }}</h3>
                    {{-- <p class="text-xs text-green-500 leading-tight">▲ 57.1%</p> --}}
                </div>
                <div class="absolute inset-0 pt-12">
                    <div class="flex items-end w-full h-full overflow-hidden">
                        <canvas id="shop-perception-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="relative bg-white rounded shadow shadow-cyan-500/50">
                <div class="px-3 pt-6 pb-6 text-center relative z-10">
                    <h4 class="text-sm uppercase text-gray-500 leading-tight">Shop Negative Sentiment Overtime</h4>
                    <h3 class="text-2xl  font-semibold leading-tight my-1.5 text-red-600">{{ $this->getNegativeCommentsCount() }}</h3>
                    {{-- <p class="text-xs text-green-500 leading-tight">▲ 57.1%</p> --}}
                </div>
                <div class="absolute inset-0 pt-12">
                    <div class="flex items-end w-full h-full overflow-hidden">
                        <canvas id="shop-sentiment-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 grid lg:grid-cols-2 gap-4" wire:init="fetchNegativeCommentsApi">
            <div x-data="{ showModal: false }" @keydown.window.escape="showModal = false">
                <button type="button" @click="showModal = !showModal">
                    <img src="{{ asset($fetchNegativeCommentsApi) }}"
                        class="img-fluid img-thumbnail rounded-start border-0 self-center" alt="">
                </button>

                <div x-cloak x-transition.opacity x-show="showModal" class="fixed inset-0 bg-black/50"></div>

                <div x-cloak x-transition.duration.500ms x-show="showModal"
                    class="fixed inset-0 z-50 grid place-content-center">
                    <div @click.away="showModal = false"
                        class="min-h-full rounded-xl min-w-[500px] bg-white items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Image Preview</h1>
                                    --}}
                                </div>
                                <div class="flex justify-center modal-body" x-transition.opacity>
                                    <img src="{{ asset('storage/2023-12-14_positive.png') }}"
                                        class="img-fluid img-thumbnail rounded-start border-0 self-center"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex gap-2 pt-3 justify-end">
                            <button type="button" class="btn btn-outline-secondary" @click="showModal = false">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div x-data="{ showModal: false }" @keydown.window.escape="showModal = false">

                <button type="button" @click="showModal = !showModal">
                    <img src="{{ asset('storage/2023-12-14_negative.png') }}"
                        class="img-fluid img-thumbnail rounded-start border-0 self-center" alt="">
                </button>

                <div x-cloak x-transition.opacity x-show="showModal" class="fixed inset-0 bg-black/50"></div>

                <div x-cloak x-transition.duration.500ms x-show="showModal"
                    class="fixed inset-0 z-50 grid place-content-center">
                    <div @click.away="showModal = false"
                        class="min-h-full rounded-xl min-w-[500px] bg-white items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Image Preview</h1>
                                    --}}
                                </div>
                                <div class="flex justify-center modal-body" x-transition.opacity>
                                    <img src="{{ asset('storage/2023-12-14_negative.png') }}"
                                        class="img-fluid img-thumbnail rounded-start border-0 self-center"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex gap-2 pt-3 justify-end">
                            <button type="button" class="btn btn-outline-secondary" @click="showModal = false">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div x-data="{ showModal: false }" @keydown.window.escape="showModal = false"> --}}
    {{--     <button type="button" @click="showModal = !showModal" class="underline">Toggle</button> --}}

    {{--     <div x-cloak x-transition.opacity x-show="showModal" class="fixed inset-0 bg-black/50"></div> --}}

    {{--     <div x-cloak x-transition.duration.500ms x-show="showModal" --}}
    {{--         class="fixed inset-0 z-50 grid place-content-center"> --}}
    {{--         <div @click.away="showModal = false" --}}
    {{--             class="min-h-full rounded-xl min-w-[500px] bg-white items-end justify-center p-4 text-center sm:items-center sm:p-0"> --}}
    {{--             <div class="modal-dialog modal-lg modal-dialog-centered"> --}}
    {{--                 <div class="modal-content"> --}}
    {{--                     <div class="modal-header"> --}}
    {{--                          --}}{{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Image Preview</h1> --}}
    {{--                         --}}
    {{--                     </div> --}}
    {{--                     <div class="flex justify-center modal-body" x-transition.opacity> --}}
    {{--                         <img src="{{ asset('storage/2023-12-14_negative.png') }}" --}}
    {{--                             class="img-fluid img-thumbnail rounded-start border-0 self-center select-none" --}}
    {{--                             alt=""> --}}
    {{--                     </div> --}}
    {{--                 </div> --}}
    {{--             </div> --}}
    {{--             <div class="w-full flex gap-2 pt-3 justify-end"> --}}
    {{--                 <button type="button" class="btn btn-outline-secondary" @click="showModal = false"> --}}
    {{--                     Close --}}
    {{--                 </button> --}}
    {{--             </div> --}}
    {{--         </div> --}}
    {{--     </div> --}}
    {{-- </div> --}}

</div>

@script
    <script>
        // This Javascript will get executed every time this component is loaded onto the page...
        console.log('hello');

        new Chart("shop-sales-chart", {
            type: "line",
            data: {
                labels: {!! json_encode($chart_labels) !!},
                datasets: [{
                    borderColor: '#009aff',
                    data: {!! json_encode($chart_data) !!},
                    backgroundColor: '#bae0ff',
                    pointStyle: 'circle',
                    pointRadius: 7,
                    pointHoverRadius: 7.5
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
                scales: {
                    y: {
                        beginAtZero: true,
                        // display: false,
                    },
                    x: {
                        // display: false,
                    },
                },
            }
        });
    </script>
@endscript
