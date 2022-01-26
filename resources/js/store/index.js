import Vue from "vue";
import Vuex from "vuex";

import Home from '../pages/Home.vue';
import {meals} from './modules/meals';
import {ingredients} from './modules/ingredients';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {ingredients, meals, Home},
    strict: true,
});