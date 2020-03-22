<template>
    <div>
        <div class="input-group relative z-10">
            <label
                class="md:text-right"
                :class="label_class"
                :for="input_id"
            >
                {{ label_text }}
            </label>

            <div
                class="
                    flex-1 mt-1
                    md:ml-6 md:mt-0
                "
            >
                <input
                    :id="input_id"
                    class="bg-gray-850 border-gray-800 placeholder-gray-700 w-full"
                    :class="formatted_input_class"
                    :autocomplete="input_autocomplete"
                    :disabled="input_disabled"
                    :name="input_name"
                    :placeholder="input_placeholder"
                    :ref="input_id"
                    :required="input_required"
                    :type="input_type"
                    v-model="current_value"
                    @keypress="hideError"
                >
            </div>
        </div>
        <div>
        <transition name="slide-down-fade">
            <div
                v-if="is_error"
                class="flex items-center mt-2 text-xs"
            >
                <div :class="label_class"></div>

                <div class="md:ml-6">
                    <p :class="error_class">
                        {{ error_message}}
                    </p>
                </div>
            </div>
        </transition>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TwoColInputGroup",
        props: {
            allow_parent_updates: {
                default: true,
                type: Boolean
            },
            error_class: {
                default: 'text-red-600',
                type: String
            },
            error_message: {
                default: '',
                type: String
            },
            label_class: {
                default: '',
                type: String
            },
            label_text: {
                required: true,
                type: String
            },
            input_autocomplete: {
                default: '',
                type: String
            },
            input_autofocus: {
                default: false,
                type: Boolean
            },
            input_class: {
                default: '',
                type: String
            },
            input_disabled: {
               default: false,
               type: Boolean
            },
            input_id: {
                required: true,
                type: String
            },
            input_name: {
                required: true,
                type: String
            },
            input_placeholder: {
                default: '',
                type: String
            },
            input_required: {
                default: false,
                type: Boolean
            },
            input_type: {
                default: 'text',
                type: String
            },
            input_value: {
                default: '',
                type: String
            }
        },
        data() {
            return  {
                current_value: '',
                hide_error: false
            }
        },
        computed: {
            formatted_input_class() {
                if (this.is_error) {
                    return this.input_class + ' error';
                }
                return this.input_class;
            },
            is_error() {
                return !this.hide_error && this.error_message && this.error_message !== '';
            }
        },
        mounted() {
            this.current_value = this.input_value;
            this.autofocus();
        },
        methods: {
            autofocus() {
                if (this.input_autofocus && this.$refs[this.input_id]) {
                    this.$nextTick(() => {
                        this.$refs[this.input_id].focus();
                    });
                }
            },
            hideError() {
                this.hide_error = true;
            },
            onInputValueChange() {
                if (this.allow_parent_updates) {
                    this.current_value = this.input_value;
                }
            }
        },
        watch: {
            input_value: {
                handler: "onInputValueChange"
            }
        }
    }
</script>