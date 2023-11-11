<x-guest-layout>
    <!-- Session Status -->

    <nav class="navbar bg-light shadow-xl">
        <div class="container-fluid !justify-start md:!px-36 ">
            <a class="navbar-brand" href="/">
                <div class="w-[130px] sm:w-[175px] h-auto">
                    <img src="/img/brand/svg/logo-no-background.svg" alt="Logo" width="100%" height="100%"
                        class="d-inline-block align-text-top" />
                </div>
            </a>
            <h class="tracking-tight text-xl md:text-2xl">Sign In</h>
        </div>
    </nav>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="h-full">
        <div class="container h-full px-6 py-20">
            <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
                <!-- Left column container with background-->
                <div class="mb-12 md:mb-0 md:w-8/12 lg:w-6/12">
                    <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="w-full" alt="Phone image" />
                </div>

                <!-- Right column container with form -->
                <div class="md:w-8/12 lg:ml-6 lg:w-5/12  p-8 shadow-xl border-t-4 border-blue-500 rounded">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4 text-2xl">
                            <h>Login</h>
                        </div>
                        <!-- Email input -->
                        <div class="mb-3">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                address</label>
                            <input type="email" id="email" name="email"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="john.doe@company.com" required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- Password input -->
                        <div class="mb-3">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" id="password" name="password"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="•••••••••" required>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember me checkbox -->
                        <div class="mb-6 md:flex items-center md:justify-between">
                            <div class="flex justify-center p-1 self-center items-center">
                                <input class="form-check-input mt-0 mr-1" type="checkbox" value=""
                                    id="remember_me" name="remember" />
                                <label class="inline-block pl-[0.15rem] hover:cursor-pointer" for="remember_me">
                                    Remember me
                                </label>
                            </div>

                            <!-- Forgot password link -->
                            <div class="flex justify-center items-center">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit"
                            class=" inline-block w-full rounded bg-primary px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                            data-te-ripple-init data-te-ripple-color="light">
                            Login
                        </button>

                        {{-- Have an Account and Terms and condition --}}
                        <div
                            class="flex justify-center flex-column text-center p-2 text-sm items-center self-center mt-3">

                            <p>
                                Doesn't Have An Account? <span><a href="{{ route('register') }}">Sign
                                        Up</a></span>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{--    <form method="POST" action="{{ route('login') }}"> --}}
    {{--        @csrf --}}
    {{--        <!-- Remember Me --> --}}
    {{--        <div class="block mt-4"> --}}
    {{--            <label for="remember_me" class="inline-flex items-center"> --}}
    {{--                <input id="remember_me" type="checkbox" --}}
    {{--                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" --}}
    {{--                    name="remember"> --}}
    {{--                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span> --}}
    {{--            </label> --}}
    {{--        </div> --}}

    {{--        <div class="flex items-center justify-end mt-4"> --}}
    {{--            @if (Route::has('password.request')) --}}
    {{--                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" --}}
    {{--                    href="{{ route('password.request') }}"> --}}
    {{--                    {{ __('Forgot your password?') }} --}}
    {{--                </a> --}}
    {{--            @endif --}}
    {{--        </div> --}}
    {{--    </form> --}}
</x-guest-layout>
