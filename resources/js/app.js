import Vue from "vue";

import axios from 'axios';
window.axios = axios;
axios.defaults.baseURL = '/api/';

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

//Main pages
import App from "./App.vue";

//Import store
import store from "./store";

//Import router
import router from "./router";

import '../css/app.scss'

new Vue({
    el: "#app",
    store,
    router,
    render: (h) => h(App),
});
