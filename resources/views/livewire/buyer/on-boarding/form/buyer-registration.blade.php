<div>
    {{--    <nav class="navbar bg-light shadow-xl"> --}}
    {{--        <div class="container-fluid !justify-start md:!px-36 "> --}}
    {{--            <a class="navbar-brand" href="/"> --}}
    {{--                <div class="w-[130px] sm:w-[175px] h-auto"> --}}
    {{--                    <img src="/img/brand/svg/logo-no-background.svg" alt="Logo" width="100%" height="100%" --}}
    {{--                        class="d-inline-block align-text-top" /> --}}
    {{--                </div> --}}
    {{--            </a> --}}
    {{--            <h class="tracking-tight text-xl md:text-2xl">Account Registration</h> --}}
    {{--        </div> --}}
    {{--    </nav> --}}

    <x-slot:page_header>
        Account Registration
    </x-slot:page_header>

    <div>
        <section class="w-full h-full flex justify-center items-center px-6 py-6 lg:px-20 lg:py-20 ">
            <div class="container h-full p-4 shadow bg-white border-t-4 border-blue-500 rounded">
                <h4 class="text-center text-gray-700 tracking-tight">Complete your Registration</h4>
                <form class="py-6" wire:submit="RegistrationForm">
                    <div>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="first_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <span class="text-red-600 text-xs">*</span>First Name</label>
                                <input type="text" id="first_name" wire:model.blur="first_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Juan" required>
                                @error('first_name')
                                    <span class="font-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="last_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <span class="text-red-600 text-xs">*</span>Last Name</label>
                                <input type="text" id="last_name" wire:model.blur="last_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Dela Cruz" required>
                                @error('last_name')
                                    <span class="font-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="user_email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <span class="text-red-600 text-xs">*</span> Email</label>
                                <input type="email" id="user_email" wire:model.blur="user_email"
                                    @disabled($user_email > 1)
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="example@gmail.com" required>
                                @error('user_email')
                                    <span class="font-sm text-red-500">{{ $message }}</span>
                                @enderror

                            </div>
                            <div>
                                <label for="user_phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                    number</label>
                                <input type="tel" id="user_phone" wire:model.blur="user_phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="09472118385" pattern="[0-9]{11}" required>
                                @error('user_phone')
                                    <span class="font-sm text-red-500">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div class="text-center">
                                <label for="user_birthdate"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <span class="text-red-600 text-xs">*</span>Date of Birth
                                </label>
                                {{-- with a maximum of date of 18 years ago from now --}}
                                <input type="date" id="user_birthdate" wire:model.blur="user_birthdate"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" max="{{ \Carbon\Carbon::now()->subYears(19)->toDateString() }}" required>
                                @error('user_birthdate')
                                    <p class="font-sm text-red-500">{{ $message }}</p>
                                @enderror
                                @if ($user_birthdate != null)
                                    {{ date('F d, Y', strtotime($user_birthdate)) }}
                                @else
                                    <small>18 years old and above</small>
                                @endif
                            </div>
                            <div>
                                <label for="user_sex"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sex
                                </label>
                                <select
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="user_sex" wire:model.blur="user_sex">
                                    <option selected default value="select" disabled>Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('user_sex')
                                    <span class="font-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <hr>
                        <div>
                            <div class="mt-5">
                                <div class="grid gap-6 mb-6 md:grid-cols-3">

                                    {{-- state province --}}
                                    <div>
                                        <label for="user_state_province" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            <span class="text-red-600 text-xs">*</span>
                                            State/Province
                                        </label>
                                        <select id="user_state_province" class="form-select" aria-label="Default select example" wire:model.live="user_state_province" required>
                                            @foreach ($this->getAddressList as $address)
                                                @if ($address['province'] == 'select')
                                                    <option value="{{null}}">Please select</option>
                                                @else
                                                    <option value="{{$address['province']}}">{{$address['province']}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('user_state_province')
                                            <span class="font-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- city --}}
                                    <div>
                                        <label for="user_city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            <span class="text-red-600 text-xs">*</span>
                                            City
                                        </label>
                                        <select id="user_city" class="form-select" aria-label="Default select example" wire:model.live="user_city" required>
                                            @if ($this->user_city == null && $this->user_state_province == null)
                                                <option value="{{null}}" selected>Please select state/province first</option>
                                            @endif
                                            @foreach ($this->getAddressList as $address)
                                                @if ($address['province'] == $this->user_state_province)
                                                    @if ($this->user_city == null || $this->user_city != $address['cities'][0])
                                                        <option value="{{null}}" selected>Please select city</option>
                                                    @endif
                                                    @foreach ($address['cities'] as $key => $cities)
                                                        <option value="{{$cities}}">{{$cities}}</option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('user_city')
                                            <span class="font-sm text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- postal --}}
                                    <div>
                                        <label for="user_zip_postal"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zip/Postal
                                            code</label>
                                        <input type="tel" id="user_zip_postal" wire:model.blur="user_zip_postal"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                        @error('user_zip_postal')
                                            <span class="font-sm text-red-500">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="user_address_1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <span class="text-red-600 text-xs">*</span> Address Line 1</label>
                                <input type="text" id="user_address_1" wire:model.blur="user_address_1"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Address" required>
                                @error('user_address_1')
                                    <span class="font-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-6">
                                <label for="user_address_2"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Address Line 2 (Type n/a if not provided)</label>
                                <input type="text" id="user_address_2" wire:model.blur="user_address_2"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Address">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-end gap-3">
                        {{--                        <p>{{ $user_sex }} test</p> --}}
                        {{--                        <p>{{ $userid }}</p> --}}
                        {{--                        <button type="submit" class="btn btn-primary"> --}}
                        {{--                            <span wire:loading.remove wire:target="RegistrationForm"> --}}
                        {{--                                Proceed --}}
                        {{--                            </span> --}}
                        {{--                            <span wire:loading wire:target="RegistrationForm"> --}}
                        {{--                                <div class="text-center"> --}}
                        {{--                                    <div class="spinner-border spinner-border-sm" role="status"> --}}
                        {{--                                        <span class="visually-hidden">Loading...</span> --}}
                        {{--                                    </div> --}}
                        {{--                                </div> --}}
                        {{--                            </span> --}}
                        {{--                        </button> --}}
                        <button class="flex no-underline decoration-0 text-black" type="button" wire:click="delete" wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE">
                            <span
                                class="lg:!h-12 w-full  h-10 flex items-center text-black justify-center uppercase font-semibold rounded-sm px-4 lg:!px-6 border border-secondary hover:bg-yellow-500 hover:!text-black transition duration-500 ease-in-out">
                                Cancel
                            </span>
                        </button>
                        <button class="flex no-underline decoration-0 text-black" type="submit">
                            <span
                                class="lg:!h-12 w-full  h-10 flex items-center text-primary justify-center uppercase font-semibold rounded-sm px-4 lg:!px-6 border border-primary hover:bg-blue-600 hover:!text-white transition duration-500 ease-in-out">
                                <span wire:loading wire:target="RegistrationForm">
                                    <div class="text-center mr-1">
                                        <div class="spinner-border spinner-border-sm" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </span>
                                Proceed
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
