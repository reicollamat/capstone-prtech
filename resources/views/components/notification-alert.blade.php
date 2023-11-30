
@if (session('notification'))
    <div id="notif-alert" class="alert alert-primary rounded alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 25px; width: 25%; z-index:9999; font-size: 14px;">
        {{$slot}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('notification-livewire'))
    <div class="alert alert-primary rounded alert-dismissible fade show" role="alert" style="display: none; position: fixed; top: 20px; right: 25px; width: 25%; z-index:9999; font-size: 14px;" 
        x-data="{show: false}" 
        x-show="show"
        x-transition:leave.duration.500ms
        x-init="@this.on('notif-alert', () => { show = true; setTimeout(() => { show = false;}, 5000) })">
        {{$slot}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif