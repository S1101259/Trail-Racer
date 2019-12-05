<template>
    <div class="podium">
        <div class="pl-1 pr-1">
            <div class="second position-relative">
                <span class="podium-position">2</span>
            </div>
            <div class="driver text-center" data-toggle="tooltip" data-placement="top" :title="second">
                {{second | truncate(10)}}
            </div>
        </div>
        <div class="pl-1 pr-1">
            <div class="first position-relative">
                <span class="podium-position">1</span>
            </div>
            <div class="driver text-center" data-toggle="tooltip" data-placement="top" :title="first">
                {{first | truncate(10)}}
            </div>
        </div>
        <div class="pl-1 pr-1">
            <div class="third position-relative">
                <span class="podium-position">3</span>
            </div>
            <div class="driver text-center" data-toggle="tooltip" data-placement="top" :title="third">
                {{third | truncate(10)}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Podium",
        props: ["first", "second", "third"]
    }
</script>

<style scoped>
    .podium {
        display: flex;
        flex-direction: row;
        justify-content: center;
        font-family: FormulaOne-Wide, serif;
        color: white;
    }

    .first {
        width: 10rem;
        height: 15rem;
        background-color: goldenrod;
        margin: 0;
        font-size: 3.5em;
        border-radius: 10px 10px 0 0;
    }

    .second {
        width: 10rem;
        background-color: silver;
        margin-top: 5rem;
        height: 10rem;
        font-size: 3.5em;
        border-radius: 10px 10px 0 0;
    }

    .third {
        width: 10rem;
        margin-top: 10rem;
        height: 5rem;
        background-color: #a75a2c;
        font-size: 3.5em;
        border-radius: 10px 10px 0 0;
    }

    .podium-position {
        position: absolute;
        bottom: 0;
        width: 100%;
        text-align: center;
    }

    .driver {
        font-family: FormulaOne-Regular, serif;
        background: #34393b;
        font-size: 1.2em;
        border-radius: 0 0 10px 10px;
    }

    @media only screen and (max-width: 600px) {
        .first{
            width: 2em;
            height: 4em;
        }
        .second{
            width: 2em;
            height: 2.5em;
            margin-top: 1.5em;
        }
        .third{
            width: 2em;
            height: 2em;
            margin-top: 2em;
        }

        .podium-position {
            font-size: 0.8em;
        }

        .driver{
            font-size: 0.8em;
        }
    }
</style>
