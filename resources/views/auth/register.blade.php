<x-guest-layout>

    @section('title', 'Create Account - PR-TECH')

    <nav class="navbar bg-light shadow-xl">
        <div class="container-fluid md:!justify-start !justify-center md:!px-36 ">
            <a class="navbar-brand" href="/">
                <div class="w-[130px] sm:w-[175px] h-auto">
                    <img src="/img/brand/svg/logo-no-background.svg" alt="Logo" width="100%" height="100%"
                        class="d-inline-block align-text-top" />
                </div>
            </a>
            <h class="tracking-tight text-xl md:text-2xl">Register</h>
        </div>
    </nav>

    <section class="h-full relative z-50 ">
        <div class="container h-full px-6 py-20 z-50">
            <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between z-50">
                <!-- Left column container with background-->
                <div class="mb-12 md:mb-0 md:w-8/12 lg:w-6/12 z-50">
                    {{--                    <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" --}}
                    <img src="/img/login_reg.png" class="w-full"
                        alt="Phone image" />
                </div>

                <!-- Right column container with form -->
                <div class="md:w-8/12 lg:ml-6 lg:w-5/12 p-8 shadow-xl border-t-4 border-blue-500 rounded bg-white">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4 text-2xl">
                            <h>Register</h>
                        </div>
                        <!-- Username input -->
                        <div class="mb-3">
                            <label for="username"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username

                            </label>
                            <input type="text" id="username" name="name"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="" value="{{ old('username') }}" required>
                            @error('username')
                                <span class="font-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Email input -->
                        <div class="mb-3">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                address
                            </label>
                            <input type="email" id="email" name="email"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="john.doe@company.com" required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- Password input -->
                        <div class="mb-3">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>

                            <div class="relative" x-data="{ show: true }">
                                <input id="password" name="password" :type="show ? 'password' : 'text'"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="•••••••••" required>
                                <div class="absolute top-0 end-0 p-2.5">
                                    <svg class="h-6 text-gray-600 " fill="none" @click="show = !show"
                                        :class="{ 'hidden': !show, 'block': show }" xmlns="http://www.w3.org/2000/svg"
                                        viewbox="0 0 576 512">
                                        <path fill="currentColor"
                                            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                        </path>
                                    </svg>

                                    <svg class="h-6 text-gray-600 hidden" fill="none" @click="show = !show"
                                        :class="{ 'block': !show, 'hidden': show }" xmlns="http://www.w3.org/2000/svg"
                                        viewbox="0 0 640 512">
                                        <path fill="currentColor"
                                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                        </path>
                                    </svg>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        {{-- confirm password --}}
                        <div class="mb-3">

                            <label for="confirm_password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                password</label>
                            <div class="relative" x-data="{ show: true }">
                                <input id="confirm_password" name="password_confirmation"
                                    :type="show ? 'password' : 'text'"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="•••••••••" required>
                                <div class="absolute top-0 end-0 p-2.5">
                                    <svg class="h-6 text-gray-600 " fill="none" @click="show = !show"
                                        :class="{ 'hidden': !show, 'block': show }" xmlns="http://www.w3.org/2000/svg"
                                        viewbox="0 0 576 512">
                                        <path fill="currentColor"
                                            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                        </path>
                                    </svg>

                                    <svg class="h-6 text-gray-600 hidden" fill="none" @click="show = !show"
                                        :class="{ 'block': !show, 'hidden': show }" xmlns="http://www.w3.org/2000/svg"
                                        viewbox="0 0 640 512">
                                        <path fill="currentColor"
                                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                        </path>
                                    </svg>
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                        </div>

                        <!-- Submit button -->
                        {{--                        <button type="submit" --}}
                        {{--                            class="mt-2 inline-block w-full rounded bg-primary px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" --}}
                        {{--                            data-te-ripple-init data-te-ripple-color="light"> --}}
                        {{--                            Sign Up --}}
                        {{--                        </button> --}}
                        <div class="w-full">
                            <button class="flex w-full no-underline decoration-0 text-black" type="submit">
                                <span
                                    class="lg:!h-12 w-full  h-10 flex items-center justify-center uppercase font-semibold px-4 lg:!px-6 border border-black hover:bg-gray-800 hover:text-white transition duration-500 ease-in-out">
                                    Register
                                </span>
                            </button>
                        </div>

                        {{-- Have an Account and Terms and condition --}}
                        <div
                            class="flex justify-center flex-column text-center p-2 text-sm items-center self-center mt-3">
                            <p class="mb w-full">
                                By signing up, you agree to our
                                <span>
                                    <a href="{{ route('terms-and-conditions') }}">Terms and Conditions
                                    </a>
                                </span>
                                and
                                <span>
                                    <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
                                </span>
                            </p>
                            <p>
                                Have and Account? <span><a href="{{ route('login') }}">Login</a></span>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{--    <form method="POST" action="{{ route('register') }}"> --}}
    {{--        @csrf --}}

    {{--        <!-- Password --> --}}
    {{--        <div class="mt-4"> --}}
    {{--            <x-input-label for="password" :value="__('Password')" /> --}}

    {{--            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required --}}
    {{--                autocomplete="new-password" /> --}}

    {{--            <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
    {{--        </div> --}}

    {{--        <!-- Confirm Password --> --}}
    {{--        <div class="mt-4"> --}}
    {{--            <x-input-label for="password_confirmation" :value="__('Confirm Password')" /> --}}

    {{--            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" --}}
    {{--                name="password_confirmation" required autocomplete="new-password" /> --}}

    {{--            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
    {{--        </div> --}}

    {{--        <div class="flex items-center justify-end mt-4"> --}}
    {{--            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" --}}
    {{--                href="{{ route('login') }}"> --}}
    {{--                {{ __('Already registered?') }} --}}
    {{--            </a> --}}

    {{--            <x-primary-button class="ml-4"> --}}
    {{--                {{ __('Register') }} --}}
    {{--            </x-primary-button> --}}
    {{--        </div> --}}
    {{--    </form> --}}
</x-guest-layout>
