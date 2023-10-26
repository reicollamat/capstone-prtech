@extends('layouts.master_layout')
@section('content')
    <div x-data="">
        <div>
            <x-shop.breadcrumb>
                <span class="breadcrumb-item active">Track Order</span>
            </x-shop.breadcrumb>
        </div>
        <div class="header d-flex justify-center  mt-3 mb-8">
            <h1>Track Order</h1>
        </div>
        <div x-transition.duration.500ms>
            <livewire:tracker.track-order lazy/>
        </div>

    </div>

@endsection
