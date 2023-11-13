<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page - Ternama Konveksi</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="theme-color" content="#ffffff">

    @stack('head')

    <!-- Vendors CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="/assets/vendors/fontawesome-pro-5/css/all.css" />
    <link rel="stylesheet" href="/assets/vendors/bootstrap-select/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="/assets/vendors/slick/slick.min.css" />
    <link rel="stylesheet" href="/assets/vendors/magnific-popup/magnific-popup.min.css" />
    <link rel="stylesheet" href="/assets/vendors/jquery-ui/jquery-ui.min.css" />
    <link rel="stylesheet" href="/assets/vendors/animate.css" />
    {{-- <link rel="stylesheet" href="/assets/vendors/mapbox-gl/mapbox-gl.min.css" /> --}}
    <!-- Themes core CSS -->
    <link rel="stylesheet" href="/assets/css/themes.min.css" />
    @stack('css')
</head>

<body>

    @include('layouts.frontend.header', ['header' => 'dark'])
    <main id="content">
        @yield('container')
    </main>

    @include('layouts.frontend.footer')

    <!-- Vendors scripts -->
    <script src="/assets/vendors/jquery.min.js"></script>
    <script src="/assets/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <script src="/assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="/assets/vendors/slick/slick.min.js"></script>
    <script src="/assets/vendors/waypoints/jquery.waypoints.min.js"></script>
    {{-- <script src="/assets/vendors/counter/countUp.js"></script> --}}
    <script src="/assets/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="/assets/vendors/hc-sticky/hc-sticky.min.js"></script>
    {{-- <script src="/assets/vendors/jparallax/TweenMax.min.js"></script> --}}
    {{-- <script src="/assets/vendors/mapbox-gl/mapbox-gl.js"></script> --}}
    <!-- Theme scripts -->
    <script src="/assets/js/theme.min.js"></script>
    <script src="/assets/js/custom.js"></script>

    <div class="position-fixed pos-fixed-bottom-right p-6 z-index-10">
        <a href="#"
            class="gtf-back-to-top border border-white bg-white text-primary hover-white bg-hover-primary shadow p-0 w-52px h-52 rounded-circle fs-20 d-flex align-items-center justify-content-center"
            title="Back To Top"><i class="fal fa-arrow-up"></i></a>
    </div>
    <div class="floating_btn">
        <a target="_blank" href="https://wa.me/" class="gtf-back-to-top">
            <div class="contact_icon">
                <i class="fab fa-whatsapp"></i>
            </div>
        </a>
    </div>
    @include('layouts.frontend.sidenav')
</body>

</html>
