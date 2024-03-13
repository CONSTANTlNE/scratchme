<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Azzle - AI Technology & Startup HTML Template</title>
    <meta name="description" content="AIMass Tailwind based SASS Template" />

    <!-- Favicon  -->
    <link rel="icon" href="landing_assets/img/favicon.png" />

    <!-- Site font -->
    <link href="{{asset('')}}landing_assets/fonts/fonts.css" rel="stylesheet" />

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('landing_assets/css/vendors/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('landing_assets/css/vendors/jos.css')}}" />
    <link rel="stylesheet" href="{{asset('landing_assets/css/vendors/menu.css')}}" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('landing_assets/css/custom.css')}}" />

    <!-- Development css -->
    <link href="{{asset('landing_assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('landing_assets/css/language.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Production css -->
    <!-- <link rel="stylesheet" href="landing_assets/css/style.min.css"> -->
</head>

<body style="background-color: #f6f6f6 ">
    <div class="page-wrapper relative z-[1] bg-white">
        <!--...::: Header Start :::... -->
        @include('landing_components.header')
        <!--...::: Header End :::... -->

        <main class="main-wrapper relative overflow-hidden">
            <!--...::: Hero Section Start :::... -->
            <section id="hero-section" >
                <div style="height: 100vh" class="relative overflow-hidden bg-cover bg-[url('../img/th-2/content-shape.jpg')]  bg-no-repeat text-white">
                    <!-- Section Spacer -->
                    <div class="pb-28 pt-28 md:pb-40 lg:pt-28 xl:pb-[120px] xl:pt-[122px]">
                        <!-- Section Container -->
                        <div class="global-container">
                            <div class="grid grid-cols-1 items-center gap-10 md:grid-cols-[minmax(0,_1fr)_0.7fr]">
                                <!-- Hero Content -->
                                <div>
                                    <h1
                                        class="jos mb-6 max-w-md break-words font-clashDisplay text-5xl font-medium leading-none text-white md:max-w-full md:text-6xl lg:text-7xl xl:text-8xl xxl:text-[100px]">
                                        Enhance your communication skills with AI
                                    </h1>
                                    <p class="jos mb-11">
                                        Meet your customers on the most popular messaging channels
                                        with an AI chatbot. It understands the customer
                                        experience. Our AI chatbot benefits users by providing
                                        instant support, 24/7 availability, and efficient response
                                        to queries.
                                    </p>
                                    <a href="https://www.example.com"
                                        class="jos button relative z-[1] inline-flex items-center gap-3 rounded-[50px] border-none bg-colorViolet py-[18px] text-white after:bg-colorOrangyRed hover:text-white">Start
                                        Chatting for Free
                                        <img src="landing_assets/img/th-2/icon-white-long-arrow-right.svg"
                                            alt="icon-white-long-arrow-right" /></a>
                                </div>
                                <!-- Hero Content -->
                                <!-- Hero Image -->
{{--                                <div  class="hero-img animate-pulse overflow-hidden rounded-2xl bg-black text-right">--}}
{{--                                    <img src="landing_assets/img/th-2/hero-img-2.png" alt="hero-img-2" width="1296" height="640"--}}
{{--                                        class="h-auto w-full" />--}}
{{--                                </div>--}}
                                <!-- Hero Image -->
                            </div>
                        </div>
                        <!-- Section Container -->
                    </div>
                    <!-- Section Spacer -->

                    <!-- Background Gradient -->
                    <div
                        class="absolute left-1/2 top-[80%] h-[1280px] w-[1280px] -translate-x-1/2 rounded-full bg-gradient-to-t from-[#5636C7] to-[#5028DD] blur-[250px]">
                    </div>

                </div>
            </section>
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
                        <div style="background-color: #ebebeb!important;" class="pb-20 pt-20 md:pb-36 md:pt-5 lg:pb-28 xl:pb-[220px] ">
                            <!-- Section Container -->
                            <div class="global-container">
                                <div
                                        class="grid grid-cols-1 items-center gap-12 md:grid-cols-2 lg:gap-20 xl:grid-cols-[minmax(0,_.8fr)_1fr] xl:gap-28 xxl:gap-[134px]">
                                    <!-- Content Left Block -->
                                    <div class="jos order-2 mt-16 rounded-md md:order-1 md:mt-0" data-jos_animation="fade-up">
                                        <div
                                                class="relative h-[494px]  rounded-tl-[20px] rounded-tr-[20px]  bg-cover bg-no-repeat">
                                            @foreach($product->media as $img)
                                                <img style="height:100%" src="{{$img->getUrl()}}" alt="th2-content-img-1.png"

                                                     class="absolute bottom-0 left-1/2 h-[564px] w-[320px] -translate-x-1/2" />
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
                                                Expression of like human attitude
                                            </h2>
                                        </div>
                                        <!-- Section Content Block -->
                                        <div class="text-lg leading-[1.66]">
                                            <p class="mb-7 last:mb-0">
                                            {{$product->product_short_description}}
                                            </p>
                                            <ul class="mt-12 flex flex-col gap-y-6 font-clashDisplay text-[22px] font-medium leading-[1.28] tracking-[1px] lg:text-[28px]">
                                               @foreach($product->features as $feature)
                                                    <li class="relative pl-[35px] after:absolute after:left-[10px] after:top-3 after:h-[15px] after:w-[15px] after:rounded-[50%] after:bg-colorViolet" >
                                                      {{$feature->feature}}
                                                    </li>
                                               @endforeach


                                            </ul>
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
                        <div style="background-color: #ebebeb!important;" class="pb-20 md:pb-36 lg:pb-28 xl:pb-[220px]">
                            <!-- Section Container -->
                            <div class="global-container">
                                <div class="grid grid-cols-1 items-center gap-12 md:grid-cols-2 lg:gap-20 xl:grid-cols-[minmax(0,_1fr)_.8fr] xl:gap-28 xxl:gap-[134px]">
                                    <!-- Content Right Block -->
                                    <div class="jos order-2 mt-16 rounded-md md:mt-0" data-jos_animation="fade-up">
                                        <div class="relative h-[494px] rounded-tl-[20px] rounded-tr-[20px] bg-cover bg-no-repeat">
                                            @foreach($product->media as $img)
                                            <img style="height:100%" src="{{$img->getUrl()}}" alt="th2-content-img-2.png"
                                                 class="absolute bottom-0 left-1/2 h-[564px] w-[320px] -translate-x-1/2" />
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- Content Right Block -->
                                    <!-- Content Left Block -->
                                    <div class="jos order-1" data-jos_animation="fade-right">
                                        <!-- Section Content Block -->
                                        <div class="mb-6">
                                            <h2 class="font-clashDisplay text-4xl font-medium leading-[1.06] sm:text-[44px] lg:text-[56px] xl:text-[75px]">
                                               {{$product->product_name}}
                                            </h2>
                                        </div>
                                        <!-- Section Content Block -->
                                        <div class="text-lg leading-[1.66]">
                                            <p class="mb-7 last:mb-0">
                                                {{$product->product_short_description}}
                                            </p>
                                            <ul>
                                                @foreach($product->features as $feature)
                                                    <li class="relative pl-[35px] after:absolute after:left-[10px] after:top-3 after:h-[15px] after:w-[15px] after:rounded-[50%] after:bg-colorViolet" >
                                                        {{$feature->feature}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
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
>


            <!--...::: Testimonial Section Start :::... -->

            <!--...::: Testimonial Section Start :::... -->

            <!-- Separator -->
            <div class="global-container">
                <div class="h-[1px] w-full bg-[#EAEDF0]"></div>
            </div>
            <!-- Separator -->

            <!--...::: Blog Section Start :::... -->
            <div id="blog-section">
                <!-- Section Spacer -->
                <div class="py-20 xl:py-[130px]">
                    <!-- Section Container -->
                    <div class="global-container">
                        <!-- Section Content Block -->
                        <div
                            class="jos mx-auto mb-10 text-center md:mb-16 md:max-w-xl lg:mx-0 lg:mb-20 lg:max-w-[636px] lg:text-left">
                            <h2
                                class="font-clashDisplay text-4xl font-medium leading-[1.06] sm:text-[44px] lg:text-[56px] xl:text-[75px]">
                                Find out more in our recent blogs
                            </h2>
                        </div>
                        <!-- Section Content Block -->

                        <!-- Blog List -->
                        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                            <!-- Blog Post Single Item -->
                            <article
                                class="jos group overflow-hidden rounded-[10px] bg-white shadow-[0_4px_80px_rgba(0,0,0,0.08)]"
                                data-jos_delay="0.1">
                                <!-- Blog Image -->
                                <a href="blog-details.html"
                                    class="block h-[320px] w-full overflow-hidden rounded-[30px]">
                                    <img src="landing_assets/img/th-1/blog-main-1.jpg" alt="blog-main-1" width="416"
                                        height="320"
                                        class="h-full w-full scale-100 object-cover transition-all duration-300 group-hover:scale-105" />
                                </a>
                                <!-- Blog Image -->
                                <!-- Blog Content -->
                                <div class="p-6">
                                    <h5
                                        class="mb-7 font-clashDisplay font-medium leading-[1.28] tracking-[1px] text-[28] hover:text-colorViolet">
                                        <a href="blog-details.html">
                                            AI Chatbot: It essential for customer self-service</a>
                                    </h5>
                                    <div class="flex items-center justify-between gap-x-4">
                                        <span>23 June 2024</span>
                                        <a href="blog-details.html" class="h-[30px] w-[30px]">
                                            <img src="landing_assets/img//th-2/icon-blue-long-arrow-right.svg"
                                                alt="icon-blue-long-arrow-right" width="30" height="30"
                                                class="transition-all duration-300 group-hover:-rotate-45" />
                                        </a>
                                    </div>
                                </div>
                                <!-- Blog Content -->
                            </article>
                            <!-- Blog Post Single Item -->
                            <!-- Blog Post Single Item -->
                            <article
                                class="jos group overflow-hidden rounded-[10px] bg-white shadow-[0_4px_80px_rgba(0,0,0,0.08)]"
                                data-jos_delay="0.2">
                                <!-- Blog Image -->
                                <a href="blog-details.html"
                                    class="block h-[320px] w-full overflow-hidden rounded-[30px]">
                                    <img src="landing_assets/img/th-1/blog-main-2.jpg" alt="blog-main-2" width="416"
                                        height="320"
                                        class="h-full w-full scale-100 object-cover transition-all duration-300 group-hover:scale-105" />
                                </a>
                                <!-- Blog Image -->
                                <!-- Blog Content -->
                                <div class="p-6">
                                    <h5
                                        class="mb-7 font-clashDisplay font-medium leading-[1.28] tracking-[1px] text-[28] hover:text-colorViolet">
                                        <a href="blog-details.html">
                                            How to build your own AI chatbot with custom data</a>
                                    </h5>
                                    <div class="flex items-center justify-between gap-x-4">
                                        <span>20 June 2024</span>
                                        <a href="blog-details.html" class="h-[30px] w-[30px]">
                                            <img src="landing_assets/img//th-2/icon-blue-long-arrow-right.svg"
                                                alt="icon-blue-long-arrow-right" width="30" height="30"
                                                class="transition-all duration-300 group-hover:-rotate-45" />
                                        </a>
                                    </div>
                                </div>
                                <!-- Blog Content -->
                            </article>
                            <!-- Blog Post Single Item -->
                            <!-- Blog Post Single Item -->
                            <article
                                class="jos group overflow-hidden rounded-[10px] bg-white shadow-[0_4px_80px_rgba(0,0,0,0.08)]"
                                data-jos_delay="0.3">
                                <!-- Blog Image -->
                                <a href="blog-details.html"
                                    class="block h-[320px] w-full overflow-hidden rounded-[30px]">
                                    <img src="landing_assets/img/th-1/blog-main-3.jpg" alt="blog-main-3" width="416"
                                        height="320"
                                        class="h-full w-full scale-100 object-cover transition-all duration-300 group-hover:scale-105" />
                                </a>
                                <!-- Blog Image -->
                                <!-- Blog Content -->
                                <div class="p-6">
                                    <h5
                                        class="mb-7 font-clashDisplay font-medium leading-[1.28] tracking-[1px] text-[28] hover:text-colorViolet">
                                        <a href="blog-details.html">
                                            8 best AI chatbot tools for boost your business</a>
                                    </h5>
                                    <div class="flex items-center justify-between gap-x-4">
                                        <span>18 June 2024</span>
                                        <a href="blog-details.html" class="h-[30px] w-[30px]">
                                            <img src="landing_assets/img//th-2/icon-blue-long-arrow-right.svg"
                                                alt="icon-blue-long-arrow-right" width="30" height="30"
                                                class="transition-all duration-300 group-hover:-rotate-45" />
                                        </a>
                                    </div>
                                </div>
                                <!-- Blog Content -->
                            </article>
                            <!-- Blog Post Single Item -->
                        </div>
                        <!-- Blog List -->
                    </div>
                    <!-- Section Container -->
                </div>
                <!-- Section Spacer -->
            </div>
            <!--...::: Blog Section Start :::... -->

            <!--...::: FAQ Section Start :::... -->
            <section id="faq-section">
                <!-- Section Spacer -->
                <div class="pb-40 xl:pb-[220px]">
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
                            <li class="jos accordion-item is-3 rounded-[10px] border-[1px] border-[#EAEDF0] bg-white px-7 py-[30px] active"
                                data-jos_delay="0.1">
                                <div class="accordion-header flex items-center justify-between">
                                    <h5
                                        class="font-clashDisplay text-xl font-medium leading-[1.2] tracking-[1px] lg:text-[28px]">
                                        What is Artificial Intelligence (AI)?
                                    </h5>
                                    <div class="accordion-icon is-blue">
                                        <img src="landing_assets/img/plus.svg" alt="plus" />
                                        <img src="landing_assets/img/plus-white.svg" alt="plus-white" />
                                    </div>
                                </div>
                                <div class="accordion-content text-lg text-[#2C2C2C]">
                                    <p>
                                        AI chatbots work by analyzing user input, understanding
                                        the intent behind the message, and providing relevant
                                        responses based on pre-defined rules or machine learning
                                        models. They can learn from user interactions to improve
                                        over time.
                                    </p>
                                </div>
                            </li>
                            <!-- Accordion items -->
                            <!-- Accordion items -->
                            <li class="jos accordion-item is-3 rounded-[10px] border-[1px] border-[#EAEDF0] bg-white px-7 py-[30px]"
                                data-jos_delay="0.1">
                                <div class="accordion-header flex items-center justify-between">
                                    <h5
                                        class="font-clashDisplay text-xl font-medium leading-[1.2] tracking-[1px] lg:text-[28px]">
                                        What are the benefits of using AI chatbots?
                                    </h5>
                                    <div class="accordion-icon is-blue">
                                        <img src="landing_assets/img/plus.svg" alt="plus" />
                                        <img src="landing_assets/img/plus-white.svg" alt="plus-white" />
                                    </div>
                                </div>
                                <div class="accordion-content text-lg text-[#2C2C2C]">
                                    <p>
                                        AI chatbots work by analyzing user input, understanding
                                        the intent behind the message, and providing relevant
                                        responses based on pre-defined rules or machine learning
                                        models. They can learn from user interactions to improve
                                        over time.
                                    </p>
                                </div>
                            </li>
                            <!-- Accordion items -->
                            <!-- Accordion items -->
                            <li class="jos accordion-item is-3 rounded-[10px] border-[1px] border-[#EAEDF0] bg-white px-7 py-[30px]"
                                data-jos_delay="0.1">
                                <div class="accordion-header flex items-center justify-between">
                                    <h5
                                        class="font-clashDisplay text-xl font-medium leading-[1.2] tracking-[1px] lg:text-[28px]">
                                        Can AI chatbots understand multiple languages?
                                    </h5>
                                    <div class="accordion-icon is-blue">
                                        <img src="landing_assets/img/plus.svg" alt="plus" />
                                        <img src="landing_assets/img/plus-white.svg" alt="plus-white" />
                                    </div>
                                </div>
                                <div class="accordion-content text-lg text-[#2C2C2C]">
                                    <p>
                                        AI chatbots work by analyzing user input, understanding
                                        the intent behind the message, and providing relevant
                                        responses based on pre-defined rules or machine learning
                                        models. They can learn from user interactions to improve
                                        over time.
                                    </p>
                                </div>
                            </li>
                            <!-- Accordion items -->
                            <!-- Accordion items -->
                            <li class="jos accordion-item is-3 rounded-[10px] border-[1px] border-[#EAEDF0] bg-white px-7 py-[30px]"
                                data-jos_delay="0.1">
                                <div class="accordion-header flex items-center justify-between">
                                    <h5
                                        class="font-clashDisplay text-xl font-medium leading-[1.2] tracking-[1px] lg:text-[28px]">
                                        Can AI chatbots provide personalized responses?
                                    </h5>
                                    <div class="accordion-icon is-blue">
                                        <img src="landing_assets/img/plus.svg" alt="plus" />
                                        <img src="landing_assets/img/plus-white.svg" alt="plus-white" />
                                    </div>
                                </div>
                                <div class="accordion-content text-lg text-[#2C2C2C]">
                                    <p>
                                        AI chatbots work by analyzing user input, understanding
                                        the intent behind the message, and providing relevant
                                        responses based on pre-defined rules or machine learning
                                        models. They can learn from user interactions to improve
                                        over time.
                                    </p>
                                </div>
                            </li>
                            <!-- Accordion items -->
                            <!-- Accordion items -->
                            <li class="jos accordion-item is-3 rounded-[10px] border-[1px] border-[#EAEDF0] bg-white px-7 py-[30px]"
                                data-jos_delay="0.1">
                                <div class="accordion-header flex items-center justify-between">
                                    <h5
                                        class="font-clashDisplay text-xl font-medium leading-[1.2] tracking-[1px] lg:text-[28px]">
                                        How can I integrate an AI chatbot into my business or
                                        website?
                                    </h5>
                                    <div class="accordion-icon is-blue">
                                        <img src="landing_assets/img/plus.svg" alt="plus" />
                                        <img src="landing_assets/img/plus-white.svg" alt="plus-white" />
                                    </div>
                                </div>
                                <div class="accordion-content text-lg text-[#2C2C2C]">
                                    <p>
                                        AI chatbots work by analyzing user input, understanding
                                        the intent behind the message, and providing relevant
                                        responses based on pre-defined rules or machine learning
                                        models. They can learn from user interactions to improve
                                        over time.
                                    </p>
                                </div>
                            </li>
                            <!-- Accordion items -->
                        </ul>
                        <!-- Accordion-->
                    </div>
                    <!-- Section Container -->
                </div>
                <!-- Section Spacer -->
            </section>
            <!--...::: FAQ Section End :::... -->
        </main>

        <!--...::: Footer-2 Section Start :::... -->
        @include('landing_components.footer')
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
</body>

</html>