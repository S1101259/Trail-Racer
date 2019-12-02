<template>
    <div>
        <circuits-nav
            :circuits="circuits"
            :selected-circuit="selectedCircuit"
            @circuitChanged="onCircuitChange">
        </circuits-nav>
        <div class="container">
            <h1>Top 100 van {{selectedCircuit}}:</h1>
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
                        time: 83892
                    },
                    {
                        name: 'De bijna slechtste',
                        car: 'Redbull',
                        time: 83903
                    },
                    {
                        name: 'De Noobs',
                        car: 'Williams',
                        time: 123335
                    }
                ],
                selectedCircuit: 'Australia',
                circuits: [
                    'Australia',
                    'Bahrain',
                    'China',
                    'Azerbaijan',
                    'Spain',
                    'Monaco',
                    'Canada',
                    'France',
                    'Austria',
                    'Great Britain',
                    'Germany',
                    'Hungary',
                    'Belgium',
                    'Italy',
                    'Singapore',
                    'Russia',
                    'Japan',
                    'Mexico',
                    'United States',
                    'Brazil',
                    'Abu Dhabi',
                ]
            }
        },
        watch: {
            selectedCircuit: function (circuit) {
                console.log(circuit);
            }
        },
        methods: {
            onCircuitChange(circuit) {
                this.selectedCircuit = circuit;
            }
        }
    }
</script>

<style scoped>
</style>
