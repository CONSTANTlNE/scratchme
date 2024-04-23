<!doctype html>
<html lang="en">
@php
    //dd($allProducts)
@endphp
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ScratchMe</title>
    <meta name="description" content="AIMass Tailwind based SASS Template"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('landing_assets/scratchme/Yellow-removebg-preview.png')}}"/>



    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>

</head>

<body>
<div class="page-wrapper relative z-[1] bg-white">

    @include('landing_components.header')


    <main style="background-color: #ebebeb!important;" class="main-wrapper relative overflow-hidden">

        <section id="section-breadcrumb">

            <div class="breadcrumb-wrapper"
                 style="padding:120px 0 50px;margin-bottom: 3rem;background-color: #ebebeb!important;">

            </div>

        </section>

        <div class="blog-section">

            <div class="pb-40 xl:pb-[220px]">

                <div class="global-container">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 lg:grid-cols-[1fr,minmax(416px,_0.5fr)]">
                        <div class="flex flex-col gap-y-10 lg:gap-y-14 xl:gap-y-20">
                            <div class="flex flex-col gap-6">
                                <article style="background-color: #ebebeb!important;"
                                         class="jos overflow-hidden bg-white">
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
                                    <h1 style="font-size: 28px" class="mb-3 mt-5">
                                        {{$product->product_name}}

                                    </h1>
                                    <p class="mb-7 last:mb-0">
                                        {!! $product->product_long_description !!}
                                    </p>

                                </article>
                                <div class="rounded-[10px] border border-[#EAEDF0] p-8 justify-center">
                                    <form class="cartform" style="display: inline" action="{{route('addItem')}}"
                                          method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button style="margin:auto!important;width: 200px" type="submit"
                                                class="cartbutton m-auto button  block rounded-[50px]  bg-colorblack py-[18px] text-white hover:text-black mt-7">
                                            {{__('Add to Cart')}}
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <!-- Blog Post Details -->

                        </div>

                        <aside class="jos flex flex-col gap-y-[30px]">

                            <div class="rounded-[10px] border border-[#EAEDF0] p-8">
                                <div
                                        class="relative mb-[30px] inline-block pb-[10px] text-lg font-semibold after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:bg-black">
                                    {{__('Other Products')}}
                                </div>

                                <ul class="flex flex-col gap-y-6">
                                    @foreach($allProducts as $index=> $product)
                                        <li class="group flex flex-col items-center gap-x-4 gap-y-4 sm:flex-row">
                                            <a href="{{route('productDetails',$product->slug)}}"
                                               class="inline-block h-[150px] w-full overflow-hidden rounded-[5px] sm:h-[100px] sm:w-[150px]">
                                                @foreach($product->media as $media)
                                                    @if($loop->first)
                                                        <img src="{{$media->getUrl()}}"
                                                             alt="blog-recent-img-1"
                                                             width="150" height="130"
                                                             class="h-full w-full scale-100 object-cover transition-all duration-300 group-hover:scale-105"/>
                                                    @endif
                                                @endforeach
                                            </a>
                                            <div class="flex w-full flex-col gap-y-3 sm:w-auto sm:flex-1">
                                                <a style="word-wrap: break-word;"
                                                   href="{{route('productDetails',$product->slug)}}"
                                                   class="text-base font-bold hover:text-colorOrangyRed">
                                                    {{$product->product_name}}
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>


<script>
    const cartbutton = document.querySelectorAll('.cartbutton')
    const cartform = document.querySelectorAll('.cartform')
    const cartCount = document.getElementById('cartCount')

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
            cartCount.innerHTML = parseInt(cartCount.innerHTML) + 1

        })

    })


</script>
</body>

</html>