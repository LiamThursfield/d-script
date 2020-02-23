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
                    </span>
                    {{ $site->name }}
                </h1>
            </div>

            <div class="bg-gray-900 mt-8 overflow-hidden px-6 py-6 rounded-lg shadow-lg">
                <!-- Git URL -->
                <two-col-input-group
                    label_class="text-gray-700 md:w-48"
                    label_text="Git URL"
                    input_id="git_url"
                    :input_disabled="true"
                    input_name="git_url"
                    input_type="text"
                    input_value="{{ $site->git_url }}"
                ></two-col-input-group>

                <!-- SSH Path -->
                <two-col-input-group
                    class="mt-4"
                    label_class="text-gray-700 md:w-48"
                    label_text="SSH Path"
                    input_id="ssh_path"
                    :input_disabled="true"
                    input_name="ssh_path"
                    input_placeholder="(Leave blank if ssh is not required)"
                    input_type="text"
                    input_value="{{ $site->ssh_key_path }}"
                ></two-col-input-group>


                <div class="border-t border-gray-800 h-1 my-6 w-full"></div>


                <!-- Site Directory -->
                <two-col-input-group
                    class="mt-4"
                    label_class="text-gray-700 md:w-48"
                    label_text="Site Directory"
                    input_id="site_directory"
                    :input_disabled="true"
                    input_name="site_directory"
                    input_type="text"
                    input_value="{{ $site->site_directory }}"
                ></two-col-input-group>

                <!-- Current Release Directory -->
                <two-col-input-group
                    class="mt-4"
                    label_class="text-gray-700 md:w-48"
                    label_text="Current Release Directory"
                    input_id="current_release_directory"
                    :input_disabled="true"
                    input_name="current_release_directory"
                    input_type="text"
                    input_value="{{ $site->current_release_directory }}"
                ></two-col-input-group>

                <!-- Releases Directory -->
                <two-col-input-group
                    class="mt-4"
                    label_class="text-gray-700 md:w-48"
                    label_text="Releases Directory"
                    input_id="releases_directory"
                    :input_disabled="true"
                    input_name="releases_directory"
                    input_type="text"
                    input_value="{{ $site->releases_directory }}"
                ></two-col-input-group>


                <div class="border-t border-gray-800 h-1 my-6 w-full"></div>


                <!-- Persistent Directory -->
                <two-col-input-group
                    class="mt-4"
                    label_class="text-gray-700 md:w-48"
                    label_text="Persistent Directory"
                    input_id="persistent_directory"
                    :input_disabled="true"
                    input_name="persistent_directory"
                    input_type="text"
                    input_value="{{ $site->persistent_directory }}"
                ></two-col-input-group>

                <!-- Persistent Files -->
                <div class="flex input-group items-start mt-4 relative z-10">
                    <label
                        class="text-gray-700 md:text-right md:w-48"
                        for="persistent_files"
                    >
                        Persistent Files
                    </label>

                    <div
                        class="
                            bg-gray-850 border border-gray-800 flex-1 mt-1 outline-none px-3 rounded text-gray-600
                            md:ml-6 md:mt-0
                        "
                    >
                        <input
                            id="persistent_files"
                            name="persistent_files"
                            type="hidden"
                            value="{{ json_encode($site->persistent_files) }}"
                        >

                        @forelse($site->persistent_files as $persistent_file)
                            <div class="py-2">
                                {{ $persistent_file }}
                            </div>
                        @empty
                            <div class="py-2 text-gray-700">
                                No persistent files
                            </div>
                        @endforelse
                    </div>
                </div>


                <div class="border-t border-gray-800 h-1 my-6 w-full"></div>


                <!-- Pre Activation Script -->
                <div class="flex input-group items-start mt-4 relative z-10">
                    <label
                        class="text-gray-700 md:text-right md:w-48"
                        for="pre_activation_script"
                    >
                        Pre-Activation Script
                    </label>

                    <div
                        class="
                            bg-gray-850 border border-gray-800 flex-1 mt-1 outline-none px-3 rounded text-gray-600
                            md:ml-6 md:mt-0
                        "
                    >
                        <input
                            id="pre_activation_script"
                            name="pre_activation_script"
                            type="hidden"
                            value="{{ json_encode($site->pre_activation_script) }}"
                        >

                        @forelse($site->pre_activation_script as $pre_activation_script)
                            <div
                                class="
                                    py-2
                                    @if(!$pre_activation_script['active']) text-gray-700 @endif
                                "
                            >
                                @if(!$pre_activation_script['active'])// @endif
                                {{ $pre_activation_script['command'] }}
                            </div>
                        @empty
                            <div class="py-2 text-gray-700">
                                No Pre-Activation Script
                            </div>
                        @endforelse
                    </div>
                </div>


                <div class="border-t border-gray-800 h-1 my-6 w-full"></div>


                <!-- Pre Activation Script -->
                <div class="flex input-group items-start mt-4 relative z-10">
                    <label
                        class="text-gray-700 md:text-right md:w-48"
                        for="post_activation_script"
                    >
                        Post-Activation Script
                    </label>

                    <div
                        class="
                            bg-gray-850 border border-gray-800 flex-1 mt-1 outline-none px-3 rounded text-gray-600
                            md:ml-6 md:mt-0
                        "
                    >
                        <input
                            id="post_activation_script"
                            name="post_activation_script"
                            type="hidden"
                            value="{{ json_encode($site->post_activation_script) }}"
                        >

                        @forelse($site->post_activation_script as $post_activation_script)
                            <div
                                class="
                                    py-2
                                    @if(!$post_activation_script['active']) text-gray-700 @endif
                                "
                            >
                                @if(!$post_activation_script['active'])// @endif
                                {{ $post_activation_script['command'] }}
                            </div>
                        @empty
                            <div class="py-2 text-gray-700">
                                No Post-Activation Script
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="flex flex-row items-center justify-end mt-8">
                <a href="" class="btn btn-outline btn-green shadow-lg">
                    Generate Script
                </a>
            </div>
        </div>

    </div>
@endsection
