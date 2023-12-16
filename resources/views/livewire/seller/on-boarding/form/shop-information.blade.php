<div>
    {{--    <nav class="navbar bg-light shadow-xl"> --}}
    {{--        <div class="container-fluid !justify-start md:!px-36 py-2"> --}}
    {{--            <a class="navbar-brand" href="/"> --}}
    {{--                <div class="w-[120px] sm:w-[175px] h-auto"> --}}
    {{--                    <img src="/img/brand/svg/logo-no-background.svg" alt="Logo" width="100%" height="100%" --}}
    {{--                        class="d-inline-block align-text-top" /> --}}
    {{--                </div> --}}
    {{--            </a> --}}
    {{--            <h class="tracking-tight text-lg sm:text-2xl">Seller Registration</h> --}}
    {{--        </div> --}}
    {{--    </nav> --}}
    <x-slot:page_header>
        Seller Registration
    </x-slot:page_header>

    {{-- alert message if success --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible d-flex align-items-center m-3" role="alert">
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div>
        <div class="h-screen container-fluid !bg-red md:!px-14 py-14 ">
            <div class="flex gap-6">
                <div class="!bg-transparent self-center hidden md:block p-2.5 py-24 pl-4">
                    <ol class="relative text-gray-500 border-l border-gray-200 dark:border-gray-700 dark:text-gray-400">
                        <li class="mb-10 ml-3">
                            <span x-transition.duration.500ms
                                class="absolute flex items-center justify-center w-10 h-10 {{ $currentStep == 1 ? 'bg-blue-200' : 'bg-gray-200' }} rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                <svg x-transition.duration.500ms
                                    class="w-3.5 h-3.5  {{ $currentStep == 1 ? 'text-blue-600' : 'text-gray-600' }} dark:text-gray-400"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 18 20">
                                    <path
                                        d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                                </svg>
                            </span>
                            <h5 class="font-medium leading-tight">Shop Information</h5>
                            <p class="text-sm w-48">Essential information about your Shop</p>
                        </li>
                        <li class="mb-10 ml-3">
                            <span x-transition.duration.500ms
                                class="absolute flex items-center justify-center w-10 h-10 {{ $currentStep == 2 ? 'bg-blue-200' : 'bg-gray-200' }} rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                <svg x-transition.duration.500ms
                                    class="w-3.5 h-3.5 {{ $currentStep == 2 ? 'text-blue-600' : 'text-gray-600' }} dark:text-gray-400"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 16">
                                    <path
                                        d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z" />
                                </svg>
                            </span>
                            <h5 class="font-medium leading-tight">Business Information</h5>
                            <p class="text-sm w-48">Essential information about your Business</p>
                        </li>
                        <li class="mb-10 ml-3">
                            <span
                                class="absolute flex items-center justify-center w-10 h-10  bg-green-200 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                </svg>
                            </span>
                            <h5 class="font-medium leading-tight text-success">Success</h5>
                            <p class="text-sm"></p>
                        </li>
                    </ol>
                </div>
                <div class="flex-1 shadow border border-solid border-gray-200 p-3">
                    <div x-cloak x-transition @class(['hidden' => $currentStep != 1])>
                        <div class="w-full text-gray-700 tracking-tight text-xl text-center">
                            Shop Information
                        </div>
                        {{--                        <hr> --}}
                        <div class="progress my-3" role="progressbar" aria-label="Example 3px high"
                            aria-valuenow="33.33" aria-valuemin="0" aria-valuemax="100" style="height: 3px">
                            <div class="progress-bar !bg-red-600" style="width: 33.33%"></div>
                        </div>

                        {{-- step 1 of 3
                        <button wire:click="move">
                            click me
                        </button> --}}
                        {{-- {{ $currentStep }} --}}
                        <div>
                            <div class="w-full p-8">
                                <form wire:submit="FirstStepSubmit">
                                    <div>
                                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                                            <div>
                                                <label for="shop_name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    <span class="text-red-600 text-xs">*</span> Shop Name </label>
                                                <input type="text" id="shop_name" wire:model.blur="shop_name"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="John's Shop" required>
                                            </div>
                                            <div>
                                                <label for="shop_email"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    <span class="text-red-600 text-xs">*</span> Email</label>
                                                <input type="email" id="shop_email" wire:model.blur="shop_email"
                                                    @disabled($shop_email)
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="example@gmail.com" required>
                                            </div>
                                            <div>
                                                <label for="shop_phone"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Shop Contact Number
                                                </label>
                                                <input type="tel" id="shop_phone" wire:model.blur="shop_phone"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="09472118385" pattern="[0-9]{11}" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="mt-4">
                                            <div>
                                                <label for="shop_address"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    <span class="text-red-600 text-xs">*</span> Shop Address </label>
                                                <input type="text" id="shop_address" wire:model.live="shop_address"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Address" required>
                                                <span
                                                    class="block ml-2 mt-1 text-sm font-light text-gray-600 dark:text-white">This
                                                    is where the Items are going to be Pick-up. Preferably the address
                                                    that is on your Business Permit</span>
                                            </div>
                                            <div class="mt-4">
                                                <div class="grid gap-6 mb-6 md:grid-cols-3">
                                                    <div>
                                                        <label for="shop_state_province" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            <span class="text-red-600 text-xs">*</span>
                                                            Shop State/Province
                                                        </label>
                                                        <select id="shop_state_province" class="form-select py-2" aria-label="Default select example" wire:model.live="shop_state_province" required>
                                                            @foreach ($this->getAddressList as $address)
                                                                @if ($address['province'] == 'select')
                                                                    <option value="{{null}}">Please select</option>
                                                                @else
                                                                    <option value="{{$address['province']}}">{{$address['province']}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @error('shop_state_province')
                                                            <span class="font-sm text-red-500">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="shop_city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            <span class="text-red-600 text-xs">*</span>
                                                            Shop City
                                                        </label>
                                                        <select id="shop_city" class="form-select" aria-label="Default select example" wire:model.live="shop_city" required>
                                                            @if ($this->shop_city == null && $this->shop_state_province == null)
                                                                <option value="{{null}}" selected>Please select state/province first</option>
                                                            @endif
                                                            @foreach ($this->getAddressList as $address)
                                                                @if ($address['province'] == $this->shop_state_province)
                                                                    @if ($this->shop_city == null || $this->shop_city != $address['cities'][0])
                                                                        <option value="{{null}}" selected>Please select city</option>
                                                                    @endif
                                                                    @foreach ($address['cities'] as $key => $cities)
                                                                        <option value="{{$cities}}">{{$cities}}</option>
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @error('shop_city')
                                                            <span class="font-sm text-red-500">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="shop_zip_postal"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Zip/Postal Code
                                                        </label>
                                                        <input type="tel" id="shop_zip_postal"
                                                            wire:model.blur="shop_zip_code"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-4">
                                                <label for="complete" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Shop Complete Address 
                                                </label>
                                                <input type="text" name="complete" id="complete" value="{{$this->shop_address}}, {{$this->shop_city}}, {{$this->shop_state_province}} {{$this->shop_zip_code}}" 
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="flex justify-end gap-3">
                                        <button type="button" :disabled="{{ $currentStep == 1 }}"
                                            class="btn btn-ghost">
                                            Back
                                        </button>
                                        <button type="submit" class="btn btn-danger">Next</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    {{-- Business Information --}}
                    <div x-cloak x-transition @class(['hidden' => $currentStep != 2])>
                        <div class="w-full text-gray-700 tracking-tight text-xl text-center">
                            Business Information
                        </div>
                        <div class="progress my-3" role="progressbar" aria-label="Example 3px high"
                            aria-valuenow="66.66" aria-valuemin="0" aria-valuemax="100" style="height: 3px">
                            <div class="progress-bar !bg-red-600" style="width: 66.66%"></div>
                        </div>
                        step 2 of 3
                        <button wire:click="move">
                            click me
                        </button>
                        {{ $currentStep }}
                        <div class="p-8">
                            <form wire:submit="SecondStepSubmit">
                                <div class="my-6 lg:!px-32">
                                    <div class="mt-3">
                                        <label for="registed_name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            <span class="text-red-600 text-xs">*</span> Registered Name </label>
                                        <input type="text" id="registed_name" wire:model.blur="registered_name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="" required>
                                        <span
                                            class="block ml-2 mt-1 text-sm font-light text-gray-600 dark:text-white">Surname,
                                            Firstname (e.g. Dela Cruz, Juan)</span>
                                    </div>
                                    <div class="mt-3 flex justify-center">
                                        <p class="mb-0 text-base text-gray-700 w-1/2 text-center">
                                            If Business Address is the same as the address provided at Shop Information.
                                            You may leave this address information.
                                        </p>
                                    </div>
                                    <div class="mt-3">
                                        <label for="registered_address"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            <span class="text-red-600 text-xs">*</span> Registered Address</label>
                                        <input type="text" id="registered_address"
                                            wire:model.blur="registered_address"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="" required>

                                    </div>
                                    <div class="mt-3">
                                        <div class="grid gap-6 mb-6 md:grid-cols-3">
                                            <div>
                                                <label for="registered_state_province" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    <span class="text-red-600 text-xs">*</span>
                                                    Registered State/Province
                                                </label>
                                                <select id="registered_state_province" class="form-select py-2" aria-label="Default select example" wire:model.live="registered_state_province" required>
                                                    @foreach ($this->getAddressList as $address)
                                                        @if ($address['province'] == 'select')
                                                            <option value="{{null}}">Please select</option>
                                                        @else
                                                            <option value="{{$address['province']}}">{{$address['province']}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('registered_state_province')
                                                    <span class="font-sm text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="registered_city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    <span class="text-red-600 text-xs">*</span>
                                                    Registered City
                                                </label>
                                                <select id="registered_city" class="form-select" aria-label="Default select example" wire:model.live="registered_city" required>
                                                    <option selected disabled>Please select state/province first</option>
                                                    @foreach ($this->getAddressList as $address)
                                                        @if ($address['province'] == $this->registered_state_province)
                                                            @foreach ($address['cities'] as $cities)
                                                                @if ($cities == $this->shop_city)
                                                                <option value="{{$cities}}" selected>{{$cities}}</option>
                                                                @else
                                                                <option value="{{$cities}}">{{$cities}}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('registered_city')
                                                    <span class="font-sm text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="registered_zip_postal"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Registered Zip/Postal Code
                                                </label>
                                                <input type="tel" id="registered_zip_postal"
                                                    wire:model.blur="registered_zip_code"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <label for="complete" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Registered Complete Address 
                                            </label>
                                            <input type="text" name="complete" id="complete" value="{{$this->shop_address}}, {{$this->shop_city}}, {{$this->shop_state_province}} {{$this->shop_zip_code}}" 
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                        </div>
                                    </div>

                                    <div class="flex justify-center">
                                        <div class="flex items-center gap-2">
                                            <input type="checkbox" id="terms" name="terms" required />
                                            <label for="terms" class="mb-0">
                                                I agree to the <a class="no-underline"
                                                    href="{{ route('terms-and-conditions') }}">Terms and
                                                    Conditions</a> </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-end gap-3">
                                    <button type="button" class="btn btn-ghost"
                                        wire:click="$set('currentStep', 1)">Back
                                    </button>
                                    {{-- <button type="button" class="btn btn-ghost" --}}
                                    {{--        wire:click="testalert">test --}}
                                    {{-- </button> --}}
                                    <button type="submit" class="btn btn-danger">
                                        <div wire:loading.remove wire:target="SecondStepSubmit">
                                            Next
                                        </div>
                                        <div wire:loading wire:target="SecondStepSubmit">
                                            <div class="spinner-border spinner-border-sm" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div x-cloak x-transition class="{{ $currentStep == 3 ? 'block' : 'hidden' }}">
                        <div class="w-full text-gray-700 tracking-tight text-xl text-center">
                            Shop Registration
                        </div>
                        <div class="progress my-3" role="progressbar" aria-label="Example 3px high"
                            aria-valuenow="99.99" aria-valuemin="0" aria-valuemax="100" style="height: 3px">
                            <div class="progress-bar !bg-red-600" style="width: 99.99%"></div>
                        </div>
                        <div class="flex justify-center items-center pt-24">
                            <div class="flex flex-column items-center">
                                <div>
                                    <span x-transition.duration.500ms
                                        class=" flex items-center justify-center w-28 h-28 bg-green-200 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                        <svg class="w-16 h-16 text-green-500 dark:text-green-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="my-2.5">
                                    <h5>Registration Complete</h5>
                                </div>
                                <div>
                                    <a href="{{ route('seller-landing') }}" class="btn no-underline btn-danger">Go To
                                        Seller Dashboard</a>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="">
                            step 3 of 3
                            <button wire:click="move">
                                click me
                            </button>
                            {{ $currentStep }}
                        </div> --}}

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</div>
