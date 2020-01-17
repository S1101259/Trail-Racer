<template>
    <div class="background">
        <div class="change-password-container">
            <h2>Wachtwoord aanpassen</h2>
            <ChangePasswordForm></ChangePasswordForm>
        </div>
        <div class="right-container">
        </div>
    </div>
</template>

<script>
    import ChangePasswordForm from "../../components/profile/ChangePasswordForm";

    export default {
        name: "ChangePasswordPage",
        components: {ChangePasswordForm}
    }
</script>

<style scoped>
    h2 {
        font-family: FormulaOne-Bold, serif;
    }

    .background {
        background-image: url("../../../images/background.png");
        height: 100vh;
        width: 100vw;
        margin-top: -69px;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 600px;
    }

    .change-password-container {
        clear: both;
        background-color: white;
        height: 25rem;
        width: 30rem;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        padding: 3em;
        position: relative;
        box-shadow: 13px 13px 41px -9px rgba(0, 0, 0, 0.47);
    }

    .right-container {
        clear: both;
        background-color: gray;
        height: 25rem;
        width: 20rem;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        padding: 3em;
        position: relative;
        box-shadow: 13px 13px 41px -9px rgba(0, 0, 0, 0.47);
        background-image: url("../../../images/changePassword.gif");
        background-position: center;
        background-size: cover;
    }

    @media only screen and (max-width: 600px) {
        .change-password-container {
            width: 100vw;
            border-radius: 0;
            position: relative;
            padding: 1.5em 1em;
            box-shadow: none;
            z-index: 2;
        }

        .background {
            position: initial;
            margin-top: 0;
            height: auto;
            align-items: initial;
            background: white;
            flex-direction: column-reverse;
        }

        .right-container {
            width: 100%;
            height: 18em;
            background-position: top;
            border-radius: 0;
            box-shadow: none;
            z-index: 0
        }
    }
</style>
