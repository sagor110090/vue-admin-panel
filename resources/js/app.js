
require('./bootstrap');
window.Vue = require('vue');
import App from "./App.vue";
import router from './routes';
import store from './store/store';
import helpers from './helpers/global';
Vue.component('pagination', require('laravel-vue-pagination'));
import VueSwal from 'vue-swal';
Vue.use(VueSwal);
Vue.use({
    install() {
        Vue.helpers = helpers;
        Vue.prototype.$helpers = helpers;
    }
}); 
new Vue({
    store,
    router,
    render: h => h(App)
}).$mount('#app')
