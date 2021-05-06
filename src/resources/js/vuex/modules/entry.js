import axios from 'axios'
import router from "../../router/router";

const state = {};

const getters = {};

const mutations = {};

const actions = {
    leaveCompetition({commit, dispatch}, dispatchData) {
        const data = {
            competition: dispatchData.competition.slug
        };
        axios.post('/competition/leave', data).then(() => {
            dispatch(dispatchData.leaveAction)
        });
    },
    joinCompetition({}, competition) {
        const data = {
            competition: competition.slug
        };
        axios.post('/competition/join', data).then(() => {
            router.push({path: `/competition/${competition.slug}`})
        })
    }
};

export default {
    state,
    mutations,
    actions,
    getters
}
