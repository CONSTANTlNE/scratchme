<!doctype html>
<html lang="en">
@php
    //dd($languages);
@endphp
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Azzle - AI Technology & Startup HTML Template</title>
    <meta name="description" content="AIMass Tailwind based SASS Template"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon  -->
    <link rel="icon" href="landing_assets/img/favicon.png"/>

    <!-- Site font -->
    <link href="{{asset('')}}landing_assets/fonts/fonts.css" rel="stylesheet"/>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('landing_assets/css/vendors/swiper-bundle.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('landing_assets/css/vendors/jos.css')}}"/>
    <link rel="stylesheet" href="{{asset('landing_assets/css/vendors/menu.css')}}"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('landing_assets/css/custom.css')}}"/>

    <!-- Development css -->
    <link href="{{asset('landing_assets/css/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('landing_assets/css/language.css')}}" rel="stylesheet"/>
    <link href="{{asset('landing_assets/css/cart.css')}}" rel="stylesheet"/>
    <link href="{{asset('landing_assets/css/glightbox.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <!-- Production css -->

</head>

<body style="background-color: #f6f6f6 ">
<div class="page-wrapper relative z-[1] bg-white">
    <!--...::: Header Start :::... -->
    @include('landing_components.header')
    <!--...::: Header End :::... -->

    <main style="background-color: #ebebeb!important;" class="main-wrapper relative overflow-hidden">
        <!--...::: Hero Section Start :::... -->
{{--        <section id="hero-section">--}}
            <div style="height: 100vh;position: relative;padding-top: 4%;"
{{--                 bg-[url('../img/th-2/content-shape.jpg')]--}}                >
{{--                position: absolute;	right: 0;	bottom: 0--}}
                <video style="width: 100%;height: 100%;object-fit:fill;"
                       src="{{asset('landing_assets/video.mp4')}}" class="vid-bg" autoplay loop muted></video>
                <!-- Section Spacer -->
{{--                <div class="pb-28 pt-28 md:pb-40 lg:pt-28 xl:pb-[120px] xl:pt-[122px]">--}}
{{--                    <div class="global-container">--}}
{{--                        <div class="text-center grid grid-cols-1 items-center gap-10 md:grid-cols-[1.1fr_minmax(0,_1fr)],_1fr)_0.7fr]">--}}
{{--                            <!-- Hero Content -->--}}
{{--                            <div>--}}
{{--                                <h1--}}
{{--                                        class="jos mb-6 max-w-md break-words font-clashDisplay text-5xl font-medium leading-none text-white md:max-w-full md:text-6xl lg:text-7xl xl:text-8xl xxl:text-[100px]">--}}
{{--                                    Enhance your communication skills with AI--}}
{{--                                </h1>--}}
{{--                                <p class="jos mb-11">--}}
{{--                                    Meet your customers on the most popular messaging channels--}}
{{--                                    with an AI chatbot. It understands the customer--}}
{{--                                    experience. Our AI chatbot benefits users by providing--}}
{{--                                    instant support, 24/7 availability, and efficient response--}}
{{--                                    to queries.--}}
{{--                                </p>--}}

{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- Section Spacer -->

                <!-- Background Gradient -->
{{--                <div--}}
{{--                        class="absolute left-1/2 top-[80%] h-[1280px] w-[1280px] -translate-x-1/2 rounded-full bg-gradient-to-t from-[#5636C7] to-[#5028DD] blur-[250px]">--}}
{{--                </div>--}}

            </div>
{{--        </section>--}}
        <!--...::: Hero Section End :::... -->

        <!--...::: Feature Section Start :::... -->

        <!--...::: Feature Section End :::... -->

        <!-- Separator -->
        <div class="global-container">
            <div class="h-[1px] w-full bg-[#EAEDF0]"></div>
        </div>
        <!-- Separator -->
        <!--...::: Content Section Start :::... -->
        @foreach($products as $index=> $product)
            @if($loop->even)
                <!--...::: Content Section End :::... -->
                <section id="content-section-1">
                    <!-- Section Spacer -->
                    <div style="background-color: #ebebeb!important;"
                         class="pb-20 pt-20 md:pb-36 md:pt-5 lg:pb-28 xl:pb-[220px] ">
                        <!-- Section Container -->
                        <div class="global-container">
                            <div
                                    class="grid grid-cols-1 items-center gap-12 md:grid-cols-2 lg:gap-20 xl:grid-cols-[minmax(0,_.8fr)_1fr] xl:gap-28 xxl:gap-[134px]">
                                <!-- Content Left Block -->
                                <div class="jos order-2 mt-16 rounded-md md:order-1 md:mt-0"
                                     data-jos_animation="fade-up">
                                    <div
                                            class="relative h-[494px]  rounded-tl-[20px] rounded-tr-[20px]  bg-cover bg-no-repeat">
                                        @foreach($product->media as $img)
                                            <a href="{{$img->getUrl()}}" class="defaultGlightbox">
                                            <img style="height:100%;border-radius: 15px" src="{{$img->getUrl()}}"
                                                 alt="th2-content-img-1.png"

                                                 class="  absolute bottom-0 left-1/2 h-[564px] w-[320px] -translate-x-1/2"/>
                                            </a>
                                        @endforeach

                                    </div>

                                </div>
                                <!-- Content Left Block -->
                                <!-- Content Right Block -->
                                <div class="jos order-1 md:order-2" data-jos_animation="fade-right">
                                    <!-- Section Content Block -->
                                    <div class="mb-6">
                                        <h2
                                                class="font-clashDisplay text-4xl font-medium leading-[1.06] sm:text-[44px] lg:text-[56px] xl:text-[75px]">
                                            {{$product->product_name}}
                                        </h2>
                                    </div>
                                    <!-- Section Content Block -->
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
                                            <span style="color:red" class="badge bg-secondary/10 text-secondary ltr:float-right rtl:float-left text-[0.625rem]">
                                              {{$product->prices->last()->discount}}% ფასდაკლება
                                            </span>
                                        @endif
                                        <ul class="mt-7 flex flex-col gap-y-6 font-clashDisplay text-[22px] font-medium leading-[1.28] tracking-[1px] lg:text-[18px]">
                                            @foreach($product->features as $feature)
                                                <li class="relative pl-[35px] after:absolute after:left-[10px] after:top-3 after:h-[15px] after:w-[15px] after:rounded-[50%] after:bg-black">
                                                    {{$feature->feature}}
                                                </li>
                                            @endforeach
                                        </ul>
                                        <form class="cartform" style="display: inline" action="{{route('addItem')}}"
                                              method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <input type="hidden" name="price_id" value="{{$product->prices->last()->id}}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button data-productid="{{$product->id}}"
                                                    class="cartbutton button relative z-[1] inline-flex items-center gap-3 rounded-[50px] border-none bg-colorViolet py-[18px] text-white after:bg-black hover:text-white mt-7">
                                                Add to Cart
                                            </button>
                                        </form>
                                        <a href="{{route('allproduct')}}"
                                           class="button relative z-[1] inline-flex items-center gap-3 rounded-[50px] border-none bg-colorViolet py-[18px] text-white after:bg-black hover:text-white mt-7">All
                                            Products</a>
                                    </div>
                                </div>
                                <!-- Content Right Block -->
                            </div>
                        </div>
                        <!-- Section Container -->
                    </div>
                    <!-- Section Spacer -->
                </section>
            @else
                <section id="content-section-2">
                    <!-- Section Spacer -->
                    <div style="background-color: #ebebeb!important;"
                         class="pb-20 md:pb-36 lg:pb-28 xl:pb-[220px] mt-7">
                        <!-- Section Container -->
                        <div class="global-container">
                            <div class="grid grid-cols-1 items-center gap-12 md:grid-cols-2 lg:gap-20 xl:grid-cols-[minmax(0,_1fr)_.8fr] xl:gap-28 xxl:gap-[134px]">
                                <!-- Content Right Block -->
                                <div class="jos order-2 mt-16 rounded-md md:mt-0" data-jos_animation="fade-up">
                                    <div class="relative h-[494px] rounded-tl-[20px] rounded-tr-[20px] bg-cover bg-no-repeat">
{{--                                        @php dd($product->getMedia("*")) @endphp--}}
                                        @foreach($product->getMedia('product_image') as $index2 => $img)
                                            <a href="{{$img->getUrl()}}" class="defaultGlightbox">
                                            <img style="height:100%;border-radius: 15px" src="{{$img->getUrl()}}"
                                                 alt="th2-content-img-2.png"
                                                 class="absolute bottom-0 left-1/2 h-[564px] w-[320px] -translate-x-1/2"/>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Content Right Block -->
                                <!-- Content Left Block -->
                                <div class="jos order-1" data-jos_animation="fade-right">
                                    <!-- Section Content Block -->
                                    <div class="mb-6">
                                        <h2 class=" font-clashDisplay text-4xl font-medium leading-[1.06] sm:text-[44px] lg:text-[56px] xl:text-[75px]">
                                            {{$product->product_name}}
                                        </h2>
                                    </div>
                                    <!-- Section Content Block -->
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
                                            <span style="color:red" class="badge bg-secondary/10 text-secondary ltr:float-right rtl:float-left text-[0.625rem]">
                                              {{$product->prices->last()->discount}}% ფასდაკლება
                                            </span>
                                            @endif
                                        </p>

                                        <ul class="mt-7 flex flex-col gap-y-6 font-clashDisplay text-[22px] font-medium leading-[1.28] tracking-[1px] lg:text-[16px]">
                                            @foreach($product->features as $feature)
                                                <li class="relative pl-[35px] after:absolute after:left-[10px] after:top-3 after:h-[15px] after:w-[15px] after:rounded-[50%] after:bg-black">
                                                    {{$feature->feature}}
                                                </li>
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
                                                class="cartbutton button relative z-[1] inline-flex items-center gap-3 rounded-[50px] border-none bg-colorViolet py-[18px] text-white after:bg-black hover:text-white mt-7">
                                            Add to Cart
                                        </button>
                                    </form>
                                    <a href="{{route('allproduct')}}"
                                       class="button relative z-[1] inline-flex items-center gap-3 rounded-[50px] border-none bg-colorViolet py-[18px] text-white after:bg-black hover:text-white mt-7">All
                                        Products</a>
                                </div>
                                <!-- Content Left Block -->
                            </div>
                        </div>
                        <!-- Section Container -->
                    </div>
                    <!-- Section Spacer -->
                </section>
            @endif
        @endforeach



        <!--...::: Testimonial Section Start :::... -->

        <!--...::: Testimonial Section Start :::... -->

        <!-- Separator -->
        <div class="global-container">
            <div class="h-[1px] w-full bg-[#EAEDF0]"></div>
        </div>
        <!-- Separator -->


        <!--...::: FAQ Section Start :::... -->
        <section id="faq-section">
            <!-- Section Spacer -->
            <div class="pb-35 xl:pb-[150px]]">
                <!-- Section Container -->
                <div class="global-container">
                    <!-- Section Content Block -->
                    <div
                            class="jos mx-auto mb-10 text-center md:mb-16 md:max-w-xl lg:mb-20 lg:max-w-3xl xl:max-w-[856px]">
                        <h2
                                class="font-clashDisplay text-4xl font-medium leading-[1.06] sm:text-[44px] lg:text-[56px] xl:text-[75px]">
                            AI Chatbot FAQs for more information
                        </h2>
                    </div>
                    <!-- Section Content Block -->
                    <!-- Accordion-->
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
                                        {{$faq->answer}}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                        <li id="contact" style="background-color: #ebebeb!important;padding-bottom: 70px"
                            class="jos accordion-item is-3 rounded-[10px] border-[1px] border-[#EAEDF0] bg-white px-7 py-[30px] "
                            data-jos_delay="0.1">
                            <div style="background-color: #ebebeb!important;" class="flex justify-center gap-3">
                                <a href="https://www.facebook.com/profile.php?id=100069933595746" target="_blank">
                                    <svg style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
                                        <path fill="#3f51b5" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"></path><path fill="#fff" d="M29.368,24H26v12h-5V24h-3v-4h3v-2.41c0.002-3.508,1.459-5.59,5.592-5.59H30v4h-2.287 C26.104,16,26,16.6,26,17.723V20h4L29.368,24z"></path>
                                    </svg>
                                </a>
                                <a href="https://m.me/100069933595746" target="_blank">
                                    <svg style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
                                        <path fill="#448aff" d="M24,4C13.5,4,5,12.1,5,22c0,5.2,2.3,9.8,6,13.1V44l7.8-4.7c1.6,0.4,3.4,0.7,5.2,0.7	c10.5,0,19-8.1,19-18S34.5,4,24,4z"></path><path fill="#fff" d="M12,28l10-11l5,5l9-5L26,28l-5-5L12,28z"></path>
                                    </svg>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <!-- Accordion-->
                </div>
                <!-- Section Container -->
            </div>
            <!-- Section Spacer -->
        </section>

    </main>

    <!--...::: Footer-2 Section Start :::... -->
    {{--    @include('landing_components.footer')--}}
    <!--...::: Footer-2 Section End :::... -->
</div>

<!--Vendor js-->
<script src="{{asset('landing_assets/js/vendors/counterup.js')}}" type="module"></script>
<script src="{{asset('landing_assets/js/vendors/swiper-bundle.min.js')}}"></script>
<script src="{{asset('landing_assets/js/vendors/fslightbox.js')}}"></script>
<script src="{{asset('landing_assets/js/vendors/jos.min.js')}}"></script>
<script src="{{asset('landing_assets/js/vendors/menu.js')}}"></script>


<!-- Main js -->
<script src="{{asset('landing_assets/js/main.js')}}"></script>


<script src="{{asset('landing_assets/js/glightbox.min.js')}}"></script>
<script src="{{asset('landing_assets/js/custom-glightbox.js')}}"></script>

<script>

    const cartbutton = document.querySelectorAll('.cartbutton')
    const cartform = document.querySelectorAll('.cartform')
    const cartCount = document.getElementById('cartCount')
    console.log(cartCount.innerText.trim() === '')

    cartbutton.forEach((el, index) => {
        el.addEventListener('click', (event) => {
            event.preventDefault();
            var formData = new FormData(cartform[index]);
            fetch(cartform[index].action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(data => {
                    // Handle the server response data
                    // console.log(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });

            cartCount.style.display = 'block'
            if(cartCount.innerText.trim() === ''){
                cartCount.innerHTML = 1
            }else{
                cartCount.innerHTML = parseInt(cartCount.innerHTML) + 1

            }

        })

    })

</script>

</body>

</html>