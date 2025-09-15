<!DOCTYPE html>
<html lang="ar" dir="rtl" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="light" data-toggled="close">

<head>
    @include('includes.head')
    @yield('styles')
</head>

<body>

    @include('includes.start-switcher')


    @include('includes.loader')

    <div class="page">

        @include('components.toasts')

        @include('includes.header')

        @include('includes.aside')

        <div class="main-content app-content">

            <div class="container-fluid">

                @include('includes.page-header')

                @yield('content')

            </div>
        </div>

        @yield('modals')

        @include('includes.footer')

        @include('includes.notifications')

    </div>

    @include('includes.foot')

    @yield('scripts')

</body>

</html>
