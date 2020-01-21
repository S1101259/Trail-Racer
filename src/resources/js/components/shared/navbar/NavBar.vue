<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-red navbar-padding navbar-custom-padding">
        <navbar-brand></navbar-brand>
        <nav-bar-toggler></nav-bar-toggler>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <nav-item v-for="(navItem, index) in navItemsLeft"
                          :link="navItem.link"
                          :requiresAuth="navItem['requiresAuth']"
                          :hideAuth="navItem['hideAuth']"
                          :key="index">
                    {{navItem.tag}}
                </nav-item>
            </ul>
            <ul class="navbar-nav float-lg-right">
                <nav-item v-for="(navItem, index) in navItemsRight"
                          :link="navItem.link"
                          :requiresAuth="navItem['requiresAuth']"
                          :hideAuth="navItem['hideAuth']"
                          :key="index">
                    {{navItem.tag}}
                </nav-item>
                <li class="nav-item" v-if="isLoggedIn">
                    <span class="nav-link navbar-item-font" @click="logout()">Uitloggen</span>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
    import NavItem from "./content/NavItem";
    import NavBarToggler from "./content/NavBarToggler";
    import NavbarBrand from "./content/NavbarBrand";

    export default {
        name: "NavBar",
        components: {NavbarBrand, NavBarToggler, NavItem},
        data() {
            return {
                navItemsLeft: [
                    {tag: "Competities", link: {name: 'competitions'}},
                    {tag: "Mijn Competities", link: {name: 'personalCompetitions'}, requiresAuth: true},
                    {tag: "Klassement", link: {name: 'leaderboard'}}
                ],
                navItemsRight: [
                    {tag: "Inloggen", link: {name: 'login'}, hideAuth: true},
                    {tag: "Registreren", link: {name: 'register'}, hideAuth: true},
                    {tag: "Profiel", link: {name: 'profile'}, requiresAuth: true},
                ]
            }
        },
        computed: {
            isLoggedIn: function () {
                return this.$store.getters.isLoggedIn
            }
        },
        methods: {
            logout() {
                this.$store.dispatch('logout');
            }
        }
    }
</script>

<style scoped>
    .bg-red {
        background-color: #e11e00
    }

    .navbar-padding {
        padding: 1em;
    }

    .navbar-custom-padding {
        padding-top: 0;
        padding-bottom: 0;
        z-index: 999;
    }

    .nav-link {
        cursor: pointer;
    }

    .navbar-item-font {
        color: white !important;
        font-family: FormulaOne-Bold, serif;
    }
</style>
