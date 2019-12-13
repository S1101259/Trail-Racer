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
                <td>{{row.time | formatDate}}</td>
                <td v-if="row.isUsersTime"><button class="btn btn-sm btn-primary">X</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "LeaderboardTable",
        props: ['data'],
        methods: {}
    }
</script>

<style scoped>
    .top-50 {
        font-family: FormulaOne-Regular, serif;
    }
</style>
