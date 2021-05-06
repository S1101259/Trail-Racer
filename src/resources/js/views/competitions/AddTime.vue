<template>
    <div class="background">
        <div class="add-container">
           <AddTimeForm :teams="teams" :circuits="circuits"></AddTimeForm>
        </div>
        <div class="right-container">
        </div>
    </div>
</template>

<script>
    import AddTimeForm from "../../components/times/AddTimeForm";

    export default {
        name: "AddTime",
        components: {AddTimeForm},
        computed: {
            circuits: function () {
                return this.$store.getters.getCircuits
            },
            teams: function () {
                return this.$store.getters.getTeams
            }
        },
        methods: {
            fetchTeams(){
                this.$store.dispatch("fetchTeams")
            },
            fetchCircuits(){
                this.$store.dispatch("fetchCircuits").then(
                    this.selectedCircuit = this.circuits[0]
                )
            }
        },
        mounted() {
            this.fetchTeams();
            this.fetchCircuits();
        }
    }
</script>

<style scoped>
    .background {
        background-image: url("../../../images/background.png");
        height: 100vh;
        min-height: 600px;
        width: 100vw;
        margin-top: -69px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .add-container {
        clear: both;
        background-color: white;
        height: 25rem;
        width: 35rem;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        padding: 3em;
        position: relative;
        box-shadow: 13px 13px 41px -9px rgba(0, 0, 0, 0.47);
        font-family: FormulaOne-Regular, serif;
    }

    .right-container {
        clear: both;
        background-color: gray;
        height: 25rem;
        width: 20rem;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        padding: 3em;
        position: relative;
        box-shadow: 13px 13px 41px -9px rgba(0, 0, 0, 0.47);
        background-image: url("../../../images/addTime.gif");
        background-position: center;
        background-size: cover;
    }

    @media only screen and (max-width: 600px) {
        .add-container {
            width: 100vw;
            border-radius: 0;
            position: relative;
            padding: 1.5em 1em;
            box-shadow: none;
            z-index: 2;
        }

        .background {
            position: initial;
            margin-top: 0;
            height: auto;
            align-items: initial;
            background: white;
            flex-direction: column-reverse;
        }

        .right-container {
            width: 100%;
            height: 18em;
            background-position: top;
            border-radius: 0;
            box-shadow: none;
            z-index: 0
        }
    }

</style>
