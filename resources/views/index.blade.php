<!doctype html>
<html lang="en">
@php
    //dd($languages);
@endphp
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ScratchMe</title>
    <meta name="description" content="AIMass Tailwind based SASS Template"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon  -->
    <link rel="icon" href="{{Vite::asset('public/landing_assets/scratchme/Yellow-removebg-preview.png')}}"/>


    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>

    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="robots" content="index, follow">
    <meta name="google-site-verification" content="mGKx5yrN3JgaW8KaWYpzI0xE7SkaOvUTVCwLFO_2SF4"/>
    <meta property="og:title" content="ScratchMe">
    <meta property="og:description" content="შექმენი და მართე ციფრული მენიუ ყველაზე მარტივად">
    <meta property="og:image" content="{{Vite::asset('public/landing_assets/scratchme/Yellow-removebg-preview.png')}}">
    <meta property="og:url" content="https://www.scratchme.ge/">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-color: #f6f6f6 ">
<div class="page-wrapper relative z-[1] bg-white">

    @include('landing_components.header')


    <main style="background-color: #ebebeb!important;" class="main-wrapper relative overflow-hidden">
        <div class="vdbckgr" style="height: 100vh;position: relative;">

            {{--            <video style="width: 100%;height: 100%;object-fit:fill;"--}}
            {{--                   src="{{asset('landing_assets/video.webp')}}" class="vid-bg" autoplay loop muted></video>--}}
            {{--            src="{{Vite::asset('public/landing_assets/video.mp4')}}" class="vid-bg" autoplay loop muted></video>--}}

            <img style="width: 100%;height: 100%;object-fit:fill;"
                 src="{{asset('landing_assets/video.webp')}}" class="vid-bg">
        </div>

        <div class="global-container">
            <div class="h-[1px] w-full bg-[#EAEDF0]"></div>
        </div>
        <!-- Separator -->

        @foreach($products as $index=> $product)
            @if($loop->even)
                <section id="content-section-1">
                    <div style="background-color: #ebebeb!important;"
                         class="pb-10 pt-10 md:pb-36 md:pt-5 lg:pb-28 xl:pb-[220px] ">
                        <div class="global-container">
                            <div
                                    class="grid grid-cols-1 items-center gap-1 md:grid-cols-2 lg:gap-20 xl:grid-cols-[minmax(0,_.8fr)_1fr] xl:gap-28 xxl:gap-[134px]">
                                <div class="jos order-1   rounded-md md:order-1 md:mt-0"
                                     data-jos_animation="fade-up">
                                    <div
                                            class="relative h-[494px]  rounded-tl-[20px] rounded-tr-[20px]  bg-cover bg-no-repeat">
                                        @foreach($product->media as $img)
                                            @if($loop->first)
{{--                                                class="defaultGlightbox"--}}
                                                <a href="{{route('productDetails',['product'=>$product->slug])}}" >

                                                    <img style="height:100%;border-radius: 15px"
                                                         src="{{$img->getUrl()}}"
                                                         alt="th2-content-img-1.png"
                                                         class="  absolute bottom-0 left-1/2 h-[564px] w-[320px] -translate-x-1/2"/>
                                                </a>
                                            @endif
                                        @endforeach

                                    </div>

                                </div>

                                <div class="jos order-2 md:order-2" data-jos_animation="fade-right">
                                    <div class="mb-6">
                                        <h2
                                                class="mt-5 font-clashDisplay text-4xl font-medium leading-[1.06] sm:text-[44px] lg:text-[56px] xl:text-[75px]">
                                            {{$product->product_name}}
                                        </h2>
                                    </div>
                                    <div class="text-lg leading-[1.66]">
                                        <p class="mb-3 last:mb-0 lg:text-[28px]">
                                            {{$product->product_short_description}}
                                        </p>
                                        <span class="lg:text-[28px]">
                                                {{ $product->prices()->whereNull('discount')->latest()->first()->price}}₾
{{--                                                {{$product->prices->last()->price}}₾--}}
                                                <span class="lg:text-[20px] text-[#8c9097] dark:text-white/50 line-through ms-1 inline-block opacity-[0.6]">
{{--                                                {{ $product->prices()->whereNull('discount')->latest()->first()->price}}₾--}}
                                                </span>
                                            </span>
                                        @if($product->prices->last()->discount)
                                            <span style="color:red"
                                                  class="badge bg-secondary/10 text-secondary ltr:float-right rtl:float-left text-[0.625rem]">
                                              {{$product->prices->last()->discount}}% ფასდაკლება
                                            </span>
                                        @endif
                                        <ul class="mt-7 flex flex-col gap-y-6 font-clashDisplay text-[22px] font-medium leading-[1.28] tracking-[1px] lg:text-[18px]">
                                            @foreach($product->features as $feature)
                                                @if($loop->first)
                                                    <li class="relative pl-[35px] after:absolute after:left-[10px] after:top-3 after:h-[15px] after:w-[15px] after:rounded-[50%] after:bg-black">
                                                        {{$feature->feature}}
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        <form class="cartform" style="display: inline" action="{{route('addItem')}}"
                                              method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <input type="hidden" name="price_id"
                                                   value="{{$product->prices->last()->id}}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button data-productid="{{$product->id}}"
                                                    class="cartbutton button relative z-[1]  inline-flex items-center gap-3 rounded-[50px] border-none bg-colorblack py-[18px] text-white hover:text-black mt-7">
                                                {{__('Add to Cart')}}
                                            </button>
                                        </form>
                                        <a href="{{route('allproduct')}}"
                                           class="allp button relative z-[1] inline-flex items-center gap-3 rounded-[50px] bg-colorblack py-[18px] text-white hover:text-black mt-7">
                                            {{__('All Products')}}</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </section>
            @else
                <section id="content-section-2">

                    <div style="background-color: #ebebeb!important;"
                         class="pb-10 pt-10 md:pb-36 lg:pb-28 xl:pb-[220px] mt-7">

                        <div class="global-container">
                            <div class="grid grid-cols-1 items-center gap-1 md:grid-cols-2 lg:gap-20 xl:grid-cols-[minmax(0,_1fr)_.8fr] xl:gap-28 xxl:gap-[134px]">

                                <div class="jos order-1  md:order-2  rounded-md md:mt-0" data-jos_animation="fade-up">
                                    <div class="relative h-[494px] rounded-tl-[20px] rounded-tr-[20px] bg-cover bg-no-repeat">
                                        {{--                                        @php dd($product->getMedia("*")) @endphp--}}
                                        @foreach($product->getMedia('product_image') as $index2 => $img)
                                            @php
                                                //                                            dd($product->getMedia('product_image'));
                                            @endphp
                                            @if($loop->first)
                                                <a href="{{route('productDetails',['product'=>$product->slug])}}" >
                                                    <img style="height:100%;border-radius: 15px"
                                                         src="{{$img->getUrl()}}"
                                                         alt="th2-content-img-2.png"
                                                         class="absolute bottom-0 left-1/2 h-[564px] w-[320px] -translate-x-1/2"/>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="jos order-2 md:order-1" data-jos_animation="fade-right">

                                    <div class="mb-6">
                                        <h2 class="mt-5 font-clashDisplay text-4xl font-medium leading-[1.06] sm:text-[44px] lg:text-[56px] xl:text-[75px]">
                                            {{$product->product_name}}
                                        </h2>
                                    </div>

                                    <div class="text-lg leading-[1.66]">
                                        <p class="mb-7 last:mb-0 lg:text-[28px] ">
                                            {{$product->product_short_description}}
                                        </p>
                                        <p class="mb-1 font-semibold  flex items-center justify-start">
                                            <span class="lg:text-[28px]">
                                                {{ $product->prices()->whereNull('discount')->latest()->first()->price}}₾
{{--                                                {{$product->prices->last()->price}}₾--}}
                                                <span class="lg:text-[20px] text-[#8c9097] dark:text-white/50 line-through ms-1 inline-block opacity-[0.6]">
{{--                                                {{ $product->prices()->whereNull('discount')->latest()->first()->price}}₾--}}
                                                </span>
                                            </span>
                                            @if($product->prices->last()->discount)
                                                <span style="color:red"
                                                      class="badge bg-secondary/10 text-secondary ltr:float-right rtl:float-left text-[0.625rem]">
                                              {{$product->prices->last()->discount}}% ფასდაკლება
                                            </span>
                                            @endif
                                        </p>

                                        <ul class="mt-7 flex flex-col gap-y-6 font-clashDisplay text-[22px] font-medium leading-[1.28] tracking-[1px] lg:text-[16px]">
                                            @foreach($product->features as $feature)
                                                @if($loop->first)
                                                    <li class="relative pl-[35px] after:absolute after:left-[10px] after:top-3 after:h-[15px] after:w-[15px] after:rounded-[50%] after:bg-black">
                                                        {{$feature->feature}}
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <form class="cartform" style="display: inline" action="{{route('addItem')}}"
                                          method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="price_id" value="{{$product->prices->last()->id}}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button data-productid="{{$product->id}}"
                                                class="cartbutton button relative z-[1] inline-flex items-center gap-3 rounded-[50px] border-none bg-colorblack py-[18px] text-white hover:text-black mt-7">
                                            {{__('Add to Cart')}}
                                        </button>
                                    </form>
                                    <a href="{{route('allproduct')}}"
                                       class="allp button relative z-[1] inline-flex items-center gap-3 rounded-[50px] border-none bg-colorblack py-[18px] text-white hover:text-black mt-7">
                                        {{__('All Products')}}</a>
                                </div>
                                <!-- Content Left Block -->
                            </div>
                        </div>

                    </div>

                </section>
            @endif
        @endforeach


        <div class="global-container">
            <div class="h-[1px] w-full bg-[#EAEDF0]"></div>
        </div>

        <section id="faq-section">

            <div class="pb-35 xl:pb-[150px]]">

                <div class="global-container">

                    <div
                            class="jos mx-auto mb-10 text-center md:mb-16 md:max-w-xl lg:mb-20 lg:max-w-3xl xl:max-w-[856px]">
                        <h2
                                class="font-clashDisplay text-4xl font-medium leading-[1.06] sm:text-[44px] lg:text-[56px] xl:text-[75px]">
                            {{__('FAQ')}}
                        </h2>
                    </div>

                    <ul class="accordion flex flex-col gap-y-6">
                        <!-- Accordion items -->
                        @foreach($faqs as $faq)
                            <li class="jos accordion-item is-3 rounded-[10px] border-[1px] border-[#EAEDF0] bg-white px-7 py-[30px] "
                                data-jos_delay="0.1">
                                <div class="accordion-header flex items-center justify-between">
                                    <h5
                                            class="font-clashDisplay text-xl font-medium leading-[1.2] tracking-[1px] lg:text-[28px]">
                                        {{$faq->question}}
                                    </h5>
                                    <div class="accordion-icon is-blue">
                                        <img src="{{asset('landing_assets/img/plus.svg')}}" alt="plus"/>
                                        <img src="{{asset('landing_assets/img/plus-white.svg')}}" alt="plus-white"/>
                                    </div>
                                </div>
                                <div class="accordion-content text-lg text-[#2C2C2C]">
                                    <p>
                                        {!!$faq->answer!!}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                        {{--                        <li id="contact" style="background-color: #ebebeb!important;padding-bottom: 70px"--}}
                        {{--                            class="jos  is-3 rounded-[10px] border-[1px] border-[#EAEDF0] bg-white px-7 py-[30px] "--}}
                        {{--                            data-jos_delay="0.1">--}}
                        {{--                            <div style="background-color: #ebebeb!important;" class="socials flex justify-center gap-3">--}}

                        {{--                            </div>--}}
                        {{--                        </li>--}}
                    </ul>

                </div>

            </div>

        </section>
        <div id="contact" class="flex justify-center gap-3 mb-7 mt-7">
            <a href="https://www.facebook.com/profile.php?id=100069933595746" target="_blank">
                <svg class="contactsocials" style="cursor: pointer"
                     xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 48 48">
                    <path fill="#3f51b5" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"></path>
                    <path fill="#fff"
                          d="M29.368,24H26v12h-5V24h-3v-4h3v-2.41c0.002-3.508,1.459-5.59,5.592-5.59H30v4h-2.287 C26.104,16,26,16.6,26,17.723V20h4L29.368,24z"></path>
                </svg>
            </a>
            <a href="https://m.me/100069933595746" target="_blank">
                <svg class="contactsocials" style="cursor: pointer"
                     xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 48 48">
                    <path fill="#448aff"
                          d="M24,4C13.5,4,5,12.1,5,22c0,5.2,2.3,9.8,6,13.1V44l7.8-4.7c1.6,0.4,3.4,0.7,5.2,0.7	c10.5,0,19-8.1,19-18S34.5,4,24,4z"></path>
                    <path fill="#fff" d="M12,28l10-11l5,5l9-5L26,28l-5-5L12,28z"></path>
                </svg>
            </a>

            <a href="https://www.instagram.com/scratchme.ge/" target="_blank">
                <svg class="contactsocials" style="cursor: pointer"
                     xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 48 48">
                    <radialGradient id="yOrnnhliCrdS2gy~4tD8ma_Xy10Jcu1L2Su_gr1" cx="19.38"
                                    cy="42.035" r="44.899" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#fd5"></stop>
                        <stop offset=".328" stop-color="#ff543f"></stop>
                        <stop offset=".348" stop-color="#fc5245"></stop>
                        <stop offset=".504" stop-color="#e64771"></stop>
                        <stop offset=".643" stop-color="#d53e91"></stop>
                        <stop offset=".761" stop-color="#cc39a4"></stop>
                        <stop offset=".841" stop-color="#c837ab"></stop>
                    </radialGradient>
                    <path fill="url(#yOrnnhliCrdS2gy~4tD8ma_Xy10Jcu1L2Su_gr1)"
                          d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"></path>
                    <radialGradient id="yOrnnhliCrdS2gy~4tD8mb_Xy10Jcu1L2Su_gr2" cx="11.786"
                                    cy="5.54" r="29.813"
                                    gradientTransform="matrix(1 0 0 .6663 0 1.849)"
                                    gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#4168c9"></stop>
                        <stop offset=".999" stop-color="#4168c9" stop-opacity="0"></stop>
                    </radialGradient>
                    <path fill="url(#yOrnnhliCrdS2gy~4tD8mb_Xy10Jcu1L2Su_gr2)"
                          d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"></path>
                    <path fill="#fff"
                          d="M24,31c-3.859,0-7-3.14-7-7s3.141-7,7-7s7,3.14,7,7S27.859,31,24,31z M24,19c-2.757,0-5,2.243-5,5	s2.243,5,5,5s5-2.243,5-5S26.757,19,24,19z"></path>
                    <circle cx="31.5" cy="16.5" r="1.5" fill="#fff"></circle>
                    <path fill="#fff"
                          d="M30,37H18c-3.859,0-7-3.14-7-7V18c0-3.86,3.141-7,7-7h12c3.859,0,7,3.14,7,7v12	C37,33.86,33.859,37,30,37z M18,13c-2.757,0-5,2.243-5,5v12c0,2.757,2.243,5,5,5h12c2.757,0,5-2.243,5-5V18c0-2.757-2.243-5-5-5H18z"></path>
                </svg>
            </a>
            {{--            <a href="mailto:scratchme@gmail.com">--}}

            {{--                <svg class="contactsocials" style="cursor: pointer"--}}
            {{--                     xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 48 48">--}}
            {{--                    <path fill="#4caf50"--}}
            {{--                          d="M45,16.2l-5,2.75l-5,4.75L35,40h7c1.657,0,3-1.343,3-3V16.2z"></path>--}}
            {{--                    <path fill="#1e88e5"--}}
            {{--                          d="M3,16.2l3.614,1.71L13,23.7V40H6c-1.657,0-3-1.343-3-3V16.2z"></path>--}}
            {{--                    <polygon fill="#e53935"--}}
            {{--                             points="35,11.2 24,19.45 13,11.2 12,17 13,23.7 24,31.95 35,23.7 36,17"></polygon>--}}
            {{--                    <path fill="#c62828"--}}
            {{--                          d="M3,12.298V16.2l10,7.5V11.2L9.876,8.859C9.132,8.301,8.228,8,7.298,8h0C4.924,8,3,9.924,3,12.298z"></path>--}}
            {{--                    <path fill="#fbc02d"--}}
            {{--                          d="M45,12.298V16.2l-10,7.5V11.2l3.124-2.341C38.868,8.301,39.772,8,40.702,8h0 C43.076,8,45,9.924,45,12.298z"></path>--}}
            {{--                </svg>--}}
            {{--            </a>--}}
            <a href="tel:551-507-697">
                <svg class="contactsocials" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                     x="0px" y="0px">
                    <linearGradient id="SVGID_1_" x1="38.743" x2="9.257" y1="9.257" y2="38.743"
                                    gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#60fea4"/>
                        <stop offset=".033" stop-color="#6afeaa"/>
                        <stop offset=".197" stop-color="#97fec4"/>
                        <stop offset=".362" stop-color="#bdffd9"/>
                        <stop offset=".525" stop-color="#daffea"/>
                        <stop offset=".687" stop-color="#eefff5"/>
                        <stop offset=".846" stop-color="#fbfffd"/>
                        <stop offset="1" stop-color="#fff"/>
                    </linearGradient>
                    <path fill="url(#SVGID_1_)"
                          d="M34.5,40.5h-21c-3.314,0-6-2.686-6-6v-21c0-3.314,2.686-6,6-6h21c3.314,0,6,2.686,6,6v21	C40.5,37.814,37.814,40.5,34.5,40.5z"/>
                    <path fill="#10e36c"
                          d="M31.328,34.068c0.648,0,2.876-1.164,2.752-4.041c-0.022-0.507-0.307-0.972-0.745-1.252	c-0.499-0.32-1.273-0.816-2.282-1.461c-0.921-0.588-2.11-0.63-3.071-0.104l-0.874,0.374c-0.455,0.32-1.039,0.383-1.552,0.169	c-0.799-0.334-2.026-0.981-3.177-2.132c-1.151-1.151-1.798-2.378-2.132-3.177c-0.215-0.513-0.151-1.097,0.169-1.552l0.374-0.874	c0.526-0.96,0.485-2.15-0.104-3.071c-0.646-1.01-1.142-1.783-1.461-2.282c-0.281-0.438-0.746-0.723-1.252-0.745	c-2.876-0.124-4.041,2.104-4.041,2.752c0,0.449-0.614,5.842,5.47,11.926S30.88,34.068,31.328,34.068z"/>
                    <path fill="none" stroke="#10e36c" stroke-linecap="round"
                          stroke-linejoin="round" stroke-width="3"
                          d="M32.149,7.5H34.5c3.314,0,6,2.686,6,6v21c0,3.314-2.686,6-6,6h-8.734"/>
                    <path fill="none" stroke="#10e36c" stroke-linecap="round"
                          stroke-linejoin="round" stroke-width="3"
                          d="M19.851,40.5H13.5c-3.314,0-6-2.686-6-6v-21c0-3.314,2.686-6,6-6h12.819"/>
                </svg>

            </a>
            <a href="https://wa.me/995598344893" target="_blank">
                <svg class="contactsocials" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                     viewBox="0 0 48 48">
                    <path fill="#fff"
                          d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z"></path>
                    <path fill="#fff"
                          d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z"></path>
                    <path fill="#cfd8dc"
                          d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z"></path>
                    <path fill="#40c351"
                          d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z"></path>
                    <path fill="#fff" fill-rule="evenodd"
                          d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z"
                          clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </main>

</div>


{{--<script src="{{asset('landing_assets/js/vendors/counterup.js')}}" type="module"></script>--}}
{{--<script src="{{asset('landing_assets/js/vendors/swiper-bundle.min.js')}}"></script>--}}
{{--<script src="{{asset('landing_assets/js/vendors/fslightbox.js')}}"></script>--}}
{{--<script src="{{asset('landing_assets/js/vendors/jos.min.js')}}"></script>--}}
{{--<script src="{{asset('landing_assets/js/vendors/menu.js')}}"></script>--}}



{{--<script src="{{asset('landing_assets/js/main.js')}}"></script>--}}
{{--<script src="{{asset('landing_assets/js/glightbox.min.js')}}"></script>--}}
{{--<script src="{{asset('landing_assets/js/custom-glightbox.js')}}"></script>--}}



{{--Ajax for add to cart--}}
<script>

    const cartbutton = document.querySelectorAll('.cartbutton')
    const cartform = document.querySelectorAll('.cartform')
    const cartCount = document.getElementById('cartCount')


    cartbutton.forEach((el, index) => {
        el.addEventListener('click', (event) => {
            @auth
            event.preventDefault();
            @endauth
            var formData = new FormData(cartform[index]);
            fetch(cartform[index].action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => {
                    if (response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(data => {

                })
                .catch(error => {
                    console.error('Error:', error);
                });


            cartCount.style.display = 'block'
            if (cartCount.innerText.trim() === '') {
                cartCount.innerHTML = 1
            } else {
                cartCount.innerHTML = parseInt(cartCount.innerHTML) + 1

            }

        })

    })

</script>


</body>

</html>