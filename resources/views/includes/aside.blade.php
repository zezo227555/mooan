<aside class="app-sidebar sticky" id="sidebar">

    <div class="main-sidebar-header">
        @if (auth()->guard('client')->check())
            <a href="{{ route('client.dashboard') }}" class="header-logo">
            @elseif(auth()->check())
                <a href="{{ route('dashboardContoller.main') }}" class="header-logo">
        @endif
        <img src="{{ asset('assets/images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo">
        <img src="{{ asset('assets/images/brand-logos/toggle-logo.png') }}" alt="logo" class="toggle-logo">
        <img src="{{ asset('assets/images/brand-logos/desktop-dark.png') }}" alt="logo" class="desktop-dark">
        <img src="{{ asset('assets/images/brand-logos/toggle-dark.png') }}" alt="logo" class="toggle-dark">
        <img src="{{ asset('assets/images/brand-logos/desktop-white.png') }}" alt="logo" class="desktop-white">
        <img src="{{ asset('assets/images/brand-logos/toggle-white.png') }}" alt="logo" class="toggle-white">
        </a>
    </div>

    <div class="main-sidebar" id="sidebar-scroll">

        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">

                @if (auth()->guard('client')->check())
                    {{-- 📊 Dashboard --}}
                    <li class="slide {{ request()->routeIs('client.dashboard') ? 'open' : '' }}">
                        <a href="{{ route('client.dashboard') }}"
                            class="side-menu__item {{ request()->routeIs('client.dashboard') ? 'active' : '' }}">
                            <i class="bi bi-speedometer2 side-menu__icon"></i>
                            <span class="side-menu__label">لوحة التحكم</span>
                        </a>
                    </li>

                    {{-- 📂 My Cases --}}
                    <li class="slide {{ request()->routeIs('client.cases.*') ? 'open' : '' }}">
                        <a href="{{ route('client.cases.index') }}"
                            class="side-menu__item {{ request()->routeIs('client.cases.*') ? 'active' : '' }}">
                            <i class="bi bi-folder2-open side-menu__icon"></i>
                            <span class="side-menu__label">قضاياي</span>
                        </a>
                    </li>

                    {{-- 📄 Documents --}}
                    <li class="slide {{ request()->routeIs('client.documents.*') ? 'open' : '' }}">
                        <a href="{{ route('client.documents.index') }}"
                            class="side-menu__item {{ request()->routeIs('client.documents.*') ? 'active' : '' }}">
                            <i class="bi bi-file-earmark-text side-menu__icon"></i>
                            <span class="side-menu__label">المستندات</span>
                        </a>
                    </li>

                    {{-- 💰 Invoices --}}
                    <li class="slide {{ request()->routeIs('client.invoices.*') ? 'open' : '' }}">
                        <a href="{{ route('client.invoices.index') }}"
                            class="side-menu__item {{ request()->routeIs('client.invoices.*') ? 'active' : '' }}">
                            <i class="bi bi-receipt side-menu__icon"></i>
                            <span class="side-menu__label">الفواتير</span>
                        </a>
                    </li>
                @elseif(auth()->check())
                    @php
                        $role = auth()->user()->role ?? null;
                    @endphp

                    {{-- ================= USERS (ADMIN ONLY) ================= --}}
                    @if ($role === 'admin')
                        <li class="slide has-sub {{ request()->routeIs('users.*') ? 'open' : '' }}">
                            <a href="javascript:void(0);"
                                class="side-menu__item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                                <i class="bi bi-people side-menu__icon"></i>
                                <span class="side-menu__label">المستخدمين</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide">
                                    <a href="{{ route('users.index') }}"
                                        class="side-menu__item {{ request()->routeIs('users.index') ? 'active' : '' }}">
                                        الرئيسية
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('users.create') }}"
                                        class="side-menu__item {{ request()->routeIs('users.create') ? 'active' : '' }}">
                                        إضافة مستخدم
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    {{-- ================= CLIENTS (ADMIN + RECEPTION) ================= --}}
                    @if (in_array($role, ['admin', 'reception']))
                        <li class="slide has-sub {{ request()->routeIs('clients.*') ? 'open' : '' }}">
                            <a href="javascript:void(0);"
                                class="side-menu__item {{ request()->routeIs('clients.*') ? 'active' : '' }}">
                                <i class="bi bi-people side-menu__icon"></i>
                                <span class="side-menu__label">العملاء</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide">
                                    <a href="{{ route('clients.index') }}"
                                        class="side-menu__item {{ request()->routeIs('clients.index') ? 'active' : '' }}">
                                        الرئيسية
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('clients.create') }}"
                                        class="side-menu__item {{ request()->routeIs('clients.create') ? 'active' : '' }}">
                                        إضافة عميل
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    {{-- ================= LEGAL CASES (ALL STAFF) ================= --}}
                    @if (in_array($role, ['admin', 'attorney', 'reception']))
                        <li class="slide has-sub {{ request()->routeIs('legal-cases.*') ? 'open' : '' }}">
                            <a href="javascript:void(0);"
                                class="side-menu__item {{ request()->routeIs('legal-cases.*') ? 'active' : '' }}">
                                <i class="bi bi-briefcase side-menu__icon"></i>
                                <span class="side-menu__label">القضايا</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide">
                                    <a href="{{ route('legal-cases.index') }}"
                                        class="side-menu__item {{ request()->routeIs('legal-cases.index') ? 'active' : '' }}">
                                        الرئيسية
                                    </a>
                                </li>

                                {{-- Only Admin + Reception can create --}}
                                @if (in_array($role, ['admin', 'reception']))
                                    <li class="slide">
                                        <a href="{{ route('legal-cases.create') }}"
                                            class="side-menu__item {{ request()->routeIs('legal-cases.create') ? 'active' : '' }}">
                                            إضافة قضية
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    {{-- ================= COURTS (ADMIN ONLY) ================= --}}
                    @if ($role === 'admin')
                        <li class="slide has-sub {{ request()->routeIs('court-specifications.*') ? 'open' : '' }}">
                            <a href="javascript:void(0);"
                                class="side-menu__item {{ request()->routeIs('court-specifications.*') ? 'active' : '' }}">
                                <i class="bi bi-building side-menu__icon"></i>
                                <span class="side-menu__label">المحاكم</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide">
                                    <a href="{{ route('court-specifications.index') }}"
                                        class="side-menu__item {{ request()->routeIs('court-specifications.index') ? 'active' : '' }}">
                                        قائمة المحاكم
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('court-specifications.create') }}"
                                        class="side-menu__item {{ request()->routeIs('court-specifications.create') ? 'active' : '' }}">
                                        إضافة محكمة
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    {{-- ================= TREASURY (ADMIN ONLY) ================= --}}
                    @if ($role === 'admin')
                        <li class="slide {{ request()->routeIs('treasury.*') ? 'open' : '' }}">
                            <a href="{{ route('treasury.index') }}"
                                class="side-menu__item {{ request()->routeIs('treasury.*') ? 'active' : '' }}">
                                <i class="bi bi-cash-coin side-menu__icon"></i>
                                <span class="side-menu__label">الخزينة</span>
                            </a>
                        </li>
                    @endif

                @endif

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg>
            </div>
        </nav>

    </div>

</aside>
