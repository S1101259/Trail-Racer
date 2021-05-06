<template>
    <form>
        <InputField v-for="inputField in inputFields"
                    :key="inputField.id"
                    :id="inputField.id"
                    :type="inputField.type"
                    :placeholder="inputField.placeholder"
                    :label="inputField.label"
                    :validations="checkValidation(inputField.id)"
                    @onBlur="onInputBlur"
                    @onValueChange="onInputChange">
        </InputField>
        <button @click.prevent="createCompetition"
                class="btn btn-primary float-right rounded px-3"
                :disabled="$v.$invalid || isCreatingCompetition">
            Aanmaken
        </button>
    </form>
</template>

<script>
    import {required} from 'vuelidate/lib/validators'
    import InputField from "../shared/form/InputField";

    export default {
        name: "AddCompetitionForm",
        components: {InputField},
        data() {
            return {
                inputFields: [
                    {id: 'name', type: 'text', placeholder: "Vul competitie naam in", label: 'Competitie naam:'}
                ],
                competition: {
                    name: ''
                }
            }
        },
        validations: {
            competition: {
                name: {
                    required
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
            onInputChange(input) {
                this.competition[input.id] = input.value
            },
            onInputBlur(inputId) {
                this.$v.competition[inputId].$touch()
            },
            checkValidation(id) {
                const violations = [];
                switch (id) {
                    case 'name':
                        if (!this.$v.competition.name.required && this.$v.competition.name.$dirty) {
                            violations.push('* Naam mag niet leeg zijn.')
                        }
                        break;
                }
                return violations
            },
            createCompetition() {
                const data = {
                    name: this.competition.name
                };
                this.$store.dispatch('createCompetition', data);
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
