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
            <button class="btn btn-danger" @click.prevent="cancel">
                Annuleren
            </button>
            <button
                class="btn btn-primary float-right"
                @click.prevent="submit"
                :disabled="$v.$invalid">
                Verander
            </button>
        </form>
    </div>
</template>

<script>
    import {minLength, required, sameAs} from "vuelidate/lib/validators";
    import ErrorBox from "../shared/error/ErrorBox";
    import InputField from "../shared/form/InputField";

    export default {
        name: "ChangePasswordForm",
        components: {InputField, ErrorBox},
        data() {
            return {
                inputFields: [
                    {id: 'password', type: 'password', placeholder: "Vul het nieuwe wachtwoord in.", label: 'Competitie naam:'},
                    {id: 'repeatedPassword', type: 'password', placeholder: "Vul het nieuwe wachtwoord in.", label: 'Herhaal wachtwoord:'}
                ],
                formData: {
                    password: '',
                    repeatedPassword: ''
                }
            }
        },
        validations: {
            formData: {
                password: {
                    required,
                    minLength: minLength(6)
                },
                repeatedPassword: {
                    required,
                    sameAsPassword: sameAs('password')
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
                    case 'password':
                        if (!this.$v.formData.password.required && this.$v.formData.password.$dirty) {
                            violations.push('* deze veld mag niet leeg zijn.')
                        }
                        if(!this.$v.formData.password.minLength){
                            violations.push('* Uw wachtwoord moet minimaal 6 karakters bevatten.')
                        }
                        break;
                    case 'repeatedPassword':
                        if (!this.$v.formData.repeatedPassword.required && this.$v.formData.repeatedPassword.$dirty) {
                            violations.push('* deze veld mag niet leeg zijn.')
                        }
                        if(!this.$v.formData.repeatedPassword.sameAsPassword){
                            violations.push('* Uw wachtwoord komt niet overeen.')
                        }
                        break;
                }
                return violations
            },
            submit() {
                const requestData = {
                    password: this.formData.password
                };
                this.$store.dispatch('updatePassword', requestData);
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
