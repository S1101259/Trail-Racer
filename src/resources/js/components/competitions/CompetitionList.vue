<template>
    <ul class="list-group">
        <li v-for="competition in competitions"

            class="list-group-item competition">
            <button v-if="competition.joined && isLoggedIn"
                    @click="onLeaveClick(competition)"
                    class="button btn-sm btn-danger mr-3 float-left">
                X
            </button>
            <button v-else-if="isLoggedIn"
                    @click="onJoinClick(competition)"
                    class="button btn-sm btn-info mr-3 float-left">
                J
            </button>
            <div @click="onCompetitionClick(competition.slug)">
                <span class="competition-name">{{competition.name}}</span>
                <span class="competition-drivers">Aantal coureurs:
                        <span class="badge badge-primary badge-pill">{{competition.numberOfDrivers}}</span>
                    </span>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        name: "CompetitionList",
        props: ['competitions'],
        computed: {
            isLoggedIn: function () {
                return this.$store.getters.isLoggedIn
            }
        },
        methods: {
            onCompetitionClick(competition) {
                this.$router.push({path: `/competition/${competition}`})
            },
            onJoinClick(competition) {
                const data = {
                    competition: competition.slug
                };

                console.log(data);
                axios.post('/competition/join', data).then(() => {
                    this.$router.push({path: `/competition/${competition.slug}`})
                })
            },
            onLeaveClick(competition) {
                const data = {
                    competition: competition.slug
                };
                axios.post('/competition/leave', data).then(() => {
                    axios.get('/competition/all').then((response) => {
                        this.competitions = response.data.competitions;
                    })
                })
            }
        }
    }
</script>

<style scoped>
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
</style>
