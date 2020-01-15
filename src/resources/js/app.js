import App from "./views/App";
import router from "./router/router";
import store from "./vuex/store";
import Vue from 'vue'
import Vuelidate from 'vuelidate'
import VueCountdown from '@chenfengyuan/vue-countdown';
import VueAxios from "vue-axios";
import DateFormat from "./filters/DateFormat";
import Truncate from "./filters/Truncate";
import CreatedFormat from "./filters/CreatedFormat";

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

Vue.config.productionTip = false;

Vue.use(Vuelidate);
Vue.use(VueAxios, axios);

axios.defaults.baseURL = "/api";

Vue.component(VueCountdown.name, VueCountdown);

Vue.filter('formatDate', function (value) {
    return DateFormat(value)
});

Vue.filter('truncate', function (textString, value) {
    return Truncate(textString, value)
});

Vue.filter('formatCreated', function (value) {
    return CreatedFormat(value)
});

addAuthHeader();


const app = new Vue({
    router,
    store,
    render: h => h(App)
}).$mount("#app");

function addAuthHeader() {
    const token = localStorage.getItem('access_token');
    if (token) {
        store.dispatch('addAuthorizationHeader', token);
    }
}

export default app;
