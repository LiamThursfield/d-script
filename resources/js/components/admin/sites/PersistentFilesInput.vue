<template>
    <div>
        <!-- Hidden Input -->
        <input
            id="persistent_files"
            name="persistent_files"
            type="hidden"
            :value="persistent_files_string"
        >

        <!-- Add Persistent Files -->
        <div class="flex flex-row">
            <input
                class="
                    square
                    flex-1 rounded-l
                "
                id="_persistent_files_input"
                name="_persistent_files_input"
                ref="_persistent_files_input"
                type="text"
                v-model="new_file"
            >
            <button
                class="
                    border border-gray-800 border-l-0 rounded-r px-3
                    focus:outline-none focus:shadow-outline-white
                    duration-500 ease-in-out transition-shadow
                "
                @click.prevent="addFile()"
            >
                Add File
            </button>
        </div>

        <!-- Persistent Files-->
        <div class="flex flex-col mt-2">
            <div
                v-for="(persistent_file, key) in persistent_files"
                class="flex flex-row items-center mt-4"
                :key="key"
            >
                <input
                    class="
                        appearance-none bg-gray-850 border border-gray-800 flex-1 h-8 px-3 rounded-full text-gray-600
                        focus:outline-none focus:shadow-outline-white
                    "
                    type="text"
                    v-model="persistent_files[key]"
                >
                <button
                    class="
                        border border-red-900 flex h-8 items-center justify-center ml-3 rounded-full text-red-900 w-8
                        focus:outline-none focus:shadow-outline-white
                        hover:bg-red-900 hover:text-gray-300
                    "
                    @click.prevent="removeFile(key)"
                >
                    -
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import _ from 'lodash';

    export default {
        name: "PersistentFilesInput",
        props: {
            original_input: {
                default: () => { return []; },
                type: Array
            }
        },
        data() {
            return {
                new_file: '',
                persistent_files: [],
            }
        },
        computed: {
            persistent_files_string() {
                if (!this.persistent_files || this.persistent_files.length === 0) {
                    return '[]';
                }

                return JSON.stringify(this.persistent_files);
            }
        },
        mounted() {
            this.persistent_files = this.original_input;
        },
        methods: {
            addFile() {
                let formatted_file = this.new_file.trim();

                // If the file is valid and unique, add it to the array
                if (
                    formatted_file.length > 0 &&
                    _.indexOf(this.persistent_files, formatted_file)
                ) {
                    this.persistent_files.push(formatted_file);
                    formatted_file = "";
                }

                // Reset the input and re-focus
                this.new_file = formatted_file;
                this.$refs["_persistent_files_input"].focus();
            },
            removeFile(key) {
                this.$delete(this.persistent_files, key);
            }
        }
    }
</script>

