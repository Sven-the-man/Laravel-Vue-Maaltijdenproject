import Vue from "vue";
import VueRouter from "vue-router";
import Home from '../pages/Home.vue'
import ShowMeal from '../pages/meals/Show.vue';
import EditMeal from '../pages/meals/Edit.vue';
import CreateMeal from '../pages/meals/Create.vue';
import UserMeals from '../pages/user/UserMeals.vue';
import ManageIngredients from '../pages/admin/ManageIngredients.vue'
import AdminPanel from '../pages/admin/AdminPanel.vue';
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
            meta: {
                shouldBeLoggedIn: true,
            },
        },
        {
            path: '/meals/:id/edit',
            component: EditMeal,
            name: 'meal.edit',
        },
        {
            path: '/meals/create',
            component: CreateMeal,
            name: 'meal.create',
            meta: {
                shouldBeLoggedIn: true,
            },
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
            path: '/user/meals',
            component: UserMeals,
            name: 'user.meals',
            meta: {
                shouldBeLoggedIn: true,
            },
        },
        {
            path: '/ingredients/manage',
            component: ManageIngredients,
            name: 'ingredients.manage',
            meta: {
                shouldBeLoggedIn: true,
            },
        },
        {
            path: '/adminpanel',
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
