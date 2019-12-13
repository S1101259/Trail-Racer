import axios from 'axios'
import router from "../../router/router";

const state = {
    token: localStorage.getItem('access_token') || "",
    status: ''
};

const getters = {
    isLoggedIn: state => !!state.token,
    authStatus: state => state.status
};

const mutations = {
    auth_request(state) {
        state.status = "loading";
    },
    auth_success(state, receivedToken){
        state.token = receivedToken;
        state.status = "success"
    },
    auth_error(state) {
        state.status = "error";
    },
    auth_logout(state) {
        state.status = "";
        state.token = "";
    },
};

const actions = {
    login({commit, dispatch}, user){
        return new Promise((resolve, reject) => {
            commit("auth_request");
            axios.post('/auth/login', user)
                .then(response => {
                    const token = response.data.access_token;
                    dispatch('setTokenInLocalStorage',token);
                    dispatch("addAuthorizationHeader", token);
                    commit("auth_success", token);
                    resolve();
                })
                .catch(error => {
                    commit("auth_error");
                    localStorage.removeItem("access_token");
                    reject(error)
                })
        })
    },
    register({commit, dispatch}, user){
        return new Promise((resolve, reject) => {
            commit("auth_request");
            axios.post('/auth/register', user)
                .then(response => {
                    const token = response.data.access_token;
                    dispatch('setTokenInLocalStorage',token);
                    dispatch("addAuthorizationHeader", token);
                    commit("auth_success", token);
                    resolve();
                })
                .catch(error => {
                    commit("auth_error");
                    localStorage.removeItem("access_token");
                    reject(error)
                })
        })
    },
    logout({commit, dispatch}){
        return new Promise(resolve => {
            commit("auth_logout");
            localStorage.removeItem("access_token");
            delete axios.defaults.headers.common["Authorization"];
            router.push({name: "login"}).then(r => resolve());
            resolve();
        });
    },
    addAuthorizationHeader(state, token) {
        axios.defaults.headers.common["Authorization"] = "Bearer " + token;
    },
    setTokenInLocalStorage(state,token){
        localStorage.setItem("access_token", token);
    },
};

export default {
    state,
    mutations,
    actions,
    getters
}
