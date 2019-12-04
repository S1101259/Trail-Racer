<template>
    <div>
        <circuits-nav :circuits="circuits"
                      :selected-circuit="selectedCircuit"
                      @circuitChanged="onCircuitChange">
        </circuits-nav>
        <div class="container">
            <h1>{{$route.params.competition}}</h1>
        </div>
        <button class="btn btn-primary rounded-circle add-button" @click="onAddButtonClick()">+</button>
    </div>
</template>

<script>
    import CircuitsNav from "../../components/shared/circuits/CircuitsNav";

    export default {
        name: "ShowCompetition",
        components: {CircuitsNav},
        data() {
            return {
                selectedCircuit: 'Australia',
            }
        },
        computed: {
            circuits: function () {
                return this.$store.getters.getCircuits
            }
        },
        watch: {
            selectedCircuit: function (circuit) {
                console.log(circuit);
                console.log(this.$route.params.competition);
            }
        },
        methods: {
            onCircuitChange(circuit) {
                this.selectedCircuit = circuit;
            },

            onAddButtonClick(){
                this.$router.push({path: `/competition/${this.$route.params.competition}/addTime`})
            }
        },
        mounted(){
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
    .add-button{
        position: absolute;
        right: 2em;
        bottom: 2em;
    }
</style>
