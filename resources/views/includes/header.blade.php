 <!-- app-header -->
 <header class="app-header">

     <!-- Start::main-header-container -->
     <div class="main-header-container container-fluid">

         <!-- Start::header-content-left -->
         <div class="header-content-left">

             <!-- Start::header-element -->
             <div class="header-element">
                 <div class="horizontal-logo">
                     <a href="{{ route('dashboardContoller.main') }}" class="header-logo">
                         <img src="{{ asset('assets/images/brand-logos/desktop-logo.png') }}" alt="logo"
                             class="desktop-logo">
                         <img src="{{ asset('assets/images/brand-logos/toggle-logo.png') }}" alt="logo"
                             class="toggle-logo">
                         <img src="{{ asset('assets/images/brand-logos/desktop-dark.png') }}" alt="logo"
                             class="desktop-dark">
                         <img src="{{ asset('assets/images/brand-logos/toggle-dark.png') }}" alt="logo"
                             class="toggle-dark">
                         <img src="{{ asset('assets/images/brand-logos/desktop-white.png') }}" alt="logo"
                             class="desktop-white">
                         <img src="{{ asset('assets/images/brand-logos/toggle-white.png') }}" alt="logo"
                             class="toggle-white">
                     </a>
                 </div>
             </div>
             <!-- End::header-element -->

             <!-- Start::header-element -->
             <div class="header-element">
                 <!-- Start::header-link -->
                 <a aria-label="Hide Sidebar"
                     class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                     data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                 <!-- End::header-link -->

             </div>
             <!-- End::header-element -->

         </div>
         <!-- End::header-content-left -->

         <!-- Start::header-content-right -->
         <div class="header-content-right">
             <!-- Start::header-element -->
             <div class="header-element header-search d-lg-none d-block ">
                 <!-- Start::header-link -->
                 <a aria-label="anchor" href="javascript:void(0);" class="header-link" data-bs-toggle="modal"
                     data-bs-target="#searchModal">
                     <i class="bx bx-search-alt-2 header-link-icon"></i>
                 </a>
                 <!-- End::header-link -->
             </div>
             <!-- End::header-element -->

             <!-- Start::header-element -->
             <div class="header-element header-theme-mode">
                 <!-- Start::header-link|layout-setting -->
                 <a href="javascript:void(0);" class="header-link layout-setting">
                     <span class="light-layout">
                         <!-- Start::header-link-icon -->
                         <svg class="header-link-icon" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24"
                             viewBox="0 0 24 24">
                             <path
                                 d="M17.75,4.09L15.22,6.03L16.13,9.09L13.5,7.28L10.87,9.09L11.78,6.03L9.25,4.09L12.44,4L13.5,1L14.56,4L17.75,4.09M21.25,11L19.61,12.25L20.2,14.23L18.5,13.06L16.8,14.23L17.39,12.25L15.75,11L17.81,10.95L18.5,9L19.19,10.95L21.25,11M18.97,15.95C19.8,15.87 20.69,17.05 20.16,17.8C19.84,18.25 19.5,18.67 19.08,19.07C15.17,23 8.84,23 4.94,19.07C1.03,15.17 1.03,8.83 4.94,4.93C5.34,4.53 5.76,4.17 6.21,3.85C6.96,3.32 8.14,4.21 8.06,5.04C7.79,7.9 8.75,10.87 10.95,13.06C13.14,15.26 16.1,16.22 18.97,15.95M17.33,17.97C14.5,17.81 11.7,16.64 9.53,14.5C7.36,12.31 6.2,9.5 6.04,6.68C3.23,9.82 3.34,14.64 6.35,17.66C9.37,20.67 14.19,20.78 17.33,17.97Z" />
                         </svg>
                         <!-- End::header-link-icon -->
                     </span>
                     <span class="dark-layout">
                         <!-- Start::header-link-icon -->
                         <svg class="header-link-icon" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24"
                             viewBox="0 0 24 24">
                             <path
                                 d="M3.55 19.09L4.96 20.5L6.76 18.71L5.34 17.29M12 6C8.69 6 6 8.69 6 12S8.69 18 12 18 18 15.31 18 12C18 8.68 15.31 6 12 6M20 13H23V11H20M17.24 18.71L19.04 20.5L20.45 19.09L18.66 17.29M20.45 5L19.04 3.6L17.24 5.39L18.66 6.81M13 1H11V4H13M6.76 5.39L4.96 3.6L3.55 5L5.34 6.81L6.76 5.39M1 13H4V11H1M13 20H11V23H13" />
                         </svg>
                         <!-- End::header-link-icon -->
                     </span>
                 </a>
                 <!-- End::header-link|layout-setting -->
             </div>
             <!-- End::header-element -->

             <!-- Start::header-element -->
             <div class="header-element cart-dropdown">
                 <!-- Start::header-link|dropdown-toggle -->
                 <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside"
                     data-bs-toggle="dropdown">
                     <svg class="header-link-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                         <path
                             d="M17,18A2,2 0 0,1 19,20A2,2 0 0,1 17,22C15.89,22 15,21.1 15,20C15,18.89 15.89,18 17,18M1,2H4.27L5.21,4H20A1,1 0 0,1 21,5C21,5.17 20.95,5.34 20.88,5.5L17.3,11.97C16.96,12.58 16.3,13 15.55,13H8.1L7.2,14.63L7.17,14.75A0.25,0.25 0 0,0 7.42,15H19V17H7C5.89,17 5,16.1 5,15C5,14.65 5.09,14.32 5.24,14.04L6.6,11.59L3,4H1V2M7,18A2,2 0 0,1 9,20A2,2 0 0,1 7,22C5.89,22 5,21.1 5,20C5,18.89 5.89,18 7,18M16,11L18.78,6H6.14L8.5,11H16Z" />
                     </svg>
                     <span class="badge bg-primary rounded-pill header-icon-badge" id="cart-icon-badge">5</span>
                 </a>
                 <!-- End::header-link|dropdown-toggle -->
                 <!-- Start::main-header-dropdown -->
                 <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                     <div class="p-3">
                         <div class="d-flex align-items-center justify-content-between">
                             <p class="mb-0 fs-17 fw-semibold text-dark">My Shopping Cart</p>
                             <span class="badge bg-success-transparent" id="cart-data">5 Items</span>
                         </div>
                     </div>
                     <div>
                         <hr class="dropdown-divider">
                     </div>
                     <ul class="list-unstyled p-2" id="header-cart-items-scroll">
                         <li class="dropdown-item">
                             <div class="d-flex align-items-start cart-dropdown-item">
                                 <img src="{{ asset('assets/images/ecommerce/jpg/7.jpg') }}" alt="img"
                                     class="avatar avatar-lg br-5 me-3">
                                 <div class="flex-grow-1">
                                     <div class="d-flex align-items-start justify-content-between mb-0">
                                         <div class="mb-0 fs-13 text-dark fw-semibold">
                                             <a href="cart.html" class="text-dark">Flower pot home decores</a>
                                         </div>
                                         <div>
                                             <span class="text-black mb-1">$438</span>
                                             <a href="javascript:void(0);"
                                                 class="header-cart-remove float-end dropdown-item-close"><i
                                                     class="ti ti-trash"></i></a>
                                         </div>
                                     </div>
                                     <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                         <ul class="header-product-item">
                                             <li>Qty: 1</li>
                                             <li>Status: <span class="text-success">In Stock</span></li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                         </li>
                         <li class="dropdown-item">
                             <div class="d-flex align-items-start cart-dropdown-item">
                                 <img src="{{ asset('assets/images/ecommerce/jpg/4.jpg') }}" alt="img"
                                     class="avatar avatar-lg br-5 me-3">
                                 <div class="flex-grow-1">
                                     <div class="d-flex align-items-start justify-content-between mb-0">
                                         <div class="mb-0 fs-13 text-dark fw-semibold">
                                             <a href="cart.html" class="text-dark">Smart Watch</a>
                                         </div>
                                         <div>
                                             <span class="text-black mb-1">$323</span>
                                             <a href="javascript:void(0);"
                                                 class="header-cart-remove float-end dropdown-item-close"><i
                                                     class="ti ti-trash"></i></a>
                                         </div>
                                     </div>
                                     <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                         <ul class="header-product-item">
                                             <li>Qty: 1</li>
                                             <li>Status: <span class="text-danger">Out of Stock</span></li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                         </li>
                         <li class="dropdown-item">
                             <div class="d-flex align-items-start cart-dropdown-item">
                                 <img src="{{ asset('assets/images/ecommerce/jpg/5.jpg') }}" alt="img"
                                     class="avatar avatar-lg br-5 me-3">
                                 <div class="flex-grow-1">
                                     <div class="d-flex align-items-start justify-content-between mb-0">
                                         <div class="mb-0 fs-13 text-dark fw-semibold">
                                             <a href="cart.html" class="text-dark">Headphones</a>
                                         </div>
                                         <div>
                                             <span class="text-black mb-1">$867</span>
                                             <a href="javascript:void(0);"
                                                 class="header-cart-remove float-end dropdown-item-close"><i
                                                     class="ti ti-trash"></i></a>
                                         </div>
                                     </div>
                                     <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                         <ul class="header-product-item">
                                             <li>Qty: 2</li>
                                             <li>Status: <span class="text-success">In Stock</span></li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                         </li>
                         <li class="dropdown-item">
                             <div class="d-flex align-items-start cart-dropdown-item">
                                 <img src="{{ asset('assets/images/ecommerce/jpg/19.jpg') }}" alt="img"
                                     class="avatar avatar-lg br-5 me-3">
                                 <div class="flex-grow-1">
                                     <div class="d-flex align-items-start justify-content-between mb-0">
                                         <div class="mb-0 fs-13 text-dark fw-semibold">
                                             <a href="cart.html" class="text-dark">Furniture (chair)</a>
                                         </div>
                                         <div>
                                             <span class="text-black mb-1">$456</span>
                                             <a href="javascript:void(0);"
                                                 class="header-cart-remove float-end dropdown-item-close"><i
                                                     class="ti ti-trash"></i></a>
                                         </div>
                                     </div>
                                     <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                         <ul class="header-product-item">
                                             <li>Qty: 1</li>
                                             <li>Status: <span class="text-success">In Stock</span></li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                         </li>
                         <li class="dropdown-item">
                             <div class="d-flex align-items-start cart-dropdown-item">
                                 <img src="{{ asset('assets/images/ecommerce/jpg/8.jpg') }}" alt="img"
                                     class="avatar avatar-lg br-5 me-3">
                                 <div class="flex-grow-1">
                                     <div class="d-flex align-items-start justify-content-between mb-0">
                                         <div class="mb-0 fs-13 text-dark fw-semibold">
                                             <a href="cart.html" class="text-dark"> Running Shoes</a>
                                         </div>
                                         <div>
                                             <span class="text-black mb-1">$438</span>
                                             <a href="javascript:void(0);"
                                                 class="header-cart-remove float-end dropdown-item-close"><i
                                                     class="ti ti-trash"></i></a>
                                         </div>
                                     </div>
                                     <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                         <ul class="header-product-item">
                                             <li>Qty: 1</li>
                                             <li>Status: <span class="text-danger">Out of Stock</span></li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                         </li>
                     </ul>
                     <div class="p-3 empty-header-item border-top">
                         <div class="d-grid">
                             <a href="checkout.html" class="btn btn-primary">Proceed to checkout</a>
                         </div>
                     </div>
                     <div class="p-5 empty-item d-none">
                         <div class="text-center">
                             <span class="avatar avatar-xl avatar-rounded bg-warning-transparent">
                                 <i class="ri-shopping-cart-2-line fs-2"></i>
                             </span>
                             <h6 class="fw-bold mb-1 mt-3">Your Cart is Empty</h6>
                             <span class="mb-3 fw-normal fs-13 d-block">Add some items to make me happy :)</span>
                             <a href="products.html" class="btn btn-primary btn-wave btn-sm m-1"
                                 data-abc="true">continue shopping <i class="bi bi-arrow-right ms-1"></i></a>
                         </div>
                     </div>
                 </div>
                 <!-- End::main-header-dropdown -->
             </div>
             <!-- End::header-element -->

             <!-- Start::header-element -->
             <div class="header-element notifications-dropdown">
                 <!-- Start::header-link|dropdown-toggle -->
                 <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown"
                     data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                     <svg class="header-link-icon" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24"
                         viewBox="0 0 24 24">
                         <path
                             d="M10 21H14C14 22.1 13.1 23 12 23S10 22.1 10 21M21 19V20H3V19L5 17V11C5 7.9 7 5.2 10 4.3V4C10 2.9 10.9 2 12 2S14 2.9 14 4V4.3C17 5.2 19 7.9 19 11V17L21 19M17 11C17 8.2 14.8 6 12 6S7 8.2 7 11V18H17V11Z" />
                     </svg>
                     <span class="badge bg-secondary rounded-pill header-icon-badge pulse pulse-secondary"
                         id="notification-icon-badge">5</span>
                 </a>
                 <!-- End::header-link|dropdown-toggle -->
                 <!-- Start::main-header-dropdown -->
                 <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                     <div class="p-3">
                         <div class="d-flex align-items-center justify-content-between">
                             <p class="mb-0 fs-17 fw-semibold">Notifications</p>
                             <span class="badge bg-secondary-transparent" id="notifiation-data">5 Unread</span>
                         </div>
                     </div>
                     <div class="dropdown-divider"></div>
                     <ul class="list-unstyled p-2" id="header-notification-scroll">
                         <li class="dropdown-item d-flex align-items-start">
                             <div class="pe-2">
                                 <span class="avatar avatar-md bg-primary-transparent avatar-rounded"><i
                                         class="fe fe-message-square fs-18"></i></span>
                             </div>
                             <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                 <a href="notification-list.html">
                                     <p class=" mb-0 fw-semibold text-dark">Gladys Dare <span
                                             class="text-muted">commented on</span>
                                         Ecosystems</p>
                                     <span class="text-muted">2m ago</span>
                                 </a>
                                 <div>
                                     <a href="javascript:void(0);"
                                         class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                             class="ti ti-x fs-16"></i></a>
                                 </div>
                             </div>
                         </li>
                         <li class="dropdown-item d-flex align-items-start">
                             <div class="pe-2">
                                 <span class="avatar avatar-md bg-secondary-transparent avatar-rounded"><i
                                         class="fe fe-user fs-18"></i></span>
                             </div>
                             <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                 <a href="notification-list.html">
                                     <p class=" mb-0 fw-semibold text-dark">Gladys Dare <span
                                             class="text-muted">commented on</span>
                                         Ecosystems</p>
                                     <span class="text-muted">2m ago</span>
                                 </a>
                                 <div>
                                     <a href="javascript:void(0);"
                                         class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                             class="ti ti-x fs-16"></i></a>
                                 </div>
                             </div>
                         </li>
                         <li class="dropdown-item d-flex align-items-start">
                             <div class="pe-2">
                                 <span class="avatar avatar-md bg-pink-transparent avatar-rounded"><i
                                         class="fe fe-check fs-18"></i></span>
                             </div>
                             <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                 <a href="notification-list.html">
                                     <p class="text-dark mb-0 fw-semibold">Laurel <span
                                             class="text-muted">donated</span> <span
                                             class="text-success fw-semibold">$100</span> <span
                                             class="text-muted">for</span> carbon removal</p>
                                     <span class="text-muted">15 min ago</span>
                                 </a>
                                 <div>
                                     <a href="javascript:void(0);"
                                         class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                             class="ti ti-x fs-16"></i></a>
                                 </div>
                             </div>
                         </li>
                         <li class="dropdown-item d-flex align-items-start">
                             <div class="pe-2">
                                 <span class="avatar avatar-md bg-warning-transparent avatar-rounded"><i
                                         class="ti ti-circle-check fs-18"></i></span>
                             </div>
                             <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                 <a href="notification-list.html">
                                     <p class="mb-0 fw-semibold text-dark">Sunny Grahm <span class="text-muted">voted
                                             for</span> carbon capture
                                     </p>
                                     <span class="text-muted">2 min ago</span>
                                 </a>
                                 <div>
                                     <a href="javascript:void(0);"
                                         class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                             class="ti ti-x fs-16"></i></a>
                                 </div>
                             </div>
                         </li>
                         <li class="dropdown-item d-flex align-items-start">
                             <div class="pe-2">
                                 <span class="avatar avatar-md bg-success-transparent avatar-rounded"><i
                                         class="ti ti-clock fs-18"></i></span>
                             </div>
                             <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                 <a href="notification-list.html">
                                     <p class=" mb-0 fw-semibold text-dark">Laurel
                                         <span class="text-muted">donated</span>
                                         <span class="text-success fw-semibold">$100</span>
                                         <span class="text-muted">for</span> carbon removal
                                     </p>
                                     <span class="text-muted">2 Hour ago</span>
                                 </a>
                                 <div>
                                     <a href="javascript:void(0);"
                                         class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                             class="ti ti-x fs-16"></i></a>
                                 </div>
                             </div>
                         </li>
                     </ul>
                     <div class="p-3 empty-header-item1 border-top">
                         <div class="d-grid">
                             <a href="notification-list.html" class="btn btn-primary">View All</a>
                         </div>
                     </div>
                     <div class="p-5 empty-item1 d-none">
                         <div class="text-center">
                             <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                                 <i class="ri-notification-off-line fs-2"></i>
                             </span>
                             <h6 class="fw-semibold mt-3">No New Notifications</h6>
                         </div>
                     </div>
                 </div>
                 <!-- End::main-header-dropdown -->
             </div>
             <!-- End::header-element -->

             <!-- Start::header-element -->
             <div class="header-element header-message-dropdown  d-none d-xl-block">
                 <!-- Start::header-link|dropdown-toggle -->
                 <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown"
                     data-bs-auto-close="outside" id="notificationDropdown" aria-expanded="false">
                     <svg class="header-link-icon" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24"
                         viewBox="0 0 24 24">
                         <path
                             d="M20 2H4C2.9 2 2 2.9 2 4V16C2 17.1 2.9 18 4 18H18L22 22V4C22 2.9 21.1 2 20 2M20 17.2L18.8 16H4V4H20V17.2Z" />
                     </svg>
                     <span class="badge bg-danger rounded-pill header-icon-badge pulse-round pulse-danger">4</span>
                 </a>
                 <!-- End::header-link|dropdown-toggle -->
                 <!-- Start::main-header-dropdown -->
                 <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                     <div class="p-3">
                         <div class="d-flex align-items-center justify-content-between">
                             <p class="mb-0 fs-17 fw-semibold">You have 4 Messages</p>

                         </div>
                     </div>
                     <div class="dropdown-divider"></div>
                     <ul class="list-unstyled mb-0" id="header-message-scroll">
                         <li class="dropdown-item">
                             <div class="d-flex align-items-start">
                                 <div class="pe-2">
                                     <span class="avatar avatar-md bg-primary-transparent avatar-rounded"><img
                                             src="{{ asset('assets/images/faces/1.jpg') }}" alt=""></span>
                                 </div>
                                 <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                     <div class="d-flex flex-column justify-content-between">
                                         <a href="chat.html">
                                             <p class=" mb-0 fw-semibold fs-14 text-dark">Madeleine</p>
                                             <p class="fs-11 mb-0">Just completed <span
                                                     class="text-info">Project</span></p>
                                         </a>

                                     </div>
                                     <span class="fs-10 text-muted">2min ago</span>
                                 </div>
                             </div>
                         </li>

                         <li class="dropdown-item">
                             <div class="d-flex align-items-start">
                                 <div class="pe-2">
                                     <span class="avatar avatar-md bg-success-transparent avatar-rounded"><img
                                             src="{{ asset('assets/images/faces/3.jpg') }}" alt=""></span>
                                 </div>
                                 <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                     <div class="d-flex flex-column justify-content-between">
                                         <a href="chat.html">
                                             <p class=" mb-0 fw-semibold fs-14 text-dark">Olivia</p>
                                             <p class="fs-11 mb-0">Added a file into <span class="text-info">Project
                                                     Name</span></p>
                                         </a>

                                     </div>
                                     <span class="fs-10 text-muted">1 hour ago</span>
                                 </div>
                             </div>
                         </li>
                         <li class="dropdown-item">
                             <div class="d-flex align-items-start">
                                 <div class="pe-2">
                                     <span class="avatar avatar-md bg-warning-transparent avatar-rounded"><img
                                             src="{{ asset('assets/images/faces/4.jpg') }}" alt=""></span>
                                 </div>
                                 <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                     <div class="d-flex flex-column justify-content-between">
                                         <a href="chat.html">
                                             <p class=" mb-0 fw-semibold fs-14 text-dark">Sanderson</p>
                                             <p class="fs-11 mb-0">Assigned 9 Upcoming <span
                                                     class="text-info">Projects</span></p>
                                         </a>

                                     </div>
                                     <span class="fs-10 text-muted">1 days ago</span>
                                 </div>
                             </div>
                         </li>
                         <li class="dropdown-item">
                             <div class="d-flex align-items-start">
                                 <div class="pe-2">
                                     <span class="avatar avatar-md bg-info-transparent avatar-rounded"><img
                                             src="{{ asset('assets/images/faces/5.jpg') }}" alt=""></span>
                                 </div>
                                 <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                     <div class="d-flex flex-column justify-content-between">
                                         <a href="chat.html">
                                             <p class=" mb-0 fw-semibold fs-14 text-dark">Madeleine</p>
                                             <p class="fs-11 mb-0">Just completed <span
                                                     class="text-info">Project</span></p>
                                         </a>

                                     </div>
                                     <span class="fs-10 text-muted">2min ago</span>
                                 </div>
                             </div>
                         </li>
                     </ul>
                     <div class="p-3 empty-header-item1 border-top">
                         <div class="d-grid">
                             <a href="chat.html" class="btn btn-primary">View All</a>
                         </div>
                     </div>
                     <div class="p-5 empty-item1 d-none">
                         <div class="text-center">
                             <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                                 <i class="ri-notification-off-line fs-2"></i>
                             </span>
                             <h6 class="fw-semibold mt-3">No New Notifications</h6>
                         </div>
                     </div>
                 </div>
                 <!-- End::main-header-dropdown -->
             </div>
             <!-- End::header-element -->

             <!-- Start::header-element -->
             <div class="header-element d-flex header-settings d-sm-block d-none">
                 <a aria-label="anchor" href="javascript:void(0);" class=" header-link nav-link icon me-1"
                     data-bs-toggle="offcanvas" data-bs-target="#header-sidebar" aria-controls="header-sidebar">
                     <svg class="header-link-icon" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24"
                         viewBox="0 0 24 24">
                         <path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
                     </svg>
                 </a>
             </div>
             <!-- End::header-element -->

             <!-- Start::header-element -->
             <div class="header-element">
                 <!-- Start::header-link|dropdown-toggle -->
                 <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                     data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                     <div class="d-flex align-items-center">
                         <div class="me-sm-2 me-0">
                             <img src="{{ asset('assets/images/faces/9.jpg') }}" alt="img" width="32"
                                 height="32" class="rounded-circle">
                         </div>
                         <div class="d-sm-block d-none">
                             <p class="fw-semibold mb-0 lh-1">{{ auth()->user()->name }}</p>
                             <span class="op-7 fw-normal d-block fs-12">{{ auth()->user()->role }}</span>
                         </div>
                     </div>
                 </a>
                 <!-- End::header-link|dropdown-toggle -->
                 <ul class="main-header-dropdown dropdown-menu overflow-hidden header-profile-dropdown dropdown-menu-end"
                     aria-labelledby="mainHeaderProfile">
                     <li>
                         <a class="dropdown-item d-flex" href="{{ route('profile.show') }}">
                             <i class="ti ti-user-circle fs-18 me-2 op-7"></i>حسابي
                         </a>
                     </li>
                     <li>
                         <form action="{{ route('logout') }}" method="POST" class="d-inline">
                             @csrf
                             <button class="dropdown-item d-flex" href="{{ route('logout') }}">
                                 <i class="ti ti-logout fs-18 me-2 op-7"></i>تسحيل خروج
                             </button>
                         </form>
                     </li>
                 </ul>
             </div>
             <!-- End::header-element -->

             <!-- Start::header-element -->
             <div class="header-element">
                 <!-- Start::header-link|switcher-icon -->
                 <a href="javascript:void(0);" class="header-link switcher-icon settings-icon-header"
                     data-bs-toggle="offcanvas" data-bs-target="#switcher-canvas">
                     <svg class="header-link-icon" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24"
                         viewBox="0 0 24 24">
                         <path
                             d="M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10M10,22C9.75,22 9.54,21.82 9.5,21.58L9.13,18.93C8.5,18.68 7.96,18.34 7.44,17.94L4.95,18.95C4.73,19.03 4.46,18.95 4.34,18.73L2.34,15.27C2.21,15.05 2.27,14.78 2.46,14.63L4.57,12.97L4.5,12L4.57,11L2.46,9.37C2.27,9.22 2.21,8.95 2.34,8.73L4.34,5.27C4.46,5.05 4.73,4.96 4.95,5.05L7.44,6.05C7.96,5.66 8.5,5.32 9.13,5.07L9.5,2.42C9.54,2.18 9.75,2 10,2H14C14.25,2 14.46,2.18 14.5,2.42L14.87,5.07C15.5,5.32 16.04,5.66 16.56,6.05L19.05,5.05C19.27,4.96 19.54,5.05 19.66,5.27L21.66,8.73C21.79,8.95 21.73,9.22 21.54,9.37L19.43,11L19.5,12L19.43,13L21.54,14.63C21.73,14.78 21.79,15.05 21.66,15.27L19.66,18.73C19.54,18.95 19.27,19.04 19.05,18.95L16.56,17.95C16.04,18.34 15.5,18.68 14.87,18.93L14.5,21.58C14.46,21.82 14.25,22 14,22H10M11.25,4L10.88,6.61C9.68,6.86 8.62,7.5 7.85,8.39L5.44,7.35L4.69,8.65L6.8,10.2C6.4,11.37 6.4,12.64 6.8,13.8L4.68,15.36L5.43,16.66L7.86,15.62C8.63,16.5 9.68,17.14 10.87,17.38L11.24,20H12.76L13.13,17.39C14.32,17.14 15.37,16.5 16.14,15.62L18.57,16.66L19.32,15.36L17.2,13.81C17.6,12.64 17.6,11.37 17.2,10.2L19.31,8.65L18.56,7.35L16.15,8.39C15.38,7.5 14.32,6.86 13.12,6.62L12.75,4H11.25Z" />
                     </svg>

                 </a>
                 <!-- End::header-link|switcher-icon -->
             </div>
             <!-- End::header-element -->

         </div>
         <!-- End::header-content-right -->

     </div>
     <!-- End::main-header-container -->

 </header>
 <!-- /app-header -->
