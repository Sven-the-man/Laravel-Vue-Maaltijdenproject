import Vue from "vue";

import axios from 'axios';
window.axios = axios;
axios.defaults.baseURL = '/api/';

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
