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
            <button v-on:click.prevent="login()"
                    :disabled="$v.$invalid || authStatus === 'loading'"
                    class="btn btn-primary float-right rounded px-3">
                Inloggen
            </button>
        </form>
    </div>
</template>

<script>
    import {required, email} from "vuelidate/lib/validators";
    import ErrorBox from "../shared/error/ErrorBox";
    import InputField from "../shared/form/InputField";

    export default {
        name: "LoginForm",
        components: {InputField, ErrorBox},
        data: function () {
            return {
                inputFields: [
                    {id: 'email', type: 'email', placeholder: "Vul uw email in", label: 'Email'},
                    {id: 'password', type: 'password', placeholder: "Vul uw wachtwoord in", label: 'Wachtwoord'}
                ],
                credentials: {
                    email: '',
                    password: ''
                },
                error: ''
            };
        },
        validations: {
            credentials: {
                email: {
                    required,
                    email
                },
                password: {
                    required
                }
            }
        },
        methods: {
            onInputChange(input) {
                this.credentials[input.id] = input.value
            },
            onInputBlur(inputId) {
                this.$v.credentials[inputId].$touch()
            },
            checkValidation(id) {
                const violations = [];
                switch (id) {
                    case 'name':
                        if (!this.$v.credentials.email.required && this.$v.credentials.email.$dirty) {
                            violations.push('* Email mag niet leeg zijn.')
                        }
                        if(!this.$v.credentials.email.email){
                            violations.push('* Geen geldige email.')
                        }
                        break;
                    case 'password':
                        if(!this.$v.credentials.password.required && this.$v.credentials.password.$dirty){
                            violations.push('* Wachtwoord mag niet leeg zijn.')
                        }
                        break;
                }
                return violations
            },
            login() {
                if(this.$v.invalid){
                    return
                }
                this.$store.dispatch('login', this.credentials)
                    .then(() => {
                        this.$router.push({name: 'home'})
                    }).catch(() => {
                    this.error = "Inloggen is niet gelukt. Controleer uw gegevens."
                })
            }
        },
        computed: {
            authStatus: function () {
                return this.$store.getters.authStatus
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
