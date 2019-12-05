<template>
    <div>
        <ul class="nav nav-tabs">
            <li class="nav-item" v-for="circuit in circuits">
                <span class="nav-link" :class="selectedCircuit === circuit ? 'active' : ''"
                      @click="$emit('circuitChanged', circuit)">
                    {{circuit.name}}
                </span>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "CircuitsNav",
        props: ['selectedCircuit', 'circuits']
    }
</script>

<style scoped>

    .nav{
        width: 100%;
        flex-wrap: nowrap;
        flex-direction: row;
        overflow: scroll;
        overflow-y: hidden;
    }

    .nav::-webkit-scrollbar{
        display: none;
    }

    .nav-item{
        color: white;
        cursor: pointer;
        font-family: FormulaOne-Bold, serif;
        background-image: linear-gradient(black, #423f43);
    }

    .nav-link{
        color: white;
        width: max-content;
        border: none;
    }

    .nav-tabs{
        border: none;
    }

    .nav-link.active {
        border-radius: 0 !important;
    }
</style>
