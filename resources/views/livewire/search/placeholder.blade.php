<div class="w-1/2 position-relative" >
    <form action="{{route('search_result')}}" method="GET">
        <div class="input-group rounded-none">
            <select wire:model.live="selected_category"
                    class="form-control form-select max-w-[200px] shadow-none"
                    aria-label="Default select example">
                <option value="all_products" selected default>All Categories</option>
            </select>

            <input type="text" class="form-control p-2 rounded-none shadow-none"
                   placeholder="Search PR-Tech" wire:model.live="search" name="to_search" autocomplete="off"
                   aria-label="Search" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary rounded-none d-flex items-center gap-2" type="submit"
                    id="button-addon2">
                <svg xmlns="http://www.w3.org/2000/svg" width=20 height="20" fill="currentColor"
                     class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
                Search
            </button>
        </div>
    </form>
</div>
