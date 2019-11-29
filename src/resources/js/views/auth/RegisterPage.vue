<template>
    <div class="background">
        <div class="login-container">
            <h2>Welkom,</h2>
            <register-form></register-form>
            <span class="register">Al een account? <router-link :to="{name: 'login'}">Login!</router-link></span>
        </div>
        <div class="right-container"></div>
    </div>
</template>

<script>
    import RegisterForm from "../../components/auth/RegisterForm.vue";

    require('howler');

    const sound = new Howl({
        src: ['../../../sounds/Formula1theme.mp3'],
        autoplay: true,
        html5: true,
        loop: true,
    });

    export default {
        components: {RegisterForm},
        name: "RegisterPage",
        methods: {
            playSound() {
                sound.play()
            },
            stopSound() {
                sound.stop()
            }
        },
        mounted() {
            this.playSound()
        },
        beforeDestroy() {
            this.stopSound()
        }
    }
</script>

<style scoped>
    .background {
        background-image: url("../../../images/background.png");
        height: 100vh;
        width: 100vw;
        margin-top: -69px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-container {
        clear: both;
        background-color: white;
        height: 35rem;
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
        height: 35rem;
        width: 20rem;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        padding: 3em;
        position: relative;
        box-shadow: 13px 13px 41px -9px rgba(0, 0, 0, 0.47);
        background-image: url("../../../images/landoReg.gif");
        background-position: center;
        background-size: cover;
    }

    form, label {
        font-family: FormulaOne-Regular, serif;
    }

    h2, button {
        font-family: FormulaOne-Bold, serif;
        margin-bottom: 1em;
    }

    .register {
        position: absolute;
        bottom: 3em;
        left: 3em;
    }

</style>
