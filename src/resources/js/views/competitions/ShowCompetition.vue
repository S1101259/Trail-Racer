<template>
    <div>
        <circuits-nav :circuits="circuits"
                      :selected-circuit="selectedCircuit"
                      @circuitChanged="onCircuitChange">
        </circuits-nav>
        <div class="container">
            <h1>{{$route.params.competition}}</h1>
            <loading :is-loading="isFetchingStanding"></loading>
            <leaderboard-table :reload-action="fetchCompetitionStanding"
                v-if="!isFetchingStanding"
                :data="times"></leaderboard-table>
        </div>
        <button v-if="isLoggedIn" class="btn btn-primary rounded-circle add-button" @click="onAddButtonClick()">
            <font-awesome-icon icon="plus"></font-awesome-icon>
        </button>
    </div>
</template>

<script>
    import CircuitsNav from "../../components/shared/circuits/CircuitsNav";
    import LeaderboardTable from "../../components/shared/leaderboard/LeaderboardTable";
    import Loading from "../../components/shared/loading/Loading";

    export default {
        name: "ShowCompetition",
        components: {Loading, LeaderboardTable, CircuitsNav},
        data() {
            return {
                selectedCircuit: ''
            }
        },
        computed: {
            circuits: function () {
                return this.$store.getters.getCircuits;
            },
            isLoggedIn: function () {
                return this.$store.getters.isLoggedIn;
            },
            times: function () {
                return this.$store.getters.competitionStanding;
            },
            isFetchingStanding: function () {
                return this.$store.getters.isFetchingStanding
            }
        },
        watch: {
            selectedCircuit: function () {
                this.fetchCompetitionStanding()
            },
            circuits: function () {
                this.selectedCircuit = this.circuits[0];
            }
        },
        methods: {
            onCircuitChange(circuit) {
                this.selectedCircuit = circuit;
            },

            onAddButtonClick() {
                this.$router.push({path: `/competition/${this.$route.params.competition}/addTime`})
            },
            fetchCompetitionStanding(){
                const data = {
                    'circuit': this.selectedCircuit.id,
                    'competition': this.$route.params.competition
                };
                this.$store.dispatch('fetchCompetitionStanding', data)
            }
        },
        mounted() {
            this.$store.dispatch("fetchCircuits")
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
