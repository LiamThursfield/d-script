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

        <header>
            <div class="bg-gray-900 py-4 relative shadow-md text-green-700 w-full z-10">
                <div class="container flex flex-row justify-center mx-auto relative px-4">
                    <a
                        class="font-mono text-xl"
                        href="{{ route('home')}}"
                    >
                        {{ config('appName', 'd-script') }}
                    </a>
                </div>
            </div>
        </header>

        <main>
            <div class="container flex mt-8 mx-auto px-4">

                <div class="error-content-container">

                    <div class="bg-gray-900 font-mono p-3 rounded-lg shadow-xl">

                        <div class="flex flex-row">
                            <div class="bg-red-600 h-4 mr-2 rounded-full w-4"></div>
                            <div class="bg-yellow-600 h-4 mr-2 rounded-full w-4"></div>
                            <div class="bg-green-600 h-4 rounded-full w-4"></div>
                        </div>

                        <div class="flex flex-col items-center justify-center px-20 py-16 text-center">
                            <h1 class="text-red-800 text-6xl">
                                @yield('code')
                            </h1>
                            <h2 class="text-red-900 text-xl">
                                @yield('message')
                            </h2>
                        </div>


                        <div class="flex justify-center -mx-2 text-lg md:text-xl">
                            <a
                                class="
                                    flex-1 mx-2 px-6 py-1 opacity-75 rounded-full text-center text-gray-600
                                    hover:opacity-100
                                "
                                href="{{ route('home') }}"
                            >
                                Home
                            </a>

                            <a
                                class="
                                    flex-1 mx-2 px-6 py-1 opacity-75 rounded-full text-center text-gray-600
                                    hover:opacity-100
                                "
                                href="{{ route('admin.index') }}"
                            >
                                Admin
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </main>

        @include('layouts.partials.footer.footer')
    </div>
</body>
</html>
