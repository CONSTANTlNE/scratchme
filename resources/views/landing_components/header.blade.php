<header class="site-header site-header--absolute is--white py-3 bg-black" id="sticky-menu">
    <div class="global-container">
        <div   class="flex items-center justify-between gap-x-8 align-middle">
            <!-- Header Logo -->

            <a href="{{route('index', ['locale' => app()->getLocale()])}}" class="">
                <img src="{{asset('landing_assets/scratchme/Yellow-removebg-preview.png')}}" alt="AIMass" width="200"/>
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
                    <ul class="site-menu-main is-text-white gap-3">

                        <li style="margin-left: 10px"  class="nav-item ">
                            <a style="padding-top: 0!important;padding-bottom: 0!important"
                               href="{{route('allproduct')}}"
                               class=" text-center nav-link button hidden rounded-[50px] border-black bg-black text-white after:bg-colorOrangyRed hover:border-colorOrangyRed hover:text-white lg:inline-block">All
                                Products</a>
                        </li>
                        <li style="margin-left: 10px"   class="nav-item">
                            <a style="padding-top: 0!important;padding-bottom: 0!important" href="#contact"
                               class=" nav-link button hidden rounded-[50px] border-black bg-black text-white after:bg-colorOrangyRed hover:border-colorOrangyRed hover:text-white lg:inline-block">Contact</a>
                        </li>

                        @if(auth()->check())

                            <form style="height: 50px" class="nav-item" action="{{route('logout')}}" method="post">
                                @csrf
                                <button style="margin-left: 10px; "
                                        class=" button rounded-[50px] border-black bg-black text-white after:bg-colorOrangyRed hover:border-colorOrangyRed hover:text-white lg:inline-block">

                                    <span class="material-symbols-outlined mt-1">logout</span>

                                </button>
                            </form>

                        @else
                            <li style="margin-left: 10px"  class="nav-item">
                            <a style="padding-top: 0!important;padding-bottom: 0!important;" href="{{route('login')}}"
                               class="button hidden rounded-[50px] border-black bg-black text-white after:bg-colorOrangyRed hover:border-colorOrangyRed hover:text-white lg:inline-block">Login</a>
                            </li>

                            <li style="margin-left: 10px"  class="nav-item">
                                <a style="padding-top: 0!important;padding-bottom: 0!important;" href="{{route('register')}}"
                               class="button hidden rounded-[50px] border-black bg-black text-white after:bg-colorOrangyRed hover:border-colorOrangyRed hover:text-white lg:inline-block">Sign
                                up free</a>
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
                                    {{--                                    --}}
                                    {{--                                    <img src="{{asset('landing_assets/flags/gb.svg')}}" alt="English Flag"--}}
                                    {{--                                    />--}}
                                    {!! $language->icon !!}
                                </a>
                            </li>
                        @endforeach
                        {{--                        <li>--}}
                        {{--                            @php--}}
                        {{--                                $currentUrl = request()->getRequestUri();--}}
                        {{--                                $segments = explode('/', $currentUrl);--}}
                        {{--                                $segments[1] = 'en';--}}
                        {{--                                $newUrl = implode('/', $segments);--}}
                        {{--                            @endphp--}}
                        {{--                            <a href="{{$newUrl}}" data-lang="en"--}}
                        {{--                            ><img src="{{asset('landing_assets/flags/gb.svg')}}" alt="English Flag"--}}
                        {{--                                /></a>--}}
                        {{--                        </li>--}}
                        {{--                        <li>--}}
                        {{--                            @php--}}
                        {{--                                $currentUrl = request()->getRequestUri();--}}
                        {{--                                $segments = explode('/', $currentUrl);--}}
                        {{--                                $segments[1] = 'ka';--}}
                        {{--                                $newUrl = implode('/', $segments);--}}
                        {{--                            @endphp--}}
                        {{--                            <a href="{{$newUrl}}" data-lang="ka"--}}
                        {{--                            ><img src="{{asset('landing_assets/flags/ge.svg')}}" alt="Georgian Flag"--}}
                        {{--                                /></a>--}}
                        {{--                        </li>--}}
                        <!-- Add more languages as needed -->
                    </ul>
                </div>
                @if(auth()->check())
                <span class="cart ">

                    <a href="{{route('cart')}}" style="all:unset;cursor: pointer">
                    <span style="color:white!important;margin-top: 8px;margin-left: 8px"
                          class="material-symbols-outlined">shopping_cart</span>
                        @php
                            if(isset($quantities)){
                              $quantity=$quantities->sum('quantity');

                            }

                        @endphp

                    <span id="cartCount" @if(isset($quantity)&&$quantity>0) style="display: block" @else style="display: none"
                          @endif class="cart__count">
                          @if(isset($quantities))
                        {{$quantity}}
                        @endif
                    </span>

                    </a>
                </span>
                @endif
{{--                @if(auth()->check())--}}
{{--                    <form action="{{route('logout')}}" method="post">--}}
{{--                        @csrf--}}
{{--                        <button--}}
{{--                                class=" button hidden rounded-[50px] border-black bg-black text-white after:bg-colorOrangyRed hover:border-colorOrangyRed hover:text-white lg:inline-block">--}}
{{--                            <span class="material-symbols-outlined mt-1">logout</span>--}}
{{--                        </button>--}}
{{--                    </form>--}}

{{--                @else--}}
{{--                    <a style="padding-top: 0!important;padding-bottom: 0!important;" href="{{route('login')}}"--}}
{{--                       class="button hidden rounded-[50px] border-black bg-black text-white after:bg-colorOrangyRed hover:border-colorOrangyRed hover:text-white lg:inline-block">Login</a>--}}
{{--                    <a style="padding-top: 0!important;padding-bottom: 0!important;" href="{{route('register')}}"--}}
{{--                       class="button hidden rounded-[50px] border-black bg-black text-white after:bg-colorOrangyRed hover:border-colorOrangyRed hover:text-white lg:inline-block">Sign--}}
{{--                        up free</a>--}}

{{--                @endif--}}
                @role('admin')
                <a class="button hidden rounded-[50px] border-black bg-black text-white after:bg-colorOrangyRed hover:border-colorOrangyRed hover:text-white lg:inline-block"
                   href="{{route('adminMain')}}">Admin</a>
                @endrole

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
