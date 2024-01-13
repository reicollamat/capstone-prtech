<div x-data="{ isNotificationOpen: false }" class="relative" @mouseleave="isNotificationOpen = false">
    <button class="flex gap-1.5 p-1.5 items-center self-center align-middle"
        @mouseover="isNotificationOpen = true">
        @if (count($this->notifications))
            <i class="bi bi-bell">
             <span class="position-absolute top-25 start-25 translate-middle p-1 bg-danger border border-light rounded-circle">
                 <span class="visually-hidden">New alerts</span>
             </span>
            </i>
        @else
            <i class="bi bi-bell"></i>
        @endif
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
                <div class="w-full text-gray-700 overflow-y-auto h-96">
                    {{-- <h6 class="mb-0">Notifications Empty</h6> --}}
                    <div class="notification-body w-full p-1.5 border-t-2 border-gray-100">
                        @if (count($this->notifications))

                            <button class="text-red-600 text-sm px-1" wire:click="clear_notifs">
                                <i class="bi bi-trash-fill"></i>Clear
                            </button>

                            @foreach ($this->notifications as $notification)
                                @if ($notification->tag == 'order_placed')
                                    <div class="flex flex-col text-start m-1 p-2 bg-blue-200 rounded">
                                        <div class="flex flex-row">
                                            <i class="bi bi-bell mr-2"></i>
                                            <h6>{{$notification->title}}</h6>
                                        </div>
                                        <p class="p-0 m-0">{{$notification->message}}</p>
                                    </div>
                                @endif
                                @if ($notification->tag == 'to_ship')
                                    <div class="flex flex-col text-start m-1 p-2 bg-blue-200 rounded">
                                        <div class="flex flex-row">
                                            <i class="bi bi-bell mr-2"></i>
                                            <h6>{{$notification->title}}</h6>
                                        </div>
                                        <p class="p-0 m-0">{{$notification->message}}</p>
                                    </div>
                                @endif
                                @if ($notification->tag == 'shipping')
                                    <div class="flex flex-col text-start m-1 p-2 bg-blue-200 rounded">
                                        <div class="flex flex-row">
                                            <i class="bi bi-bell mr-2"></i>
                                            <h6>{{$notification->title}}</h6>
                                        </div>
                                        <p class="p-0 m-0">{{$notification->message}}</p>
                                    </div>
                                @endif
                                @if ($notification->tag == 'failed_delivery')
                                    <div class="flex flex-col text-start m-1 p-2 bg-blue-200 rounded">
                                        <div class="flex flex-row">
                                            <i class="bi bi-bell mr-2"></i>
                                            <h6>{{$notification->title}}</h6>
                                        </div>
                                        <p class="p-0 m-0">{{$notification->message}}</p>
                                    </div>
                                @endif
                                @if ($notification->tag == 'delivered')
                                    <div class="flex flex-col text-start m-1 p-2 bg-blue-200 rounded">
                                        <div class="flex flex-row">
                                            <i class="bi bi-bell mr-2"></i>
                                            <h6>{{$notification->title}}</h6>
                                        </div>
                                        <p class="p-0 m-0">{{$notification->message}}</p>
                                    </div>
                                @endif
                                @if ($notification->tag == 'purchase_receipt')
                                    <div class="flex flex-col text-start m-1 p-2 bg-blue-200 rounded">
                                        <div class="flex flex-row">
                                            <i class="bi bi-bell mr-2"></i>
                                            <h6>{{$notification->title}}</h6>
                                        </div>
                                        <p class="p-0 m-0">{{$notification->message}}</p>
                                    </div>
                                @endif
                                @if ($notification->tag == 'completed')
                                {{-- <form action="{{route('leave_review')}}" method="GET"> --}}

                                    <input type="text" name="purchase_id" value="{{$notification->purchase_id}}" hidden>
                                    <button class="flex flex-col text-start m-1 p-2 bg-blue-200 rounded">
                                        <div class="flex flex-row">
                                            <i class="bi bi-bell mr-2"></i>
                                            <h6>{{$notification->title}}</h6>
                                        </div>
                                        <p class="p-0 m-0">{{$notification->message}}</p>
                                    </button>
                                {{-- </form> --}}
                                @endif
                                @if ($notification->tag == 'product_restock')
                                    <div class="flex flex-col text-start m-1 p-2 bg-blue-200 rounded">
                                        <div class="flex flex-row">
                                            <i class="bi bi-bell mr-2"></i>
                                            <h6>{{$notification->title}}</h6>
                                        </div>
                                        <p class="p-0 m-0">{{$notification->message}}</p>
                                    </div>
                                @endif
                            @endforeach

                        @else

                        <div class="text-center text-secondary">
                            <i class="bi bi-bell mr-2"></i>
                            No notifications
                        </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
