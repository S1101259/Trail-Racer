<template>
    <div>
        <div class="container">
            <h1>Mijn Competities</h1>
            <error-box v-if="errorMessage">{{errorMessage}}</error-box>
            <Loading :is-loading="isFetchingCompetitions"></Loading>
            <CompetitionList v-if="!isFetchingCompetitions"
                             :competitions="competitions"
                             leave-action="fetchPersonalCompetitions">
            </CompetitionList>
            <button v-if="isLoggedIn" @click="onAddButtonClick()" class="btn btn-primary rounded-circle add-button">
                <font-awesome-icon icon="plus"></font-awesome-icon>
            </button>
        </div>
    </div>
</template>

<script>
    import ErrorBox from "../../components/shared/error/ErrorBox";
    import CompetitionList from "../../components/competitions/CompetitionList";
    import Loading from "../../components/shared/loading/Loading";

    export default {
        name: "PersonalCompetitionOverview",
        components: {Loading, CompetitionList, ErrorBox},
        computed: {
            isLoggedIn: function () {
                return this.$store.getters.isLoggedIn
            },
            competitions: function () {
                return this.$store.getters.personalCompetitions
            },
            isFetchingCompetitions: function () {
                return this.$store.getters.isFetchingCompetitions
            },
            errorMessage: function () {
                return this.$store.getters.errorMessage
            }
        },
        methods: {
            onAddButtonClick() {
                this.$router.push({path: '/competition/create'})
            }
        },
        mounted() {
            this.$store.dispatch('fetchPersonalCompetitions')
        }
    }
</script>

<style scoped>
    .container h1 {
        font-family: FormulaOne-Bold, serif;
        border-bottom: 5px solid red;
        padding: 0.2em 0;
    }

    .add-button {
        position: absolute;
        right: 2em;
        bottom: 2em;
    }
</style>
