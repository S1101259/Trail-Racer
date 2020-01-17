<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-red navbar-padding navbar-custom-padding">
        <router-link :to="{name: 'home'}" class="navbar-brand navbar-brand-font p-lg-0">
            <img src="../../../../images/raymonlogo.png"
                 class="d-inline-block align-top p-lg-0 navbar-brand-logo" alt="">
        </router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <router-link :to="{name: 'competitions'}" class="nav-link navbar-item-font">Competities
                    </router-link>
                </li>
                <li class="nav-item" v-if="isLoggedIn">
                    <router-link :to="{name: 'personalCompetitions'}" class="nav-link navbar-item-font">
                        Mijn Competities
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{name: 'leaderboard'}" class="nav-link navbar-item-font">Klassement</router-link>
                </li>
            </ul>
            <ul class="navbar-nav float-lg-right">
                <template v-if="!isLoggedIn">
                    <li class="nav-item active">
                        <router-link :to="{name: 'login'}" class="nav-link navbar-item-font">Login</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'register'}" class="nav-link navbar-item-font">Registreer</router-link>
                    </li>
                </template>
                <template v-else>
                    <li class="nav-item">
                        <router-link class="nav-link navbar-item-font" :to="{name: 'profile'}">Mijn Profiel</router-link>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link navbar-item-font" @click="logout()">Uitloggen</span>
                    </li>
                </template>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "NavBar",
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

    .navbar-brand-logo {
        width: 17em;
    }

    .nav-link {
        cursor: pointer;
    }

    .navbar-item-font {
        color: white !important;
        font-family: FormulaOne-Bold, serif;
    }

    @media only screen and (max-width: 600px) {
        .navbar-brand {
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar-brand-logo {
            width: 15em;
        }
    }
</style>
