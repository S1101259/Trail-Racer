<template>
    <div class="min-vh-100">
        <nav-bar/>
        <transition name="fade" mode="out-in">
            <router-view/>
        </transition>
    </div>
</template>

<script>
    import NavBar from "../components/shared/navbar/NavBar";
    export default {
        name: "App",
        components: {NavBar}
    }
</script>

<style scoped>
    .min-vh-100{
        background-color: white;
    }
</style>
