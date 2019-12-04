<template>
    <div>
        <circuits-nav
            :circuits="circuits"
            :selected-circuit="selectedCircuit"
            @circuitChanged="onCircuitChange">
        </circuits-nav>
        <div class="container">
            <h1>Top 100 van {{selectedCircuit.name}}:</h1>
            <podium :first="data[0].name" :second="data[1].name" :third="data[2].name"></podium>
            <leaderboard-table :data="data"></leaderboard-table>
        </div>
    </div>
</template>

<script>
    import Podium from "../../components/shared/podium/Podium";
    import CircuitsNav from "../../components/shared/circuits/CircuitsNav";
    import LeaderboardTable from "../../components/shared/leaderboard/LeaderboardTable";

    export default {
        name: "Leaderbord",
        components: {LeaderboardTable, CircuitsNav, Podium},
        data: () => {
            return {
                data: [
                    {
                        name: 'De Beste',
                        car: 'Ferrari',
                        time: 83892,
                        isUsersTime: false
                    },
                    {
                        name: 'De bijna slechtste',
                        car: 'Redbull',
                        time: 83903,
                        isUsersTime: false
                    },
                    {
                        name: 'De Noobs',
                        car: 'Williams',
                        time: 123335,
                        isUsersTime: true
                    }
                ],
                selectedCircuit: 'Australia',
            }
        },
        watch: {
            selectedCircuit: function (circuit) {
                console.log(circuit);
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
