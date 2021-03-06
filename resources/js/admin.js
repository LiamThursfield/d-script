/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.Vue = require('vue');

// Add Vue packages
import VueClipboard from "vue-clipboard2";
Vue.use(VueClipboard);

Vue.prototype.route = route;
Vue.prototype.laravel = laravel;
Vue.prototype.user = user;

require('./components_core');
require('./components_admin');

const app = new Vue({
    el: '#app',
});
