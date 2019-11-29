import App from "./views/App";
import router from "./router/router";
import store from "./vuex/store";
import Vue from 'vue'
import Vuelidate from 'vuelidate'
import VueCountdown from '@chenfengyuan/vue-countdown';
// import axios from 'axios';
import VueAxios from "vue-axios";

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

const app = new Vue({
    router,
    store,
    render: h => h(App)
}).$mount("#app");

export default app;
