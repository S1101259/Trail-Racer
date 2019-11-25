const state = {
    token: localStorage.getItem('token') || ""
};

const getters = {
    isLoggedIn: state => !!state.token
};

const mutations = {};

const actions = {};

export default {
    state,
    mutations,
    actions,
    getters
}
