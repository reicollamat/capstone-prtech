<div>
    {{-- Stop trying to control. --}}
    <h1>test</h1>
{{--    @foreach($products as $product)--}}
{{--        <p>{{ $product->title }}</p>--}}
{{--    @endforeach--}}
    <div x-data="{name:''}">
        <label for="name">Name:</label>
        <input id="name" type="text" x-model="name" />
        <p x-text="name">
    </div>

</div>
