import Vue from "vue";
import VueRouter from "vue-router";

import Home from '../pages/Home.vue'
import ShowMeal from '../pages/meals/ShowMeal.vue';
import EditMeal from '../pages/meals/EditMeal.vue';
import Ingredients from '../pages/meals/MyMeals.vue';
import CreateMeal from '../pages/meals/CreateMeal.vue';
import AdminPanel from '../pages/AdminPanel.vue';
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
            component: ShowMeal,
            name: 'meal.show',
        },
        {
            path: '/meals/edit/:id',
            component: EditMeal,
            name: 'meal.edit',
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
            path: '/my_ingredients',
            component: Ingredients,
            name: 'my_ingredients',
            meta: {
                shouldBeLoggedIn: true,
            },
        },
        {
            path: '/create_meal',
            component: CreateMeal,
            name: 'create_meal',
            meta: {
                shouldBeLoggedIn: true,
            },
        },
        {
            path: '/admin_panel',
            component: AdminPanel,
            name: 'AdminPanel',
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
