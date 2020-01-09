<template>
    <div>
        <circuits-nav
            :circuits="circuits"
            :selected-circuit="selectedCircuit"
            @circuitChanged="onCircuitChange">
        </circuits-nav>
        <div class="container">
            <h1 v-if="
            Object.entries(selectedCircuit).length === 0 &&
            selectedCircuit.constructor === Object">
                Selecteer een circuit
            </h1>
            <h1 v-else>Top 100 van {{selectedCircuit.name}}:</h1>
            <loading :is-loading="isFetchingStanding || circuits.length === 0"></loading>
            <podium
                v-if="times.length >= 3 && !isFetchingStanding"
                class="podium"
                :first="times[0].user"
                :second="times[1].user"
                :third="times[2].user">
            </podium>
            <leaderboard-table v-if="!isFetchingStanding"
                               :reload-action="fetchOverallStanding"
                               :data="times">
            </leaderboard-table>
        </div>
    </div>
</template>

<script>
    import Podium from "../../components/shared/podium/Podium";
    import CircuitsNav from "../../components/shared/circuits/CircuitsNav";
    import LeaderboardTable from "../../components/shared/leaderboard/LeaderboardTable";
    import Loading from "../../components/shared/loading/Loading";

    export default {
        name: "Leaderbord",
        components: {Loading, LeaderboardTable, CircuitsNav, Podium},
        data() {
            return {
                selectedCircuit: {},
            }
        },
        watch: {
            selectedCircuit: function (circuit) {
                // const data = {
                //     'circuit': circuit.id
                // };
                //
                // this.$store.dispatch('fetchOverallStanding', data)
                this.fetchOverallStanding();
            },
            circuits: function () {
                this.selectedCircuit = this.circuits[0];
            }
        },
        computed: {
            circuits: function () {
                return this.$store.getters.getCircuits
            },
            times: function () {
                return this.$store.getters.overallStanding
            },
            isFetchingStanding: function () {
                return this.$store.getters.isFetchingStanding
            }
        },
        methods: {
            onCircuitChange(circuit) {
                this.selectedCircuit = circuit;
            },
            fetchOverallStanding(){
                const data = {
                    'circuit': this.selectedCircuit.id
                };

                this.$store.dispatch('fetchOverallStanding', data)
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

    .podium{
        margin: 4em;
    }
</style>
