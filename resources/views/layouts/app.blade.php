<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">

    <title>{{ config('app.name', 'SITAHIR') }}</title>

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
    @include('layouts.navigation', ['profile' => $profile, 'instalasi' => $instalasi ])

    <!-- main content -->
    <section class="home-section p-4">
        {{ $slot }}
    </section>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
    <script>
        $(function() {
            $('#profilemodal').modal('show');
        });
    </script>
    @endif

    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 6)
    <script>
        $(function() {
            $('#pills-proses-tab').tab('show');
        });
    </script>
    @endif

    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 7)
    <script>
        $(function() {
            $('#pills-selesai-tab').tab('show');
        });
    </script>
    @endif

    <!-- modal tambah anggota (admin) -->
    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 8)
    <script>
        $(function() {
            $('#tambah').modal('show');
        });
    </script>
    @endif

    <!-- modal edit anggota (admin) -->
    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 9)
    <script>
        $(function() {
            $('#edit' + "{{ Session::get('id') }}").modal('show');
        });
    </script>
    @endif

    <!-- nav pending show after fill instalasi form from new ins (admin) -->
    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 10)
    <script>
        $(function() {
            $('#pills-pending-tab').tab('show');
        });
    </script>
    @endif

    <!-- nav lunas show after bayar (admin) -->
    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 11)
    <script>
        $(function() {
            $('#pills-lunas-tab').tab('show');
        });
    </script>
    @endif

    <!-- nav jadwal show after jadwalkan (admin) -->
    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 12)
    <script>
        $(function() {
            $('#pills-pasang-tab').tab('show');
        });
    </script>
    @endif

    <!-- nav penjadwalan pernanganan keluhan (admin) -->
    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 13)
    <script>
        $(function() {
            $('#pills-proses-tab').tab('show');
        });
    </script>
    @endif

    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 14)
    <script>
        $(function() {
            $('#tambah').modal('show');
        });
    </script>
    @endif
</body>

</html>