<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BD-Turf | @yield('title')</title>
    {{-- ion icon css  --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    {{-- animate css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.css') }}">
    {{-- home stepper css  --}}
    @stack('usersteppercss')
    {{-- custom owl carousel css --}}
    @stack('owlcarouselcss')

    {{-- for server  --}}

    <link rel="stylesheet" href="{{ asset('build/assets/app-fthieMNU.css') }}">
    <script src="{{ asset('build/assets/app-vZDQhnJA.js') }}"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>

<body class="font-manrope">
    @include('partials.preloader')
    @include('components.navbar-main')
    {{ $slot }}


    @php
        use App\Models\Setting;
        $settings = Setting::first();
    @endphp

    @include('components.footer')

</body>
{{-- jquery js  --}}
<script src="{{ asset('assets/js/jquery.js') }}"></script>
{{-- ajax setup  --}}
<script type="module">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.animate.js') }}"></script>
<script src="{{ asset('assets/js/owl.lazyload.js') }}"></script>
{{-- preloader js  --}}
@stack('preloaderjs')
@stack('navbar-main')
@stack('owncarouseljs')

</html>
