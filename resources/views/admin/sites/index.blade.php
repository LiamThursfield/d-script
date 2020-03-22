@extends('layouts.admin')

@section('content')
    <div class="container flex mt-8 mx-auto px-4">

        <div class="admin-content-container">

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

            @include('admin._partials.session-card')

            @if(count($sites) > 0)
                @include('admin._partials.sites.list', ['sites' => $sites])

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
