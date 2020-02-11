@extends('layouts.app')

@section('content')

<div class="flex flex-wrap h-100 items-center justify-center min-h-screen p-3 w-100">
    <div class="bg-gray-900 font-mono p-3 rounded-lg shadow-xl">

        <div class="flex flex-row">
            <div class="bg-red-600 h-4 mr-2 rounded-full w-4"></div>
            <div class="bg-yellow-600 h-4 mr-2 rounded-full w-4"></div>
            <div class="bg-green-600 h-4 rounded-full w-4"></div>
        </div>

        <h1 class="flex items-center justify-center px-20 py-16 text-center text-green-800 text-5xl">
            {{ config('app.name', 'd-script') }}
        </h1>


        <div class="flex justify-center -mx-2 text-lg md:text-xl">
            @auth
                <a
                    class="
                        flex-1 mx-2 px-6 py-1 rounded-full text-center text-gray-500
                        hover:text-gray-100
                    "
                    href="{{ url('/admin') }}"
                >
                    Admin
                </a>
            @else
                <a
                    class="
                        flex-1 mx-2 px-6 py-1 rounded-full text-center text-gray-500
                        hover:text-gray-100
                    "
                    href="{{ route('login') }}"
                >
                    Login
                </a>

                @if (Route::has('register'))
                    <a
                        class="
                            flex-1 mx-2 px-6 py-1 rounded-full text-center text-gray-500
                            hover:text-gray-100
                        "
                        href="{{ route('register') }}"
                    >
                        Register
                    </a>
                @endif
            @endauth
        </div>
    </div>
</div>

@endsection