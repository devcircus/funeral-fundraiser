<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="cache-control" content="no-cache" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fundraiser') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/notify.css') }}" rel="stylesheet">
</head>

<body class="font-lato">
    <base-app>
        @include('layouts.partials.nav')
        <div class="container mx-auto">
            @yield('content')
        </div>
    </base-app>

    <!-- Scripts -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @yield('javascripts')
</body>

</html>