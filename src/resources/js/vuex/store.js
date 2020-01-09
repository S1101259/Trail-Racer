import Vuex from 'vuex'
import auth from "./modules/auth";
import circuits from "./modules/circuits";
import competition from "./modules/competition";
import teams from "./modules/teams";
import standing from "./modules/standing";
import entry from "./modules/entry";
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
        teams,
        competition,
        standing,
        entry
    }
});
