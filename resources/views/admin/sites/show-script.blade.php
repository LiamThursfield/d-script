@extends('layouts.admin')

@section('content')
    <div class="container flex my-8 mx-auto px-4">

        <div class="admin-content-container">

            @include('admin._partials.session-card')

            <div class="flex flex-row items-baseline">
                <h1 class="text-2xl">
                    <span class="text-gray-700">
                        <a
                            class="hover:text-green-700"
                            href="{{ route('admin.sites.index') }}"
                        >
                            Sites
                        </a>
                        &nbsp&bull;&nbsp;
                        <a
                            class="hover:text-blue-700"
                            href="{{ route('admin.sites.show', $site) }}"
                        >
                            {{ $site->name }}
                        </a>
                        &nbsp&bull;&nbsp;
                    </span>
                    d-script
                </h1>
            </div>

            <div class="bg-gray-900 mt-8 overflow-hidden px-6 py-6 rounded-lg shadow-lg">

                <p class="font-mono">
                    {{ $site_script }}
                </p>

            </div>

            <div class="flex flex-row items-center justify-end mt-8">
                <a href="{{ route('admin.sites.show-script', $site) }}" class="btn btn-outline btn-green shadow-lg">
                    Re-generate Script
                </a>
            </div>
        </div>

    </div>
@endsection
