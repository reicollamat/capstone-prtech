<div class="w-full header container-fluid bg-white py-1">
    <div class="md:mx-16">
        <div class="flex justify-between !text-sm !text-gray-800 tracking-normal">
            <div class="flex text-center align-middle self-center items-center ">
                <a href="{{ route('seller-landing') }}" class="decoration-0 no-underline !text-sm !text-gray-800 ">Seller
                    Portal</a>
                <span class="mx-1.5">|</span>
                <a href="{{ route('seller-signup') }}" class="decoration-0 no-underline !text-sm !text-gray-800 ">Become
                    A Seller</a>
                <span class="mx-1.5">|</span>
                <a href="{{ route('track-order') }}" class="decoration-0 no-underline !text-sm !text-gray-800 ">Order
                    Tracking</a>
            </div>
            <div class="flex text-center align-middle self-center items-center ">
                <div x-data="{ isNotificationOpen: false }" class="relative" @mouseleave="isNotificationOpen = false">
                    <button class="flex gap-1.5 p-1.5 items-center self-center align-middle"
                        @mouseover="isNotificationOpen = true">
                        <i class="bi bi-bell"></i>
                        <span>
                            Notifications
                        </span>
                    </button>
                    <div x-cloak x-show="isNotificationOpen" @mouseleave="isNotificationOpen = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        class="absolute right-0 z-20 w-96 py-3 overflow-hidden origin-top-right bg-transparent front rounded">
                        <div class="dropdown-arrow bg-white rounded shadow border-1 border-gray-300 ">
                            <div class="content-center gap-2 py-2.5 px-2">
                                <p class="mb-0 text-base text-gray-600 ">My Notifications</p>
                                <i class="bi bi-bell"></i>
                            </div>
                            <hr class="my-0">
                            <div class="w-full h-full flex justify-center">
                                <div class="w-full text-gray-700">
                                    {{-- <h6 class="mb-0">Notifications Empty</h6> --}}
                                    <div class="notification-body w-full p-1.5 border-t-2 border-b-2 border-gray-100">
                                        <div>
                                            <p>Your Wishlist Items is back in Stock!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <span class="mx-1.5">|</span>
                @if (Auth::user())
                    <div>
                        <div x-data="{ isProfileOpen: false }" class="relative">
                            <button class="flex items-center gap-x-1.5" @click="isProfileOpen = !isProfileOpen">
                                <img class="object-cover w-6 h-6 rounded-full"
                                    src="https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&h=764&q=100"
                                    alt="">
                                <p class="mb-0 text-sm">{{ Auth::user()->name }}</p>
                                <i class="bi bi-chevron-down"></i>
                            </button>

                            <div x-cloak x-show="isProfileOpen" @click.away="isProfileOpen = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90"
                                class="absolute right-0 z-20 w-max py-3 overflow-hidden origin-top-right bg-transparent front rounded">
                                <div class="dropdown-arrow bg-white  rounded shadow border-1 border-gray-300 ">
                                    <a href="{{ route('profile.edit') }}"
                                        class="block w-full text-start px-3  font-semibold py-2.5 text-sm text-gray-800 capitalize no-underline transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <div class="flex gap-2 justify-start items-center text-start">
                                            <i class="bi bi-person-fill text-gray-800 text-lg"></i>
                                            <span>Profile</span>
                                        </div>
                                    </a>
                                    <a href="{{route('profile.edit', ['is_mypurchase' => 1])}}"
                                        class="block w-full text-start font-semibold px-3 py-2.5 text-sm text-gray-800 capitalize no-underline transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

                                        <div class="flex gap-2 items-center">
                                            <i class="bi bi-bag-fill text-gray-800 text-lg"></i>
                                            <span>My Purchases</span>
                                        </div>
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-start font-semibold px-3 py-2.5 text-sm text-gray-800 capitalize no-underline transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

                                            <div class="flex gap-2 items-center">
                                                <i class="bi bi-box-arrow-left text-gray-800 text-lg"></i>
                                                <span>Sign Out</span>
                                            </div>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div>
                        <a href="{{ route('register') }}"
                            class="decoration-0 no-underline !text-sm !text-gray-800 ">Sign
                            Up</a>
                        <span class="mx-1.5">|</span>
                        <a href="{{ route('login') }}"
                            class="decoration-0 no-underline !text-sm !text-gray-800 ">Login</a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
