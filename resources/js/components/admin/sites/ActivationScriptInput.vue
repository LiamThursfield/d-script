<template>
    <div>
        <!-- Hidden Input -->
        <template v-for="(activation_script, key) in activation_scripts">
            <input
                :id="getFormInputName(key, 'command')"
                :key="getFormInputName(key, 'command')"
                :name="getFormInputName(key, 'command')"
                type="hidden"
                :value="activation_script.command"
            >
            <input
                :id="getFormInputName(key, 'active')"
                :key="getFormInputName(key, 'active')"
                :name="getFormInputName(key, 'active')"
                type="hidden"
                :value="getFormInputBoolean(activation_script.active)"
            >
        </template>

        <!-- Add Script -->
        <div class="flex flex-row">
            <input
                class="
                    square
                    flex-1 rounded-l
                "
                :id="'_activation_scripts_input_' + input_name"
                :name="'_activation_scripts_input_' + input_name"
                :ref="input_name"
                type="text"
                v-model="new_script"
                @keypress.enter.prevent="addScript()"
            >
            <button
                class="
                    border border-gray-800 border-l-0 px-3 rounded-r text-gray-700
                    focus:outline-none focus:shadow-outline-white
                    duration-500 ease-in-out transition-shadow
                "
                type="button"
                @click.prevent="addScript()"
            >
                Add Script
            </button>
        </div>

        <!-- Persistent Files-->
        <div class="flex flex-col mt-2">
            <div
                v-for="(script, key) in activation_scripts"
                class="flex flex-row items-center mt-4"
                :key="key"
            >
                <input
                    class="
                        appearance-none bg-gray-850 border border-gray-800 flex-1 h-8 px-3 rounded-full text-gray-600
                        focus:outline-none focus:shadow-outline-white
                    "
                    :class="{
                        'line-through opacity-50' : script.active === false
                    }"
                    :disabled="script.active === false"
                    type="text"
                    v-model="activation_scripts[key].command"
                >

                <button
                    class="
                        border border-gray-700 flex h-8 items-center justify-center ml-3 px-3 rounded-full text-gray-700
                        focus:outline-none focus:shadow-outline-white
                        hover:bg-gray-700 hover:text-gray-900
                    "
                    type="button"
                    @click.prevent="toggleScriptActivation(key)"
                >
                    <template v-if="script.active === true">
                        Deactivate
                    </template>
                    <template v-if="script.active === false">
                        Activate
                    </template>
                </button>
                <button
                    class="
                        border border-red-900 flex h-8 items-center justify-center ml-3 rounded-full text-red-900 w-8
                        focus:outline-none focus:shadow-outline-white
                        hover:bg-red-900 hover:text-gray-300
                    "
                    type="button"
                    @click.prevent="removeScript(key)"
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
        name: "ScriptInput",
        props: {
            input_name: {
                required: true,
                type: String
            },
            original_input: {
                default: () => { return []; },
                type: Array
            }
        },
        data() {
            return {
                new_script: '',
                activation_scripts: [],
            }
        },
        computed: {
            activation_script_string() {
                if (!this.activation_scripts || this.activation_scripts.length === 0) {
                    return '[]';
                }

                return JSON.stringify(this.activation_scripts);
            },
            activation_script_commands() {
                let commands = [];

                if (this.activation_scripts.length < 1) {
                    return commands;
                }
                _.forEach(this.activation_scripts, (script => {
                    commands.push(script.command);
                }));

                return commands;
            }
        },
        mounted() {
            this.activation_scripts = this.original_input;
        },
        methods: {
            activateScript(key) {
                this.activation_scripts[key].active = true;
            },
            addScript() {
                let formatted_script = this.new_script.trim();

                // If the script is valid and unique, add it to the array
                if (
                    formatted_script.length > 0 &&
                    _.indexOf(this.activation_script_commands, formatted_script) < 0
                ) {
                    this.activation_scripts.push({
                        "command": formatted_script,
                        "active": true,
                    });
                    formatted_script = "";
                }

                // Reset the input and re-focus
                this.new_script = formatted_script;
                this.$refs[this.input_name].focus();
            },
            deactivateScript(key) {
                this.activation_scripts[key].active = false;
            },
            getFormInputBoolean(value) {
                console.log(value);
                if(value === true || value === "true") {
                    return 1;
                }
                return 0;
            },
            getFormInputName(key, type) {
                return this.input_name + '[' + key + '][' + type + ']';
            },
            removeScript(key) {
                this.$delete(this.activation_scripts, key);
            },
            toggleScriptActivation(key) {
                this.activation_scripts[key].active = !this.activation_scripts[key].active;
            }
        }
    }
</script>