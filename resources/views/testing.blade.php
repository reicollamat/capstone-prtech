@extends('layouts.master_layout')
@section('content')
    <div>
        <p>test</p>
        {{-- <div class="row justify-content-center"> --}}
        {{--     <iframe src="{{ public_path('sales.pdf') }}" width="50%" height="600"> --}}
        {{--         This browser does not support PDFs. Please download the PDF to view it: <a href="{{ public_path('sales.pdf' }}">Download PDF</a> --}}
        {{--     </iframe> --}}
        {{-- </div> --}}
        {{-- <img src="{{ storage_path('app/public/2023-12-14_1_nw.png') }}" width="100%" alt=""> --}}
{{-- create a link that open a new tab with sales.pdf  --}}
        <a href="{{ asset('sales.pdf') }}" target="_blank">Open sales.pdf</a>
    </div>

@endsection
