@push('head')
    <link
        href="{{ asset('img/icon/retechicon3.ico') }}"
        id="favicon"
        rel="icon"
    >
@endpush

<div class="h2 d-flex align-items-center">

    <p class="my-0 {{ auth()->check() ? 'd-none d-xl-block' : '' }}">
        {{ 'PR_' }}
    </p>

    @auth
        <x-orchid-icon path="bs.pc-display-horizontal" class=""/>
    @endauth

    <p class="my-0 {{ auth()->check() ? 'd-none d-xl-block' : '' }}">
        {{ '_Tech' }}
        <small class="align-top opacity">{{ 'SELLER' }}</small>
    </p>
</div>