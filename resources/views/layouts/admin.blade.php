<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.head.gtm')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LaravelBaseApp') }}</title>

    <!-- Scripts -->
    @include('layouts.partials.head.routes-script')
    <script src="{{ mix('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Share Tech Mono" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-850">
    <div
        id="app"
        class="flex flex-col min-h-screen"
    >

        <header-main></header-main>

        <main>
            @yield('content')
        </main>


        @include('layouts.partials.footer.footer')
    </div>
</body>
</html>
