<!-- Start Switcher -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="switcher-canvas" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title text-default" id="offcanvasRightLabel">مُبدّل الإعدادات</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="إغلاق"></button>
    </div>
    <div class="offcanvas-body">
        <nav class="border-bottom border-block-end-dashed">
            <div class="nav nav-tabs nav-justified" id="switcher-main-tab" role="tablist">
                <button class="nav-link active" id="switcher-home-tab" data-bs-toggle="tab"
                    data-bs-target="#switcher-home" type="button" role="tab" aria-controls="switcher-home"
                    aria-selected="true">
                    أنماط الواجهة
                </button>
                <button class="nav-link" id="switcher-profile-tab" data-bs-toggle="tab"
                    data-bs-target="#switcher-profile" type="button" role="tab" aria-controls="switcher-profile"
                    aria-selected="false">
                    ألوان الواجهة
                </button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <!-- Styles -->
            <div class="tab-pane fade show active border-0" id="switcher-home" role="tabpanel"
                aria-labelledby="switcher-home-tab" tabindex="0">

                <p class="switcher-style-head">وضع ألوان الواجهة:</p>
                <div class="row switcher-style gx-0">
                    <div class="col-4">
                        <div class="form-check switch-select">
                            <label class="form-check-label" for="switcher-light-theme">فاتح</label>
                            <input class="form-check-input" type="radio" name="theme-style" id="switcher-light-theme"
                                checked>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check switch-select">
                            <label class="form-check-label" for="switcher-dark-theme">داكن</label>
                            <input class="form-check-input" type="radio" name="theme-style" id="switcher-dark-theme">
                        </div>
                    </div>
                </div>

                <p class="switcher-style-head">أنماط التنقل:</p>
                <div class="row switcher-style gx-0">
                    <div class="col-4">
                        <div class="form-check switch-select">
                            <label class="form-check-label" for="switcher-vertical">عمودي</label>
                            <input class="form-check-input" type="radio" name="navigation-style"
                                id="switcher-vertical" checked>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-check switch-select">
                            <label class="form-check-label" for="switcher-horizontal">أفقي</label>
                            <input class="form-check-input" type="radio" name="navigation-style"
                                id="switcher-horizontal">
                        </div>
                    </div>
                </div>

                <p class="switcher-style-head">أنماط القائمة (عمودي / أفقي):</p>
                <div class="row switcher-style gx-0 pb-2 gy-2">
                    <div class="col-4"><label class="form-check switch-select">نقرة القائمة <input
                                class="form-check-input" type="radio" name="navigation-menu-styles"
                                id="switcher-menu-click"></label></div>
                    <div class="col-4"><label class="form-check switch-select">تحويم القائمة <input
                                class="form-check-input" type="radio" name="navigation-menu-styles"
                                id="switcher-menu-hover"></label></div>
                    <div class="col-4"><label class="form-check switch-select">نقرة الأيقونة <input
                                class="form-check-input" type="radio" name="navigation-menu-styles"
                                id="switcher-icon-click"></label></div>
                    <div class="col-4"><label class="form-check switch-select">تحويم الأيقونة <input
                                class="form-check-input" type="radio" name="navigation-menu-styles"
                                id="switcher-icon-hover"></label></div>
                </div>

                <p class="switcher-style-head">أنماط القائمة الجانبية:</p>
                <div class="row switcher-style gx-0 pb-2 gy-2">
                    <div class="col-sm-6"><label class="form-check switch-select">القائمة الافتراضية <input
                                class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                id="switcher-default-menu" checked></label></div>
                    <div class="col-sm-6"><label class="form-check switch-select">قائمة مغلقة <input
                                class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                id="switcher-closed-menu"></label></div>
                    <div class="col-sm-6"><label class="form-check switch-select">أيقونة مع نص <input
                                class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                id="switcher-icontext-menu"></label></div>
                    <div class="col-sm-6"><label class="form-check switch-select">أيقونة عائمة <input
                                class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                id="switcher-icon-overlay"></label></div>
                    <div class="col-sm-6"><label class="form-check switch-select">منفصلة <input
                                class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                id="switcher-detached"></label></div>
                    <div class="col-sm-6"><label class="form-check switch-select">قائمة مزدوجة <input
                                class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                id="switcher-double-menu"></label></div>
                </div>

                <p class="switcher-style-head">أنماط الصفحة:</p>
                <div class="row switcher-style gx-0">
                    <div class="col-4"><label class="form-check switch-select">عادي <input class="form-check-input"
                                type="radio" name="page-styles" id="switcher-regular" checked></label></div>
                    <div class="col-4"><label class="form-check switch-select">كلاسيك <input
                                class="form-check-input" type="radio" name="page-styles"
                                id="switcher-classic"></label></div>
                    <div class="col-4"><label class="form-check switch-select">حديث <input class="form-check-input"
                                type="radio" name="page-styles" id="switcher-modern"></label></div>
                </div>

                <p class="switcher-style-head">عرض الصفحة:</p>
                <div class="row switcher-style gx-0">
                    <div class="col-4"><label class="form-check switch-select">كامل <input class="form-check-input"
                                type="radio" name="layout-width" id="switcher-full-width" checked></label></div>
                    <div class="col-4"><label class="form-check switch-select">مربع <input class="form-check-input"
                                type="radio" name="layout-width" id="switcher-boxed"></label></div>
                </div>

                <p class="switcher-style-head">موضع القائمة:</p>
                <div class="row switcher-style gx-0">
                    <div class="col-4"><label class="form-check switch-select">ثابتة <input class="form-check-input"
                                type="radio" name="menu-positions" id="switcher-menu-fixed" checked></label></div>
                    <div class="col-4"><label class="form-check switch-select">قابلة للتمرير <input
                                class="form-check-input" type="radio" name="menu-positions"
                                id="switcher-menu-scroll"></label></div>
                </div>

                <p class="switcher-style-head">موضع الهيدر:</p>
                <div class="row switcher-style gx-0">
                    <div class="col-4"><label class="form-check switch-select">ثابت <input class="form-check-input"
                                type="radio" name="header-positions" id="switcher-header-fixed" checked></label>
                    </div>
                    <div class="col-4"><label class="form-check switch-select">قابل للتمرير <input
                                class="form-check-input" type="radio" name="header-positions"
                                id="switcher-header-scroll"></label></div>
                </div>

                <p class="switcher-style-head">مؤشر التحميل:</p>
                <div class="row switcher-style gx-0">
                    <div class="col-4"><label class="form-check switch-select">تفعيل <input class="form-check-input"
                                type="radio" name="page-loader" id="switcher-loader-enable"></label></div>
                    <div class="col-4"><label class="form-check switch-select">تعطيل <input class="form-check-input"
                                type="radio" name="page-loader" id="switcher-loader-disable" checked></label></div>
                </div>

            </div>
            <div class="tab-pane fade border-0" id="switcher-profile" role="tabpanel"
                aria-labelledby="switcher-profile-tab" tabindex="0">
                <div>

                    <div class="theme-colors">
                        <p class="switcher-style-head">ألوان القائمة:</p>
                        <div class="d-flex switcher-style pb-2">
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="قائمة فاتحة" type="radio" name="menu-colors"
                                    id="switcher-menu-light" checked>
                            </div>
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="قائمة داكنة" type="radio" name="menu-colors"
                                    id="switcher-menu-dark">
                            </div>
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="قائمة ملونة" type="radio" name="menu-colors"
                                    id="switcher-menu-primary">
                            </div>
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-gradient" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="قائمة متدرجة" type="radio" name="menu-colors"
                                    id="switcher-menu-gradient">
                            </div>
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-transparent" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="قائمة شفافة" type="radio" name="menu-colors"
                                    id="switcher-menu-transparent">
                            </div>
                        </div>
                        <div class="px-4 pb-3 text-muted fs-11">
                            ملاحظة: إذا كنت ترغب في تغيير لون القائمة ديناميكيًا،
                            استخدم منتقي اللون الأساسي للواجهة بالأسفل
                        </div>
                    </div>

                    <div class="theme-colors">
                        <p class="switcher-style-head">ألوان الهيدر:</p>
                        <div class="d-flex switcher-style pb-2">
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="هيدر فاتح" type="radio" name="header-colors"
                                    id="switcher-header-light" checked>
                            </div>
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="هيدر داكن" type="radio" name="header-colors"
                                    id="switcher-header-dark">
                            </div>
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="هيدر ملون" type="radio" name="header-colors"
                                    id="switcher-header-primary">
                            </div>
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-gradient" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="هيدر متدرج" type="radio" name="header-colors"
                                    id="switcher-header-gradient">
                            </div>
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-transparent" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="هيدر شفاف" type="radio" name="header-colors"
                                    id="switcher-header-transparent">
                            </div>
                        </div>
                        <div class="px-4 pb-3 text-muted fs-11">
                            ملاحظة: إذا كنت ترغب في تغيير لون الهيدر ديناميكيًا،
                            استخدم منتقي اللون الأساسي للواجهة بالأسفل
                        </div>
                    </div>

                    <div class="theme-colors">
                        <p class="switcher-style-head">اللون الأساسي للواجهة:</p>
                        <div class="d-flex flex-wrap align-items-center switcher-style">
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-primary-1" type="radio"
                                    name="theme-primary" id="switcher-primary">
                            </div>
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-primary-2" type="radio"
                                    name="theme-primary" id="switcher-primary1">
                            </div>
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-primary-3" type="radio"
                                    name="theme-primary" id="switcher-primary2">
                            </div>
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-primary-4" type="radio"
                                    name="theme-primary" id="switcher-primary3">
                            </div>
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-primary-5" type="radio"
                                    name="theme-primary" id="switcher-primary4">
                            </div>
                            <div class="form-check switch-select ps-0 mt-1 color-primary-light">
                                <div class="theme-container-primary"></div>
                                <div class="pickr-container-primary"></div>
                            </div>
                        </div>
                    </div>

                    <div class="theme-colors">
                        <p class="switcher-style-head">خلفية الواجهة:</p>
                        <div class="d-flex flex-wrap align-items-center switcher-style">
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-bg-1" type="radio"
                                    name="theme-background" id="switcher-background">
                            </div>
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-bg-2" type="radio"
                                    name="theme-background" id="switcher-background1">
                            </div>
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-bg-3" type="radio"
                                    name="theme-background" id="switcher-background2">
                            </div>
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-bg-4" type="radio"
                                    name="theme-background" id="switcher-background3">
                            </div>
                            <div class="form-check switch-select me-3">
                                <input class="form-check-input color-input color-bg-5" type="radio"
                                    name="theme-background" id="switcher-background4">
                            </div>
                            <div class="form-check switch-select ps-0 mt-1 tooltip-static-demo color-bg-transparent">
                                <div class="theme-container-background"></div>
                                <div class="pickr-container-background"></div>
                            </div>
                        </div>
                    </div>

                    <div class="menu-image mb-3">
                        <p class="switcher-style-head">القائمة مع صورة خلفية:</p>
                        <div class="d-flex flex-wrap align-items-center switcher-style">
                            <div class="form-check switch-select m-2">
                                <input class="form-check-input bgimage-input bg-img1" type="radio" name="theme-bg"
                                    id="switcher-bg-img">
                            </div>
                            <div class="form-check switch-select m-2">
                                <input class="form-check-input bgimage-input bg-img2" type="radio" name="theme-bg"
                                    id="switcher-bg-img1">
                            </div>
                            <div class="form-check switch-select m-2">
                                <input class="form-check-input bgimage-input bg-img3" type="radio" name="theme-bg"
                                    id="switcher-bg-img2">
                            </div>
                            <div class="form-check switch-select m-2">
                                <input class="form-check-input bgimage-input bg-img4" type="radio" name="theme-bg"
                                    id="switcher-bg-img3">
                            </div>
                            <div class="form-check switch-select m-2">
                                <input class="form-check-input bgimage-input bg-img5" type="radio" name="theme-bg"
                                    id="switcher-bg-img4">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="d-grid canvas-footer ">
                <a href="javascript:void(0);" id="reset-all" class="btn btn-danger">اعادة ضبط</a>
            </div>
        </div>
    </div>
</div>
<!-- End Switcher -->
