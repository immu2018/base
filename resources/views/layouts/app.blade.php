<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tabler/tabler.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tabler/tabler-flags.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tabler/tabler-payments.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tabler/tabler-vendors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tabler/demo.min.css') }}" rel="stylesheet">



   
</head>
<body>
    <div class="page">
        @include('layouts.header')

        <div class="page-wrapper">
 
            <div class="page-content">
                @yield('content')
            </div>

            @include('layouts.footer')
        </div>
    </div>
</body>
</html>
