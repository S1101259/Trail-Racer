import Vuex from 'vuex'
import auth from "./modules/auth";
import circuits from "./modules/circuits";
import teams from "./modules/teams";
import Vue from 'vue';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {},
    actions: {},
    mutations: {},
    getters: {},
    modules: {
        auth,
        circuits,
        teams
    }
});
