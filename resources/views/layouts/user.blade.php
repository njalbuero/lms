<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Browash Laundry</title>

    @livewireStyles
    <!-- Favicon -->
    <link rel="icon" href="{{asset('img/brand/favicon.png')}}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('css/argon.css')}}" type="text/css">
    @stack('styles')
</head>

<body>

    <body class="bg-default g-sidenav-show g-sidenav-pinned" style="">
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
                style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <!-- Navbar -->
        @include('layouts.partials.user_nav')
        <!-- Main content -->
        <div class="main-content">
            {{$slot}}
        </div>


        @livewireScripts
        <!-- Argon Scripts -->
        <!-- Core -->
        <script src="{{asset('vendor/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('vendor/js-cookie/js.cookie.js')}}"></script>
        <script src="{{asset('vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
        <script src="{{asset('vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
        <!-- Optional JS -->
        <script src="{{asset('vendor/chart.js/dist/Chart.min.js')}}"></script>
        <script src="{{asset('vendor/chart.js/dist/Chart.extension.js')}}"></script>
        <!-- Argon JS -->
        <script src="{{asset('js/argon.js')}}"></script>
        {{-- Alpine JS --}}
        <script src="//unpkg.com/alpinejs" defer></script>
        @stack('scripts')
    </body>

</html>