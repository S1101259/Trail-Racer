<template>
    <div>
        <div class="container">
            <h1>Competities</h1>
            <error-box v-if="errorMessage">{{errorMessage}}</error-box>
            <Loading :is-loading="isFetchingCompetitions"></Loading>
            <div v-if="competitions.length === 0 && !isFetchingCompetitions">
                Geen competities niet gevonden. Maak nu je eigen!
            </div>
            <CompetitionList v-if="!isFetchingCompetitions"
                             :competitions="competitions"
                             leave-action="fetchAllCompetitions">
            </CompetitionList>
            <button v-if="isLoggedIn" @click="onAddButtonClick()" class="btn btn-primary rounded-circle add-button">+
            </button>
        </div>
    </div>
</template>

<script>
    import CompetitionList from "../../components/competitions/CompetitionList";
    import Loading from "../../components/shared/loading/Loading";
    import ErrorBox from "../../components/shared/error/ErrorBox";

    export default {
        name: "CompetitionOverview",
        components: {Loading, CompetitionList, ErrorBox},
        computed: {
            isLoggedIn: function () {
                return this.$store.getters.isLoggedIn
            },
            competitions: function () {
                return this.$store.getters.allCompetitions
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
            this.$store.dispatch('fetchAllCompetitions')
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
