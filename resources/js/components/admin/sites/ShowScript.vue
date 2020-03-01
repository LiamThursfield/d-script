<template>
    <div>
        <div class="bg-gray-900 mt-8 overflow-hidden pb-6 pt-3 px-3 rounded-lg shadow-lg">
            <div class="flex flex-row">
                <div class="bg-red-600 h-4 mr-2 rounded-full w-4"></div>
                <div class="bg-yellow-600 h-4 mr-2 rounded-full w-4"></div>
                <div class="bg-green-600 h-4 rounded-full w-4"></div>
            </div>

            <div class="dark-scrollbar mb-4 mt-8">
                <div
                    class="font-mono text-green-800 text-sm px-3 whitespace-no-wrap"
                >
                    <p class="overflow-x-scroll pb-4">{{ site_script }}</p>
                </div>
            </div>
        </div>

        <div class="flex flex-row items-center justify-end mt-8">
            <a
                class="btn btn-outline shadow-lg"
                :href="route('admin.sites.show-script', [site.id])"
            >
                Re-generate Script
            </a>

            <button
                class="block btn btn-outline btn-green ml-2 shadow-lg"
                v-clipboard:copy="site_script"
                v-clipboard:success="onCopySuccess"
                v-clipboard:error="onCopyError"
            >
                Copy Script
            </button>
        </div>

        <transition name="slide-down-fade">
            <div
                v-if="show_success"
                class="toast toast-right toast-top"
            >
                Script Copied!
            </div>
        </transition>

        <transition name="slide-down-fade">
            <div
                v-if="show_error"
                class="toast toast-red toast-right toast-top"
            >
                Failed to Copy!
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        name: "ShowScript",
        props: {
            site: {
                required: true,
                type: Object
            },
            site_script: {
                required: true,
                type: String
            }
        },
        data() {
            return {
                show_error: false,
                show_success: false,
            }
        },
        methods: {
            onCopyError(e) {
                this.show_error = true;
                setTimeout(() => {
                    this.show_error = false
                }, 1500);

                console.log('error', e)
            },
            onCopySuccess() {
                this.show_success = true;
                setTimeout(() => {
                    this.show_success = false
                }, 1500);
            }
        }
    }
</script>