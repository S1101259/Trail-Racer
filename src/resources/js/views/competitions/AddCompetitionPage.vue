<template>
    <div class="background">
        <div class="create-container">
            <h2>Competitie aanmaken</h2>
            <form>
                <div class="form-group">
                    <label for="name">Competitie naam:</label>
                    <input type="text"
                           class="form-control"
                           id="name"
                           v-model="competition.name"
                           @blur="$v.competition.name.$touch()"
                           placeholder="Vul competitie naam in">
                    <p v-if="!$v.competition.name.required && $v.competition.name.$dirty">
                        * Naam mag niet leeg zijn.
                    </p>
                </div>
                <button @click.prevent="createCompetition" class="btn btn-primary float-right rounded px-3">
                    Aanmaken
                </button>
            </form>
        </div>
        <div class="right-container">

        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import {required} from "vuelidate/lib/validators";
    export default {
        name: "AddCompetitionPage",
        data(){
            return {
                competition:{
                    name: ''
                }
            }
        },
        methods: {
          createCompetition(){
              const data = {
                  name:  this.competition.name
              };
              axios.post('/competition/create', data)
                  .then(() => {
                      this.$router.push({name: 'competitions'})
                  })
                  .catch((errorMessage) => {

                  })
          }
        },
        validations: {
            competition:{
                name: {
                    required
                }
            }
        }
    }
</script>

<style scoped>
    .background {
        background-image: url("../../../images/background.png");
        height: 100vh;
        width: 100vw;
        margin-top: -69px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .create-container {
        clear: both;
        background-color: white;
        height: 25rem;
        width: 30rem;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        padding: 3em;
        position: relative;
        box-shadow: 13px 13px 41px -9px rgba(0, 0, 0, 0.47);
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
        background-image: url("../../../images/add_competition.gif");
        background-position: center;
        background-size: cover;
    }

    form, label {
        font-family: FormulaOne-Regular, serif;
    }

    h2, button {
        font-family: FormulaOne-Bold, serif;
        margin-bottom: 1em;
    }

</style>
