<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        
        @include('layouts.nav')


        <div class="container mt-3">
            <div class="row">
                <div class=" col-lg-3 p-3 position-sticky">
                    @include('dashboard.right-side-bar')
                </div>
                <div class=" col-lg-9 p-3">
                    @yield('content')
                </div>
            </div>
        </div>


        {{-- <main class="py-4">
            @yield('content')
        </main> --}}
    </div>
</body>
</html>
