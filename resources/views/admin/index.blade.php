@extends('layouts.admin')

@section('content')
<div class="container flex mt-8 mx-auto px-4">

    <div class="admin-content-container">

        <div>
            <h1 class="text-2xl">
                Dashboard
            </h1>
        </div>

        @include('admin._partials.session-card')

        <div class="bg-gray-900 border-green-800 border-l-4 mt-8 p-6 rounded-l rounded-r-lg shadow-lg">
            <p>
                Welcome {{ auth()->user()->name }}.
            </p>
        </div>

        @if(count($sites) > 0)

            <div class="flex flex-row items-center justify-between -mb-4 mt-12">
                <h2 class=" text-xl">
                    <span class="text-green-800">&gt;&nbsp;</span>
                    Latest Sites
                </h2>

                <div class="inline-block ml-auto">
                    <a
                        class="
                            block border border-gray-800 inline-block px-3 py-1 rounded-lg text-gray-700 text-sm
                            duration-100 ease-in-out transition-colors
                            hover:border-green-800 hover:text-green-800
                        "
                            href="{{ route('admin.sites.index') }}"
                    >
                        View All
                    <a>
                </div>
            </div>

            @include('admin._partials.sites.list', ['sites' => $sites])
        @endif

    </div>

</div>
@endsection
