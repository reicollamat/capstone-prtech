<div class="product-item bg-light mb-4">
    <div class="product-img position-relative overflow-hidden">
        <img class="img-fluid-fixheight w-100" src="{{ asset($image) }}" alt="">
        <div class="product-action">
            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
        </div>
    </div>
    <div class="text-center py-4">
        {{ $slot }}
        <div class="d-flex align-items-center justify-content-center mt-2">
            <h6>₱{{ $price }}</h6>
            <h6 class="text-muted ml-2"><del>₱123.00</del></h6>
        </div>
        <div class="d-flex align-items-center justify-content-center mb-1">
            <small class="fa fa-star text-primary mr-1"></small>
            <small class="fa fa-star text-primary mr-1"></small>
            <small class="fa fa-star text-primary mr-1"></small>
            <small class="fa fa-star text-primary mr-1"></small>
            <small class="fa fa-star text-primary mr-1"></small>
            <small>({{ $purchasecount }})</small>
        </div>
    </div>
</div>