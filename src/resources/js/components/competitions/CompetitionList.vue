<template>
    <ul class="list-group">
        <li v-for="competition in competitions"
            class="list-group-item competition">
            <button v-if="competition.joined && isLoggedIn"
                    @click="onLeaveClick(competition)"
                    class="button btn-sm btn-danger mr-3 float-left">
                <font-awesome-icon class="icon" icon="times"></font-awesome-icon>
            </button>
            <button v-else-if="isLoggedIn"
                    @click="onJoinClick(competition)"
                    class="button btn-sm btn-success mr-3 float-left">
                <font-awesome-icon class="icon" icon="sign-in-alt"></font-awesome-icon>
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
        props: ['competitions', 'leaveAction'],
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
                this.$store.dispatch('joinCompetition', competition)
            },
            onLeaveClick(competition) {
                this.$store.dispatch('leaveCompetition', {competition, leaveAction: this.leaveAction})
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

    .icon{
        width: 1em;
        height: 1em;
    }
</style>
