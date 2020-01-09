<template>
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
        <button @click.prevent="createCompetition"
                class="btn btn-primary float-right rounded px-3"
                :disabled="$v.$invalid || isCreatingCompetition">
            Aanmaken
        </button>
    </form>
</template>

<script>
    import {required} from 'vuelidate/lib/validators'

    export default {
        name: "AddCompetitionForm",
        data() {
            return {
                competition: {
                    name: ''
                }
            }
        },
        computed: {
            isCreatingCompetition: function () {
                return this.$store.getters.isCreatingCompetition;
            },
            errorMessage: function () {
                return this.$store.getters.errorMessage
            }
        },
        methods: {
            createCompetition() {
                const data = {
                    name: this.competition.name
                };
                this.$store.dispatch('createCompetition', data);
            }
        },
        validations: {
            competition: {
                name: {
                    required
                }
            }
        }
    }
</script>

<style scoped>
    form, label {
        font-family: FormulaOne-Regular, serif;
    }

    h2, button {
        font-family: FormulaOne-Bold, serif;
        margin-bottom: 1em;
    }
</style>
