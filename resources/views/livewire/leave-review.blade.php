
<div x-cloak x-show="isOpen"
    x-transition:enter="transition ease-out duration-100"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90" 
    class="card text-center mx-auto my-4 w-50 shadow-lg" 
    style="position: fixed; top: 20px; right: 25%; width: 70%; height: 90%; z-index:9999; font-size: 14px;">

    <div class="card-header">
        <button class="w-full text-end text-red-600" @click="isOpen = false"><i class="bi bi-x-circle-fill"></i></button>
        <h3 class="mb-4">Leave a review for "{{$purchase_item->product->title}}"</h3>
    </div>
    <div class="card-body p-5 overflow-auto">

        <div class="row px-xl-5">
            <div class="col-lg-5">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="row border border-dark rounded">
                        <div class="col-lg-10">
                            <div class="carousel-inner p-2">
                                @foreach ($purchase_item->product->product_images as $key => $image)
                                    @if ($key == 0)
                                        <div class="carousel-item active">
                                            <img src="{{ asset($image->image_paths) }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    @else
                                        <div class="carousel-item">
                                            <img src="{{ asset($image->image_paths) }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex align-items-center p-0">
                            <div class="carousel-indicators position-relative d-block">
                                @foreach ($purchase_item->product->product_images as $key => $image)
                                    @if ($key == 0)
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="{{ $key }}" class="active" aria-current="true"
                                            aria-label="Slide {{ $key }}" style="width: 50px">
                                            <img src="{{ asset($image->image_paths) }}" class="d-block w-50"
                                                alt="...">
                                        </button>
                                    @else
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="{{ $key }}" aria-current="true"
                                            aria-label="Slide {{ $key }}" style="width: 50px">
                                            <img src="{{ asset($image->image_paths) }}" class="d-block w-50"
                                                alt="...">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30 text-dark">
                <div class="h-100">
                    <div class="d-flex items-center align-middle justify-content-between">
                        <h5>{{ $purchase_item->product->title }}</h5>
                    </div>

                    <div class="d-flex pb-2">
                        <div class="text-warning mr-2">

                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i > $purchase_item->product->rating)
                                    @for ($i = $purchase_item->product->rating; $i < 5; $i++)
                                        <small class="bi bi-star"></small>
                                    @endfor
                                @else
                                    <small class="bi bi-star-fill"></small>
                                @endif
                            @endfor

                            {{-- <small class="bi bi-star-fill"></small>
                            <small class="bi bi-star-fill"></small>
                            <small class="bi bi-star-fill"></small>
                            <small class="bi bi-star-half"></small>
                            <small class="bi bi-star"></small> --}}
                        </div>
                        <small class="pb-1">
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                                {{ $purchase_item->product->rating }}
                            </span>
                                ({{$purchase_item->product->comments->count()}} Reviews)
                        </small>
                    </div>

                    <div class="d-flex">
                        <h5 class="italic">
                            <i class="bi bi-shop"></i> {{ $purchase_item->product->seller->shop_name }}
                        </h5>
                    </div>

                    <div class="d-flex">
                        <h6 class="italic">
                            <i class="bi bi-telephone-fill"></i> {{ $purchase_item->product->seller->shop_phone_number }}
                        </h6>
                    </div>
                    <div class="pt-2 px-2 text-start">
                        <p class="">{{ $purchase_item->product->description }}</p>
                        <p>Upgrade your computing experience with the High-Performance Computer Part - Model HPX500.
                            This cutting-edge component is designed to enhance your system's capabilities, offering
                            superior performance and reliability for all your computing needs.</p>
                    </div>
                </div>
            </div>
        </div>


        <form wire:submit="submit_review">
            <div class="row mx-5 mt-4">
                <div x-data="{ ratingValue: 1 }">
                    <small class="italic">Drag <i class="bi bi-circle-fill text-blue-500"></i> button to change rating</small>

                    <label for="star_rating" class="form-label d-flex flex-row justify-content-between gap-5 text-2xl text-yellow-500 w-full">
                        <div x-show="ratingValue >= 1">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <div x-show="ratingValue >= 2">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <div x-show="ratingValue >= 3">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <div x-show="ratingValue >= 4">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <div x-show="ratingValue >= 5">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        @for ($i = 5; $i >= 0; $i--)
                            @for ($x = 5; $x > $i; $x--)
                                <div x-show="ratingValue == {{$i}}">
                                    <i class="bi bi-star"></i>
                                </div>
                            @endfor
                        @endfor
                    </label>

                    <input wire:model="rating_value" type="range" class="form-range" min="1" max="5" id="star_rating" x-model="ratingValue" required>
                    <p>Star Rating <span x-text="ratingValue" class="text-xl font-bold bg-yellow-300 px-2 rounded"></span></p>
                </div>
            </div>

            <div class="form-group m-4 text-start">
                <label for="review_text" class="text-lg">Your Review:</label>
                <textarea wire:model="review_text" id="review_text" cols="30" rows="5" class="form-control" required></textarea>
            </div>
            
            {{-- <div class="form-group m-4">
                <label for="name">Your Name</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group m-4">
                <label for="email">Your Email</label>
                <input type="email" class="form-control" id="email">
            </div> --}}
            <div class="form-group mb-0 m-4 text-end">
                <button @click="isOpen = false" type="button" class="btn bg-secondary text-light px-4 py-2">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary px-4 py-2">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>