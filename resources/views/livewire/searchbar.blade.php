<div class="w-1/2 position-relative" x-data="{ open: false }" @mouseleave="open = false">
    <form wire:submit="submit">
        <div class="flex rounded-none">
             <div class="hidden md:flex">
                <select wire:model.live="selected_category"
                        class="sm:max-sm:hidden  form-control  form-select max-w-[200px] shadow-none custom-select"
                        aria-label="Default select example">
                    <option value="all_products" selected default>All Categories</option>
                    {{--                @foreach ($categories as $key => $value) --}}
                    {{--                    <option value={{ $key }} wire:key={{ $key }}>{{ $value }}</option> --}}
                    {{--                @endforeach --}}
                    @foreach (CustomHelper::categoryList() as $category_key => $category_value)
                        <option value={{ $category_key }} wire:key={{ $category_key }}>{{ $category_value }}</option>
                    @endforeach

                </select>
             </div>

            <div class="input-group" @mouseover="open = true">
                <input type="text" class="form-control p-2 custom-input-text rounded-none shadow-none"
                    placeholder="Search PR-Tech" wire:model.live="search" name="to_search" autocomplete="off"
                    aria-label="Search" aria-describedby="button-addon2" @input="event => open = true">
                <button type="submit" class="btn btn-outline-secondary rounded-none d-flex items-center gap-2"
                    id="button-addon2">
                    <div wire:loading.remove wire:target="search">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width=20 height="20" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </div>
                    </div>
                    <div wire:loading wire:target="search">
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        Search
                    </div>

                </button>
            </div>
        </div>
    </form>
    <div x-cloak x-show="open"
        class="absolute h-full w-full bg-white start-50 translate-middle-x rounded-lg shadow"
        x-transition:enter.duration.700ms x-transition:leave.duration.200ms
        style="z-index: 1020;">
        <div class="overflow-auto p-2 rounded-2 bg-white shadow" style="max-height: 600px">
            <p>Search Results</p>
            <hr>
            @if (strlen($search) > 1)
                @if (strlen($search_return) > 2)
                    @foreach ($search_return as $product_search)
                        <div wire:transition.scale.origin.top wire:key="{{ $product_search->id }}">
                            <a href="{{ route('product_detail', ['product_id' => $product_search->id, 'category' => $product_search->category]) }}"
                                class="text-decoration-none text-black">
                                <div
                                    class="d-flex h-full outline outline-1 outline-gray-200 p-0.5 hover:bg-gray-200 transition-all duration-300">
                                    <div class=" w-20 h-auto content-center">
                                        {{-- @dd($product_search->product_images[0]->image_paths) --}}
                                        <img src="{{ asset($product_search->product_images[0]->image_paths) }}"
                                            alt="image" class="w-20 h-20 object-contain" />
                                    </div>
                                    <div class="flex-1 d-flex flex-col ml-3">
                                        <div>
                                            <h1 class="text-lg">{{ $product_search->title }}</h1>
                                        </div>
                                        <div class="row w-full">
                                            <div class="col">
                                                <p class="mb-0">Status : {{ strtoupper($product_search->status) }}</p>
                                            </div>
                                            <div class="col">
                                                <p class="mb-0">Condition
                                                    : {{ strtoupper($product_search->condition) }}</p>
                                            </div>
                                            {{--                                <div class="col"> --}}
                                            {{--                                    <p>Condition : {{ strtoupper($product_search->condition)  }}</p> --}}
                                            {{--                                </div> --}}
                                        </div>
                                        <div>
                                            <h1 class="text-base font-bold">{{ $product_search->price }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <p class="text-center" wire:key="no-results">No Products Found. Click Search to find more.</p>
                    {{--                    <p>@json($search)</p> --}}
                @endif
            @else
                <p class="text-center" wire:key="no-results">Input string to Continue...</p>
            @endif
        </div>
    </div>
</div>
