<div class="relative container-fluid p-4 w-full ">
    <div class="w-full grid grid-cols-4 gap-3">
        <div class="p-3 border border-gray-200 bg-white rounded-lg">
            <div class="h-full flex flex-wrap items-center">
                <div class="relative h-full w-full max-w-full flex-grow flex-1 justify-end">
                    <h6 class="uppercase mb-1 text-sm font-semibold text-red-700">Restock Now</h6>
                    <hr class="m-0 w-16 text-green-900">
                    <div class="flex gap-3 p-3">
                        <div class="ml-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-14 h-14" id="product">
                                <path fill="#c80000"
                                    d="M28 42H4a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1V43a1 1 0 0 0-1-1zM20 36h24a1 1 0 0 0 1-1V17a1 1 0 0 0-1-1H20a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1zM60 42H36a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1V43a1 1 0 0 0-1-1z">
                                </path>
                                <g fill="#4D4D4D">
                                    <path
                                        d="M29 36H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h26a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zM18.115 17.668a1.002 1.002 0 0 0 1.277.609L43.9 9.599a1 1 0 0 0 .609-1.277l-2.002-5.656a.998.998 0 0 0-.512-.568 1.01 1.01 0 0 0-.765-.041l-24.509 8.678a1.005 1.005 0 0 0-.609 1.277l2.003 5.656zM61 36H35a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h26a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1z">
                                    </path>
                                </g>
                                <g fill="#CCC">
                                    <path
                                        d="M49.04 11.091h4v2h-4zM55.04 11.091h2v2h-2zM51.035 5.22l.958 1.755-3.51 1.916-.959-1.756zM54.546 3.301l.958 1.756-1.756.958-.958-1.756zM48.48 15.287l3.512 1.917-.958 1.756-3.512-1.918zM53.744 18.16l1.756.96-.959 1.754-1.755-.958z">
                                    </path>
                                </g>
                                <path fill="#FFF"
                                    d="M19.02 52h-6.04A2.984 2.984 0 0 1 10 49.02c0-1.683 1.337-3.02 2.98-3.02h6.04A2.984 2.984 0 0 1 22 48.98c0 1.683-1.337 3.02-2.98 3.02zm-6.04-4a.98.98 0 0 0-.98.98c0 .581.439 1.02.98 1.02h6.04a.98.98 0 0 0 .98-.98c0-.581-.439-1.02-.98-1.02h-6.04zM51.02 52h-6.04A2.984 2.984 0 0 1 42 49.02c0-1.683 1.337-3.02 2.98-3.02h6.04A2.984 2.984 0 0 1 54 48.98c0 1.683-1.337 3.02-2.98 3.02zm-6.04-4a.98.98 0 0 0-.98.98c0 .581.439 1.02.98 1.02h6.04a.98.98 0 0 0 .98-.98c0-.581-.439-1.02-.98-1.02h-6.04zM35.02 26h-6.04A2.984 2.984 0 0 1 26 23.02c0-1.683 1.337-3.02 2.98-3.02h6.04A2.984 2.984 0 0 1 38 22.98c0 1.683-1.337 3.02-2.98 3.02zm-6.04-4a.98.98 0 0 0-.98.98c0 .581.439 1.02.98 1.02h6.04a.98.98 0 0 0 .98-.98c0-.581-.439-1.02-.98-1.02h-6.04z">
                                </path>
                                <path fill="#ec0000"
                                    d="M28 33a23.8 23.8 0 0 1-9-1.756V35a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1v-9.462C41.184 30.052 35.001 33 28 33zM12 59a23.8 23.8 0 0 1-9-1.756V61a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1v-9.462C25.184 56.052 19.001 59 12 59zM44 59a23.8 23.8 0 0 1-9-1.756V61a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1v-9.462C57.184 56.052 51.001 59 44 59z">
                                </path>
                                <path fill="#FFF" d="M37 30h4v2h-4zM21 56h4v2h-4zM53 56h4v2h-4z"></path>
                            </svg>
                        </div>
                        <div class="w-full flex justify-center items-center">
                            <h3 class="text-black-50">{{ count($restock_now_predict) ?? 0 }}</h3>
                        </div>
                    </div>
                    <div class="absolute bottom-0 right-0">
                        <div class="w-full flex justify-end">
                            <div wire:ignore x-data="{ showModal: false }" @keydown.window.escape="showModal = false">
                                <div class="h-auto">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="text-sm text-green-900"
                                        @click="showModal = !showModal" data-bs-target="#exampleModal">View Products
                                    </button>
                                </div>

                                <div x-cloak x-transition.opacity x-show="showModal"
                                    class="fixed inset-0 bg-black/50 z-1"></div>

                                <div x-cloak x-transition.duration.500ms x-show="showModal"
                                    class="fixed inset-0 z-50 grid place-content-center">
                                    <div @click.away="showModal = false"
                                        class="min-h-full rounded-xl min-w-[800px] bg-white items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Restock Now</h1>
                                                </div>
                                                <div class="mt-3">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Product</th>
                                                                <th scope="col">Stock</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">Low Stock Threshold</th>
                                                                <th scope="col"
                                                                    style="background-color:  rgb(209 213 219)!important;">
                                                                    Anticipated Volume
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @if (count($restock_now_predict) != 0)
                                                                @foreach ($restock_now_predict as $item)
                                                                    <tr wire:key="{{ $item['id'] . 'pred' }}">
                                                                        <th scope="row">{{ $item['id'] }}</th>
                                                                        <td class=text-sm">{{ $item['title'] }}</td>
                                                                        <td>{{ $item['stock'] }}</td>
                                                                        <td>{{ $item['reserve'] }}</td>
                                                                        <td class="text-red-300">Low on Stock</td>
                                                                        <td
                                                                            style="background-color:  rgb(209 213 219)!important;">
                                                                            {{ $item['prediction']['prediction_report'][0]['predicted'] ?? 0 }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach

                                                            @endif

                                                        </tbody>
                                                    </table>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="p-3 border border-gray-200 bg-white rounded-lg">
            <div class="h-full flex flex-wrap items-center">
                <div class="relative h-full w-full max-w-full flex-grow flex-1 justify-end">
                    <h6 class="uppercase mb-1 text-sm font-semibold text-yellow-500">Restock Soon</h6>
                    <hr class="m-0 w-16 text-yellow-900">
                    <div class="flex gap-3 p-3">
                        <div class="ml-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-14 h-14"
                                id="product">
                                <path fill="#FFFF00"
                                    d="M28 42H4a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1V43a1 1 0 0 0-1-1zM20 36h24a1 1 0 0 0 1-1V17a1 1 0 0 0-1-1H20a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1zM60 42H36a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1V43a1 1 0 0 0-1-1z">
                                </path>
                                <g fill="#4D4D4D">
                                    <path
                                        d="M29 36H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h26a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zM18.115 17.668a1.002 1.002 0 0 0 1.277.609L43.9 9.599a1 1 0 0 0 .609-1.277l-2.002-5.656a.998.998 0 0 0-.512-.568 1.01 1.01 0 0 0-.765-.041l-24.509 8.678a1.005 1.005 0 0 0-.609 1.277l2.003 5.656zM61 36H35a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h26a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1z">
                                    </path>
                                </g>
                                <g fill="#CCC">
                                    <path
                                        d="M49.04 11.091h4v2h-4zM55.04 11.091h2v2h-2zM51.035 5.22l.958 1.755-3.51 1.916-.959-1.756zM54.546 3.301l.958 1.756-1.756.958-.958-1.756zM48.48 15.287l3.512 1.917-.958 1.756-3.512-1.918zM53.744 18.16l1.756.96-.959 1.754-1.755-.958z">
                                    </path>
                                </g>
                                <path fill="#FFF"
                                    d="M19.02 52h-6.04A2.984 2.984 0 0 1 10 49.02c0-1.683 1.337-3.02 2.98-3.02h6.04A2.984 2.984 0 0 1 22 48.98c0 1.683-1.337 3.02-2.98 3.02zm-6.04-4a.98.98 0 0 0-.98.98c0 .581.439 1.02.98 1.02h6.04a.98.98 0 0 0 .98-.98c0-.581-.439-1.02-.98-1.02h-6.04zM51.02 52h-6.04A2.984 2.984 0 0 1 42 49.02c0-1.683 1.337-3.02 2.98-3.02h6.04A2.984 2.984 0 0 1 54 48.98c0 1.683-1.337 3.02-2.98 3.02zm-6.04-4a.98.98 0 0 0-.98.98c0 .581.439 1.02.98 1.02h6.04a.98.98 0 0 0 .98-.98c0-.581-.439-1.02-.98-1.02h-6.04zM35.02 26h-6.04A2.984 2.984 0 0 1 26 23.02c0-1.683 1.337-3.02 2.98-3.02h6.04A2.984 2.984 0 0 1 38 22.98c0 1.683-1.337 3.02-2.98 3.02zm-6.04-4a.98.98 0 0 0-.98.98c0 .581.439 1.02.98 1.02h6.04a.98.98 0 0 0 .98-.98c0-.581-.439-1.02-.98-1.02h-6.04z">
                                </path>
                                <path fill="#FFFF40"
                                    d="M28 33a23.8 23.8 0 0 1-9-1.756V35a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1v-9.462C41.184 30.052 35.001 33 28 33zM12 59a23.8 23.8 0 0 1-9-1.756V61a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1v-9.462C25.184 56.052 19.001 59 12 59zM44 59a23.8 23.8 0 0 1-9-1.756V61a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1v-9.462C57.184 56.052 51.001 59 44 59z">
                                </path>
                                <path fill="#FFF" d="M37 30h4v2h-4zM21 56h4v2h-4zM53 56h4v2h-4z"></path>
                            </svg>
                        </div>
                        <div class="w-full flex justify-center items-center">
                            <h3 class="text-black-50">{{ count($restock_soon_predict) ?? 0 }}</h3>
                        </div>
                        {{--                        @foreach ($this->restock_now as $item) --}}
                        {{--                            <div class=""> --}}
                        {{--                                <p class="text-gray-600 text-sm"> --}}
                        {{--                                    {{ $item->title }} --}}
                        {{--                                </p> --}}
                        {{--                            </div> --}}
                        {{--                        @endforeach --}}

                    </div>
                    <div class="absolute bottom-0 right-0">
                        <div class="w-full flex justify-end">
                            <div wire:ignore x-data="{ showModal: false }" @keydown.window.escape="showModal = false">
                                <div class="h-auto">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="text-sm text-yellow-900"
                                        @click="showModal = !showModal" data-bs-target="#exampleModal">View Products
                                    </button>
                                </div>

                                <div x-cloak x-transition.opacity x-show="showModal"
                                    class="fixed inset-0 bg-black/50 z-1"></div>

                                <div x-cloak x-transition.duration.500ms x-show="showModal"
                                    class="fixed inset-0 z-50 grid place-content-center">
                                    <div @click.away="showModal = false"
                                        class="min-h-full rounded-xl min-w-[800px] bg-white items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Restock
                                                        Soon</h1>
                                                </div>
                                                <div class="mt-3">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Product</th>
                                                                <th scope="col">Stock</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">Low Stock Threshold</th>
                                                                <th scope="col"
                                                                    style="background-color:  rgb(209 213 219)!important;">
                                                                    Anticipated Volume
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (count($restock_soon_predict) != 0)
                                                                @foreach ($restock_soon_predict as $item)
                                                                    <tr wire:key="{{ $item['id'] . 'pred' }}">
                                                                        <th scope="row">{{ $item['id'] }}</th>
                                                                        <td class=text-sm">{{ $item['title'] }}</td>
                                                                        <td>{{ $item['stock'] }}</td>
                                                                        <td>{{ $item['reserve'] }}</td>
                                                                        <td class="text-red-300">Low on Stock</td>
                                                                        <td
                                                                            style="background-color:  rgb(209 213 219)!important;">
                                                                            {{ $item['prediction']['prediction_report'][0]['predicted'] ?? 0 }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
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
        <div class="pb-2">
            <div class="flex items-center gap-1">
                <h4 class="mb-0 text-xl tracking-wide text-gray-600">Forecast : </h4>
                <h4 class="mb-0 text-xl tracking-wide text-gray-600">{{ $productselectedname }}</h4>
            </div>
            <div class="flex justify-end gap-2 items-center">
                <div class="flex gap-1.5 items-center">
                    <p class="mb-0 text-gray-600 text-xs tracking-tight">Total summary in</p>
                    <div class="btn-group btn-group-sm" role="group">
                        <button type="button" class="!font-medium btn btn-outline-primary dropdown-toggle "
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $summary }}
                        </button>
                        <ul class="dropdown-menu !pl-0">
                            <li>
                                <button type="button" wire:click="summaryChange('Weekly')" class="dropdown-item"
                                    href="#">Weekly
                                </button>
                            </li>
                            <li>
                                <button type="button" wire:click="summaryChange('Monthly')" class="dropdown-item"
                                    href="#">Monthly
                                </button>
                            </li>
                            <li>
                                {{-- <button type="button" wire:click="$set('summary', 'Yearly')" class="dropdown-item" --}}
                                {{--     href="#">Custom --}}
                                {{-- </button> --}}
                                <!-- Button trigger modal -->
                                <button type="button" wire:click="summaryChange('Custom')" class="dropdown-item"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Custom
                                </button>

                                <!-- Modal -->

                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Modal Body --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" wire:ignore>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Custom Date Input</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <p class="text-center font-bold">Today is {{ now()->format('Y-m-d') }}</p>
                                </div>
                                <div class="flex flex-column gap-3">
                                    <div>
                                        <label for="start_date"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            <span class="text-red-600 text-xs">*</span>Starting Date</label>
                                        <input type="date" id="start_date"
                                            wire:model.live.debounce="userStartingDate"
                                            value="{{ $userStartingDate }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                        @error('start_date')
                                            <span class="font-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="end_date"
                                            class="w-full block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            <span class="text-red-600 text-xs">*</span>Ending Date
                                            <span class="text-red-600 text-xs">Defaults to the current
                                                day</span></label>
                                        <input type="date" id="end_date"
                                            wire:model.live.debounce="userEndingDate"
                                            value="{{ now()->format('Y-m-d') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                        @error('end_date')
                                            <span class="font-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <h6 class="text-center">
                                        Or available Months of this year
                                    </h6>
                                    <div>
                                        @php
                                            $currentMonth = now()->month;
                                        @endphp

                                        <select class="form-select form-select-sm" id="monthselect"
                                            aria-label="Small select example" wire:model.live.debounce="monthSelect">
                                            <option value="0">Select Month</option>
                                            @for ($i = 1; $i <= $currentMonth; $i++)
                                                <option value="{{ $i }}">
                                                    {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                </button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $summary ?? '' }}
                {{ $monthSelect ?? '' }}
                {{ $userStartingDate ?? '' }}
                {{ $userEndingDate ?? '' }}

                <div class="btn-group btn-group-sm" role="group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Select Product
                    </button>
                    <div class="dropdown-menu overflow-auto p-2 rounded-2 bg-white shadow max-h-96 w-96">
                        <div class="list-group">
                            <p class="mb-0 text-gray-600 text-sm font-bold">Recommended</p>
                            @foreach ($this->restock_now_list as $item)
                                <button class="list-group-item list-group-item-action" wire:key="{{ $item->id }}"
                                    wire:click="selectProduct({{ $item->id }})">
                                    <div class="flex gap-2">
                                        <p>{{ $item->id }}</p>
                                        <p>-</p>
                                        <p>{{ $item->title }}</p>
                                    </div>
                                </button>
                            @endforeach
                            @foreach ($this->restock_soon_list as $item)
                                <button class="list-group-item list-group-item-action" wire:key="{{ $item->id }}"
                                    wire:click="selectProduct({{ $item->id }})">
                                    <div class="flex gap-2">
                                        <p>{{ $item->id }}</p>
                                        <p>-</p>
                                        <p>{{ $item->title }}</p>
                                    </div>
                                </button>
                            @endforeach
                            <p class="mb-0 mt-2 text-gray-600 text-sm font-bold">Other Products</p>
                            @foreach ($this->all_products as $item)
                                <button class="list-group-item list-group-item-action" wire:key="{{ $item->id }}"
                                    wire:click="selectProduct({{ $item->id }})">
                                    <div class="flex gap-2">
                                        <p>{{ $item->id }}</p>
                                        <p>-</p>
                                        <p>{{ $item->title }}</p>
                                    </div>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div x-data="{ openSearchProduct: false }" @mouseleave="openSearchProduct = false"
                    @mouseover="openSearchProduct = true">
                    <input class="form-control " type="search" placeholder="Search Product" autocomplete="off"
                        aria-label="Search Product" wire:model.live="search_product"
                        @input="event => openSearchProduct = true">
                    <div x-cloak x-show="openSearchProduct" class="absolute bg-white end-6 rounded-lg shadow"
                        x-transition:enter.duration.700ms x-transition:leave.duration.200ms style="z-index: 1020;">
                        <div class="overflow-auto p-2 rounded-2 bg-white shadow max-h-96 w-96">

                            @if (strlen($search_product) > 1)
                                @if (strlen($return_search_product) > 2)
                                    <div class="list-group">
                                        <p class="mb-0 text-gray-600 text-sm font-bold">Results</p>
                                        @foreach ($return_search_product as $item)
                                            <button class="list-group-item list-group-item-action"
                                                wire:transition.scale.origin.top wire:key="{{ $item->id }}"
                                                wire:click="selectProduct({{ $item->id }})">
                                                <div class="flex gap-2">
                                                    <p>{{ $item->id }}</p>
                                                    <p>-</p>
                                                    <p>{{ $item->title }}</p>
                                                </div>
                                            </button>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-center" wire:key="no-results">
                                        No Product Found.</p>
                                @endif
                            @else
                                {{-- if not typing --}}
                                <div class="list-group">
                                    <p class="mb-0 text-gray-600 text-sm font-bold">Recommended</p>
                                    @foreach ($this->restock_now_list as $item)
                                        <button class="list-group-item list-group-item-action"
                                            wire:key="{{ $item->id }}"
                                            wire:click="selectProduct({{ $item->id }})">
                                            <div class="flex gap-2">
                                                <p>{{ $item->id }}</p>
                                                <p>-</p>
                                                <p>{{ $item->title }}</p>
                                            </div>
                                        </button>
                                    @endforeach
                                    @foreach ($this->restock_soon_list as $item)
                                        <button class="list-group-item list-group-item-action"
                                            wire:key="{{ $item->id }}"
                                            wire:click="selectProduct({{ $item->id }})">
                                            <div class="flex gap-2">
                                                <p>{{ $item->id }}</p>
                                                <p>-</p>
                                                <p>{{ $item->title }}</p>
                                            </div>
                                        </button>
                                    @endforeach
                                    <p class="mb-0 mt-2 text-gray-600 text-sm font-bold">Other Products</p>
                                    @foreach ($this->all_products as $item)
                                        <button class="list-group-item list-group-item-action"
                                            wire:key="{{ $item->id }}"
                                            wire:click="selectProduct({{ $item->id }})">
                                            <div class="flex gap-2">
                                                <p>{{ $item->id }}</p>
                                                <p>-</p>
                                                <p>{{ $item->title }}</p>
                                            </div>
                                        </button>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div>
                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                        data-bs-trigger="hover focus" data-bs-content="Save Chart to Image">
                        <button id="charttoimageexport" type="button" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download"></i>
                        </button>
                    </span>
                </div>

            </div>
        </div>
        <p class="mb-1 text-gray-500 text-sm tracking-wider">
            @if ($monthSelect && $monthSelect != 0)
                Showing Data from the Month of {{ DateTime::createFromFormat('!m', $monthSelect)->format('F') }}
                , {{ now()->year }}
            @else
                Showing Data from {{ $userStartingDate ?? 'UNKNOWN' }}
                to {{ $userEndingDate ?? now()->format('Y-m-d') }}
            @endif
        </p>
        {{ $starting_date }}
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
                        <canvas class="!w-full !h-[350px]" id="productSalesChart"></canvas>
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
                        <label for="selected_product"
                            class="form-label tracking-tight uppercase text-sm font-medium">Selected
                            Product</label>
                        <input type="text" placeholder="Selected Product" id="selected_product"
                            value="{{ $productselectedname ?? 'Awaiting User Input' }}"
                            class="form-control form-control-sm" disabled>
                    </div>

                    <div class="mt-2">
                        <label for="selected_product_price"
                            class="form-label tracking-tight uppercase text-sm font-medium">Price</label>
                        <input type="text" placeholder="Product Price" id="selected_product_price"
                            value="{{ $productselectedprice ?? 'Awaiting User Input' }}"
                            class="form-control form-control-sm" disabled>
                    </div>

                    <div class="mt-2">
                        <label for="predictrange"
                            class="form-label tracking-tight uppercase text-sm font-medium">Predict
                            for the next n days</label>

                        <select class="form-select form-select-sm" id="predictrange"
                            aria-label="Small select example" wire:model.live.debounce="predictrange">
                            <option>Select Range</option>
                            <option selected value="week">Week</option>
                            <option value="month">Month</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>

                    @if ($predictrange == 'custom')
                        <div class="mt-2">
                            <label for="customrange"
                                class="form-label tracking-tight uppercase text-sm font-medium sr-only">custom
                                date</label>
                            <input type="number" placeholder="Number of days" id="customrange" name="customrange"
                                wire:model.live.debounce="custompredictrange" max="365" min="1"
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
                            <option selected value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-2 mt-2">
                        <div class="p-2">
                            <button type="reset" class="w-full btn btn-sm btn-outline-danger"
                                wire:click="reset_all">
                                Clear
                            </button>
                        </div>
                        <div class="p-2">
                            {{-- <button type="button" class="w-full btn btn-sm btn-outline-primary"
                                @disabled(!$productselectedid) wire:click="runforone">
                                <div class="flex gap-1 items-center justify-center">

                                    <div class="spinner-border spinner-border-sm" wire:loading wire:target="runforone"
                                        role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>

                                    <div>
                                        Run
                                    </div>

                                </div>

                            </button> --}}

                            <!-- Button trigger modal -->
                            <button type="button" class="w-full btn btn-sm btn-outline-primary"
                                data-bs-toggle="modal" data-bs-target="#confirmRun" @disabled(!$productselectedid)>
                                <div class="flex gap-1 items-center justify-center">

                                    <div class="spinner-border spinner-border-sm" wire:loading wire:target="runforone"
                                        role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>

                                    <div>
                                        Run
                                    </div>

                                </div>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="confirmRun" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmRunLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="confirmRunLabel">Please confirm details
                                            </h1>
                                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <label for="selected_product"
                                                    class="form-label tracking-tight uppercase text-sm font-medium">Selected
                                                    Product</label>
                                                <input type="text" placeholder="Selected Product"
                                                    id="selected_product"
                                                    value="{{ $productselectedname ?? 'Product' }}"
                                                    class="form-control form-control-sm" disabled>
                                            </div>

                                            <div class="grid grid-cols-2 gap-2">
                                                <div class="mt-2">
                                                    <label for="selected_product_price"
                                                        class="form-label tracking-tight uppercase text-sm font-medium">Price</label>
                                                    <input type="text" placeholder="Product Price"
                                                        id="selected_product_price"
                                                        value="{{ $productselectedprice ?? 'Price' }}"
                                                        class="form-control form-control-sm" disabled>
                                                </div>

                                                @if ($predictrange == 'custom')
                                                    <div class="mt-2">
                                                        <label for="selected_product_price"
                                                            class="form-label tracking-tight uppercase text-sm font-medium">Predict
                                                            for the next n days</label>
                                                        <input type="text" placeholder="Product Price"
                                                            id="selected_product_price"
                                                            value="{{ $custompredictrange ?? 'Next n Days' }}"
                                                            class="form-control form-control-sm" disabled>
                                                    </div>
                                                @else
                                                    <div class="mt-2">
                                                        <label for="selected_product_price"
                                                            class="form-label tracking-tight uppercase text-sm font-medium">Predict
                                                            for the next n days</label>
                                                        <input type="text" placeholder="Product Price"
                                                            id="selected_product_price"
                                                            value="{{ $predictrange ?? 'Next n Days' }}"
                                                            class="form-control form-control-sm" disabled>
                                                    </div>
                                                @endif

                                                <div class="mt-2">
                                                    <label for="selected_product_price"
                                                        class="form-label tracking-tight uppercase text-sm font-medium">Dataset
                                                        Interval</label>
                                                    <input type="text" placeholder="Product Price"
                                                        id="selected_product_price"
                                                        value="{{ $predictinterval ?? 'Dataset Interval' }}"
                                                        class="form-control form-control-sm" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark text-light"
                                                data-bs-dismiss="modal">Back
                                            </button>
                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"
                                                wire:click="runforone">Confirm
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div>
                        <div class="p-2">
                            <button type="button" class="w-full btn btn-sm btn-primary" @disabled(!$productselectedid)
                                wire:click="runforall">
                                <div class="flex gap-1 items-center justify-center">
                                    <div class="spinner-border spinner-border-sm" wire:loading wire:target="runforall"
                                        role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div>
                                        Run on All Products
                                    </div>

                                </div>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div>
                {{ var_dump($userArray) }}
            </div>

            <div class="w-full mt-3 flex justify-between">
                <div class="flex gap-3">
                    {{-- <button type="button" class="btn btn-sm btn-outline-secondary ">View Prediction Report</button> --}}
                    <div x-data="{ showModal: false }" @keydown.window.escape="showModal = false">
                        <div class="h-auto">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-outline-success"
                                @click="showModal = !showModal" data-bs-target="#exampleModal">View Prediction
                                Report
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
                                        <div class="overflow-y-auto" style="max-height: 500px">
                                            <table class="table table-sm !bg-transparent">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Predicted volume</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($prediction_report)
                                                        @foreach ($prediction_report as $key => $value)
                                                            <tr wire:key="{{ $key }}">
                                                                <td>{{ $value['date'] }}</td>
                                                                <td>{{ $value['predicted'] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
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

                    {{-- <button type="button" class="btn btn-sm btn-outline-secondary ">View Accuracy Report</button> --}}
                    <div x-data="{ showModal: false }" @keydown.window.escape="showModal = false">
                        <div class="h-auto">
                            <!-- Button trigger modal -->
                            <button type="button" @disabled($predict_done)
                                class="btn btn-sm btn-outline-secondary" @click="showModal = !showModal"
                                data-bs-target="#exampleModal">View Accuracy Report
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
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                Accuracy Report <span class="text-sm tracking-wide text-gray-600">Data
                                                    from past prediction vs actual</span>
                                            </h1>
                                        </div>
                                        <hr class="text-blue-500">
                                        <div class="flex flex-col items-center justify-center modal-body"
                                            x-transition.opacity>
                                            <div class="py-3">
                                                <div class="relative overflow-x-auto">
                                                    <table
                                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        <thead
                                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Metric Name
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Metric Score
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @if ($accuracy_report)
                                                                @foreach ($accuracy_report as $key => $value)
                                                                    <tr
                                                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                                        <th scope="row"
                                                                            class="p-2 uppercase font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                            {{ $key }}
                                                                        </th>
                                                                        <td class="p-2">
                                                                            {{ $value }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                            {{-- <tr --}}
                                                            {{--     class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"> --}}
                                                            {{--     <th scope="row" --}}
                                                            {{--         class="p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> --}}
                                                            {{--         MAE --}}
                                                            {{--     </th> --}}
                                                            {{--     <td class="p-4"> --}}
                                                            {{--         2.1677 --}}
                                                            {{--     </td> --}}
                                                            {{-- </tr> --}}
                                                            {{-- <tr --}}
                                                            {{--     class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"> --}}
                                                            {{--     <th scope="row" --}}
                                                            {{--         class="p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> --}}
                                                            {{--         MSE --}}
                                                            {{--     </th> --}}
                                                            {{--     <td class="p-4"> --}}
                                                            {{--         8.4840 --}}
                                                            {{--     </td> --}}
                                                            {{-- </tr> --}}
                                                            {{-- <tr --}}
                                                            {{--     class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"> --}}
                                                            {{--     <th scope="row" --}}
                                                            {{--         class="p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> --}}
                                                            {{--         RMSE --}}
                                                            {{--     </th> --}}
                                                            {{--     <td class="p-4"> --}}
                                                            {{--         2.8884 --}}
                                                            {{--     </td> --}}
                                                            {{-- </tr> --}}
                                                            {{-- <tr --}}
                                                            {{--     class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"> --}}
                                                            {{--     <th scope="row" --}}
                                                            {{--         class="p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> --}}
                                                            {{--         MAPE --}}
                                                            {{--     </th> --}}
                                                            {{--     <td class="p-4"> --}}
                                                            {{--         0.5695 --}}
                                                            {{--     </td> --}}
                                                            {{-- </tr> --}}
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                            <div class="py-3 flex flex-col justify-start text-start">
                                                <p class="text-sm mb-0.5"><span class="font-medium">MAE (Mean Absolute
                                                        Error )</span>
                                                    - tells us how many units we are away from the actual value (the
                                                    lower the value the better)</p>
                                                <p class="text-sm mb-0.5"><span class="font-medium">MSE (Mean Square
                                                        Error )</span>
                                                    - can be used to evaluate the model compared to other models</p>
                                                <p class="text-sm mb-0.5"><span class="font-medium">RMSE (Root Mean
                                                        Square Error)</span>
                                                    - more accurate version of MSE but in addition it squares the mean
                                                    obtained.</p>
                                                <p class="text-sm mb-0.5"><span class="font-medium">MAPE (Mean
                                                        Absolute Percetag Error )</span>
                                                    - tells us the number of percent of errors (acceptable is 20%).</p>
                                            </div>
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

                    <div x-data="{ showModal: false }" @keydown.window.escape="showModal = false">
                        <div class="h-auto">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-outline-primary"
                                @click="showModal = !showModal" data-bs-target="#exampleModal">View History in Table
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
                                            <h1 class="modal-title font-light fs-5" id="exampleModalLabel">Table View
                                                of
                                                Prodct : <span class="font-bold">{{ $productselectedid }}</span></h1>
                                        </div>
                                        <div class="overflow-y-auto" style="max-height: 500px">
                                            <table class="table table-sm !bg-transparent">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Quantity Sold</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($chartArray as $key => $value)
                                                        <tr>
                                                            <th scope="row" class="text-sm">{{ $key }}
                                                            </th>
                                                            <td>{{ $value }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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

                    <div x-data="{ showModal: false }" @keydown.window.escape="showModal = false">
                        <div class="h-auto">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-outline-primary"
                                @click="showModal = !showModal" data-bs-target="#exampleModal">Generate Purchase
                                Order
                            </button>
                        </div>

                        <div x-cloak x-transition.opacity x-show="showModal" class="fixed inset-0 bg-black/50"></div>

                        <div x-cloak x-transition.duration.500ms x-show="showModal"
                            class="fixed inset-0 z-50 grid place-content-center">
                            <div @click.away="showModal = false"
                                class="min-h-full rounded-xl min-w-[800px] bg-white items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Purchase Order
                                                Report</h1>
                                        </div>
                                        <div class="flex flex-column text-start justify-start mt-1">
                                            <p class="font-bold text-gray-600">Here are some key factors to consider
                                                alongside
                                                our prediction:</p>
                                            <div>
                                                <ul class="list-disc pl-4">
                                                    <li class="text-gray-600 text-sm">Lead Time: The time it takes your
                                                        supplier to deliver after you order. Factor this in to avoid
                                                        stockouts while waiting for your order.
                                                    </li>
                                                    <li class="mt-1 text-gray-600 text-sm">Minimum Order Quantity
                                                        (MOQ):
                                                        Some
                                                        suppliers require a minimum order amount. Make sure your order
                                                        meets this to avoid extra fees.
                                                    </li>
                                                    <li class="mt-1 text-gray-600 text-sm">Storage Capacity: Consider
                                                        your
                                                        available space. Don't overstock and limit your ability to hold
                                                        other products.
                                                    </li>
                                                    <li class="mt-1 text-gray-600 text-sm">Cash Flow: Balance the cost
                                                        of
                                                        restocking with your available cash flow.
                                                    </li>
                                                </ul>
                                            </div>
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
        <div class="flex justify-between">
            <h5>{{ $productselectedname }}</h5>
            <div class="flex gap-1.5 items-center">
                <p class="mb-0 text-gray-600 text-sm tracking-tight">Showing Accucary From</p>
            </div>
        </div>
        <div class="pt-2">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actual Sold
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Forecasted Sold
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Accuracy (lower is better)
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="w-full bg-white border-b text-center dark:bg-gray-800 dark:border-gray-700" wire:loading
                        wire:target="runforone">
                        <th colspan="4" scope="row"
                            class="w-full p-2 text-gray-900 text-center whitespace-nowrap dark:text-white">
                            <div class="spinner-border spinner-border" role="status">
                                <span class="visually-hidden">Awaiting Server Response...</span>
                            </div>
                        </th>
                    </tr>

                    @if ($sales_accuracy_apiresponse)
                        @foreach ($sales_accuracy_apiresponse as $key => $value)
                            <tr wire:key="{{ $key }}"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="p-2 text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $value['date'] }}
                                </th>
                                <td class="p-2">
                                    {{ $value['actual'] }}
                                </td>
                                <td class="p-2">
                                    {{ $value['predicted'] }}
                                </td>
                                <td class="p-2">
                                    {{ $this->calculateAccuracy($value['actual'], $value['predicted']) }}
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    {{-- <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"> --}}
                    {{--     <th scope="row" class="p-2 text-gray-900 whitespace-nowrap dark:text-white"> --}}
                    {{--         MAE --}}
                    {{--     </th> --}}
                    {{--     <td class="p-2"> --}}
                    {{--         9999.99 --}}
                    {{--     </td> --}}
                    {{-- </tr> --}}
                    {{-- <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"> --}}
                    {{--     <th scope="row" class="p-2 text-gray-900 whitespace-nowrap dark:text-white"> --}}
                    {{--         MAE --}}
                    {{--     </th> --}}
                    {{--     <td class="p-2"> --}}
                    {{--         9999.99 --}}
                    {{--     </td> --}}
                    {{-- </tr> --}}
                    {{-- <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"> --}}
                    {{--     <th scope="row" class="p-2 text-gray-900 whitespace-nowrap dark:text-white"> --}}
                    {{--         MAE --}}
                    {{--     </th> --}}
                    {{--     <td class="p-2"> --}}
                    {{--         9999.99 --}}
                    {{--     </td> --}}
                    {{-- </tr> --}}
                    {{-- <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"> --}}
                    {{--     <th scope="row" class="p-2 text-gray-900 whitespace-nowrap dark:text-white"> --}}
                    {{--         MAE --}}
                    {{--     </th> --}}
                    {{--     <td class="p-2"> --}}
                    {{--         9999.99 --}}
                    {{--     </td> --}}
                    {{-- </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Adding an event listener to the button
    document.getElementById("charttoimageexport").addEventListener("click", handleClick);

    let ctx = document.getElementById('productSalesChart');

    function handleClick() {

        ctx.style.backgroundColor = 'white';

        let img = ctx.toDataURL("image/png").replace("image/png", "image/octet-stream");

        let aDownloadLink = document.createElement('a');

        // Add the name of the file to the link
        aDownloadLink.download = 'canvas_image.png';
        // Attach the data to the link
        aDownloadLink.href = img;
        // Get the code to click the download link
        aDownloadLink.click();

    }
</script>

@script
    <script>
        let ctx = document.getElementById('productSalesChart');

        {{-- let $array_keys = {!! json_encode(array_keys($combinedArray)) !!}; --}}

        {{-- let $array_values = {!! json_encode(array_values($combinedArray)) !!}; --}}

        let data = [];

        let keysArray = Object.keys(data);

        let valuesArray = Object.values(data);

        let predictchart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [],
                datasets: [{
                    label: 'Sold Quantity',
                    borderColor: '#009aff',
                    data: [],
                    // backgroundColor: '#bae0ff',
                    // pointStyle: 'circle',
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    tension: 0.2,
                    fill: false,
                }],

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

        Livewire.on('update-chart', () => {
            console.log('Updating Chart');

            data = $wire.chartArray;

            keysArray = Object.keys(data);
            valuesArray = Object.values(data);

            predictchart.data.labels = keysArray;

            predictchart.data.datasets[0].data = valuesArray;

            predictchart.update();

            console.log(keysArray, valuesArray);
        });
    </script>
@endscript
