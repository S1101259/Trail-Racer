<template>
    <div>
        <error-box v-if="error">{{error}}</error-box>
        <form>
            <div class="form-group">
                <label for="name">Naam</label>
                <input type="text"
                       v-model="accountInformation.name"
                       @blur="$v.accountInformation.name.$touch()"
                       class="form-control"
                       id="name"
                       placeholder="Vul uw naam in">
                <p v-if="!$v.accountInformation.name.required && $v.accountInformation.name.$dirty">
                    * Naam mag niet leeg zijn.
                </p>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email"
                       class="form-control"
                       v-model="accountInformation.email"
                       id="email"
                       placeholder="Vul uw email in">
                <p v-if="!$v.accountInformation.email.required && $v.accountInformation.email.$dirty">
                    * Email mag niet leeg zijn.
                </p>
                <p v-if="!$v.accountInformation.email.email">
                    * Geen geldige email.
                </p>
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password"
                       class="form-control"
                       v-model="accountInformation.password"
                       id="password"
                       placeholder="Vul uw wachtwoord in">
                <p v-if="!$v.accountInformation.email.required && $v.accountInformation.email.$dirty">
                    * Wachtwoord mag niet leeg zijn.
                </p>
                <p v-if="!$v.accountInformation.password.minLength">
                    * Uw wachtwoord moet minimaal 6 karakters bevatten.
                </p>
            </div>
            <div class="form-group">
                <label for="repeatPassword">Wachtwoord herhalen</label>
                <input type="password"
                       class="form-control"
                       v-model="accountInformation.repeatedPassword"
                       id="repeatPassword"
                       placeholder="Herhaal wachtwoord">
                <p v-if="!$v.accountInformation.email.required && $v.accountInformation.email.$dirty">
                    * Wachtwoord herhalen mag niet leeg zijn.
                </p>
                <p v-if="!$v.accountInformation.repeatedPassword.sameAsPassword">
                    * Uw wachtwoord komt niet overeen.
                </p>
            </div>
            <button @click.prevent="register()" class="btn btn-primary float-right rounded px-3" :disabled="$v.$invalid">
                Registreren
            </button>
        </form>
    </div>
</template>

<script>
    import {email, minLength, required, sameAs} from 'vuelidate/lib/validators'
    import ErrorBox from "../shared/error/ErrorBox";

    export default {
        name: "RegisterForm",
        components: {ErrorBox},
        data: function () {
            return {
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
                },
                name: {
                    required
                }
            }
        },
        methods: {
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
