<div class="product-item bg-light mb-4">
    <div class="product-img position-relative p-3">
        <img class="img-fluid-fixheight w-100" src="{{ asset($image) }}" alt="">
        <div class="product-action">
            <a class="btn btn-outline-dark btn-square" href=""><i class="bi bi-cart-fill"></i></a>
            <a class="btn btn-outline-dark btn-square" href=""><i class="bi bi-heart-fill"></i></a>
            <a class="btn btn-outline-dark btn-square" href=""><i class="bi bi-search"></i></a>
        </div>
    </div>
    <div class="text-center py-4">
        {{ $slot }}
        <div class="d-flex align-items-center justify-content-center mt-2">
            <h6>₱{{ $price }}</h6>
            <h6 class="text-muted ml-2"><del>₱123.00</del></h6>
        </div>
        <div class="d-flex align-items-center justify-content-center mb-1">
            <small class="bi bi-star text-primary mr-1"></small>
            <small class="bi bi-star text-primary mr-1"></small>
            <small class="bi bi-star text-primary mr-1"></small>
            <small class="bi bi-star text-primary mr-1"></small>
            <small class="bi bi-star text-primary mr-1"></small>
            <small>({{ $purchasecount }})</small>
        </div>
    </div>
</div>