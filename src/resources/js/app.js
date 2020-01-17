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

import { library } from '@fortawesome/fontawesome-svg-core'
import { faSignInAlt, faTimes, faPlus } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

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

axios.interceptors.response.use((response) => {
        return response;
    }, (error) => {
        if (error.response && error.response.status ===401) {
            return store.dispatch('logout');
        }
        if (error.response && error.response.data) {
            return Promise.reject(error.response.data);
        }
        return Promise.reject(error.message);
    }
);

Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.component(VueCountdown.name, VueCountdown);

library.add(faSignInAlt, faPlus, faTimes);

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
