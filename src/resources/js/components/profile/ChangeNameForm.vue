<template>
    <div>
        <ErrorBox v-if="errorMessage">{{errorMessage}}</ErrorBox>
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
            <div class="mt-4">
                <button class="btn btn-danger" @click.prevent="cancel">
                    Annuleren
                </button>
                <button class="btn btn-primary float-right" @click.prevent="submit" :disabled="$v.$invalid">
                    Veranderen
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import {required} from "vuelidate/lib/validators";
    import ErrorBox from "../shared/error/ErrorBox";
    import InputField from "../shared/form/InputField";

    export default {
        name: "ChangeNameForm",
        components: {InputField, ErrorBox},
        data() {
            return {
                inputFields: [
                    {id: 'name', type: 'text', placeholder: "Vul uw naam in", label: 'Naam:'}
                ],
                formData: {
                    name: ''
                }
            }
        },
        validations: {
            formData: {
                name: {
                    required
                }
            }
        },
        computed: {
            errorMessage: function () {
                return this.$store.getters.profileErrorMessage
            }
        },
        methods: {
            onInputChange(input) {
                this.formData[input.id] = input.value
            },
            onInputBlur(inputId) {
                this.$v.formData[inputId].$touch()
            },
            checkValidation(id) {
                const violations = [];
                switch (id) {
                    case 'name':
                        if (!this.$v.formData.name.required && this.$v.formData.name.$dirty) {
                            violations.push('* Naam mag niet leeg zijn.')
                        }
                        break;
                }
                return violations
            },
            submit() {
                const requestData = {
                    "name": this.formData.name
                };
                this.$store.dispatch('updateName', requestData);
            },
            cancel() {
                this.formData.name = '';
                this.$router.back();
            }
        }
    }
</script>

<style scoped>

</style>
