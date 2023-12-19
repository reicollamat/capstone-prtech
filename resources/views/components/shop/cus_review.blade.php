<div class="card mb-4">
    <div class="card-header flex border border-bottom-0">
        <img src="{{ asset($img_path) }}" alt="Image" class="img-fluid mr-3" style="width: 45px;">
        <div class="my-auto">
            <h6>{{ $cus_name }}<small> - <i>{{ $cus_date }}</i></small></h6>
            <div class="text-warning">
                {{ $cus_star }}
            </div>
        </div>
    </div>
    <div class="card-body mx-5 px-2">
        {{ $slot }}
    </div>
</div>