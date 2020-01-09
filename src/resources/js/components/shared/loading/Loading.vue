<template>
    <div v-if="isLoading">
        <img class="f1-loading" src="../../../../images/redTire.png" alt="loader"/>
    </div>
</template>

<script>
    export default {
        name: "Loading",
        props: ['isLoading']
    }
</script>

<style scoped>
    .f1-loading {
        width: 80px;
        height: 80px;
        animation: lds-dual-ring 0.2s linear infinite;
    }

    @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>
