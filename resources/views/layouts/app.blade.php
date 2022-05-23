<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">

    <!-- Line Awesome -->
    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Chart Js -->
    <script src="{{ asset('js/chart.js') }}"></script>
</head>

<body>
    <!-- navigation -->
    @include('layouts.navigation', ['profile' => $profile])

    <!-- main content -->
    <section class="home-section p-4">
        {{ $slot }}
    </section>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>