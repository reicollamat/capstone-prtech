<div>
    {{-- notification button --}}
    <button class="btn outline-remove relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#sellernotif"
        aria-controls="offcanvasWithBothOptions">
        <i class="bi bi-bell-fill text-lg"></i>
        @if ($this->getTotalUnreadSellerNotifications)
            <span class="absolute translate-middle badge bg-transparent text-danger">
                {{ $this->getTotalUnreadSellerNotifications }}
                <span class="visually-hidden">Notification</span>
            </span>
        @endif
    </button>

    <div class="offcanvas offcanvas-end min-w-[500px]" data-bs-scroll="false" tabindex="-1" id="sellernotif"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header px-4">
            <div class="d-flex align-middle self-center items-center text-gray-600">
                <i class="bi bi-bell-fill text-lg"></i>
                <h5 class="offcanvas-title pl-2 text-xl" id="offcanvasWithBothOptionsLabel">
                    @if ($this->getTotalUnreadSellerNotifications)
                        Seller Notifications
                        <span class="absolute badge rounded-pill bg-danger ml-1">
                            {{ $this->getTotalUnreadSellerNotifications }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    @else
                        Seller Notifications
                    @endif
                </h5>
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body bg-secondary-subtle mb-30">
            <livewire:seller-notification-list />
        </div>

    </div>
</div>
