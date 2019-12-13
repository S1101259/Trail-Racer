<template>
    <div>
        <div class="container">
            <h1>Mijn Competities</h1>
            <CompetitionList :competitions="competitions"></CompetitionList>
            <button v-if="isLoggedIn" @click="onAddButtonClick()" class="btn btn-primary rounded-circle add-button">+
            </button>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import CompetitionList from "../../components/competitions/CompetitionList";
    export default {
        name: "PersonalCompetitionOverview",
        components: {CompetitionList},
        data() {
            return {
                competitions: []
            }
        },
        computed: {
            isLoggedIn: function () {
                return this.$store.getters.isLoggedIn
            }
        },
        methods: {
            onAddButtonClick() {
                this.$router.push({path: '/competition/create'})
            }
        },
        mounted() {
            axios.get('/competition/personal').then((response) => {
                this.competitions = response.data.competitions;
            })
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
