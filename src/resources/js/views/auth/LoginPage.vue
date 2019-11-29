<template>
    <div class="background">
        <div class="login-container">
            <h2>Welkom terug,</h2>
            <LoginForm/>
            <span class="register">
                Geen account?
                <router-link :to="{name: 'register'}"> Registreer gratis!</router-link>
            </span>
        </div>
        <div class="right-container">
        </div>
    </div>
</template>

<script>
    import LoginForm from "../../components/auth/LoginForm";
    require('howler');

    const sound = new Howl({
        src: ['../../../sounds/Formula1theme.mp3'],
        autoplay: true,
        loop: true,
    });

    export default {
        name: "LoginPage",
        components: {LoginForm},
        methods: {
            playSound() {
                sound.play()
            },
            stopSound(){
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

    .register {
        position: absolute;
        bottom: 3em;
        left: 3em;
    }


</style>
