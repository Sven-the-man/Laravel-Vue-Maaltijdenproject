import Vue from "vue";
import Vuex from "vuex";

import Home from '../pages/Home.vue';
import {meals} from './modules/meals';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {meals, Home},
    strict: true,
});