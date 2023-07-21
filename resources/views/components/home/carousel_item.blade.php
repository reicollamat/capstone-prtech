<div class="carousel-item position-relative {{ $slot }}" style="height: 430px;">
    <img class="position-absolute w-100 h-100" src="{{ asset($img_path) }}" style="object-fit: cover;">
    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
        <div class="p-3" style="max-width: 700px;">
            <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">{{ $title }}</h1>
            <p class="mx-md-5 px-5 animate__animated animate__bounceIn">{{ $description }}</p>
            <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{ $href }}">{{ $btn_title }}</a>
        </div>
    </div>
</div>