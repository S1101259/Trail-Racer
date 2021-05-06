<template>
    <li class="nav-item active" v-if="showItem">
        <router-link :to="link" class="nav-link navbar-item-font">
            <slot></slot>
        </router-link>
    </li>
</template>

<script>
    export default {
        name: "NavItem",
        props: ['link', 'requiresAuth', 'hideAuth'],
        computed: {
            isLoggedIn: function () {
                return this.$store.getters.isLoggedIn
            },
            showItem: function () {
                return this.isLoggedIn && this.requiresAuth ||
                    !this.isLoggedIn && this.hideAuth ||
                    !this.requiresAuth && !this.hideAuth
            }
        },
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
