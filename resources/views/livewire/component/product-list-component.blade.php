<div>
    <div x-data="{ expanded: false }" class="py-2 bg-white">
        <div class="flex flex-column flex-lg-row flex-shrink-0 min-w-full items-center text-center">
            <span class="mb-0 p-2 min-w-[40px] !text-gray-400 !font-light">
                <input class="form-check-input" wire:model.live="select_products" value="{{ $item->id }}"
                    type="checkbox">
            </span>
            <div class="relative items-center  mb-0 min-w-[60px] p-2 !text-gray-800 !font-light">
                {{--                 <img src="https://images.unsplash.com/photo-1523779917675-b6ed3a42a561?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8d29tYW4lMjBibHVlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=face&w=500&q=200" --}}
                <img src="{{ asset($item->image) }}" class="rounded-lg mx-auto d-block w-9 h-9" alt="Product-Thumbnail">
            </div>
            <div class="mb-0 min-w-[40px] p-2 !text-gray-800 !font-light">
                {{ $item->id }}
            </div>
            <div class="mb-0 min-w-[100px] text-start p-2 flex-1 !text-gray-800 !font-light">
                {{ $item->title }}
            </div>
            <div class=" mb-0 min-w-[100px] p-2 flex-1 !text-gray-800 !font-light">
                {{ \App\Helper\Helper::maptopropercatetory($item->category) }}
            </div>
            <div class=" mb-0  min-w-[100px] p-2 !text-gray-800 !font-light">
                {{ $item->price }}
            </div>
            <div class=" mb-0 min-w-[100px] p-2 !text-gray-800 !font-light">
                Stock
            </div>
            <div class="flex justify-center mb-0 min-w-[100px] p-2 !text-gray-600 !font-light items-center">
                <button id="faqs-title-01" type="button"
                    class="flex items-center justify-center text-center font-semibold p-1 bg-white rounded-lg"
                    @click="expanded = !expanded" :aria-expanded="expanded" aria-controls="faqs-text-01">
                    <span class="transform origin-center transition duration-200 ease-out"
                        :class="{ '!rotate-180': expanded }">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
        <div id="faqs-text-01" role="region" aria-labelledby="faqs-title-01"
            class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
            :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
            <div class="overflow-hidden">
                <p class="pb-3">
                    If you go over your organisations or user limit, a member of the team will reach out
                    about
                    bespoke pricing. In the meantime, our collaborative features won't appear in
                    accounts or
                    users that are over the 100-account or 1,000-user limit.
                    If you go over your organisations or user limit, a member of the team will reach out
                    about
                    bespoke pricing. In the meantime, our collaborative features won't appear in
                    accounts or
                    users that are over the 100-account or 1,000-user limit. If you go over your
                    organisations
                    or user limit, a member of the team will reach out about
                    bespoke pricing. In the meantime, our collaborative features won't appear in
                    accounts or
                    users that are over the 100-account or 1,000-user limit.
                </p>
            </div>
        </div>
    </div>
    {{--    {{ $item->id }} --}}
</div>
