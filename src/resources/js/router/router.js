import Router from 'vue-router'
import {routes} from "./routes";
import Vue from 'vue'

Vue.use(Router);
const router = new Router({
    mode: "history",
    routes: routes
});

export default router;
