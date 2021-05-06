<template>
    <div>
        <h1>Mijn Profiel</h1>
        <table class="table">
            <tr>
                <td class="table-property">Naam</td>
                <td class="table-value">{{userData.name}}</td>
            </tr>
            <tr>
                <td class="table-property">Email</td>
                <td class="table-value">{{userData.email}}</td>
            </tr>
            <tr>
                <td class="table-property">Lid sinds</td>
                <td class="table-value">{{userData.created | formatCreated}}</td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-warning" @click="navigateToChangeName">Naam aanpassen</button>
                </td>
                <td>
                    <button class="btn btn-danger" @click="navigateToChangePassword">Wachtwoord aanpassen</button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        name: "UserInformationTable",
        props: ['userData'],
        methods: {
            navigateToChangeName() {
                this.$router.push({name: 'changeName'})
            },
            navigateToChangePassword() {
                this.$router.push({name: 'changePassword'})
            }
        }
    }
</script>

<style scoped>
    .table-property {
        font-family: FormulaOne-Bold, serif;
        font-weight: bold;
        font-size: 1.2em;
    }

    .table-value {
        padding-left: 1em;
    }
    .container h1 {
        font-family: FormulaOne-Bold, serif;
        border-bottom: 5px solid red;
        padding: 0.2em 0;
    }
</style>
