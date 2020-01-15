<template>
    <div class="background">
        <div class="change-name-container">
            <h2>Naam Aanpassen</h2>
            <change-name-form></change-name-form>
        </div>
        <div class="right-container">
        </div>
    </div>
</template>

<script>
    import ChangeNameForm from "../../components/profile/ChangeNameForm";
    export default {
        name: "ChangeNamePage",
        components: {ChangeNameForm}
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

    .change-name-container {
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
        background-image: url("../../../images/lando.gif");
        background-position: center;
        background-size: cover;
    }

    @media only screen and (max-width: 600px) {
        .change-name-container {
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
