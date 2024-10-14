<!doctype html>
<html lang="en">

<head>
    <title>BD-Turf | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- @include('partials.header') --}}

    @stack('steppercss')
    {{-- for local  --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('partials.header')

    {{-- for server  --}}
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-fthieMNU.css') }}"> --}}
    {{-- <script src="{{ asset('build/assets/app-vZDQhnJA.js') }}"></script> --}}

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script type="module" src="{{ asset('assets/js/index.js') }}"></script>

</head>

<body class="text-sm">

    @yield('body_override')

    {{ $slot }}

    @include('partials.scripts')

</body>

</html>
