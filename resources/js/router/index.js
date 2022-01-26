import Vue from "vue";
import VueRouter from "vue-router";

import Home from '../pages/Home.vue'
import MealShow from '../pages/meals/Show.vue';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: "/",
            component: Home
        },
        {
            path: '/meals/:id',
            component: MealShow,
            name: 'meal.show',
        },
    ]
});
