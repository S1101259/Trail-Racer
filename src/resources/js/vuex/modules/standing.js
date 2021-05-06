import axios from 'axios'

const state = {
    competitionStanding: [],
    overallStanding: [],

    standingErrorMessage: '',
    isFetchingStanding: false,
};

const getters = {
    competitionStanding: state => state.competitionStanding,
    overallStanding: state => state.overallStanding,
    standingErrorMessage: state => state.standingErrorMessage,
    isFetchingStanding: state => state.isFetchingStanding
};

const mutations = {
    fetch_standing(state) {
        state.isFetchingStanding = true
    },
    fetch_standing_finished() {
        state.isFetchingStanding = false
    },
    set_fetching_error(state, error) {
        state.standingErrorMessage = error
    },
    set_competition_standing(state, standing) {
        state.competitionStanding = standing;
    },
    set_overall_standing(state, standing) {
        state.overallStanding = standing;
    }
};

const actions = {
    fetchCompetitionStanding({state, commit}, data) {
        commit('set_fetching_error', '');
        commit('fetch_standing');

        axios.get('/competition/standing', {
            params: data
        }).then((response) => {
            commit('set_competition_standing', response.data.times)
        }).catch((error) => {
            commit('set_fetching_error', error);
        }).finally(() => {
            commit('fetch_standing_finished')
        })
    },
    fetchOverallStanding({state, commit}, data) {
        commit('set_fetching_error', '');
        commit('fetch_standing');

        axios.get('/leaderboard/circuit', {
            params: data
        }).then((response) => {
            commit('set_overall_standing', response.data.times)
        }).catch((error) => {
            commit('set_fetching_error', error);
        }).finally(() => {
            commit('fetch_standing_finished')
        })
    }
};

export default {
    state,
    mutations,
    actions,
    getters
}
