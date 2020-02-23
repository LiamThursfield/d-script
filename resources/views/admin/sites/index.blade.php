@extends('layouts.admin')

@section('content')
    <div class="container flex mt-8 mx-auto px-4">

        <div class="admin-content-container">

            @include('admin._partials.session-card')

            <div class="flex flex-row items-baseline justify-between">
                <h1 class="text-2xl">
                    Sites
                </h1>

                <div class="inline-block">
                <a
                    class="
                        block border border-gray-800 inline-block px-3 py-1 rounded-lg text-gray-700 text-sm
                        duration-100 ease-in-out transition-colors
                        hover:border-green-800 hover:text-green-800
                    "
                    href="{{ route('admin.sites.create') }}"
                >
                    New Site
                </a>
                </div>
            </div>

            @if(count($sites) > 0)
            <div class="bg-gray-900 mt-8 overflow-hidden py-1 rounded-lg shadow-lg">

                <ul class="mt-2">
                    @foreach($sites as $site)
                        <li>
                            <a
                                class="
                                    block px-6 py-3 font-mono
                                    duration-300 ease-in-out transition-all
                                    hover:text-green-700 hover:pl-8
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
                <div class="bg-gray-900 border-gray-600 border-l-4 mt-8 p-6 rounded-l rounded-r-lg shadow-lg">
                    <p>
                        You currently have no sites set up.&nbsp;
                        <a
                            class="text-green-700 hover:text-green-500"
                            href="{{ route('admin.sites.create') }}"
                        >
                            Add one
                        </a>
                        now.
                    </p>
                </div>
            @endif

        </div>

    </div>
@endsection
