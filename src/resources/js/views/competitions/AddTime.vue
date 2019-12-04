<template>
    <div class="background">
        <div class="add-container">
            <form>
                <div class="row align-content-around">
                    <div class="form-group col-3">
                        <label for="min">Minuten:</label>
                        <input type="number"
                               class="form-control"
                               id="min"
                               v-model="minutes"
                               :class="!$v.minutes.maxValue ? 'is-invalid' : ''"
                               @blur="$v.minutes.$touch()"
                               placeholder="Minuten">
                    </div>
                    <span class="dot">:</span>
                    <div class="form-group col-3">
                        <label for="sec">Seconden:</label>
                        <input type="number"
                               class="form-control"
                               :class="!$v.seconds.maxValue ? 'is-invalid' : ''"
                               id="sec"
                               v-model="seconds"
                               @blur="$v.seconds.$touch()"
                               placeholder="Seconden">
                    </div>
                    <span class="small-dot">.</span>
                    <div class="form-group col-3">
                        <label for="ms">Milliseconden:</label>
                        <input type="number"
                               class="form-control"
                               id="ms"
                               :class="!$v.milliseconds.maxValue ? 'is-invalid' : ''"
                               v-model="milliseconds"
                               @blur="$v.milliseconds.$touch()"
                               placeholder="Milliseconden">
                    </div>
                </div>
                <div class="form-group">
                    <label for="teams">Team:</label>
                    <select class="form-control"
                            id="teams"
                            :class="!$v.selectedTeam.notSameAs && $v.selectedTeam.$dirty ? 'is-invalid' : ''"
                            v-model="selectedTeam"
                            @blur="$v.selectedTeam.$touch()">
                        <option value="0">Selecteer je team</option>
                        <option :value="team.id" v-for="team in teams">{{team.name}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="circuits">Circuit:</label>
                    <select class="form-control"
                            id="circuits"
                            :class="!$v.selectedCircuit.notSameAs && $v.selectedCircuit.$dirty ? 'is-invalid' : ''"
                            v-model="selectedCircuit"
                            @blur="$v.selectedCircuit.$touch()">
                        <option value="0">Selecteer je circuit</option>
                        <option :value="circuit.id" v-for="circuit in circuits">{{circuit.name}}</option>
                    </select>
                </div>
                <button class="btn btn-primary" @click.prevent="onSubmit">Toevoegen</button>
            </form>
        </div>
        <div class="right-container">

        </div>
    </div>
</template>

<script>
    import {maxValue, not, required, sameAs} from "vuelidate/lib/validators";
    import axios from 'axios'

    export default {
        name: "AddTime",
        data() {
            return {
                minutes: 0,
                seconds: 0,
                milliseconds: 0,
                selectedTeam: '0',
                selectedCircuit: '0'
            }
        },
        validations() {
            return {
                minutes: {
                    required,
                    maxValue: maxValue(60)
                },
                seconds: {
                    required,
                    maxValue: maxValue(60)
                },
                milliseconds: {
                    required,
                    maxValue: maxValue(999)
                },
                selectedTeam: {
                    required,
                    notSameAs: not(sameAs(() => '0'))
                },
                selectedCircuit: {
                    required,
                    notSameAs: not(sameAs(() => '0'))
                }
            }
        },
        computed: {
            timeInMilliseconds: function () {
                return this.milliseconds + (this.seconds * 1000) + (this.minutes * 60 * 1000)
            },

            circuits: function () {
                return this.$store.getters.getCircuits
            },
            teams: function () {
                return this.$store.getters.getTeams
            }
        },
        methods: {
            onSubmit() {
                console.log(this.timeInMilliseconds);
                console.log(this.selectedTeam);
                console.log(this.selectedCircuit);
                console.log(this.$v)
            },
            fetchTeams(){
                this.$store.dispatch("fetchTeams")
            },
            fetchCircuits(){
                this.$store.dispatch("fetchCircuits")
            }
        },
        mounted() {
            this.fetchTeams();
            this.fetchCircuits();
        }
    }
</script>

<style scoped>
    .background {
        background-image: url("../../../images/background.png");
        height: 100vh;
        min-height: 600px;
        width: 100vw;
        margin-top: -69px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .add-container {
        clear: both;
        background-color: white;
        height: 25rem;
        width: 35rem;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        padding: 3em;
        position: relative;
        box-shadow: 13px 13px 41px -9px rgba(0, 0, 0, 0.47);
        font-family: FormulaOne-Regular, serif;
    }

    .right-container {
        clear: both;
        background-color: gray;
        height: 25rem;
        width: 20rem;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        padding: 3em;
        position: relative;
        box-shadow: 13px 13px 41px -9px rgba(0, 0, 0, 0.47);
        background-image: url("../../../images/addTime.gif");
        background-position: center;
        background-size: cover;
    }

    .dot {
        padding-top: 0.9em;
        font-size: 2em;
        color: gray;
    }

    .small-dot {
        padding-top: 0.8em;
        font-size: 2em;
        color: gray;
    }

</style>
