@extends('layouts.admin')

@section('content')
    <div class="container flex mt-8 mx-auto px-4">

        <div class="max-w-3xl mx-auto w-full">

            @include('admin._partials.session-card')

            @if(count($sites) > 0)
            <div class="bg-gray-900 mt-8 overflow-hidden py-6 rounded-lg shadow-lg">
                <h1 class="font-mono px-6 text-green-700 text-2xl">
                    Sites
                </h1>

                <ul class="mt-2">
                    @foreach($sites as $site)
                        <li>
                            <a
                                class="
                                    block px-6 py-3 text-green-700
                                    transition-color transition-duration-default transition-ease transition-padding
                                    hover:text-green-400 hover:pl-8
                                "
                                href="{{ route('admin.sites.show', $site) }}"
                            >
                                <span class="font-mono opacity-50"> > </span>
                                {{ $site->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-4 text-center">
                {!! $sites->links() !!}
            </div>
            @else
                <div>
                    You currently have no sites set up.&nbsp;
                    <a href="{{ route('admin.sites.create') }}">
                        Create one
                    </a>
                    &nbsp;now.
                </div>
            @endif

        </div>

    </div>
@endsection
