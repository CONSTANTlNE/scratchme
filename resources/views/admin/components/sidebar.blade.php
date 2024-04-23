<aside @if(request()->routeIs('products')) style="display: none" @endif  class="app-sidebar" id="sidebar">


    <div class="main-sidebar" id="sidebar-scroll">

        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                     height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>

            <ul class="main-menu">


                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <span class="material-symbols-outlined">language</span>
                        <span style="margin-left: 10px" class="side-menu__label">ლოკალიზაცია</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">

                        <li class="slide">
                            <a href="{{route('languages')}}" class="side-menu__item">ენები</a>
                        </li>
                        <li class="slide">
                            <a href="{{route('addStaticTranslation')}}" class="side-menu__item">სტატიკური თარგმანი</a>
                        </li>


                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item"
                            >Blog<i class="fe fe-chevron-right side-menu__angle"></i
                                ></a>
                            <ul class="slide-menu child2">
                                <li class="slide">
                                    <a href="blog.html" class="side-menu__item">Blog</a>
                                </li>
                                <li class="slide">
                                    <a href="blog-details.html" class="side-menu__item"
                                    >Blog Details</a
                                    >
                                </li>
                                <li class="slide">
                                    <a href="blog-create.html" class="side-menu__item"
                                    >Create Blog</a
                                    >
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>


                <li class="slide">
                    <a href="{{route('addProduct')}}" class="side-menu__item">
                        <span class="material-symbols-outlined ">add</span>
                        <span style="margin-left: 10px" class="side-menu__label"> Add Product</span>
                    </a>
                </li>
                <li class="slide">

                    <a href="{{route('allProduct')}}" class="side-menu__item">
                        <span class="material-symbols-outlined">list_alt</span>
                        <span style="margin-left: 10px" class="side-menu__label">All Products</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{route('faq')}}" class="side-menu__item">
                        <span class="material-symbols-outlined">quiz</span>
                        <span style="margin-left: 10px" class="side-menu__label">FAQ</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{route('discounts')}}" class="side-menu__item">
                        <span class="material-symbols-outlined">percent</span>
                        <span style="margin-left: 10px" class="side-menu__label">Manage Discounts</span>

                    </a>
                </li>
                <li class="slide">
                    <a href="{{route('orders')}}" class="side-menu__item">
                        <span class="material-symbols-outlined">orders</span>
                        <span style="margin-left: 10px" class="side-menu__label">Orders</span>

                    </a>
                </li>
                <li class="slide">
                    <a href="{{route('delivery')}}" class="side-menu__item">
                        <span class="material-symbols-outlined">local_shipping</span>
                        <span style="margin-left: 10px" class="side-menu__label">Delivery</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{route('aboutUs')}}" class="side-menu__item">
                        <span class="material-symbols-outlined">person</span>
                        <span style="margin-left: 10px" class="side-menu__label">About Page</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{route('terms')}}" class="side-menu__item">
                        <span class="material-symbols-outlined">done_all</span>
                        <span style="margin-left: 10px" class="side-menu__label">Terms Page</span>
                    </a>
                </li>

            </ul>

            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                     height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg>
            </div>

        </nav>

    </div>

</aside>