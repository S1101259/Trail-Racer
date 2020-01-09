import axios from "axios"
import router from "../../router/router";

const state = {
    personalCompetitions: [],
    randomCompetitions: [],
    allCompetitions: [],

    isCreatingCompetition: false,
    isFetching: false,
    errorMessage: ''
};

const getters = {
    personalCompetitions: state => state.personalCompetitions,
    randomCompetitions: state => state.randomCompetitions,
    allCompetitions: state => state.allCompetitions,

    isCreatingCompetition: state => state.isCreatingCompetition,
    isFetchingCompetitions: state => state.isFetching,
    errorMessage: state => state.errorMessage
};

const mutations = {
    fetching_competitions(state) {
        state.isFetching = true
    },
    fetching_competitions_finished(state) {
        state.isFetching = false
    },
    set_personal_competitions(state, competitions) {
        state.personalCompetitions = competitions
    },
    set_all_competitions(state, competitions) {
        state.allCompetitions = competitions
    },
    set_random_competitions(state, competitions) {
        state.randomCompetitions = competitions
    },
    set_fetching_error(state, error) {
        state.errorMessage = error
    },
    create_competition(state) {
        state.isCreatingCompetition = true
    },
    create_competition_request_finished(state) {
        state.isCreatingCompetition = false
    }
};

const actions = {
    fetchPersonalCompetitions({state, commit}) {
        commit('set_fetching_error', '');
        commit('fetching_competitions');
        axios.get('/competition/personal').then((response) => {
            commit('set_personal_competitions', response.data.competitions);
        }).catch((error) => {
            commit('set_fetching_error', error);
        }).finally(() => {
            commit('fetching_competitions_finished');
        })
    },
    fetchAllCompetitions({state, commit}) {
        commit('set_fetching_error', '');
        commit('fetching_competitions');
        axios.get('/competition/all').then((response) => {
            commit('set_all_competitions', response.data.competitions);
        }).catch((error) => {
            commit('set_fetching_error', error);
        }).finally(() => {
            commit('fetching_competitions_finished');
        })
    },
    fetchRandomCompetitions({state, commit}) {
        commit('set_fetching_error', '');
        commit('fetching_competitions');
        axios.get('/competition/random').then((response) => {
            commit('set_random_competitions', response.data.competitions)
        }).catch((error) => {
            commit('set_fetching_error', error);
        }).finally(() => {
            commit('fetching_competitions_finished');
        })

    },
    createCompetition({commit}, data) {
        commit('set_fetching_error', '');
        commit('create_competition');
        axios.post('/competition/create', data)
            .then(() => {
                router.push({name: 'competitions'})
            }).catch((error) => {
                commit('set_fetching_error', error);
            }).finally(() => {
            commit('create_competition_request_finished');
        })
    }
};

export default {
    state,
    mutations,
    actions,
    getters
}
