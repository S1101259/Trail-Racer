<template>
    <div>
        <error-box v-if="error">{{error}}</error-box>
        <form>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email"
                       v-model="credentials.email"
                       @blur="$v.credentials.email.$touch()"
                       class="form-control"
                       id="email"
                       placeholder="Vul uw email in">
                <p v-if="!$v.credentials.email.required && $v.credentials.email.$dirty">
                    * Email mag niet leeg zijn.
                </p>
                <p v-if="!$v.credentials.email.email">
                    * Geen geldige email.
                </p>
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password"
                       v-model="credentials.password"
                       class="form-control"
                       id="password"
                       placeholder="Vul uw wachtwoord in">
                <p v-if="!$v.credentials.password.required && $v.credentials.password.$dirty">
                    * Wachtwoord mag niet leeg zijn.
                </p>
            </div>
            <button v-on:click.prevent="login()"
                    :disabled="$v.$invalid"
                    class="btn btn-primary float-right rounded px-3">
                Inloggen
            </button>
        </form>
    </div>
</template>

<script>
    import {required, email} from "vuelidate/lib/validators";
    import ErrorBox from "../shared/error/ErrorBox";

    export default {
        name: "LoginForm",
        components: {ErrorBox},
        data: function () {
            return {
                credentials: {
                    email: '',
                    password: '',
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
