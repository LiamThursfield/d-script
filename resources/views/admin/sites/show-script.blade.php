@extends('layouts.admin')

@section('content')
    <div class="container flex my-8 mx-auto px-4">

        <div class="admin-content-container">

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
                            class="hover:text-green-700"
                            href="{{ route('admin.sites.show', $site) }}"
                        >
                            {{ $site->name }}
                        </a>
                        &nbsp&bull;&nbsp;
                    </span>
                    d-script
                </h1>
            </div>

            @include('admin._partials.session-card')

            <show-script
                :site="{{ json_encode($site) }}"
                site_script="{{ $site_script }}"
            ></show-script>

        </div>

    </div>
@endsection
