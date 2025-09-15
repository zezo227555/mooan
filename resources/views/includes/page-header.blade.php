<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <div class="ms-md-1 mb-1 mb-md-0 ms-0">
        <nav>
            <h4>@yield('page-title')</h4>
            <ol class="breadcrumb mb-0">
                {{-- <li class="breadcrumb-item active" aria-current="page">Pages</li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Empty</a></li> --}}
            </ol>
        </nav>
    </div>
    <div class="page-title fw-semibold fs-18 mb-0">
        @yield('page-actions')
    </div>
</div>
