
@if (session('notification'))
    <div id="notif-alert" class="alert alert-primary rounded alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; left: 25%; width: 50%; z-index:9999;">
        {{$slot}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif