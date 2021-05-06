<template>
    <div v-if="isLoading" class="loader">
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
    .loader{
        width: 100px;
        margin: 0 auto;
    }
    .f1-loading {
        width: 100px;
        height: 100px;
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
