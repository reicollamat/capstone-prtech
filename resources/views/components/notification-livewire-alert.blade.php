
<div class="alert alert-primary rounded alert-dismissible fade show" role="alert" style="display: none; position: fixed; top: 20px; left: 25%; width: 50%; z-index:9999;" 
    x-data="{show: false}" 
    x-show="show"
    x-transition:leave.duration.500ms
    x-init="@this.on('notif-alert', () => { show = true; setTimeout(() => { show = false;}, 5000) })">
    {{$slot}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>