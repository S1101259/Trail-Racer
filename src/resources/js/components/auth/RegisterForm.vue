<template>
    <div>
        <error-box v-if="error">{{error}}</error-box>
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
            <button @click.prevent="register()"
                    class="btn btn-primary float-right rounded px-3"
                    :disabled="$v.$invalid || authStatus === 'loading'">
                Registreren
            </button>
        </form>
    </div>
</template>

<script>
    import {email, minLength, required, sameAs} from 'vuelidate/lib/validators'
    import ErrorBox from "../shared/error/ErrorBox";
    import InputField from "../shared/form/InputField";

    export default {
        name: "RegisterForm",
        components: {InputField, ErrorBox},
        data: function () {
            return {
                inputFields: [
                    {id: 'name', type: 'text', placeholder: "Vul uw naam in", label: 'Naam:'},
                    {id: 'email', type: 'email', placeholder: "Vul uw email in", label: 'Email:'},
                    {id: 'password', type: 'password', placeholder: "Vul uw wachtwoord in", label: 'Wachtwoord:'},
                    {id: 'repeatedPassword', type: 'password', placeholder: "Herhaal wachtwoord", label: 'Wachtwoord herhalen:'},
                ],
                accountInformation: {
                    email: '',
                    password: '',
                    repeatedPassword: '',
                    name: '',
                },
                error: ''
            }
        },
        validations: {
            accountInformation: {
                name: {
                    required
                },
                email: {
                    required,
                    email,
                },
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
            authStatus: function () {
                return this.$store.getters.authStatus
            }
        },
        methods: {
            onInputChange(input) {
                this.accountInformation[input.id] = input.value
            },
            onInputBlur(inputId) {
                this.$v.accountInformation[inputId].$touch()
            },
            checkValidation(id) {
                const violations = [];
                switch (id) {
                    case 'name':
                        if (!this.$v.accountInformation.name.required && this.$v.accountInformation.name.$dirty) {
                            violations.push('* Naam mag niet leeg zijn.')
                        }
                        break;
                    case 'email':
                        if(!this.$v.accountInformation.email.required && this.$v.accountInformation.email.$dirty){
                            violations.push('* Email mag niet leeg zijn.')
                        }
                        if(!this.$v.accountInformation.email.email){
                            violations.push('* Geen geldige email.')
                        }
                        break;
                    case 'password':
                        if(!this.$v.accountInformation.password.required && this.$v.accountInformation.password.$dirty){
                            violations.push('* Wachtwoord mag niet leeg zijn.')
                        }
                        if(!this.$v.accountInformation.password.minLength){
                            violations.push('* Uw wachtwoord moet minimaal 6 karakters bevatten.')
                        }
                        break;
                    case 'repeatedPassword':
                        if(!this.$v.accountInformation.repeatedPassword.required && this.$v.accountInformation.repeatedPassword.$dirty){
                            violations.push('* Wachtwoord herhalen mag niet leeg zijn.')
                        }
                        if(!this.$v.accountInformation.repeatedPassword.sameAsPassword){
                            violations.push('* Uw wachtwoord komt niet overeen.')
                        }
                        break;
                }
                return violations
            },
            register() {
                if(this.$v.invalid){
                    return
                }
                const user = {
                    name: this.accountInformation.name,
                    email: this.accountInformation.email,
                    password: this.accountInformation.password
                };
                this.$store.dispatch("register", user)
                    .then(() => {
                        this.$router.push({name: 'home'})
                    }).catch(() => {
                    this.error = "Het aanmaken van een nieuw account is niet gelukt.";
                });
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
