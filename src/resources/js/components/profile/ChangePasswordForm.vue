<template>
    <div>
        <ErrorBox v-if="errorMessage">{{errorMessage}}</ErrorBox>
        <form>
            <div class="form-group">
                <label for="password">
                    Wachtwoord
                </label>
                <input
                    type="password"
                    class="form-control"
                    v-model="formData.password"
                    @blur="$v.formData.password.$touch()"
                    id="password"
                    placeholder="Vul het nieuwe wachtwoord in.">

                <p v-if="!$v.formData.password.required && $v.formData.password.$dirty">
                    * deze veld mag niet leeg zijn.
                </p>
                <p v-if="!$v.formData.password.minLength">
                    * Uw wachtwoord moet minimaal 6 karakters bevatten.
                </p>
            </div>
            <div class="form-group">
                <label for="repeatPassword">
                    Herhaal wachtwoord
                </label>
                <input
                    type="password"
                    v-model="formData.repeatedPassword"
                    class="form-control"
                    @blur="$v.formData.repeatedPassword.$touch()"
                    id="repeatPassword"
                    placeholder="Vul het nieuwe wachtwoord in.">

                <p v-if="!$v.formData.repeatedPassword.required && $v.formData.repeatedPassword.$dirty">
                    * deze veld mag niet leeg zijn.
                </p>
                <p v-if="!$v.formData.repeatedPassword.sameAsPassword">
                    * Uw wachtwoord komt niet overeen.
                </p>
            </div>
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

    export default {
        name: "ChangePasswordForm",
        components: {ErrorBox},
        data() {
            return {
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
