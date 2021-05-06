import axios from "axios"
import router from "../../router/router";

const state = {
    userData: {},

    isFetching: false,
    isUpdating: false,
    errorMessage: ''

};

const getters = {
    userData: state => state.userData,
    isFetchingUserData: state => state.isFetching,
    isUpdatingUserData: state => state.isUpdating,
    profileErrorMessage: state => state.errorMessage
};

const mutations = {
    fetching_userData(state) {
        state.isFetching = true;
    },
    update_userData(state) {
        state.isUpdating = true;
    },
    fetching_userData_finished(state) {
        state.isFetching = false;
    },
    updating_userData_finished(state) {
        state.isUpdating = false;
    },
    set_error_message(state, error) {
        state.errorMessage = error;
    },
    set_userData(state, userData){
        state.userData = userData;
    }

};

const actions = {
    fetchUserData({commit}) {
        commit('fetching_userData');
        commit('set_userData', {});
        axios.get('auth/info')
            .then((response) => {
                commit('set_userData', response.data);
            })
            .catch((error) => {
                commit('set_error_message', error)
            })
            .finally(() => {
                commit('fetching_userData_finished')
            })
    },
    updateName({commit}, requestData) {
        commit('update_userData');
        axios.put('auth/changename', requestData)
            .then(() => {
                router.push({name: 'profile'});
            })
            .catch((error) => {
                commit('set_error_message', error)
            })
            .finally(() => {
                commit('updating_userData_finished');
            })
    },
    updatePassword({commit, dispatch}, requestData) {
        commit('update_userData');
        axios.put('auth/changepassword', requestData)
            .then(() => {
                dispatch('logout')
            })
            .catch((error) => {
                commit('set_error_message', error)
            })
            .finally(() => {
                commit('updating_userData_finished');
            })
    }
};

export default {
    state,
    mutations,
    actions,
    getters
}
