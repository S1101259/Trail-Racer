<template>
    <div>
        <div class="container">
            <h1>Competities</h1>
            <ul class="list-group">
                <li v-for="competition in competitions"
                    @click="onCompetitionClick(competition.slug)"
                    class="list-group-item competition">
                    <span class="competition-name">{{competition.name}}</span>
                    <span class="competition-drivers">Aantal coureurs:
                        <span class="badge badge-primary badge-pill">{{competition.numberOfDrivers}}</span>
                    </span>
                </li>
            </ul>
            <button @click="onAddButtonClick()" class="btn btn-primary rounded-circle add-button">+</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CompetitionOverview",
        data() {
            return {
                competitions: [
                    {
                        name: 'Formula Dank',
                        numberOfDrivers: 10,
                        slug: 'Formuladank'
                    },
                    {
                        name: 'Formula 1.5',
                        numberOfDrivers: 15,
                        slug: 'FormulaOnePoint5'
                    },
                    {
                        name: 'I dont know',
                        numberOfDrivers: 20,
                        slug: 'idontknow'
                    }
                ]
            }
        },
        methods: {
            onCompetitionClick(competition) {
                this.$router.push({path: `/competition/${competition}`})
            },
            onAddButtonClick(){
                this.$router.push({path: '/competition/create'})
            }
        }
    }
</script>

<style scoped>
    .container h1 {
        font-family: FormulaOne-Bold, serif;
        border-bottom: 5px solid red;
        padding: 0.2em 0;
    }

    .competition-name {
        font-family: FormulaOne-Bold, serif;
    }

    .competition-drivers {
        float: right;
        width: 30%;
        font-family: FormulaOne-Regular, serif;
    }

    .badge {
        padding: 0.5em 1em;
        margin-left: 1em;
    }

    .competition:hover {
        cursor: pointer;
        background: #34393b;
        color: white;
    }

    .add-button{
        position: absolute;
        right: 2em;
        bottom: 2em;
    }
</style>
