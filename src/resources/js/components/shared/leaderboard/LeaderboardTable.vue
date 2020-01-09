<template>
    <div class="top-50">
        <table class="table table-responsive-md">
            <tbody>
            <tr v-for="(row, index) in data">
                <td>#{{index + 1}}</td>
                <td>{{row.user}}</td>
                <td :style="{'border-left': `5px solid ${row.team.color}`}">
                    {{row.team.name}}
                </td>
                <td>{{row.time.lapTime | formatDate}}</td>
                <td v-if="row.isUsersTime">
                    <button @click.prevent="removeTime(row.time.id)" class="btn btn-sm btn-primary">X</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "LeaderboardTable",
        props: ['data', 'reloadAction'],
        methods: {
            removeTime(id) {
                console.log(id);
                axios.delete(`/time/remove/${id}`).then(() => {
                    this.reloadAction();
                });
            }
        }
    }
</script>

<style scoped>
    .top-50 {
        font-family: FormulaOne-Regular, serif;
    }
</style>
