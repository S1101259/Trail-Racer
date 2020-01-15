<template>
    <div>
        <ErrorBox v-if="errorMessage">{{errorMessage}}</ErrorBox>
        <form>
            <div class="form-group">
                <label for="name"></label>
                <input type="text"
                       class="form-control"
                       id="name"
                       v-model="formData.name"
                       @blur="$v.formData.name.$touch()"
                       placeholder="Vul uw naam in">

                <p v-if="!$v.formData.name.required && $v.formData.name.$dirty">
                    * Naam mag niet leeg zijn.
                </p>
            </div>
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

    export default {
        name: "ChangeNameForm",
        components: {ErrorBox},
        data() {
            return {
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
