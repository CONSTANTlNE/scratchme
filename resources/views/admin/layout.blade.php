<!DOCTYPE html>
<html
        lang="en"
        dir="ltr"
        data-nav-layout="vertical"
        class="dark"
        data-header-styles="dark"
        data-menu-styles="dark"
>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Fact Check</title>
    <meta name="description"
          content="A Tailwind CSS admin template is a pre-designed web page for an admin dashboard. Optimizing it for SEO includes using meta descriptions and ensuring it's responsive and fast-loading."
    />

    <meta name="CSRF" content="{{ csrf_token() }}">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    {{--    <!-- Favicon -->--}}
    {{--    <link rel="shortcut icon" href="../assets/images/brand-logos/favicon.ico"/>--}}

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <!-- Style Css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>

    <!-- Simplebar Css -->
    <link rel="stylesheet" href="{{asset('assets/libs/simplebar/simplebar.min.css')}}"/>

    <!-- Color Picker Css -->
    <link
            rel="stylesheet"
            href="{{asset('assets/libs/@simonwep/pickr/themes/nano.min.css')}}"
    />

    <!-- Datatable Css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css">
    <!-- Tom Select Css -->
    {{--    <link rel="stylesheet" href="{{asset('assets/libs/tom-select/css/tom-select.default.min.css')}}">--}}
    <!-- Quill Editor -->

    <link href="{{asset('landing_assets/css/glightbox.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('landing_assets/css/custom.css')}}" rel="stylesheet"/>


    <script src="https://unpkg.com/htmx.org@1.9.10"
            integrity="sha384-D1Kt99CQMDuVetoL1lrYwg5t+9QdHe7NLX/SoJYkXDFfX37iInKRy5xLSi8nO7UC"
            crossorigin="anonymous"></script>

</head>

<body>
<!-- ========== Switcher  ========== -->
<div
        id="hs-overlay-switcher"
        class="hs-overlay hidden ti-offcanvas ti-offcanvas-right"
        tabindex="-1"
>
    <div class="ti-offcanvas-header z-10 relative">
        <h5 class="ti-offcanvas-title">Switcher</h5>
        <button
                type="button"
                class="ti-btn flex-shrink-0 p-0 transition-none text-defaulttextcolor dark:text-defaulttextcolor/70 hover:text-gray-700 focus:ring-gray-400 focus:ring-offset-white dark:hover:text-white/80 dark:focus:ring-white/10 dark:focus:ring-offset-white/10"
                data-hs-overlay="#hs-overlay-switcher"
        >
            <span class="sr-only">Close modal</span>
            <i class="ri-close-circle-line leading-none text-lg"></i>
        </button>
    </div>
    <div
            class="ti-offcanvas-body !p-0 !border-b dark:border-white/10 z-10 relative !h-auto"
    >
        <div class="flex rtl:space-x-reverse" aria-label="Tabs" role="tablist">
            <button
                    type="button"
                    class="hs-tab-active:bg-success/20 w-full !py-2 !px-4 hs-tab-active:border-b-transparent text-defaultsize border-0 hs-tab-active:text-success dark:hs-tab-active:bg-success/20 dark:hs-tab-active:border-b-white/10 dark:hs-tab-active:text-success -mb-px bg-white font-semibold text-center text-defaulttextcolor dark:text-defaulttextcolor/70 rounded-none hover:text-gray-700 dark:bg-bodybg dark:border-white/10 active"
                    id="switcher-item-1"
                    data-hs-tab="#switcher-1"
                    aria-controls="switcher-1"
                    role="tab"
            >
                Theme Style
            </button>
            <button
                    type="button"
                    class="hs-tab-active:bg-success/20 w-full !py-2 !px-4 hs-tab-active:border-b-transparent text-defaultsize border-0 hs-tab-active:text-success dark:hs-tab-active:bg-success/20 dark:hs-tab-active:border-b-white/10 dark:hs-tab-active:text-success -mb-px bg-white font-semibold text-center text-defaulttextcolor dark:text-defaulttextcolor/70 rounded-none hover:text-gray-700 dark:bg-bodybg dark:border-white/10 dark:hover:text-gray-300"
                    id="switcher-item-2"
                    data-hs-tab="#switcher-2"
                    aria-controls="switcher-2"
                    role="tab"
            >
                Theme Colors
            </button>
        </div>
    </div>
    <div class="ti-offcanvas-body" id="switcher-body">
        <div
                id="switcher-1"
                role="tabpanel"
                aria-labelledby="switcher-item-1"
                class=""
        >
            <div class="">
                <p class="switcher-style-head">Theme Color Mode:</p>
                <div class="grid grid-cols-3 switcher-style">
                    <div class="flex items-center">
                        <input
                                type="radio"
                                name="theme-style"
                                class="ti-form-radio"
                                id="switcher-light-theme"
                                checked
                        />
                        <label
                                for="switcher-light-theme"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Light</label
                        >
                    </div>
                    <div class="flex items-center">
                        <input
                                type="radio"
                                name="theme-style"
                                class="ti-form-radio"
                                id="switcher-dark-theme"
                        />
                        <label
                                for="switcher-dark-theme"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Dark</label
                        >
                    </div>
                </div>
            </div>
            <div>
                <p class="switcher-style-head">Directions:</p>
                <div class="grid grid-cols-3 switcher-style">
                    <div class="flex items-center">
                        <input
                                type="radio"
                                name="direction"
                                class="ti-form-radio"
                                id="switcher-ltr"
                                checked
                        />
                        <label
                                for="switcher-ltr"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >LTR</label
                        >
                    </div>
                    <div class="flex items-center">
                        <input
                                type="radio"
                                name="direction"
                                class="ti-form-radio"
                                id="switcher-rtl"
                        />
                        <label
                                for="switcher-rtl"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >RTL</label
                        >
                    </div>
                </div>
            </div>
            <div>
                <p class="switcher-style-head">Navigation Styles:</p>
                <div class="grid grid-cols-3 switcher-style">
                    <div class="flex items-center">
                        <input
                                type="radio"
                                name="navigation-style"
                                class="ti-form-radio"
                                id="switcher-vertical"
                                checked
                        />
                        <label
                                for="switcher-vertical"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Vertical</label
                        >
                    </div>
                    <div class="flex items-center">
                        <input
                                type="radio"
                                name="navigation-style"
                                class="ti-form-radio"
                                id="switcher-horizontal"
                        />
                        <label
                                for="switcher-horizontal"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Horizontal</label
                        >
                    </div>
                </div>
            </div>
            <div>
                <p class="switcher-style-head">Navigation Menu Style:</p>
                <div class="grid grid-cols-2 gap-2 switcher-style">
                    <div class="flex">
                        <input
                                type="radio"
                                name="navigation-data-menu-styles"
                                class="ti-form-radio"
                                id="switcher-menu-click"
                                checked
                        />
                        <label
                                for="switcher-menu-click"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Menu Click</label
                        >
                    </div>
                    <div class="flex">
                        <input
                                type="radio"
                                name="navigation-data-menu-styles"
                                class="ti-form-radio"
                                id="switcher-menu-hover"
                        />
                        <label
                                for="switcher-menu-hover"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Menu Hover</label
                        >
                    </div>
                    <div class="flex">
                        <input
                                type="radio"
                                name="navigation-data-menu-styles"
                                class="ti-form-radio"
                                id="switcher-icon-click"
                        />
                        <label
                                for="switcher-icon-click"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Icon Click</label
                        >
                    </div>
                    <div class="flex">
                        <input
                                type="radio"
                                name="navigation-data-menu-styles"
                                class="ti-form-radio"
                                id="switcher-icon-hover"
                        />
                        <label
                                for="switcher-icon-hover"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Icon Hover</label
                        >
                    </div>
                </div>
                <div class="px-4 text-secondary text-xs">
                    <b class="me-2">Note:</b>Works same for both Vertical and
                    Horizontal
                </div>
            </div>
            <div class="sidemenu-layout-styles">
                <p class="switcher-style-head">Sidemenu Layout Syles:</p>
                <div class="grid grid-cols-2 gap-2 switcher-style">
                    <div class="flex">
                        <input
                                type="radio"
                                name="sidemenu-layout-styles"
                                class="ti-form-radio"
                                id="switcher-default-menu"
                                checked
                        />
                        <label
                                for="switcher-default-menu"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Default Menu</label
                        >
                    </div>
                    <div class="flex">
                        <input
                                type="radio"
                                name="sidemenu-layout-styles"
                                class="ti-form-radio"
                                id="switcher-closed-menu"
                        />
                        <label
                                for="switcher-closed-menu"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >
                            Closed Menu</label
                        >
                    </div>
                    <div class="flex">
                        <input
                                type="radio"
                                name="sidemenu-layout-styles"
                                class="ti-form-radio"
                                id="switcher-icontext-menu"
                        />
                        <label
                                for="switcher-icontext-menu"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Icon Text</label
                        >
                    </div>
                    <div class="flex">
                        <input
                                type="radio"
                                name="sidemenu-layout-styles"
                                class="ti-form-radio"
                                id="switcher-icon-overlay"
                        />
                        <label
                                for="switcher-icon-overlay"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Icon Overlay</label
                        >
                    </div>
                    <div class="flex">
                        <input
                                type="radio"
                                name="sidemenu-layout-styles"
                                class="ti-form-radio"
                                id="switcher-detached"
                        />
                        <label
                                for="switcher-detached"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Detached</label
                        >
                    </div>
                    <div class="flex">
                        <input
                                type="radio"
                                name="sidemenu-layout-styles"
                                class="ti-form-radio"
                                id="switcher-double-menu"
                        />
                        <label
                                for="switcher-double-menu"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Double Menu</label
                        >
                    </div>
                </div>
                <div class="px-4 text-secondary text-xs">
                    <b class="me-2">Note:</b>Navigation menu styles won't work here.
                </div>
            </div>
            <div>
                <p class="switcher-style-head">Page Styles:</p>
                <div class="grid grid-cols-3 switcher-style">
                    <div class="flex">
                        <input
                                type="radio"
                                name="data-page-styles"
                                class="ti-form-radio"
                                id="switcher-regular"
                                checked
                        />
                        <label
                                for="switcher-regular"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Regular</label
                        >
                    </div>
                    <div class="flex">
                        <input
                                type="radio"
                                name="data-page-styles"
                                class="ti-form-radio"
                                id="switcher-classic"
                        />
                        <label
                                for="switcher-classic"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Classic</label
                        >
                    </div>
                    <div class="flex">
                        <input
                                type="radio"
                                name="data-page-styles"
                                class="ti-form-radio"
                                id="switcher-modern"
                        />
                        <label
                                for="switcher-modern"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >
                            Modern</label
                        >
                    </div>
                </div>
            </div>
            <div>
                <p class="switcher-style-head">Layout Width Styles:</p>
                <div class="grid grid-cols-3 switcher-style">
                    <div class="flex">
                        <input
                                type="radio"
                                name="layout-width"
                                class="ti-form-radio"
                                id="switcher-full-width"
                                checked
                        />
                        <label
                                for="switcher-full-width"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >FullWidth</label
                        >
                    </div>
                    <div class="flex">
                        <input
                                type="radio"
                                name="layout-width"
                                class="ti-form-radio"
                                id="switcher-boxed"
                        />
                        <label
                                for="switcher-boxed"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Boxed</label
                        >
                    </div>
                </div>
            </div>
            <div>
                <p class="switcher-style-head">Menu Positions:</p>
                <div class="grid grid-cols-3 switcher-style">
                    <div class="flex">
                        <input
                                type="radio"
                                name="data-menu-positions"
                                class="ti-form-radio"
                                id="switcher-menu-fixed"
                                checked
                        />
                        <label
                                for="switcher-menu-fixed"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Fixed</label
                        >
                    </div>
                    <div class="flex">
                        <input
                                type="radio"
                                name="data-menu-positions"
                                class="ti-form-radio"
                                id="switcher-menu-scroll"
                        />
                        <label
                                for="switcher-menu-scroll"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Scrollable
                        </label>
                    </div>
                </div>
            </div>
            <div>
                <p class="switcher-style-head">Header Positions:</p>
                <div class="grid grid-cols-3 switcher-style">
                    <div class="flex">
                        <input
                                type="radio"
                                name="data-header-positions"
                                class="ti-form-radio"
                                id="switcher-header-fixed"
                                checked
                        />
                        <label
                                for="switcher-header-fixed"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >
                            Fixed</label
                        >
                    </div>
                    <div class="flex">
                        <input
                                type="radio"
                                name="data-header-positions"
                                class="ti-form-radio"
                                id="switcher-header-scroll"
                        />
                        <label
                                for="switcher-header-scroll"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Scrollable
                        </label>
                    </div>
                </div>
            </div>
            <div class="">
                <p class="switcher-style-head">Loader:</p>
                <div class="grid grid-cols-3 switcher-style">
                    <div class="flex">
                        <input
                                type="radio"
                                name="page-loader"
                                class="ti-form-radio"
                                id="switcher-loader-enable"
                                checked
                        />
                        <label
                                for="switcher-loader-enable"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >
                            Enable</label
                        >
                    </div>
                    <div class="flex">
                        <input
                                type="radio"
                                name="page-loader"
                                class="ti-form-radio"
                                id="switcher-loader-disable"
                        />
                        <label
                                for="switcher-loader-disable"
                                class="text-defaultsize text-defaulttextcolor dark:text-defaulttextcolor/70 ms-2 font-semibold"
                        >Disable
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div
                id="switcher-2"
                class="hidden"
                role="tabpanel"
                aria-labelledby="switcher-item-2"
        >
            <div class="theme-colors">
                <p class="switcher-style-head">Menu Colors:</p>
                <div class="flex switcher-style space-x-3 rtl:space-x-reverse">
                    <div
                            class="hs-tooltip ti-main-tooltip ti-form-radio switch-select"
                    >
                        <input
                                class="hs-tooltip-toggle ti-form-radio color-input color-white"
                                type="radio"
                                name="menu-colors"
                                id="switcher-menu-light"
                                checked
                        />
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip"
                        >
                  Light Menu
                </span>
                    </div>
                    <div
                            class="hs-tooltip ti-main-tooltip ti-form-radio switch-select"
                    >
                        <input
                                class="hs-tooltip-toggle ti-form-radio color-input color-dark"
                                type="radio"
                                name="menu-colors"
                                id="switcher-menu-dark"
                                checked
                        />
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip"
                        >
                  Dark Menu
                </span>
                    </div>
                    <div
                            class="hs-tooltip ti-main-tooltip ti-form-radio switch-select"
                    >
                        <input
                                class="hs-tooltip-toggle ti-form-radio color-input color-primary"
                                type="radio"
                                name="menu-colors"
                                id="switcher-menu-primary"
                        />
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip"
                        >
                  Color Menu
                </span>
                    </div>
                    <div
                            class="hs-tooltip ti-main-tooltip ti-form-radio switch-select"
                    >
                        <input
                                class="hs-tooltip-toggle ti-form-radio color-input color-gradient"
                                type="radio"
                                name="menu-colors"
                                id="switcher-menu-gradient"
                        />
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip"
                        >
                  Gradient Menu
                </span>
                    </div>
                    <div
                            class="hs-tooltip ti-main-tooltip ti-form-radio switch-select"
                    >
                        <input
                                class="hs-tooltip-toggle ti-form-radio color-input color-transparent"
                                type="radio"
                                name="menu-colors"
                                id="switcher-menu-transparent"
                        />
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip"
                        >
                  Transparent Menu
                </span>
                    </div>
                </div>
                <div class="px-4 text-[#8c9097] dark:text-white/50 text-[.6875rem]">
                    <b class="me-2">Note:</b>If you want to change color Menu
                    dynamically change from below Theme Primary color picker.
                </div>
            </div>
            <div class="theme-colors">
                <p class="switcher-style-head">Header Colors:</p>
                <div class="flex switcher-style space-x-3 rtl:space-x-reverse">
                    <div
                            class="hs-tooltip ti-main-tooltip ti-form-radio switch-select"
                    >
                        <input
                                class="hs-tooltip-toggle ti-form-radio color-input color-white !border"
                                type="radio"
                                name="header-colors"
                                id="switcher-header-light"
                                checked
                        />
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip"
                        >
                  Light Header
                </span>
                    </div>
                    <div
                            class="hs-tooltip ti-main-tooltip ti-form-radio switch-select"
                    >
                        <input
                                class="hs-tooltip-toggle ti-form-radio color-input color-dark"
                                type="radio"
                                name="header-colors"
                                id="switcher-header-dark"
                        />
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip"
                        >
                  Dark Header
                </span>
                    </div>
                    <div
                            class="hs-tooltip ti-main-tooltip ti-form-radio switch-select"
                    >
                        <input
                                class="hs-tooltip-toggle ti-form-radio color-input color-primary"
                                type="radio"
                                name="header-colors"
                                id="switcher-header-primary"
                        />
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip"
                        >
                  Color Header
                </span>
                    </div>
                    <div
                            class="hs-tooltip ti-main-tooltip ti-form-radio switch-select"
                    >
                        <input
                                class="hs-tooltip-toggle ti-form-radio color-input color-gradient"
                                type="radio"
                                name="header-colors"
                                id="switcher-header-gradient"
                        />
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip"
                        >
                  Gradient Header
                </span>
                    </div>
                    <div
                            class="hs-tooltip ti-main-tooltip ti-form-radio switch-select"
                    >
                        <input
                                class="hs-tooltip-toggle ti-form-radio color-input color-transparent"
                                type="radio"
                                name="header-colors"
                                id="switcher-header-transparent"
                        />
                        <span
                                class="hs-tooltip-content ti-main-tooltip-content !py-1 !px-2 !bg-black text-xs font-medium !text-white shadow-sm dark:!bg-black"
                                role="tooltip"
                        >
                  Transparent Header
                </span>
                    </div>
                </div>
                <div class="px-4 text-[#8c9097] dark:text-white/50 text-[.6875rem]">
                    <b class="me-2">Note:</b>If you want to change color Header
                    dynamically change from below Theme Primary color picker.
                </div>
            </div>
            <div class="theme-colors">
                <p class="switcher-style-head">Theme Primary:</p>
                <div class="flex switcher-style space-x-3 rtl:space-x-reverse">
                    <div class="ti-form-radio switch-select">
                        <input
                                class="ti-form-radio color-input color-primary-1"
                                type="radio"
                                name="theme-primary"
                                id="switcher-primary"
                                checked
                        />
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input
                                class="ti-form-radio color-input color-primary-2"
                                type="radio"
                                name="theme-primary"
                                id="switcher-primary1"
                        />
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input
                                class="ti-form-radio color-input color-primary-3"
                                type="radio"
                                name="theme-primary"
                                id="switcher-primary2"
                        />
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input
                                class="ti-form-radio color-input color-primary-4"
                                type="radio"
                                name="theme-primary"
                                id="switcher-primary3"
                        />
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input
                                class="ti-form-radio color-input color-primary-5"
                                type="radio"
                                name="theme-primary"
                                id="switcher-primary4"
                        />
                    </div>
                    <div
                            class="ti-form-radio switch-select ps-0 mt-1 color-primary-light"
                    >
                        <div class="theme-container-primary"></div>
                        <div class="pickr-container-primary"></div>
                    </div>
                </div>
            </div>
            <div class="theme-colors">
                <p class="switcher-style-head">Theme Background:</p>
                <div class="flex switcher-style space-x-3 rtl:space-x-reverse">
                    <div class="ti-form-radio switch-select">
                        <input
                                class="ti-form-radio color-input color-bg-1"
                                type="radio"
                                name="theme-background"
                                id="switcher-background"
                                checked
                        />
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input
                                class="ti-form-radio color-input color-bg-2"
                                type="radio"
                                name="theme-background"
                                id="switcher-background1"
                        />
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input
                                class="ti-form-radio color-input color-bg-3"
                                type="radio"
                                name="theme-background"
                                id="switcher-background2"
                        />
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input
                                class="ti-form-radio color-input color-bg-4"
                                type="radio"
                                name="theme-background"
                                id="switcher-background3"
                        />
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input
                                class="ti-form-radio color-input color-bg-5"
                                type="radio"
                                name="theme-background"
                                id="switcher-background4"
                        />
                    </div>
                    <div
                            class="ti-form-radio switch-select ps-0 mt-1 color-bg-transparent"
                    >
                        <div class="theme-container-background hidden"></div>
                        <div class="pickr-container-background"></div>
                    </div>
                </div>
            </div>
            <div class="menu-image theme-colors">
                <p class="switcher-style-head">Menu With Background Image:</p>
                <div
                        class="flex switcher-style space-x-3 rtl:space-x-reverse flex-wrap gap-3"
                >
                    <div class="ti-form-radio switch-select">
                        <input
                                class="ti-form-radio bgimage-input bg-img1"
                                type="radio"
                                name="theme-images"
                                id="switcher-bg-img"
                        />
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input
                                class="ti-form-radio bgimage-input bg-img2"
                                type="radio"
                                name="theme-images"
                                id="switcher-bg-img1"
                        />
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input
                                class="ti-form-radio bgimage-input bg-img3"
                                type="radio"
                                name="theme-images"
                                id="switcher-bg-img2"
                        />
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input
                                class="ti-form-radio bgimage-input bg-img4"
                                type="radio"
                                name="theme-images"
                                id="switcher-bg-img3"
                        />
                    </div>
                    <div class="ti-form-radio switch-select">
                        <input
                                class="ti-form-radio bgimage-input bg-img5"
                                type="radio"
                                name="theme-images"
                                id="switcher-bg-img4"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ti-offcanvas-footer sm:flex justify-between">
        <a
                href="javascript:void(0);"
                id="reset-all"
                class="w-full ti-btn ti-btn-danger-full m-1"
        >Reset</a
        >
    </div>
</div>
<!-- ========== END Switcher  ========== -->

<!-- Loader -->
<div id="loader">
{{--        <img src="../assets/images/media/loader.svg" alt=""/>--}}
</div>
<!-- Loader -->
<div class="page">
    <!-- Start::Header -->
    @include('admin.components.header')
    <!-- End::Header -->

    <!-- Start::app-sidebar -->
    @include('admin.components.sidebar')
    <!-- End::app-sidebar -->


    <!-- Start::content  -->
    <div @if(request()->routeIs('products'))  class="mt-10" @else  class="content"@endif >
        <div class="main-content">
            @yield('index')
            @yield('languages')
            @yield('staticTranslation')
            @yield('products')
            @yield('all-products')
            @yield('faq')
            @yield('discounts')
            @yield('admin-orders')
            @yield('delivery')
            @yield('change-photo')
            @yield('about')
            @yield('terms')
        </div>
    </div>
    <!-- End::content  -->


    <!-- ========== Search Modal ========== -->

    <!-- ========== END Search Modal ========== -->


    <!-- Footer Start -->
    @include('admin.components.footer')
    <!-- Footer End -->
</div>

<!-- Back To Top -->
<div class="scrollToTop">
    <span class="arrow"><i class="ri-arrow-up-s-fill text-xl"></i></span>
</div>


<div id="responsive-overlay"></div>


{{--Dark Mode Script--}}
{{--class="dark"--}}
{{--data-header-styles="dark"--}}
{{--data-menu-styles="dark"--}}
<script>
    localStorage.setItem('ynexdarktheme', 'true');
    localStorage.setItem('ynexHeader', 'dark');
    const defaultTheme = {
        admin: "ScratchMe",
        settings: {
            layout: {
                name: "ScratchMe",
                toggle: false,
                darkMode: true,
                boxed: false
            }
        },
        reset: true
    };

    localStorage.setItem('theme', JSON.stringify(defaultTheme));
    localStorage.setItem('ynexMenu', 'dark');
    localStorage.setItem('layout-theme', 'dark');
</script>
<!-- Preline JS -->
<script src="{{asset('assets/libs/preline/preline.js')}}"></script>
<!-- popperjs -->
<script src="{{asset('assets/libs/@popperjs/core/umd/popper.min.js')}}"></script>
<!-- Color Picker JS -->
<script src="{{asset('assets/libs/@simonwep/pickr/pickr.es5.min.js')}}"></script>
<!-- sidebar JS -->
<script src="{{asset('assets/js/defaultmenu.js')}}"></script>
<!-- sticky JS -->
<script src="{{asset('assets/js/sticky.js')}}"></script>
<!-- Switch JS -->
<script src="{{asset('assets/js/switch.js')}}"></script>
<!-- Simplebar JS -->
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<!-- Custom-Switcher JS -->
<script src="{{asset('assets/js/custom-switcher.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('assets/js/custom.js')}}"></script>
<!-- datatables.net JS -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>

<script src="{{asset('landing_assets/js/glightbox.min.js')}}"></script>
<script src="{{asset('landing_assets/js/custom-glightbox.js')}}"></script>
<script src="{{asset('landing_assets/js/webp.js')}}"></script>
{{--<!-- Quill Editor JS -->--}}
{{--<script src="{{asset('assets/libs/quill/quill.min.js')}}"></script>--}}

{{--<!-- Internal Quill JS -->--}}
{{--<script src="{{asset('assets/js/quill-editor.js')}}"></script>--}}

<script>
    new DataTable('#lang')
    new DataTable('#static-lang');

    new DataTable('#products-table')
    new DataTable('#coupon-table')
    new DataTable('#orders-table')

</script>
<!-- Tom Select JS -->
{{--<script src="{{asset('assets/libs/tom-select/js/tom-select.complete.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/tom-select.js')}}"></script>--}}
<!-- Language Switch -->


<!-- Set language status -->
<script>
    const langSwitch = document.querySelectorAll('[data-descr="langSwitch"]');
    const langStatusForm = document.querySelectorAll('[data-descr="langStatusForm"]');
    langSwitch.forEach((el, index) => {
        el.addEventListener('change', (e) => {
            langStatusForm[index].submit();
        })
    })
</script>

<!-- edit static traslation -->
<script>

document.addEventListener('mousemove',()=>{
    let editTranslationButtons = document.querySelectorAll(`[data-edit]`);
    editTranslationButtons.forEach((el, index) => {

        el.addEventListener('click', e => {

            document.querySelectorAll('[data-form-abbr="' + el.getAttribute('data-edit') + '"]').forEach(element => {
                element.removeAttribute('disabled');
            });
            document.querySelectorAll('[data-form-key="' + el.getAttribute('data-edit') + '"]').forEach(element => {
                element.removeAttribute('disabled');
            });

            document.querySelectorAll('[data-key="' + el.getAttribute('data-edit') + '"]').forEach(element => {
                element.removeAttribute('disabled');
            });

            document.querySelectorAll('[data-translation="' + el.getAttribute('data-edit') + '"]').forEach(element => {
                element.removeAttribute('disabled');
            });

            document.querySelectorAll('[data-abbr="' + el.getAttribute('data-edit') + '"]').forEach(element => {
                element.removeAttribute('disabled');
            });

            document.querySelectorAll('[data-submit="' + el.getAttribute('data-edit') + '"]').forEach(element => {
                element.style.display = 'block';
            });
            document.querySelectorAll('[data-cancel-submit="' + el.getAttribute('data-edit') + '"]').forEach(element => {
                element.style.display = 'block';
            });

            document.querySelectorAll('[data-delete="' + el.getAttribute('data-edit') + '"]').forEach(element => {
                element.style.display = 'block';
            });

        });

        // Cancel Edit

        const cancelEdit = document.querySelectorAll('[data-cancel-submit="' + el.getAttribute('data-edit') + '"]');
        cancelEdit.forEach((eli) => {
            eli.addEventListener('click', e => {

                document.querySelectorAll('[data-form-abbr="' + el.getAttribute('data-edit') + '"]').forEach(element => {
                    element.setAttribute('disabled', '');
                });
                document.querySelectorAll('[data-form-key="' + el.getAttribute('data-edit') + '"]').forEach(element => {
                    element.setAttribute('disabled', '');
                });

                document.querySelectorAll('[data-submit="' + eli.getAttribute('data-cancel-submit') + '"]').forEach(element => {
                    element.style.display = 'none';
                });
                // console.log(document.querySelectorAll('[data-submit="' + eli.getAttribute('data-cancel-submit') + '"]'))

                document.querySelectorAll('[data-cancel-submit="' + eli.getAttribute('data-cancel-submit') + '"]').forEach(element => {
                    element.style.display = 'none';
                });
                document.querySelectorAll('[data-delete="' + eli.getAttribute('data-cancel-submit') + '"]').forEach(element => {
                    element.style.display = 'none';
                });
                document.querySelectorAll('[data-key="' + eli.getAttribute('data-cancel-submit') + '"]').forEach(element => {
                    element.setAttribute('disabled', '');
                });

                document.querySelectorAll('[data-abbr="' + eli.getAttribute('data-cancel-submit') + '"]').forEach(element => {
                    element.setAttribute('disabled', '');
                });


                document.querySelectorAll('[data-translation="' + eli.getAttribute('data-cancel-submit') + '"]').forEach(element => {
                    element.setAttribute('disabled', '');
                });


            })
        })


        // Submit and update Translations

        const submitTranslationUpdate = document.querySelectorAll('[data-submit="' + el.getAttribute('data-edit') + '"]');

        submitTranslationUpdate.forEach((updt) => {
            updt.addEventListener('click', e => {
                updateForm.submit()
            })
        })


        // Delete Particular Translations
        const deleteTranslation = document.querySelectorAll('[data-delete="' + el.getAttribute('data-edit') + '"]');

        deleteTranslation.forEach((dlt1) => {
            dlt1.addEventListener('click', e => {
                // console.log('delete clicked')
                // console.log(document.querySelectorAll('[data-deleteinput="' + el.getAttribute('data-edit') + '"]'))
                document.querySelectorAll('[data-deleteinput="' + el.getAttribute('data-edit') + '"]').forEach(dlt => {
                    dlt.removeAttribute('disabled');
                    console.log(dlt)

                });

                updateForm.submit()
            })
        })
    });
})

</script>



{{-- Drag and Drop Functionality for Languages--}}

<script>
    const draggables = document.querySelectorAll(".draggable-lang");
    const containers = document.querySelectorAll(".lang-container");

    // Ajax request
    function updatePosition() {
        const positionForm = document.getElementById('positionForm')
        const formData = new FormData(positionForm);
        fetch('{{ route('changePosition') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-Token': document.querySelector('meta[name="CSRF"]').content,
                },
                body: formData
            }
        )
            .then(response => response.json())
            .catch(error => console.error('Error:', error));
    }


    draggables.forEach((draggable) => {
        draggable.addEventListener("dragstart", () => {
            draggable.classList.add("dragging");
        });

        // UPDATE VALUES OF INPUTS and SEND AJAX
        draggable.addEventListener("dragend", () => {
            draggable.classList.remove("dragging");

            updateDataAttributes();
            updatePosition()
        });
    });

    containers.forEach((container) => {
        container.addEventListener("dragover", (e) => {
            e.preventDefault();
            const afterElement = getDragAfterElement(container, e.clientY);
            const draggable = document.querySelector(".dragging");
            if (afterElement == null) {
                container.appendChild(draggable);

            } else {
                container.insertBefore(draggable, afterElement);
            }
        });
    });

    function getDragAfterElement(container, y) {
        const draggableElements = [
            ...container.querySelectorAll(".draggable-lang:not(.dragging)"),
        ];

        return draggableElements.reduce(
            (closest, child) => {
                const box = child.getBoundingClientRect();
                const offset = y - box.top - box.height / 2;
                if (offset < 0 && offset > closest.offset) {
                    return {offset: offset, element: child};
                } else {
                    return closest;
                }
            },
            {offset: Number.NEGATIVE_INFINITY}
        ).element;
    }

    function updateDataAttributes() {
        // Get all draggable elements
        const draggables = document.querySelectorAll(".position");
        // Loop through each draggable element
        draggables.forEach((draggable, index) => {
            // Update data-data attribute value
            draggable.value = index + 1;
        });
    }

</script>


<!-- Photo upload-->
<script>

    // const uploadProfileImage=document.getElementById('uploadProfileImage');
    // console.log(uploadProfileImage)
    // if(uploadProfileImage!==null){
    //     uploadProfileImage.addEventListener('click', function() {
    //         document.getElementById('imageInput').click();
    //     });
    //
    //     document.getElementById('imageInput').addEventListener('change', function() {
    //         const input = this;
    //         if (input.files && input.files[0]) {
    //             const reader = new FileReader();
    //             reader.onload = function (e) {
    //                 document.getElementById('imagePreview').src = e.target.result;
    //                 document.getElementById('imagePreview').style.display = 'block';
    //             }
    //             reader.readAsDataURL(input.files[0]);
    //         }
    //     });
    // }
    //

    const uploadProfileImage=document.querySelectorAll('.uploadProfileImage');
    const imagePreview=document.querySelectorAll('.imagePreview')
    const imageInput=document.querySelectorAll('.imageInput')



    if(uploadProfileImage!==null) {

        uploadProfileImage.forEach((el, index) => {
            el.addEventListener('click', function () {
                console.log(imageInput[index])
                imageInput[index].click()
  console.log('clicked')
                imageInput[index].addEventListener('change', function () {
                    const input = this;
                    if (input.files && input.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            imagePreview[index].src = e.target.result;
                            imagePreview[index].style.display = 'block';
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                })
            });


        });
    }
        // uploadProfileImage.addEventListener('click', function() {
        //     document.getElementById('imageInput').click();
        // });
        //
        // document.getElementById('imageInput').addEventListener('change', function() {
        //     const input = this;
        //     if (input.files && input.files[0]) {
        //         const reader = new FileReader();
        //         reader.onload = function (e) {
        //             document.getElementById('imagePreview').src = e.target.result;
        //             document.getElementById('imagePreview').style.display = 'block';
        //         }
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // });


</script>

{{-- All Products Edit--}}
<script>

    const landingInputs = document.querySelectorAll('.forLandingInput');
    const forLandingForm = document.querySelectorAll('.forLandingForm');
    landingInputs.forEach((el, index) => {

        el.addEventListener('change', function() {

            if (forLandingForm) {
                forLandingForm[index].submit();
            }
        });
    });

    const activeProducts=document.querySelectorAll('.activeProducts')
    const productStatusForm=document.querySelectorAll('.productStatusForm')

    activeProducts.forEach((el, index) => {
        el.addEventListener('change', function() {
            if (forLandingForm) {
                productStatusForm[index].submit();
            }
        });
    });

</script>


<script>
    const locales = @json($locales);
</script>


<script src="{{asset('landing_assets/js/dynamicTemplate.js')}}"></script>

{{--Discounts--}}
<script>
    const activeGenDiscount=document.querySelectorAll('.activeGenDiscount')
    const genDiscountForm=document.querySelectorAll('.gendiscountForm')

    activeGenDiscount.forEach((el, index) => {
        el.addEventListener('change', function() {
            if (genDiscountForm) {
                genDiscountForm[index].submit();
            }
        });
    });


    const activeCouponDiscount=document.querySelectorAll('.activeCouponDiscount')
    const couponDiscountForm=document.querySelectorAll('.couponDiscountForm')

    activeCouponDiscount.forEach((el, index) => {
        el.addEventListener('change', function() {
            if (couponDiscountForm) {
                couponDiscountForm[index].submit();
            }
        });
    });





</script>

<script>
    const aboutstatusform=document.getElementById('aboutstatusform')
    const statusbutton=document.getElementById('status')
    statusbutton.addEventListener('click', function() {
        if (aboutstatusform) {
            aboutstatusform.submit();
        }
    });

</script>
</body>
</html>
