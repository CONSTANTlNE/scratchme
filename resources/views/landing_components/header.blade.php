<header class="site-header site-header--absolute is--white py-3 bg-black" id="sticky-menu">
    <div class="global-container">
        <div class="flex items-center justify-between gap-x-8 align-middle">
            <!-- Header Logo -->
            <a href="{{route('index', ['locale' => app()->getLocale()])}}">
{{--                <img src="{{asset('landing_assets/scratchme/Yellow-removebg-preview.png')}}" alt="AIMass" width="200" />--}}
                <img src="{{Vite::asset('public/landing_assets/scratchme/Yellow-removebg-preview.png')}}" alt="AIMass" width="200" />
            </a>

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
                    <ul class="site-menu-main is-text-white gap-3">

                        <li style="margin-left: 10px" class="nav-item ">
                            <a style="padding-top: 0!important;padding-bottom: 0!important"
                               href="{{route('allproduct')}}"
                               class="nav-link-item">{{__('All Products')}}</a>
                        </li>
                        <li style="margin-left: 10px" class="nav-item mobile-menu-close">
                            <a style="padding-top: 0!important;padding-bottom: 0!important" href="#contact"
                               class="  nav-link-item ">{{__('Contact')}}</a>
                        </li>


                        <li style="margin-left: 10px" class="nav-item mobile-menu-close">
                            <a style="padding-top: 0!important;padding-bottom: 0!important" href="{{route('about')}}"
                               class="  nav-link-item ">{{__('About')}}</a>
                        </li>
                        <li style="margin-left: 10px" class="nav-item mobile-menu-close">
                            <a style="padding-top: 0!important;padding-bottom: 0!important" href="{{route('landingterms')}}"
                               class="  nav-link-item ">{{__('Terms & Conditions')}}</a>
                        </li>


                        @if(auth()->check())
                            <li style="margin-left: 10px" class="nav-item mobile-menu-close">
                                <a style="padding-top: 0!important;padding-bottom: 0!important" href="{{route('userOrders')}}"
                                   class="  nav-link-item ">{{__('My Orders')}}</a>
                            </li>
                            @role('admin')
                            <li style="margin-left: 10px" class="nav-item mobile-menu-close">
                                <a style="padding-top: 0!important;padding-bottom: 0!important" href="{{route('adminMain')}}"
                                   class="  nav-link-item ">
                                    <span style="color:yellow;margin-bottom: 5px;" class="material-symbols-outlined">settings</span>
                                </a>
                            </li>

                            @endrole
                            <form style="height: 50px" class="nav-item" action="{{route('logout')}}" method="post">
                                @csrf
                                <button style="margin-left: 10px; "
                                        class=" nav-link-item">

                                    <span class="material-symbols-outlined mt-1">logout</span>

                                </button>
                            </form>

                        @else
                            <li style="margin-left: 10px" class="nav-item">
                                <a style="padding-top: 0!important;padding-bottom: 0!important;"
                                   href="{{route('login')}}"
                                   class="nav-link-item">{{__('Login')}}</a>
                            </li>

                            <li style="margin-left: 10px" class="nav-item">
                                <a style="padding-top: 0!important;padding-bottom: 0!important;"
                                   href="{{route('register')}}"
                                   class="nav-link-item">{{__('Register')}}</a>
                            </li>
                        @endif

                    </ul>
                </nav>
            </div>
            <!-- Header Navigation -->

            <!-- Header User Event -->
            <div class="flex items-center gap-6">
                <div class="language-selector m-auto">
                    <button class="language-button">
                        @foreach($languages as $index => $language)
                            @if(request()->segment(1) == $language->abbr)
                                {!! $language->icon !!}

                            @endif
                        @endforeach
                    </button>
                    <ul class="language-menu">
                        @foreach($languages as $index => $language)
                            <li>
                                @php
                                    $currentUrl = request()->getRequestUri();
                                    $segments = explode('/', $currentUrl);
                                    $segments[1] = $language->abbr;
                                    $newUrl = implode('/', $segments);
                                @endphp
                                <a href="{{$newUrl}}" data-lang="{{$language->abbr}}"
                                >

                                    {!! $language->icon !!}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                @if(auth()->check())
                    <span class="cart">

                    <a href="{{route('cart')}}" style="all:unset;cursor: pointer" class="nav-link-item">
                    <span style="color:white!important;margin-top: 8px;margin-left: 8px"
                          class="material-symbols-outlined">shopping_cart</span>
                        @php
                            if(isset($quantities)){
                              $quantity=$quantities->sum('quantity');
                            }
                        @endphp
                    <span id="cartCount" @if(isset($quantity)&&$quantity>0) style="display: block"
                          @else style="display: none"
                          @endif class="cart__count">
                          @if(isset($quantities))
                            {{$quantity}}
                        @endif
                    </span>

                    </a>
                </span>


                @endif

                <!-- Responsive Offcanvas Menu Button -->
                <div class="block lg:hidden">
                    <button style="margin-left: 0!important" id="openBtn" class="hamburger-menu mobile-menu-trigger">
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
