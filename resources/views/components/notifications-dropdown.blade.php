<!-- Start::header-element -->
<div class="header-element notifications-dropdown">

    <!-- Start::header-link|dropdown-toggle -->
    <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside"
        id="messageDropdown" aria-expanded="false">

        <svg class="header-link-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            version="1.1" width="24" height="24" viewBox="0 0 24 24">
            <path
                d="M10 21H14C14 22.1 13.1 23 12 23S10 22.1 10 21M21 19V20H3V19L5 17V11C5 7.9 7 5.2 10 4.3V4C10 2.9 10.9 2 12 2S14 2.9 14 4V4.3C17 5.2 19 7.9 19 11V17L21 19M17 11C17 8.2 14.8 6 12 6S7 8.2 7 11V18H17V11Z" />
        </svg>

        @if ($unreadCount > 0)
            <span class="badge bg-secondary rounded-pill header-icon-badge pulse pulse-secondary"
                id="notification-icon-badge">
                {{ $unreadCount }}
            </span>
        @endif
    </a>
    <!-- End::header-link|dropdown-toggle -->

    <!-- Start::main-header-dropdown -->
    <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">

        <div class="p-3">
            <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 fs-17 fw-semibold">الاشعارات</p>
                <span class="badge bg-secondary-transparent" id="notifiation-data">
                    {{ $unreadCount }} غير مقروء
                </span>
            </div>
        </div>

        <div class="dropdown-divider"></div>

        {{-- Notifications List --}}
        <ul class="list-unstyled p-2" id="header-notification-scroll">

            @forelse($notifications as $notification)
                <li class="dropdown-item d-flex align-items-start">

                    <div class="pe-2">
                        <span class="avatar avatar-md bg-primary-transparent avatar-rounded">
                            <i class="fe fe-message-square fs-18"></i>
                        </span>
                    </div>

                    <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                        <a href="{{ $notification->url ?? '#' }}">
                            <p class="mb-0 fw-semibold text-dark">
                                {{ $notification->title }}
                            </p>
                            <span class="text-muted">
                                {{ $notification->created_at->diffForHumans() }}
                            </span>
                        </a>

                        <div>
                            <form method="POST"
                                action="{{ $isClient
                                    ? route('client.notifications.read', $notification->id)
                                    : route('notifications.read', $notification->id) }}">
                                @csrf
                                <button type="submit"
                                    class="min-w-fit-content text-muted me-1 bg-transparent border-0">
                                    <i class="ti ti-x fs-16"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </li>
            @empty
                {{-- Empty state --}}
                <div class="p-5 empty-item1">
                    <div class="text-center">
                        <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                            <i class="ri-notification-off-line fs-2"></i>
                        </span>
                        <h6 class="fw-semibold mt-3">لا توجد اشعارات</h6>
                    </div>
                </div>
            @endforelse

        </ul>

        {{-- View all --}}
        <div class="p-3 empty-header-item1 border-top">
            <div class="d-grid">
                <a href="{{ $isClient ? route('client.notifications.index') : route('notifications.index') }}"
                    class="btn btn-primary">
                    عرض الكل
                </a>
            </div>
        </div>

    </div>
    <!-- End::main-header-dropdown -->

</div>
<!-- End::header-element -->
