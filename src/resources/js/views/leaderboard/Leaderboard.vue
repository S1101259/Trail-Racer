<template>
    <div>
        <circuits-nav
            :circuits="circuits"
            :selected-circuit="selectedCircuit"
            @circuitChanged="onCircuitChange">
        </circuits-nav>
        <div class="container">
            <h1>Top 100 van {{selectedCircuit.name}}:</h1>
            <podium
                v-if="times.length >= 3"
                :first="times[0].user"
                :second="times[1].user"
                :third="times[2].user">
            </podium>
            <leaderboard-table :data="times"></leaderboard-table>
        </div>
    </div>
</template>

<script>
    import Podium from "../../components/shared/podium/Podium";
    import CircuitsNav from "../../components/shared/circuits/CircuitsNav";
    import LeaderboardTable from "../../components/shared/leaderboard/LeaderboardTable";
    import circuits from "../../vuex/modules/circuits";

    export default {
        name: "Leaderbord",
        components: {LeaderboardTable, CircuitsNav, Podium},
        data(){
            return {
                times: [],
                selectedCircuit: circuits,
            }
        },
        watch: {
            selectedCircuit: function (circuit) {
                axios.get('/leaderboard/circuit', {
                    params: {
                        'circuit': circuit.id
                    }
                }).then((response) => {
                    this.times = response.data.times;
                });
            },
            circuits: function () {
                this.selectedCircuit = this.circuits[0];
            }
        },
        computed: {
            circuits: function () {
                return this.$store.getters.getCircuits
            }
        },
        methods: {
            onCircuitChange(circuit) {
                this.selectedCircuit = circuit;
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
</style>
