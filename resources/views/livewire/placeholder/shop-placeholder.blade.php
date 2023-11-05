<div>
    <div>
        <div class="container-fluid sm:!px-16 ">
            <div class="d-flex justify-end ">
                <div class="position-relative">
                    <div x-data="{ open: false }" x-on:click.outside="open = false">
                        <button class="btn hover:! hover:!text-black bg-white  min-w-[175px] animate-pulse outline-gray-200"
                                x-on:click="open = !open">
                            <div
                                    class="d-flex justify-between">
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-300 w-full mb-2"></div>
                                <span class="ml-1" :class="{'rotated': open}">
                                    <i class="bi bi-caret-up hidden"></i>
                                </span>
                            </div>
                        </button>
                    </div>
                </div>

            </div>

            <div class="row" x-transition>
                <div class="hidden md:block col-auto col-0">
                    <div role="status"
                         class="w-full space-y-4 border border-gray-200 divide-y divide-gray-200 rounded shadow animate-pulse dark:divide-gray-700 md:p-6 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                                <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                            </div>
                            <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                        </div>
                        <div class="flex items-center justify-between pt-4">
                            <div>
                                <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                                <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                            </div>
                            <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                        </div>
                        <div class="flex items-center justify-between pt-4">
                            <div>
                                <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                                <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                            </div>
                            <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                        </div>
                        <div class="flex items-center justify-between pt-4">
                            <div>
                                <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                                <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                            </div>
                            <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                        </div>
                        <div class="flex items-center justify-between pt-4">
                            <div>
                                <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5"></div>
                                <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                            </div>
                            <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12"></div>
                        </div>
                        <span class="sr-only">Loading...</span>
                    </div>

                </div>
                <div class="col" id="content" x-transition>
                    <div x-transition class="w-full">
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 p-3">
                            @for($i= 0; $i < 8; $i++)
                                <div role="status"
                                     class="max-w-sm p-3 border border-gray-200 rounded shadow animate-pulse md:p-6 dark:border-gray-700">
                                    <div class="flex items-center justify-center h-48 mb-4 bg-gray-300 rounded dark:bg-gray-300">
                                        <svg class="w-10 h-10 text-gray-100 dark:text-gray-600" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                            <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM10.5 6a1.5 1.5 0 1 1 0 2.999A1.5 1.5 0 0 1 10.5 6Zm2.221 10.515a1 1 0 0 1-.858.485h-8a1 1 0 0 1-.9-1.43L5.6 10.039a.978.978 0 0 1 .936-.57 1 1 0 0 1 .9.632l1.181 2.981.541-1a.945.945 0 0 1 .883-.522 1 1 0 0 1 .879.529l1.832 3.438a1 1 0 0 1-.031.988Z"/>
                                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
                                        </svg>
                                    </div>
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-300 w-48 mb-4"></div>
                                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-300 mb-2.5"></div>
                                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-300 mb-2.5"></div>
                                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-300"></div>
                                    <div class="flex items-center mt-4 space-x-3">
                                        <div>
                                            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-300 w-full mb-2"></div>
                                            <div class="w-48 h-2 bg-gray-200 rounded-full dark:bg-gray-300"></div>
                                        </div>
                                    </div>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            @endfor
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
