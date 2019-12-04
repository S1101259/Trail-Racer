<template>
    <div class="upcoming w-100" v-if="show">
        <div class="circuit d-flex flex-row">
            <img class="circuit-layout" src="../../../../images/tracks/australia.png" width="" alt="Race">
            <div class="circuit-information d-flex">
                <h1 class="text-center grand-prix">{{this.race.name}}</h1>
                <h2 class="text-center circuit">{{this.race.circuit.name}}</h2>
            </div>
        </div>
        <div class="countdown d-flex">
            <h1>Race start over:</h1>
            <countdown :time="raceStart" @end="show = false">
                <template slot-scope="props">
                    {{ props.days }} dagen, {{ props.hours }} uur, {{ props.minutes }} minuten.
                </template>
            </countdown>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Upcoming",
        data: ()=>{
            return {
                race:{
                    circuit: {
                       name: '',
                       locality: ''
                    },
                    name: '',
                    date: '',
                    time: ''
                },

                show: false
            }
        },
        computed: {
            raceStart: function () {
                return new Date(this.race.date + " " + this.race.time) - new Date();
            }
        },
        methods: {
            fetchData() {
                const instance = this.axios.create();
                delete instance.defaults.headers.common["X-Requested-With"];
                delete instance.defaults.headers.common["Authorization"];
                instance.get('http://ergast.com/api/f1/current/next.json', {

                    }).then((response) => {
                    const race = response.data.MRData.RaceTable.Races[0];
                    this.setRaceInformation(race);
                    if(this.raceStart > 0){
                        this.show = true;
                    }
                });
            },
            setRaceInformation(race) {
                this.race.name = race.raceName;
                this.race.time = race.time;
                this.race.date = race.date;
                this.race.circuit.name = race.Circuit.circuitName;
                this.race.circuit.locality = race.Circuit.Location.locality
            }
        },
        mounted() {
            this.fetchData();
        }
    }
</script>

<style scoped>
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

    .upcoming {
        background-image: linear-gradient(#0b0d0e, #323232);
        width: 100%;
        height: 10rem;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-content: center;
    }


    .countdown {
        color: white;
        font-family: FormulaOne-Regular, serif;
        font-size: 2em;
        flex-direction: column;
        margin: auto 0;
    }
</style>
