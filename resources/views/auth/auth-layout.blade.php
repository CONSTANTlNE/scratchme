<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Azzle - AI Technology & Startup HTML Template</title>
    <meta name="description" content="AIMass Tailwind based SASS Template" />

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('landing_assets/img/favicon.png')}}" />

    <!-- Site font -->
    <link href="{{asset('landing_assets/fonts/fonts.css')}}" rel="stylesheet" />

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
    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->
</head>

<body>
<div class="page-wrapper relative z-[1] bg-white">
    <!--...::: Header Start :::... -->
    @include('landing_components.header')
    <!--...::: Header End :::... -->

    <main class="main-wrapper relative overflow-hidden">
        <!--...::: Login Section Start :::... -->
        @yield('register')
        @yield('login')
        @yield('password-reset')
        @yield('password-forgot')
        <!--...::: Login Section End :::... -->
    </main>

    <!--...::: Footer Section Start :::... -->
{{--    @include('landing_components.footer')--}}
    <!--...::: Footer Section End :::... -->
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