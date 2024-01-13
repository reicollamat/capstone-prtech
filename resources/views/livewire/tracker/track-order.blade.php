{{--    @extends('layouts.master_layout')--}}
{{--    @section('content')--}}
<div x-transition.duration.500ms>
    {{-- <h1>testsetes</h1> --}}
    <div class="d-flex justify-center my-4" x-transition.duration.500ms>
        <form wire:submit="submit">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label w-full text-center">
                    Order Number
                    <div class="inline" wire:ignore>
                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                      data-bs-trigger="hover focus"
                                      data-bs-placement="right"
                                      data-bs-content="Reference Number or your order. An email has been sent and can be used to track your order. '#' is not a part of the reference number.">
                                    <i class="bi bi-patch-question"></i>
                                </span>
                    </div>
                </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="XXXXXXXXXX"
                       pattern="[A-Za-z0-9]{11}" wire:model="reference" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label w-full text-center">Email</label>
                <input type="email" class="form-control" id="formGroupExampleInput2" placeholder="example@gmail.com"
                       wire:model="email" required>
            </div>
            <div class="d-flex justify-center mt-4">
                <div class="w-full">
                    <button class="flex w-full no-underline decoration-0 text-black" type="submit">
                                <span
                                    class="lg:!h-12 w-full  h-10 flex items-center justify-center uppercase font-semibold px-4 lg:!px-6 border border-black hover:bg-gray-800 hover:text-white transition duration-500 ease-in-out">
                                    Track Order
                                </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="my-4 px-24">
        <div wire:loading wire:target="submit" class="w-full">
            <hr>
            <div class="d-flex flex-column justify-center gap-3">
                <p class="text-center">Tracking, Please wait a moment.</p>
                <div class="w-full h-full d-flex justify-center items-center x-transition" x-transition.duration.500ms>
                    <div class="spinner-grow" style="width: 2rem; height: 2rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
        {{--                @dd($message)--}}
        @if ($message)
            <hr>
            <div class="d-flex flex-column justify-center gap-3 text-lg font-semibold tracking-wide">
                <p class="text-center">{{ $message }}</p>
                <div class="d-flex flex-column justify-center">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table
                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border border-gray-500">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Reference Number
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Amount
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($order)
                                @foreach ($order as $item)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->reference_number }}
                                        </th>
                                        <td class="px-6 py-4">
                                            @foreach ($item->purchase_items as $p_item)
                                                <p>
                                                    {{ $p_item->product->title }}
                                                    {{ $p_item->quantity . 'X'}}
                                                </p>
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->total_amount }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->purchase_status }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        @endif
    </div>
</div>
{{--    @endsection--}}
