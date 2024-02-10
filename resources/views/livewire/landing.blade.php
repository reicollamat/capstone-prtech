{{-- <div> --}}

{{--     {{ $teststring }} --}}
{{--      --}}{{--    {{ $count }} --}}
{{--      --}}{{--    <livewire:shop.collections/> --}}
{{--      --}}{{--    {{ $collection->title }} --}}
{{--      --}}{{--    @dd(Auth::user()) --}}

{{--     <div x-data="{ count: 0 }"> --}}
{{--         <button x-on:click="count = count > 0 ? count-1 : count">-</button> --}}
{{--         <span x-text="count"></span> --}}
{{--         <button x-on:click="count++">+</button> --}}
{{--     </div> --}}

{{--     <button wire:click="sendMail"> --}}
{{--         <p>Click me to test email </p> --}}
{{--     </button> --}}
{{--     {{ $mailStatus }} --}}
{{--     {{ public_path() }} --}}
{{--      --}}{{--    {{ storage_path('') }} --}}
{{--      --}}{{--    {{ Storage::url('/product-image-uploads/UuCISu2FNIoCMbbu03GT1NwU0hTG2V2NWs9hAeXr.jpg') }} --}}
{{--     <img src="{{ asset('/product-image-uploads/UuCISu2FNIoCMbbu03GT1NwU0hTG2V2NWs9hAeXr.jpg') }}" alt=""> --}}

{{--     <button type="button" wire:click="tryAlert"> --}}
{{--         <p>Try Alert</p> --}}
{{--     </button> --}}

{{--     <div class="border-1 border-green-600"> --}}
{{--         {{ $mailStatus }} --}}
{{--     </div> --}}

{{--    {{ $purchase }} --}}

{{--      --}}{{--    @foreach ($purchase->purchase_items as $items) --}}

{{--      --}}{{--        <div style="width: 100%"> --}}
{{--      --}}{{--            {{ $items->quantity }} --}}
{{--      --}}{{--            {{ $items->product->title }} --}}
{{--      --}}{{--            <span style="text-align: right"> --}}
{{--      --}}{{--                {{ $items->total_price }} --}}
{{--      --}}{{--            </span> --}}

{{--      --}}{{--        </div> --}}

{{--      --}}{{--    @endforeach --}}
{{--      --}}{{--       <form action="{{ route('generate_positive_word_cloud') }}" method="POST"> --}}
{{--      --}}{{--          @csrf --}}
{{--      --}}{{--           <button type="submit"> --}}
{{--      --}}{{--               Submit --}}
{{--      --}}{{--           </button> --}}
{{--      --}}{{--       </form> --}}
{{--     <button wire:click="testapi"> --}}
{{--         <p>click me to test api</p> --}}
{{--     </button> --}}

{{--     <div class="d-block w-48"> --}}
{{--         <div wire:loading wire:target="testapi" class="w-full"> --}}
{{--             <div role="status" --}}
{{--                  class="flex items-center justify-center h-56 w-full bg-gray-300 rounded-lg animate-pulse dark:bg-gray-700"> --}}
{{--                 <span>Please Wait ...</span> --}}
{{--                 <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true" --}}
{{--                      xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20"> --}}
{{--                     <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" /> --}}
{{--                     <path --}}
{{--                         d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM9 13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2Zm4 .382a1 1 0 0 1-1.447.894L10 13v-2l1.553-1.276a1 1 0 0 1 1.447.894v2.764Z" /> --}}
{{--                 </svg> --}}

{{--                 <span class="sr-only">Loading...</span> --}}
{{--             </div> --}}
{{--         </div> --}}
{{--         <div wire:loading.remove wire:target="testapi"> --}}
{{--             <img src="{{ asset($asset) }}" class="img-fluid img-thumbnail rounded-start border-0 self-center" alt=""> --}}
{{--         </div> --}}
{{--     </div> --}}

{{--     <div class="w-48"> --}}
{{--         <div role="status" --}}
{{--              class="flex gap-2.5 flex-column items-center justify-center h-56 w-full bg-gray-300 rounded-lg animate-pulse dark:bg-gray-700"> --}}

{{--             <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true" --}}
{{--                  xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20"> --}}
{{--                 <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" /> --}}
{{--                 <path --}}
{{--                     d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM9 13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2Zm4 .382a1 1 0 0 1-1.447.894L10 13v-2l1.553-1.276a1 1 0 0 1 1.447.894v2.764Z" /> --}}
{{--             </svg> --}}
{{--             <span class="text-center">Image Loading, Please Wait...</span> --}}
{{--             <span class="sr-only">Loading...</span> --}}
{{--         </div> --}}
{{--     </div>seller/register --}}

{{--    {{ var_dump($this->getAddressList()) }} --}}

{{--    @foreach ($this->getAddressList() as $list) --}}
{{--       @foreach ($list as $address => $cities) --}}

{{--           <p>{{$address['province']}}</p> --}}

{{--       @endforeach --}}
{{--    @endforeach --}}

{{--    @if (!empty($this->getAddressList())) --}}
{{--     @foreach ($this->getAddressList as $address) --}}
{{--          --}}{{--                                                @if ($address['province'] == $this->user_state_province) --}}
{{--          --}}{{--                                                    @if ($this->user_city == null || $this->user_city != $address['cities'][0]) --}}
{{--          --}}{{--                                                        <option value="{{ null }}" selected>Please select city --}}
{{--          --}}{{--                                                        </option> --}}
{{--          --}}{{--                                                    @endif --}}
{{--          --}}{{--                                                    @foreach ($address['cities'] as $key => $cities) --}}
{{--          --}}{{--                                                        <option value="{{ $cities }}">{{ $cities }} --}}
{{--          --}}{{--                                                        </option> --}}
{{--          --}}{{--                                                    @endforeach --}}
{{--          --}}{{--                                                @endif --}}

{{--         @if (isset($address['province']) && isset($address['cities'])) --}}
{{--            {{ $address['province'] }} --}}
{{--              --}}{{--                                                    @dd($address['province']) --}}
{{--              --}}{{-- <h2>Province: {{ $address['province'] }}</h2> --}}
{{--              --}}{{--                                                    @if ($user_city == null) --}}
{{--              --}}{{--                                                        <option value="{{ null }}" selected>Please select city --}}
{{--              --}}{{--                                                        </option> --}}
{{--              --}}{{--                                                    @else --}}
{{--             @foreach ($address['cities'] as $city) --}}
{{--                 <option value="{{ $city }}">{{ $city }}</option> --}}
{{--             @endforeach --}}
{{--              --}}{{--                                                    @endif --}}
{{--              --}}{{-- <ul> --}}
{{--              --}}{{--     @foreach ($address['cities'] as $city) --}}
{{--              --}}{{--         <li>{{ $city }}</li> --}}
{{--              --}}{{--     @endforeach --}}
{{--              --}}{{-- </ul> --}}
{{--         @endif --}}
{{--     @endforeach --}}
{{--    @else --}}
{{--        <p>No data available.</p> --}}
{{--    @endif --}}

{{-- </div> --}}
<div>
    <div x-cloak x-data="sidebar()" class="relative flex items-start ">
        <div class="sticky top-0 z-40 bg-red-50 transition-all duration-300">
            <div class="flex justify-end">
                <button @click="sidebarOpen = !sidebarOpen"
                    :class="{ 'hover:bg-gray-300': !sidebarOpen, 'hover:bg-gray-700': sidebarOpen }"
                    class="transition-all duration-300 w-8 p-1 mx-3 my-2 rounded-full focus:outline-none">
                    <svg viewBox="0 0 20 20" class="w-6 h-6 fill-current"
                        :class="{ 'text-gray-600': !sidebarOpen, 'text-gray-300': sidebarOpen }">
                        <path x-show="!sidebarOpen" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="sidebarOpen" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div x-cloak wire:ignore :class="{ 'w-56': sidebarOpen, 'w-0': !sidebarOpen }"
            class="sticky top-0 bottom-0 left-0 z-30 block w-56 h-full min-h-screen overflow-y-auto text-gray-400 transition-all duration-300 ease-in-out bg-gray-900 shadow-lg overflow-x-hidden">
            <div class="flex flex-col items-stretch justify-between h-full">
                <div class="flex flex-col flex-shrink-0 w-full">
                    <div class="flex items-center justify-center px-8 py-3 text-center">
                        <a href="#" class="text-lg leading-normal text-gray-200 focus:outline-none focus:ring">My
                            App</a>
                    </div>

                    <nav>
                        <div class="flex-grow md:block md:overflow-y-auto overflow-x-hidden"
                            :class="{ 'opacity-1': sidebarOpen, 'opacity-0': !sidebarOpen }">
                            <a class="flex justify-start items-center px-4 py-3 hover:bg-gray-800 hover:text-gray-400 focus:bg-gray-800 focus:outline-none focus:ring"
                                href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    aria-hidden="true" role="img" class="w-5 h-5 fill-current"
                                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 1200 1200">
                                    <path
                                        d="M600 195.373c-331.371 0-600 268.629-600 600c0 73.594 13.256 144.104 37.5 209.253h164.062C168.665 942.111 150 870.923 150 795.373c0-248.528 201.471-450 450-450s450 201.472 450 450c0 75.55-18.665 146.738-51.562 209.253H1162.5c24.244-65.148 37.5-135.659 37.5-209.253c0-331.371-268.629-600-600-600zm0 235.62c-41.421 0-75 33.579-75 75c0 41.422 33.579 75 75 75s75-33.578 75-75c0-41.421-33.579-75-75-75zm-224.927 73.462c-41.421 0-75 33.579-75 75c0 41.422 33.579 75 75 75s75-33.578 75-75c0-41.421-33.579-75-75-75zm449.854 0c-41.422 0-75 33.579-75 75c0 41.422 33.578 75 75 75c41.421 0 75-33.578 75-75c0-41.421-33.579-75-75-75zM600 651.672l-58.813 294.141v58.814h117.627v-58.814L600 651.672z"
                                        fill="currentColor"></path>
                                </svg>
                                <span class="mx-4">Dashboard</span>
                            </a>

                            <a
                                class="flex items-center px-4 py-3 hover:bg-gray-800 focus:bg-gray-800 hover:text-gray-400 focus:outline-none focus:ring">
                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M14,18a1,1,0,0,0,1-1V15a1,1,0,0,0-2,0v2A1,1,0,0,0,14,18Zm-4,0a1,1,0,0,0,1-1V15a1,1,0,0,0-2,0v2A1,1,0,0,0,10,18ZM19,6H17.62L15.89,2.55a1,1,0,1,0-1.78.9L15.38,6H8.62L9.89,3.45a1,1,0,0,0-1.78-.9L6.38,6H5a3,3,0,0,0-.92,5.84l.74,7.46a3,3,0,0,0,3,2.7h8.38a3,3,0,0,0,3-2.7l.74-7.46A3,3,0,0,0,19,6ZM17.19,19.1a1,1,0,0,1-1,.9H7.81a1,1,0,0,1-1-.9L6.1,12H17.9ZM19,10H5A1,1,0,0,1,5,8H19a1,1,0,0,1,0,2Z" />
                                </svg>
                                <span class="mx-4">Orders</span>
                            </a>

                            <a class="flex items-center px-4 py-3 hover:bg-gray-800 focus:bg-gray-800 hover:text-gray-400 focus:outline-none focus:ring"
                                href="#">
                                <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M9,10h1a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Zm0,2a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM20,8.94a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19.32.32,0,0,0-.09,0A.88.88,0,0,0,13.05,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V9S20,9,20,8.94ZM14,5.41,16.59,8H15a1,1,0,0,1-1-1ZM18,19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4h5V7a3,3,0,0,0,3,3h3Zm-3-3H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z" />
                                </svg>
                                <span class="mx-4">Pages</span>

                            </a>

                        </div>

                    </nav>

                </div>
                <div>
                    <a title="Logout" href="{{ route('logout') }}" class="block px-4 py-3"
                        onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                        <svg class="text-gray-400 fill-current w-7 h-7" fill-rule="evenodd" clip-rule="evenodd"
                            stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg" aria-label="door-leave"
                            viewBox="0 0 32 32" title="door-leave">
                            <g>
                                <path
                                    d="M27.708,15.293c0.39,0.39 0.39,1.024 0,1.414l-4,4c-0.391,0.391 -1.024,0.391 -1.415,0c-0.39,-0.39 -0.39,-1.024 0,-1.414l2.293,-2.293l-11.586,0c-0.552,0 -1,-0.448 -1,-1c0,-0.552 0.448,-1 1,-1l11.586,0l-2.293,-2.293c-0.39,-0.39 -0.39,-1.024 0,-1.414c0.391,-0.391 1.024,-0.391 1.415,0l4,4Z">
                                </path>
                                <path
                                    d="M11.999,8c0.001,0 0.001,0 0.002,0c1.699,-0.001 2.859,0.045 3.77,0.25c0.005,0.001 0.01,0.002 0.015,0.003c0.789,0.173 1.103,0.409 1.291,0.638c0,0 0,0.001 0,0.001c0.231,0.282 0.498,0.834 0.679,2.043c0,0.001 0,0.002 0.001,0.003c0.007,0.048 0.014,0.097 0.021,0.147c0.072,0.516 0.501,0.915 1.022,0.915c0.584,0 1.049,-0.501 0.973,-1.08c-0.566,-4.332 -2.405,-4.92 -7.773,-4.92c-7,0 -8,1 -8,10c0,9 1,10 8,10c5.368,0 7.207,-0.588 7.773,-4.92c0.076,-0.579 -0.389,-1.08 -0.973,-1.08c-0.521,0 -0.95,0.399 -1.022,0.915c-0.007,0.05 -0.014,0.099 -0.021,0.147c-0.001,0.001 -0.001,0.002 -0.001,0.003c-0.181,1.209 -0.448,1.762 -0.679,2.044l0,0c-0.188,0.229 -0.502,0.465 -1.291,0.638c-0.005,0.001 -0.01,0.002 -0.015,0.003c-0.911,0.204 -2.071,0.25 -3.77,0.25c-0.001,0 -0.001,0 -0.002,0c-1.699,0 -2.859,-0.046 -3.77,-0.25c-0.005,-0.001 -0.01,-0.002 -0.015,-0.003c-0.789,-0.173 -1.103,-0.409 -1.291,-0.638l0,0c-0.231,-0.282 -0.498,-0.835 -0.679,-2.043c0,-0.001 0,-0.003 -0.001,-0.005c-0.189,-1.247 -0.243,-2.848 -0.243,-5.061c0,0 0,0 0,0c0,-2.213 0.054,-3.814 0.243,-5.061c0.001,-0.002 0.001,-0.004 0.001,-0.005c0.181,-1.208 0.448,-1.76 0.679,-2.042c0,0 0,-0.001 0,-0.001c0.188,-0.229 0.502,-0.465 1.291,-0.638c0.005,-0.001 0.01,-0.002 0.015,-0.003c0.911,-0.205 2.071,-0.251 3.77,-0.25Z">
                                </path>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>

            <script>
                function sidebar() {
                    return {
                        sidebarOpen: true,
                        sidebarProductMenuOpen: false,
                        openSidebar() {
                            this.sidebarOpen = true
                        },
                        closeSidebar() {
                            this.sidebarOpen = false
                        },
                        sidebarProductMenu() {
                            if (this.sidebarProductMenuOpen === true) {
                                this.sidebarProductMenuOpen = false
                                window.localStorage.setItem('sidebarProductMenuOpen', 'close');
                            } else {
                                this.sidebarProductMenuOpen = true
                                window.localStorage.setItem('sidebarProductMenuOpen', 'open');
                            }
                        },
                        checkSidebarProductMenu() {
                            if (window.localStorage.getItem('sidebarProductMenuOpen')) {
                                if (window.localStorage.getItem('sidebarProductMenuOpen') === 'open') {
                                    this.sidebarProductMenuOpen = true
                                } else {
                                    this.sidebarProductMenuOpen = false
                                    window.localStorage.setItem('sidebarProductMenuOpen', 'close');
                                }
                            }
                        },
                    }
                }
            </script>
        </div>
    </div>
    {{-- <!-- By Price Start --> --}}
    {{-- <div class="p-2 mt-3" style="border: 1px solid #FFFFFF"> --}}
    {{--     <h5 class="section-title position-relative text-uppercase underline underline-offset-4"> --}}
    {{--         <span class="pr-3">Filter by price {{ var_dump($price_bracket) }}</span> --}}
    {{--     </h5> --}}
    {{--     <div> --}}
    {{--         <div> --}}
    {{--             <div --}}
    {{--                 class="custom-control custom-checkbox d-flex align-items-center justify-content-between"> --}}
    {{--                 <input type="radio" class="custom-control-input" name="0" --}}
    {{--                        value="[1, 5000]" id="price-1" wire:model.live="price_bracket"> --}}
    {{--                 <label class="custom-control-label" for="price-1">₱0 - ₱5000</label> --}}
    {{--             </div> --}}
    {{--             <div --}}
    {{--                 class="custom-control custom-checkbox d-flex align-items-center justify-content-between"> --}}
    {{--                 <input type="radio" class="custom-control-input" name="1" --}}
    {{--                        value="[6000, 10000]" id="price-2" wire:model.live="price_bracket"> --}}
    {{--                 <label class="custom-control-label" for="price-2">₱6000 - ₱10000</label> --}}
    {{--             </div> --}}
    {{--             <div --}}
    {{--                 class="custom-control custom-checkbox d-flex align-items-center justify-content-between"> --}}
    {{--                 <input type="radio" class="custom-control-input" name="" --}}
    {{--                        value="[11000, 20000]" id="price-3" wire:model.live="price_bracket"> --}}
    {{--                 <label class="custom-control-label" for="price-3">₱11000 - ₱20000</label> --}}
    {{--             </div> --}}
    {{--             <div --}}
    {{--                 class="custom-control custom-checkbox d-flex align-items-center justify-content-between"> --}}
    {{--                 <input type="radio" class="custom-control-input" name="" --}}
    {{--                        value="[21000, 30000]" id="price-4" wire:model.live="price_bracket"> --}}
    {{--                 <label class="custom-control-label" for="price-4">₱21000 - ₱30000</label> --}}
    {{--             </div> --}}
    {{--             <div --}}
    {{--                 class="custom-control custom-checkbox d-flex align-items-center justify-content-between"> --}}
    {{--                 <input type="radio" class="custom-control-input" name="" --}}
    {{--                        value="[31000, 40000]" id="price-5" wire:model.live="price_bracket"> --}}
    {{--                 <label class="custom-control-label" for="price-5">₱31000 - ₱40000</label> --}}
    {{--             </div> --}}
    {{--             <div --}}
    {{--                 class="custom-control custom-checkbox d-flex align-items-center justify-content-between"> --}}
    {{--                 <input type="radio" class="custom-control-input" name="" --}}
    {{--                        value="[41000, 50000]" id="price-6" wire:model.live="price_bracket"> --}}
    {{--                 <label class="custom-control-label" for="price-6">₱41000 - Above</label> --}}
    {{--             </div> --}}
    {{--         </div> --}}
    {{--     </div> --}}
    {{-- </div> --}}

    {{-- @if (sizeof($this->getproducts) != null) --}}
    {{--     @foreach ($this->getproducts as $products) --}}
    {{--         <p>{{ $products->price }}</p> --}}
    {{--     @endforeach --}}
    {{-- @endif --}}

    {{--    {{ var_dump($response) }} --}}
    {{--    {{ var_dump($response2) }} --}}

    {{--    <button type="button" class="mt-4 ml-4 btn btn-primary" --}}
    {{--    wire:click="testmodal"> --}}
    {{--        Launch demo modal --}}
    {{--    </button> --}}

</div>
