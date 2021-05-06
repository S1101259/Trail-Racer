<template>
    <div class="container">
        <Loading :is-loading="isLoading"></Loading>
        <div v-if="!isLoading && !errorMessage">
           <UserInformationTable :user-data="userData"></UserInformationTable>
        </div>
    </div>
</template>

<script>
    import Loading from "../../components/shared/loading/Loading";
    import UserInformationTable from "../../components/profile/UserInformationTable";
    export default {
        name: "Profile",
        components: {UserInformationTable, Loading},
        methods: {

        },
        computed: {
            userData: function () {
                return this.$store.getters.userData;
            },
            errorMessage: function () {
                return this.$store.getters.profileErrorMessage;
            },
            isLoading: function () {
                return this.$store.getters.isFetchingUserData;
            }
        },
        mounted() {
           this.$store.dispatch('fetchUserData');
        }
    }
</script>

<style scoped>
    .container {
        font-family: FormulaOne-Regular, serif;
    }
</style>
