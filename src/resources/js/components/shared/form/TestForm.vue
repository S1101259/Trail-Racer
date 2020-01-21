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
    </form>
</template>

<script>
    import {required} from 'vuelidate/lib/validators'
    import InputField from "./InputField";

    export default {
        name: "TestForm",
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
                }
                return violations
            }
        }
    }
</script>

<style scoped>

</style>
