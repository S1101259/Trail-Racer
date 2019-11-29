<template>
    <div>
        <div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="#">Australia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Bahrain</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">China</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Azerbaijan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Spain</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Monaco</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Canada</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">France</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Austria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Great Britain</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Germany</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Hungary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Belgium</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Italy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Singapore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Russia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Japan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mexico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">United States</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Brazil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Abu Dhabi</a>
                </li>

            </ul>
        </div>
        <div class="container">
            <podium></podium>
            <div class="top-50">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>#1</td>
                        <td>Raymon</td>
                        <td>Ferrari</td>
                        <td>1.23.853</td>
                    </tr>
                    <tr>
                        <td>#1</td>
                        <td>Raymon</td>
                        <td>Ferrari</td>
                        <td>1.23.853</td>
                    </tr>
                    <tr>
                        <td>#1</td>
                        <td>Raymon</td>
                        <td>Ferrari</td>
                        <td>1.23.853</td>
                    </tr>
                    <tr>
                        <td>#1</td>
                        <td>Raymon</td>
                        <td>Ferrari</td>
                        <td>1.23.853</td>
                    </tr>
                    <tr>
                        <td>#1</td>
                        <td>Raymon</td>
                        <td>Ferrari</td>
                        <td>1.23.853</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import Podium from "../../components/shared/podium/Podium";

    export default {
        name: "Leaderbord",
        components: {Podium}
    }
</script>

<style scoped>
    .nav{
        width: 100%;
        flex-wrap: nowrap;
        flex-direction: row;
        overflow: scroll;
    }

    .nav::-webkit-scrollbar{
        display: none;
    }

    .nav-item{
        color: white;
        font-family: FormulaOne-Bold, serif;
        background-image: linear-gradient(black, #423f43);
    }

    .nav-link{
        color: white;
        width: max-content;
    }

    .top-50{
        font-family: FormulaOne-Regular, serif;
    }
</style>
