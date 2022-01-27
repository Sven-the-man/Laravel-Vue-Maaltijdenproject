import Vue from "vue";
import VueRouter from "vue-router";

import Home from '../pages/Home.vue'
import MealShow from '../pages/meals/Show.vue';
import Account from '../pages/Account.vue';
import Ingredients from '../pages/meals/Ingredients.vue';
import store from '../store';



import LoginOverview from '../pages/auth/Login.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: "/",
            component: Home,
        },
        {
            path: '/meals/:id',
            component: MealShow,
            name: 'meal.show',
        },
        {
            path: '/login',
            component: LoginOverview,
            name: 'auth.login',
            meta: {
                shouldBeLoggedOut: true,
            },
        },
        {
            path: '/account',
            component: Account,
            name: 'account',
            meta: {
                shouldBeLoggedIn: true,
            },
        },
        {
            path: '/ingredients',
            component: Ingredients,
            name: 'ingredients',
            meta: {
                shouldBeLoggedIn: true,
            },
        },
    ]
});

router.beforeEach(({meta}, from, next) => {
    const isLoggedIn = store.getters['account/getIsLoggedIn'];
    
    if (meta.shouldBeLoggedIn !== undefined && meta.shouldBeLoggedIn && !isLoggedIn) next({name: 'auth.login'});
    if (meta.shouldBeLoggedOut !== undefined && meta.shouldBeLoggedOut && isLoggedIn) next({name: 'account'});
    next();
});

export default router;
