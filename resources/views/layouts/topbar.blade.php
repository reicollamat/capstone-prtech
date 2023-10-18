<div>
    <div class="sticky-top">
        <nav class="navbar padding-remove bg-body-tertiary bg-dark sticky-top py-2">
            <div class="w-full container-fluid mx-4 justify-between align-items-center my-1">
                <div class=" ">
                    <a class="navbar-brand" href="#">
                        <img src="/img/brand/svg/logo-no-background.svg" alt="Logo" width="150" height="150"
                             class="d-inline-block align-text-top">
                    </a>
                </div>
                {{--search bar here--}}
                <livewire:searchbar/>
                <div class="flex gap-2">
                    {{--profile account button--}}
                    <button class="btn  outline-remove position-relative" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptions_account" aria-controls="offcanvasWithBothOptions">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                             class="bi bi-person  position-relative"
                             viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>

                        </svg>
                        <span class="visually-hidden">unread messages</span>
                    </button>

                    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1"
                         id="offcanvasWithBothOptions_account"
                         aria-labelledby="offcanvasWithBothOptionsLabel">

                        @if (Route::has('login'))
                            @auth
                                <div>
                                    <div class="offcanvas-header">
                                        <h4 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">
                                            Welcome, {{ Auth::user()->name }}</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>

                                    </div>
                                    <hr>
                                    <div
                                        class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300 w-full">
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                        </svg>
                                    </div>
                                    <div
                                        class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300 w-full">
                                        <a class="dropdown-item" href="#">Dashboard</a>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                        </svg>
                                    </div>

                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <div
                                            class="d-flex justify-evenly p-3 hover:bg-gray-100 transition duration-300 w-full">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               @click.prevent="$root.submit();">Logout</a>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </div>
                                    </form>

                                </div>
                            @else
                                <div>
                                    <div class="offcanvas-header">
                                        <h4 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Login</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>

                                    </div>
                                    <hr>
                                    <div class="offcanvas-body">
                                        <p class="text-center font-bold">Please enter your e-mail and password</p>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <!-- Email Address -->
                                            <div>
                                                <x-input-label for="email" :value="__('Email')"/>
                                                <x-text-input id="email" class="block mt-1 w-full" type="email"
                                                              name="email" :value="old('email')" required autofocus
                                                              autocomplete="username"/>
                                                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                            </div>

                                            <!-- Password -->
                                            <div class="mt-4">
                                                <x-input-label for="password" :value="__('Password')"/>

                                                <x-text-input id="password" class="block mt-1 w-full"
                                                              type="password"
                                                              name="password"
                                                              required autocomplete="current-password"/>

                                                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                                            </div>

                                            <div class="flex flex-col items-center justify-start mt-4 gap-3">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                       href="{{ route('password.request') }}">
                                                        {{ __('Forgot your password?') }}
                                                    </a>
                                                @endif

                                                <x-primary-button class="ml-3 w-full text-center p-3">
                                                    {{ __('Log in') }}
                                                </x-primary-button>
                                                {{--                                            <button href="#_" class="relative inline-flex items-center justify-start px-6 py-3 overflow-hidden font-medium transition-all bg-white rounded hover:bg-white group ">--}}
                                                {{--                                                <span class="w-48 h-48 rounded rotate-[-40deg] bg-primary absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>--}}
                                                {{--                                                <span class="relative w-full text-left text-black transition-colors duration-300 ease-in-out group-hover:text-white">Log in</span>--}}
                                                {{--                                            </button>--}}
                                            </div>

                                            <div class="flex items-center justify-end mt-2">
                                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                   href="{{ route('register') }}">
                                                    {{ __('Don\'t have an account?') }}
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endauth
                        @endif
                    </div>
                    {{--                    add the livewire of wishlist--}}
                    <livewire:wishlist-sidebar/>
                    {{--                    add the livewire of cart items--}}
                    <livewire:cart-sidebar/>
                </div>
            </div>
        </nav>
    </div>
</div>


