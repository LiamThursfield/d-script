/**
 * Register any admin Vue Components
 */

// Headers
Vue.component('header-main', require('./components/admin/headers/HeaderMain.vue').default);

// Script components
Vue.component('activation-script-input', require('./components/admin/sites/ActivationScriptInput.vue').default);
Vue.component('persistent-files-input', require('./components/admin/sites/PersistentFilesInput.vue').default);
Vue.component('show-script', require('./components/admin/sites/ShowScript.vue').default);