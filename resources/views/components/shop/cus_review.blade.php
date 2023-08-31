<div class="media mb-4">
    <img src="{{ asset($img_path) }}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
    <div class="media-body">
        <h6>{{ $cus_name }}<small> - <i>{{ $cus_date }}</i></small></h6>
        <div class="text-primary mb-2">
            {{ $cus_star }}
        </div>
        {{ $slot }}
    </div>
</div>