<template>
    <router-link :to="{name: 'home'}" class="navbar-brand navbar-brand-font p-lg-0">
        <img src="../../../../../images/raymonlogo.png"
             class="d-inline-block align-top p-lg-0 navbar-brand-logo" alt="">
    </router-link>
</template>

<script>
    export default {
        name: "NavbarBrand"
    }
</script>

<style scoped>
    .navbar-brand-logo {
        width: 17em;
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
