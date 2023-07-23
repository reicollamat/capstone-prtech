<div class="col-lg-3 col-md-4 col-sm-6 pb-1">
    <a class="text-decoration-none" {{ $cat_value }}>
        <div class="cat-item d-flex align-items-center mb-4" style="margin-inline: 1.0rem">
            <div class="overflow-hidden" style="width: 100px; height: 100px;">
                <img class="img-fluid" src="{{ $slot }}" alt="">
            </div>
            <div class="flex-fill pl-3">
                <h6 class="text-primary">{{ $category }}</h6>
                <small class="text-body">{{ $count }}</small>
            </div>
        </div>
    </a>
</div>