<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- ============== Meta tag ================== -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 , shrink-to-fit=no">
        <meta name="description" content="Website SIFEST 2022">
        <meta name="keywords" content="UNSRI, HIMSI, Sistem Informasi, SIFEST 2022, SIFEST">
        <meta name="author" content="Divisi PTI Sifest 2022">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- ============= Fav Icon ================ -->
        <link rel="icon" href="{{ asset("../../img/assets/logo_sifest.png") }}" type="image/png" />

        <!-- ============= CSS Link ================= -->
        @if ($nav["active"] === "Home")
            <link rel="stylesheet" href="{{ url("scss/home/home.css") }}">
        @elseif ($nav["active"] === "Register")
            <link rel="stylesheet" href="{{ url("scss/register/register.css") }}">
        @elseif ($nav["active"] === "Dashboard")
            <link rel="stylesheet" href="{{ url("scss/dashboard/dashboard.css") }}">
        @endif
        
        <link rel="stylesheet" href="{{ url('scss/main.css') }}">

        <!-- ============= Swiper js ================ -->
        <link rel="stylesheet" href="{{ url('vendor/swiperjs/swiper-bundle.min.css') }}">

        <!-- ============= Font Awesome ================ -->
        <link rel="stylesheet" href="{{ url('vendor/fontAwesome/css/all.min.css') }}">

        <!-- =============== Title =================== -->
        <title>{{ $title }}</title>

    </head>
    <body>

        @yield('index')

        
        <!-- ============= Jquery ================ -->
        <script src="{{ url('vendor/jquery/jquery-3.6.0.js') }}"></script>

        <!-- ============= Swiper js ================ -->
        <script src="{{ url('vendor/swiperjs/swiper-bundle.min.js') }}"></script>
        
        <!-- ============= Java Script ================ -->
        @if ($nav["active"] === "Home")
            <script src="{{ url("js/home/home.js") }}"></script>
        @elseif ($nav["active"] === "Dashboard")
            <script src="{{ url("js/dashboard/dashboard.js") }}"></script>
        @endif
        
        @if ($nav["active"] === "Register" || $nav["active"] === "Home" || $nav['active'] === "Dashboard")
            <script src="{{ url("js/register/register.js") }}"></script>
        @endif
        
    </body>
</html>
