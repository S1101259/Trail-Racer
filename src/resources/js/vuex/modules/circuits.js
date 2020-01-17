import axios from "axios"

const state = {
    circuits: [],
    isLoading: false,
    error: ''
};

const getters = {
    getCircuits: state => state.circuits,
    isLoadingCircuits: state => state.isLoading,
    getCircuitsRequestError: state => state.error
};

const mutations = {
    circuit_request(state){
        state.isLoading= true;
    },
    circuits_success(state, receivedCircuits){
        state.circuits = receivedCircuits;
    },
    circuit_error(state, error){
      state.error = error
    },
    circuits_finished(state){
        state.isLoading= false;
    }
};

const actions = {
    fetchCircuits({state, commit}) {
        if (state.circuits.length <= 0) {
            commit('circuit_request');
            axios.get('/circuits/all')
                .then((response) => {
                    commit('circuits_success', response.data.circuits);
                })
                .catch((e)=>{
                    commit('circuit_error', e)
                }).finally(() => {
                    commit('circuits_finished')
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
