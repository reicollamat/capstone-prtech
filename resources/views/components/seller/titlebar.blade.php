<div class="card-group m-2">
    {{-- sidebar toggler --}}
    <div class="card bg-body-tertiary" style="max-width: 50px">
        <div class="card-body fs-5">
            <button class="bi bi-layout-sidebar-inset" aria-hidden="true" id="sidebarToggle"></button>
            </button>
        </div>
    </div>
    {{-- title --}}
    <div class="card bg-body-tertiary">
        <div class="card-body fs-5">
            {{$slot}}
        </div>
    </div>
</div>