<template>
    <nav class="
            hidden w-full
            md:flex
        "
    >
        <!-- Navigation Links -->
        <ul
            class="
                flex flex-1 flex-row items-center text-green-700
                md:-mx-3
            "
        >
            <li
                v-for="(navigation_link, key) in navigation_links"
                v-if="showLink(navigation_link)"
                :key="'header-link-desktop-' + key"
                class="
                    mx-3
                    hover:text-green-600
                "
            >
                <a :href="navigation_link.url">
                    {{ navigation_link.label }}
                </a>
            </li>
        </ul>

        <!-- User Navigation -->
        <div class="border-l border-gray-800 pl-6 text-green-700">
            <div v-if="user.isGuest()">
                <a
                    v-if="route('login')"
                    class="hover:text-green-600"
                    :class="{'mr-4': route('register')}"
                    :href="route('login')"
                >
                    Login
                </a>

                <a
                    v-if="route('register')"
                    class="hover:text-green-600"
                    :href="route('register')"
                >
                    Register
                </a>
            </div>

            <div
                v-else
                class="flex flex-row"
            >
                <p class="mr-2">
                    {{ user.name }}
                </p>

                <form
                    class="inline-block"
                    :action="route('logout')"
                    method="POST"
                >
                    <csrf-input />

                    <button
                        class="text-xs text-green-700 opacity-50 hover:opacity-100 hover:text-green-600"
                        type="submit"
                    >
                        (Logout)
                    </button>
                </form>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "HeaderNavigationDesktop",
        props: {
            navigation_links: {
                required: true,
                type: Object
            },

        },
        methods: {
            isLastLink(index) {
                let length = Object.keys(this.navigation_links).length;
                return index === length - 1;
            },
            showLink(navigation_link) {
                if (!navigation_link.url) {
                    return false;
                }

                if (!navigation_link.require_auth) {
                    return true;
                }

                // Only show the link if the user is authenticated
                return user.isAuthenticated();
            }
        }
    }
</script>
