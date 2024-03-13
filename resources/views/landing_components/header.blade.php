<header class="site-header site-header--absolute is--white py-3 bg-black" id="sticky-menu">
    <div class="global-container">
        <div class="flex items-center justify-between gap-x-8">
            <!-- Header Logo -->
            <a href="/" class="">
                <img src="{{asset('landing_assets/scratchme/Yellow-removebg-preview.png')}}" alt="AIMass" width="96"
                     height="24"/>
            </a>
            <!-- Header Logo -->

            <!-- Header Navigation -->
            <div class="menu-block-wrapper">
                <div class="menu-overlay"></div>
                <nav class="menu-block" id="append-menu-header">
                    <div class="mobile-menu-head">
                        <div class="go-back">
                            <img class="dropdown-icon"
                                 src="{{asset('landing_assets/img/icon-black-cheveron-left.svg')}}"
                                 alt="cheveron-right" width="16" height="16"/>
                        </div>
                        <div class="current-menu-title"></div>
                        <div class="mobile-menu-close">&times;</div>
                    </div>
                    <ul class="site-menu-main is-text-white">
                        <li class="nav-item nav-item-has-children">
                            <a href="#" class="nav-link-item drop-trigger">Demo
                                <img class="dropdown-icon"
                                     src="{{asset('landing_assets/img/icon-black-cheveron-right.svg')}}"
                                     alt="cheveron-right" width="16" height="16"/></a>
                            <ul class="sub-menu" id="submenu-1">
                                <li class="sub-menu--item">
                                    <a href="index.html">home 01</a>
                                </li>
                                <li class="sub-menu--item">
                                    <a href="index-2.html">home 02</a>
                                </li>
                                <li class="sub-menu--item">
                                    <a href="index-3.html">home 03</a>
                                </li>
                                <li class="sub-menu--item">
                                    <a href="index-4.html"> home 04</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="about.html" class="nav-link-item">About</a>
                        </li>
                        <li class="nav-item nav-item-has-children">
                            <a href="#" class="nav-link-item drop-trigger">Services
                                <img class="dropdown-icon"
                                     src="{{asset('landing_assets/img/icon-black-cheveron-right.svg')}}"
                                     alt="cheveron-right" width="16" height="16"/></a>
                            <ul class="sub-menu" id="submenu-2">
                                <li class="sub-menu--item">
                                    <a href="services.html">Services</a>
                                </li>
                                <li class="sub-menu--item">
                                    <a href="service-details.html">Service Details</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-has-children">
                            <a href="#" class="nav-link-item drop-trigger">Pages
                                <img class="dropdown-icon"
                                     src="{{asset('landing_assets/img/icon-black-cheveron-right.svg')}}"
                                     alt="cheveron-right" width="16" height="16"/></a>
                            <ul class="sub-menu" id="submenu-3">
                                <li class="sub-menu--item nav-item-has-children">
                                    <a href="#" data-menu-get="h3" class="drop-trigger">blogs
                                        <img class="dropdown-icon"
                                             src="{{asset('landing_assets/img/icon-black-cheveron-right.svg')}}"
                                             alt="cheveron-right"
                                             width="16" height="16"/></a>
                                    <ul class="sub-menu shape-none" id="submenu-4">
                                        <li class="sub-menu--item">
                                            <a href="blog.html">blogs</a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="blog-details.html">blog details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sub-menu--item nav-item-has-children">
                                    <a href="#" data-menu-get="h3" class="drop-trigger">Team
                                        <img class="dropdown-icon"
                                             src="{{asset('landing_assets/img/icon-black-cheveron-right.svg')}}"
                                             alt="cheveron-right"
                                             width="16" height="16"/>
                                    </a>
                                    <ul class="sub-menu shape-none" id="submenu-5">
                                        <li class="sub-menu--item">
                                            <a href="teams.html">Teams</a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="team-details.html">Teams Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sub-menu--item nav-item-has-children">
                                    <a href="#" data-menu-get="h3" class="drop-trigger">FAQ
                                        <img class="dropdown-icon"
                                             src="{{asset('landing_assets/img/icon-black-cheveron-right.svg')}}"
                                             alt="cheveron-right"
                                             width="16" height="16"/>
                                    </a>
                                    <ul class="sub-menu shape-none" id="submenu-6">
                                        <li class="sub-menu--item">
                                            <a href="faq.html">FAQ-1</a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="faq-2.html">FAQ-2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sub-menu--item nav-item-has-children">
                                    <a href="#" data-menu-get="h3" class="drop-trigger">Portfolio
                                        <img class="dropdown-icon"
                                             src="{{asset('landing_assets/img/icon-black-cheveron-right.svg')}}"
                                             alt="cheveron-right"
                                             width="16" height="16"/>
                                    </a>
                                    <ul class="sub-menu shape-none" id="submenu-7">
                                        <li class="sub-menu--item">
                                            <a href="portfolio.html">Portfolio</a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="portfolio-details.html">Portfolio Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sub-menu--item">
                                    <a href="pricing.html" data-menu-get="h3" class="drop-trigger">Pricing
                                    </a>
                                </li>

                                <li class="sub-menu--item nav-item-has-children">
                                    <a href="#" data-menu-get="h3" class="drop-trigger">Utilities
                                        <img class="dropdown-icon"
                                             src="{{asset('landing_assets/img/icon-black-cheveron-right.svg')}}"
                                             alt="cheveron-right"
                                             width="16" height="16"/>
                                    </a>
                                    <ul class="sub-menu shape-none" id="submenu-8">
                                        <li class="sub-menu--item">
                                            <a href="error-404.html">Error 404</a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="login.html">Login</a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="signup.html">Signup</a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="reset-password.html">Reset Password</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="contact.html" class="nav-link-item">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Header Navigation -->

            <!-- Header User Event -->
            <div class="flex items-center gap-6">
                <div class="language-selector m-auto">
                    <button class="language-button">
                        <img src="{{asset('landing_assets/flags/ge.svg')}}" alt="Georgian Flag"/>
                    </button>
                    <ul class="language-menu">
                        <li>
                            <a href="/en" data-lang="en"
                            ><img src="{{asset('landing_assets/flags/gb.svg')}}" alt="English Flag"
                                /></a>
                        </li>
                        <li>
                            <a href="/ka" data-lang="ka"
                            ><img src="{{asset('landing_assets/flags/ge.svg')}}" alt="Georgian Flag"
                                /></a>
                        </li>
                        <!-- Add more languages as needed -->
                    </ul>
                </div>
                @if(auth()->check())
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button
                                class="button hidden rounded-[50px] border-black bg-black text-white after:bg-colorOrangyRed hover:border-colorOrangyRed hover:text-white lg:inline-block">
                            <span class="material-symbols-outlined">logout</span>
                        </button>
                    </form>


                @else
                    <a href="{{route('login')}}"
                       class="button hidden rounded-[50px] border-black bg-black text-white after:bg-colorOrangyRed hover:border-colorOrangyRed hover:text-white lg:inline-block">Login</a>
                    <a href="{{route('register')}}"
                       class="button hidden rounded-[50px] border-black bg-black text-white after:bg-colorOrangyRed hover:border-colorOrangyRed hover:text-white lg:inline-block">Sign
                        up free</a>

                @endif
                @role('admin')
                <a   class="button hidden rounded-[50px] border-black bg-black text-white after:bg-colorOrangyRed hover:border-colorOrangyRed hover:text-white lg:inline-block" href="{{route('adminMain')}}">Admin</a>
                @endrole

                <!-- Responsive Offcanvas Menu Button -->
                <div class="block lg:hidden">
                    <button id="openBtn" class="hamburger-menu mobile-menu-trigger">
                        <span style="background-color: white!important"></span>
                        <span style="background-color: white!important"></span>
                        <span style="background-color: white!important"></span>
                    </button>
                </div>
            </div>
            <!-- Header User Event -->
        </div>
    </div>
</header>
