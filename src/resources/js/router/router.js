import Router from 'vue-router'
import {routes} from "./routes";
import Vue from 'vue'
import store from "../vuex/store";

Vue.use(Router);
const router = new Router({
    mode: "history",
    routes: routes
});

router.beforeEach((to, from, next) => {
    if(routeRequiresAuthentication(to)){
        if(store.getters.isLoggedIn){
            next();
            return;
        }
        next("/login")
    }else {
        next()
    }
});

function routeRequiresAuthentication(to) {
    return to.matched.some(record => record.meta.requiresAuth);
}

export default router;
