<template>
    <div>
        <circuits-nav :circuits="circuits"
                      :selected-circuit="selectedCircuit"
                      @circuitChanged="onCircuitChange">
        </circuits-nav>
        <div class="container">
            <h1>{{$route.params.competition}}</h1>
            <leaderboard-table :data="times"></leaderboard-table>
        </div>
        <button v-if="isLoggedIn" class="btn btn-primary rounded-circle add-button" @click="onAddButtonClick()">+</button>
    </div>
</template>

<script>
    import CircuitsNav from "../../components/shared/circuits/CircuitsNav";
    import axios from 'axios';
    import LeaderboardTable from "../../components/shared/leaderboard/LeaderboardTable";

    export default {
        name: "ShowCompetition",
        components: {LeaderboardTable, CircuitsNav},
        data() {
            return {
                selectedCircuit: '',
                times: []
            }
        },
        computed: {
            circuits: function () {
                return this.$store.getters.getCircuits
            },
            isLoggedIn: function () {
                return this.$store.getters.isLoggedIn
            }
        },
        watch: {
            selectedCircuit: function (circuit) {
                axios.get('/competition/standing', {
                    params: {
                        'circuit': circuit.id,
                        'competition': this.$route.params.competition
                    }
                }).then((response) => {
                    this.times = response.data.times;
                });
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
