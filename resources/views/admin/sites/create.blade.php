@extends('layouts.admin')

@section('content')
    <div class="container flex my-8 mx-auto px-4">

        <form
            class="admin-content-container"
            action="{{ route('admin.sites.store') }}"
            method="POST"
        >

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
                    New Site
                </h1>
            </div>

            @include('admin._partials.session-card')

            <div class="bg-gray-900 mt-8 overflow-hidden px-6 py-6 rounded-lg shadow-lg">
                @csrf

                <!-- Site Name -->
                <two-col-input-group
                    @error('name')
                        error_class="text-red-600"
                        error_message="{{ $message }}"
                    @enderror
                    label_class="text-gray-700 md:w-48"
                    label_text="Name"
                    input_id="name"
                    input_name="name"
                    :input_required="true"
                    input_type="text"
                    input_value="{{ old('name') }}"
                ></two-col-input-group>


                <div class="border-t border-gray-800 h-1 my-6 w-full"></div>


                <!-- Git Path -->
                <two-col-input-group
                    @error('git_path')
                        error_class="text-red-600"
                        error_message="{{ $message }}"
                    @enderror
                    label_class="text-gray-700 md:w-48"
                    label_text="Git Path"
                    input_id="git_path"
                    input_name="git_path"
                    :input_required="true"
                    input_type="text"
                    input_value="{{ old('git_path') }}"
                ></two-col-input-group>

                <!-- SSH Key Path -->
                <two-col-input-group
                    class="mt-4"
                    label_class="text-gray-700 md:w-48"
                    label_text="SSH Key Path"
                    input_id="ssh_key_path"
                    input_name="ssh_key_path"
                    input_placeholder="(Leave blank if ssh is not required)"
                    input_type="text"
                    input_value="{{ old('ssh_key_path') }}"
                ></two-col-input-group>


                <div class="border-t border-gray-800 h-1 my-6 w-full"></div>


                <!-- Site Directory -->
                <two-col-input-group
                    class="mt-4"
                    label_class="text-gray-700 md:w-48"
                    label_text="Site Directory"
                    input_id="site_directory"
                    input_name="site_directory"
                    :input_required="true"
                    input_type="text"
                    input_value="{{ old('site_directory') }}"
                ></two-col-input-group>

                <!-- Current Release Directory -->
                <two-col-input-group
                    class="mt-4"
                    label_class="text-gray-700 md:w-48"
                    label_text="Current Release Directory"
                    input_id="current_release_directory"
                    input_name="current_release_directory"
                    :input_required="true"
                    input_type="text"
                    input_value="{{ old('current_release_directory') }}"
                ></two-col-input-group>

                <!-- Releases Directory -->
                <two-col-input-group
                    class="mt-4"
                    label_class="text-gray-700 md:w-48"
                    label_text="Releases Directory"
                    input_id="releases_directory"
                    input_name="releases_directory"
                    :input_required="true"
                    input_type="text"
                    input_value="{{ old('releases_directory') }}"
                ></two-col-input-group>


                <div class="border-t border-gray-800 h-1 my-6 w-full"></div>


                <!-- Persistent Directory -->
                <two-col-input-group
                    class="mt-4"
                    label_class="text-gray-700 md:w-48"
                    label_text="Persistent Directory"
                    input_id="persistent_directory"
                    input_name="persistent_directory"
                    :input_required="true"
                    input_type="text"
                    input_value="{{ old('persistent_directory') }}"
                ></two-col-input-group>

                <!-- Persistent Files -->
                <div class="flex input-group items-start mt-4 relative z-10">
                    <label
                        class="pt-2 text-gray-700 md:text-right md:w-48"
                        for="_persistent_files_input"
                    >
                        Persistent Files
                    </label>

                    <div
                        class="
                            flex-1 mt-1 outline-none rounded text-gray-600 w-full
                            md:ml-6 md:mt-0
                        "
                    >
                        <persistent-files-input
                            @if(old('persistent_files'))
                                :original_input="{{ json_encode(old('persistent_files')) }}"
                            @endif
                        ></persistent-files-input>
                    </div>
                </div>


                <div class="border-t border-gray-800 h-1 my-6 w-full"></div>


                <!-- Pre Activation Script -->
                <div class="flex input-group items-start mt-4 relative z-10">
                    <label
                        class="pt-2 text-gray-700 md:text-right md:w-48"
                        for="pre_activation_script"
                    >
                        Pre-Activation Script
                    </label>

                    <div
                        class="
                            flex-1 mt-1 outline-none rounded text-gray-600 w-full
                            md:ml-6 md:mt-0
                        "
                    >
                        <activation-script-input
                            input_name="pre_activation_script"
                            @if(old('pre_activation_script'))
                                :original_input="{{ json_encode(old('pre_activation_script')) }}"
                            @endif
                        ></activation-script-input>
                    </div>
                </div>


                <div class="border-t border-gray-800 h-1 my-6 w-full"></div>


                <!-- Pre Activation Script -->
                <div class="flex input-group items-start mt-4 relative z-10">
                    <label
                        class="pt-2 text-gray-700 md:text-right md:w-48"
                        for="post_activation_script"
                    >
                        Post-Activation Script
                    </label>

                    <div
                        class="
                            flex-1 mt-1 outline-none rounded text-gray-600 w-full
                            md:ml-6 md:mt-0
                        "
                    >
                        <activation-script-input
                            input_name="post_activation_script"
                            @if(old('post_activation_script'))
                                :original_input="{{ json_encode(old('post_activation_script')) }}"
                            @endif
                        ></activation-script-input>
                    </div>
                </div>
            </div>

            <div class="flex flex-row items-center justify-end mt-8">
                <button type="submit" class="btn btn-outline btn-green shadow-lg">
                    Save
                </button>
            </div>
        </form>

    </div>
@endsection
