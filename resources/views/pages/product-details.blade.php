<!doctype html>
<html lang="en">
@php
//dd($allProducts)
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

</head>

<body>
<div class="page-wrapper relative z-[1] bg-white">
    <!--...::: Header Start :::... -->
    @include('landing_components.header')
    <!--...::: Header End :::... -->

    <main style="background-color: #ebebeb!important;" class="main-wrapper relative overflow-hidden">
        <!--...::: Breadcrumb Section Start :::... -->
        <section id="section-breadcrumb">
            <!-- Section Spacer -->
            <div class="breadcrumb-wrapper" style="padding:120px 0 50px;margin-bottom: 3rem;background-color: #ebebeb!important;">
                <!-- Section Container -->
{{--                <div class="global-container">--}}
{{--                    <div class="breadcrumb-block">--}}
{{--                        <h1 class="breadcrumb-title">Blog Details</h1>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- Section Container -->
            </div>
            <!-- Section Spacer -->
        </section>
        <!--...::: Breadcrumb Section End :::... -->

        <!--...::: Blog Section Start :::... -->
        <div class="blog-section">
            <!-- Section Spacer -->
            <div class="pb-40 xl:pb-[220px]">
                <!-- Section Container -->
                <div class="global-container">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 lg:grid-cols-[1fr,minmax(416px,_0.5fr)]">
                        <div class="flex flex-col gap-y-10 lg:gap-y-14 xl:gap-y-20">
                            <!-- Blog Post Details -->
                            <div class="flex flex-col gap-6">
                                <!-- Blog Post Text Area -->
                                <article style="background-color: #ebebeb!important;" class="jos overflow-hidden bg-white">
                                    <div class="mb-7 block overflow-hidden rounded-[10px]">
                                        @foreach($product->media as $img)
                                            <a href="{{$img->getUrl()}}" class="defaultGlightbox">
                                                @if($loop->first)
                                        <img src="{{$img->getUrl()}}"
                                             alt="blog-main-1" width="856"
                                             height="540" class="h-auto w-full scale-100 object-cover"/>
                                                @endif
                                            </a>
                                        @endforeach
                                    </div>
                                    <!-- Blog Post Meta -->

                                    <!-- Blog Post Meta -->
                                    <h1 style="font-size: 28px" class="mb-3 mt-5">
                                        {{$product->product_name}}

                                    </h1>
                                    <p class="mb-7 last:mb-0">
                                       {!! $product->product_long_description !!}
                                    </p>


{{--                                    <ul class="mb-7 flex flex-col gap-7 last:mb-0">--}}
{{--                                        <li>--}}
{{--                                            <div class="font-semibold">--}}
{{--                                                1. AI-Powered Customer Support--}}
{{--                                            </div>--}}
{{--                                            <p class="mb-7 last:mb-0">--}}
{{--                                                AI chatbots and virtual assistants can handle--}}
{{--                                                routine queries, troubleshoot issues, and guide--}}
{{--                                                users, improving response times. This frees up human--}}
{{--                                                agents to tackle complex tasks, enhancing user--}}
{{--                                                experience.--}}
{{--                                            </p>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="font-semibold">--}}
{{--                                                2. Predictive Maintenance--}}
{{--                                            </div>--}}
{{--                                            <p class="mb-7 last:mb-0">--}}
{{--                                                By analyzing usage patterns, ML algorithms can--}}
{{--                                                predict failures, enabling proactive maintenance and--}}
{{--                                                minimizing downtime.--}}
{{--                                            </p>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="font-semibold">--}}
{{--                                                3. Enhanced Cybersecurity--}}
{{--                                            </div>--}}
{{--                                            <p class="mb-7 last:mb-0">--}}
{{--                                                AI anomaly detection, behavior analysis, and--}}
{{--                                                intrusion prevention boost security and data--}}
{{--                                                protection. This safeguards infrastructure and--}}
{{--                                                builds user trust.--}}
{{--                                            </p>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="font-semibold">--}}
{{--                                                4. Personalized User Experiences--}}
{{--                                            </div>--}}
{{--                                            <p class="mb-7 last:mb-0">--}}
{{--                                                By analyzing behavior and preferences, AI tailors--}}
{{--                                                interfaces and features. This improves satisfaction--}}
{{--                                                and encourages retention.--}}
{{--                                            </p>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="font-semibold">--}}
{{--                                                5. Automated Workflows--}}
{{--                                            </div>--}}
{{--                                            <p class="mb-7 last:mb-0">--}}
{{--                                                Automating tasks like software updates and license--}}
{{--                                                management with AI reduces manual efforts and--}}
{{--                                                minimizes errors.--}}
{{--                                            </p>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
                                </article>
                                <!-- Blog Post Text Area -->

                                <div class="rounded-[10px] border border-[#EAEDF0] p-8 justify-center">
                                    <form class="cartform" style="display: inline" action="{{route('addItem')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="quantity" value="1">
                                    <button style="margin:auto!important;width: 200px" type="submit"
                                            class="cartbutton m-auto button  block rounded-[50px] border-2 border-black bg-black py-4 text-white after:bg-black hover:border-white hover:text-colorOrangyRed">
                                        ყიდვა
                                    </button>
                                    </form>
                                </div>
                            </div>
                            <!-- Blog Post Details -->

                        </div>
                        <!-- Blog Aside -->
                        <aside class="jos flex flex-col gap-y-[30px]">

                            <!-- Single Sidebar -->
                            <div class="rounded-[10px] border border-[#EAEDF0] p-8">
                                <div
                                        class="relative mb-[30px] inline-block pb-[10px] text-lg font-semibold after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:bg-black">
                                    Other Products
                                </div>

                                <!-- Blog Recent Post List -->
                                <ul class="flex flex-col gap-y-6">
                                    @foreach($allProducts as $index=> $product)
                                        @php
//                                            dd($product)
                                        @endphp
                                    <li class="group flex flex-col items-center gap-x-4 gap-y-4 sm:flex-row">
                                        <a href="{{route('productDetails',$product->slug)}}"
                                           class="inline-block h-[150px] w-full overflow-hidden rounded-[5px] sm:h-[100px] sm:w-[150px]">
                                            @foreach($product->media as $media)

                                            <img src="{{$media->getUrl()}}"
                                                 alt="blog-recent-img-1"
                                                 width="150" height="130"
                                                 class="h-full w-full scale-100 object-cover transition-all duration-300 group-hover:scale-105"/>
                                            @endforeach
                                        </a>
                                        <div class="flex w-full flex-col gap-y-3 sm:w-auto sm:flex-1">
                                            <a style="word-wrap: break-word;" href="{{route('productDetails',$product->slug)}}"
                                               class="text-base font-bold hover:text-colorOrangyRed">
                                               {{$product->product_name}}
                                            </a>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                <!-- Blog Recent Post List -->
                            </div>
                            <!-- Single Sidebar -->

                            <!-- Single Sidebar -->

                            <!-- Single Sidebar -->
                        </aside>
                        <!-- Blog Aside -->
                    </div>
                </div>
                <!-- Section Container -->
            </div>
            <!-- Section Spacer -->
        </div>
        <!--...::: Blog Section End :::... -->
    </main>

    <!--...::: Footer Section Start :::... -->

    <!--...::: Footer Section End :::... -->
</div>


<!--Vendor js-->
<script src="{{asset('landing_assets/js/vendors/counterup.js')}}" type="module"></script>
<script src="{{asset('landing_assets/js/vendors/swiper-bundle.min.js')}}"></script>
<script src="{{asset('landing_assets/js/vendors/fslightbox.js')}}"></script>
<script src="{{asset('landing_assets/js/vendors/jos.min.js')}}"></script>
<script src="{{asset('landing_assets/js/vendors/menu.js')}}"></script>

<script src="{{asset('landing_assets/js/glightbox.min.js')}}"></script>
<script src="{{asset('landing_assets/js/custom-glightbox.js')}}"></script>

{{--<!-- Main js -->--}}
<script src="{{asset('landing_assets/js/main.js')}}"></script>


<script>
    const cartbutton=document.querySelectorAll('.cartbutton')
    const cartform=document.querySelectorAll('.cartform')
    const cartCount=document.getElementById('cartCount')

    cartbutton.forEach((el,index)=>{
        el.addEventListener('click',(event)=>{
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

            cartCount.style.display='block'
            cartCount.innerHTML=parseInt(cartCount.innerHTML)+1

        })

    })


</script>
</body>

</html>