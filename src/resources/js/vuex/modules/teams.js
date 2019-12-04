import axios from "axios"

const state = {
    teams: [],
    isLoading: false,
    error: ''
};

const getters = {
    getTeams: state => state.teams,
    isLoadingTeams: state => state.isLoading,
    getTeamsRequestError: state => state.error
};

const mutations = {
    teams_request(state){
        state.isLoading= true;
    },
    teams_success(state, receivedTeams){
        state.teams = receivedTeams;
    },
    teams_error(state, error){
        state.error = error
    },
    teams_finished(state){
        state.isLoading= false;
    }
};

const actions = {
    fetchTeams({state, commit}) {
        if (state.teams.length <= 0) {
            commit('teams_request');
            axios.get('/teams/all')
                .then((response) => {
                    commit('teams_success', response.data.teams);
                })
                .catch((e)=>{

                }).finally(() => {
                commit('teams_finished')
            })
        }
    }
};

export default {
    state,
    mutations,
    actions,
    getters
}
