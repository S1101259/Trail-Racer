<template>
    <div class="background">
        <div class="login-container">
            <h2>Welkom terug,</h2>

            <form>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Vul uw email in">
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord</label>
                    <input type="password" class="form-control" id="password" placeholder="Vul uw wachtwoord in">
                </div>
                <button class="btn btn-primary float-right rounded px-3">
                    Inloggen
                </button>
            </form>
            <span class="register">Geen account? <router-link :to="{name: 'register'}"> Registreer gratis!</router-link></span>
        </div>
        <div class="right-container">

        </div>
    </div>
</template>

<script>
    require('howler');

    const sound = new Howl({
        src: ['../../../sounds/Formula1theme.mp3'],
        autoplay: true,
        html5: true,
        loop: true,
    });

    export default {
        name: "LoginPage",
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
