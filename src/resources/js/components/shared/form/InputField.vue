<template>
    <div class="form-group">
        <label :for="id">{{label}}</label>
        <input :type="type"
               v-model="value"
               @blur="onBlur"
               class="form-control"
               :id="id"
               :placeholder="placeholder">
        <p v-for="validation in validations">
            {{validation}}
        </p>
    </div>
</template>

<script>
    export default {
        name: "InputField",
        props: ["id", "type", "placeholder", "label", 'validations'],
        data() {
            return {
                value: ''
            }
        },
        methods: {
            onBlur() {
                this.$emit('onBlur', this.id)
            }
        },
        watch: {
            value: function () {
                this.$emit('onValueChange', {id: this.id, value: this.value})
            }
        }
    }
</script>

<style scoped>

</style>
