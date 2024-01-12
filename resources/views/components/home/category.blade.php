<div class="col-lg-3 col-md-4 col-sm-6 p-2">
    <a class="text-decoration-none" {{ $cat_value }}>
        <div class="cat-item flex items-center p-2" style="margin-inline: 1.0rem">
            <div class="overflow-hidden flex items-center" style="width: 100px; height: 100px;">
                <img class="img-fluid" src="{{ $slot }}" alt="">
            </div>
            <div class="flex-fill pl-3">
                <h6 class="text-primary">{{ $category }}</h6>
                <small class="text-body">{{ $count }} ITEMS</small>
            </div>
        </div>
    </a>
</div>
