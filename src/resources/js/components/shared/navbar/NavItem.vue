<template>
    <li class="nav-item active">
        <router-link :to="{name: 'competitions'}" class="nav-link navbar-item-font">
            <slot></slot>
        </router-link>
    </li>
</template>

<script>
    export default {
        name: "NavItem",
        props: ['Link']
    }
</script>

<style scoped>
    .nav-link {
        cursor: pointer;
    }

    .navbar-item-font {
        color: white !important;
        font-family: FormulaOne-Bold, serif;
    }
</style>
