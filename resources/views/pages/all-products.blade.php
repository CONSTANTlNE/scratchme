<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Azzle - AI Technology & Startup HTML Template</title>
    <meta name="description" content="AIMass Tailwind based SASS Template" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <link href="{{asset('landing_assets/css/cart.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- lightBox -->
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
</head>

<body style="background-color: #f6f6f6 ">
    <div class="page-wrapper relative z-[1] bg-white">
        <!--...::: Header Start :::... -->
        @include('landing_components.header')
        <!--...::: Header End :::... -->

        <main  class="main-wrapper relative overflow-hidden">

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
{{--                        <div style="margin:auto!important;" class="jos mx-auto mb-10 text-center md:mb-16 md:max-w-xl lg:mx-0 lg:mb-20 lg:max-w-[636px] lg:text-left">--}}
{{--                            <h2--}}
{{--                                class="font-clashDisplay text-4xl font-medium leading-[1.06] sm:text-[44px] lg:text-[56px] xl:text-[75px]">--}}
{{--                                Find out more in our recent blogs--}}
{{--                            </h2>--}}
{{--                        </div>--}}
                        <!-- Section Content Block -->

                        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3 mt-5">
                            @foreach($products as $product)
                            <article
                                class="jos group overflow-hidden rounded-[10px] bg-white shadow-[0_4px_80px_rgba(0,0,0,0.08)] text-center"
                                data-jos_delay="0.1">
                                <!-- Blog Image -->
                                <a href="{{route('productDetails',$product->slug)}}"
                                    class="block h-[320px] w-full overflow-hidden rounded-[30px]">
                                    @foreach($product->media as $img)
                                    <img src="{{$img->getUrl()}}" alt="blog-main-1" width="416"
                                        height="320"
                                        class=" h-[320px] rounded-[30px] w-full scale-100 object-cover transition-all duration-300 group-hover:scale-105"
                                         data-caption="{{$product->product_short_description}}">

                                    @endforeach
                                </a>
                                <!-- Blog Image -->
                                <!-- Blog Content -->
                                <div class="p-6">
                                    <h2 style="font-size: 28px"
                                        class="mb-5 font-clashDisplay font-medium leading-[1.28] tracking-[1px] text-[28] hover:text-colorViolet">
                                            {{$product->product_short_description}}
                                    </h2>
                                    <p>{{$product->prices->last()->price}} ₾</p>
                                </div>
                                <form class="cartform" style="display: inline" action="{{route('addItem')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="price_id" value="{{$product->prices->last()->id}}">
                                    <input type="hidden" name="quantity" value="1">
                                <button data-productid="90" style="margin-bottom: 15px!important;margin-top:0" class="cartbutton button relative z-[1] inline-flex items-center gap-3 rounded-[50px] border-none bg-colorViolet py-[18px] text-white after:bg-black hover:text-white mt-5">
                                    Add to Cart
                                </button>
                                </form>
                                <!-- Blog Content -->
                            </article>
                            @endforeach
                            <!-- Blog Post Single Item -->
                        </div>
                        <!-- Blog List -->
                    </div>
                    <!-- Section Container -->
                </div>
                <!-- Section Spacer -->
            </div>
            <div id="contact" class="flex justify-center gap-3 mb-7">
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
        </main>

    </div>

    <!--Vendor js-->
    <script src="{{asset('landing_assets/js/vendors/counterup.js')}}" type="module"></script>
    <script src="{{asset('landing_assets/js/vendors/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('landing_assets/js/vendors/fslightbox.js')}}"></script>
    <script src="{{asset('landing_assets/js/vendors/jos.min.js')}}"></script>
    <script src="{{asset('landing_assets/js/vendors/menu.js')}}"></script>

    <!-- Main js -->
    <script src="{{asset('landing_assets/js/main.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

<script>
    // Fancybox.bind("[data-fancybox]", {
    // // Your custom options
    // });
</script>
</body>



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

            cartCount.style.display = 'block'
            if(cartCount.innerText.trim() === ''){
                cartCount.innerHTML = 1
            }else{
                cartCount.innerHTML = parseInt(cartCount.innerHTML) + 1

            }

        })

    })

</script>

</html>