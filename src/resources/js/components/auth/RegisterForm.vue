<template>
    <form>
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
        <button class="btn btn-primary float-right rounded px-3">
            Registreren
        </button>
    </form>
</template>

<script>
    import {required, email, minLength, sameAs} from 'vuelidate/lib/validators'
    export default {
        name: "RegisterForm",
        data: function () {
            return {
                accountInformation: {
                    email: '',
                    password: '',
                    repeatedPassword: '',
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
                }
            }
        }
    }
</script>

<style scoped>

</style>
