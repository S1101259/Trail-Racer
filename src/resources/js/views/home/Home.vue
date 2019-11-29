<template>
    <div>
        <div class="upcoming w-100">
            <div class="circuit d-flex flex-row">
                <img class="circuit-layout" src="../../../images/tracks/australia.png" width="" alt="Race track">
                <div class="circuit-information d-flex">
                    <h1 class="text-center grand-prix">Abu Dhabi Grand Prix</h1>
                    <h2 class="text-center circuit">Yas Marina Circuit</h2>
                </div>
            </div>
            <div class="countdown d-flex">
                <h1>Race start over:</h1>
                <countdown :time="2 * 24 * 60 * 60 * 1000">
                    <template slot-scope="props">
                        {{ props.days }} dagen, {{ props.hours }} uur, {{ props.minutes }} minuten.
                    </template>
                </countdown>
            </div>
        </div>
        <div>
            <div class="trail-racer-information-container">
                <div class="col-md-6 padding half-width-block">
                    <h1>Trail Racer</h1>
                    <p class="trail-racer-information">
                        Trail racer is een leaderboard voor Formule 1 spellen.
                        Bij trail racer strijd je in verschillende competities met als doel: De snelste coureur in je
                        competitie te zijn.
                        En Misschien wel de snelste van iedereen. Hou je tijd bij en daag je vrienden uit!
                        <router-link :to="{name: 'register'}">Registreren</router-link>
                        is gratis. Dus ren naar de pit voor de andere je inhalen!
                    </p>
                </div>
                <div class="col-md-6 run-gif">
                </div>
            </div>
            <div class="podium-container">
                <div class="col-md-6  pt-5 pb-5">
                    <podium></podium>
                </div>
                <div class="col-md-6 padding">
                    <h1 class="sub-header">Beste Coureurs</h1>
                    <p class="trail-racer-information-2">
                        Hiernaast zit u de huidige top drie op alle cicuits. Om dit te berijken moet je toch uit het
                        racers hout gesneden zijn.
                        Hier kunt u per circuit de snelste is. Wil je zelf op het podium staan? Zet nu je snelste tijd
                        neer en ga de strijd met andere aan!
                    </p>
                </div>
            </div>
            <div class="competition-container">
                <div class="col-md-6 padding">
                    <h1 class="">Competities</h1>
                    <p class="competition-information">
                        Trail racer bevat verschillende competities net als echte autosport. Denk aan F1, F2 F3, Nascar en Indycar.
                        In deze competieties gaan verschillende coureurs de strijd met elkaar aan.
                        Zoek een competitie die bij je past of maak er zelf een met je vrienden.
                    </p>
                </div>
                <div class="col-md-6">
                    <div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="competition-name">De snelste Rijders</span>
                                <span class="competition-drivers">Aantal coureurs
                                    <span class="badge badge-primary badge-pill">10</span>
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="competition-name">Formuladank</span>
                                <span class="competition-drivers">Aantal coureurs
                                    <span class="badge badge-primary badge-pill">1000</span>
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="competition-name">Formula 1.5</span>
                                <span class="competition-drivers">Aantal coureurs
                                    <span class="badge badge-primary badge-pill">14</span>
                                </span>
                            </li>
                            <li class="list-group-item">
                                <span class="competition-name">Formula 1.5</span>
                                <span class="competition-drivers">Aantal coureurs
                                    <span class="badge badge-primary badge-pill">14</span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Countdown from "@chenfengyuan/vue-countdown/src/index";
    import Podium from "../../components/shared/podium/Podium";

    export default {
        components: {Podium, Countdown},
        name: "Home"
    }
</script>

<style scoped>
    .upcoming {
        background-image: linear-gradient(#0b0d0e, #323232);
        width: 100%;
        height: 10rem;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-content: center;
    }

    .circuit-layout {
        width: 10rem;
    }

    .circuit-information {
        color: white;
        font-family: FormulaOne-Bold, serif;
        align-items: center;
        flex-direction: column;
        margin: auto 0;
    }

    .circuit {
        font-family: FormulaOne-Regular, serif;
    }

    .countdown {
        color: white;
        font-family: FormulaOne-Regular, serif;
        font-size: 2em;
        flex-direction: column;
        margin: auto 0;
    }

    .podium-container {
        background-image: linear-gradient(#212526, #656565);
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .sub-header {
        font-family: FormulaOne-Bold, serif;
        color: white;
    }

    .padding {
        padding: 5em 10em;
    }

    .half-width-block {
        height: 30em;
    }

    .trail-racer-information-container {
        display: flex;
        flex-direction: row;
    }

    .run-gif {
        background-position: center;
        background-size: cover;
        background-image: url("../../../images/run.gif");
    }

    .trail-racer-information-container h1 {
        font-family: FormulaOne-Bold, serif;
        margin-top: 1em;
    }

    .trail-racer-information {
        font-family: FormulaOne-Regular, serif;
        font-size: 1.1em;
    }

    .trail-racer-information-2 {
        color: white;
        font-family: FormulaOne-Regular, serif;
        font-size: 1.1em;
    }

    .competition-container {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .competition-container h1{
        font-family: FormulaOne-Bold, serif;
    }

    .competition-name {
        font-family: FormulaOne-Bold, serif;
    }

    .competition-drivers {
        float: right;
        font-family: FormulaOne-Regular, serif;
    }

    .badge {
        padding: 0.5em 1em;
    }

    .competition-information{
        font-family: FormulaOne-Regular, serif;
        font-size: 1.1em;
    }

</style>
