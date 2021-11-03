require('./bootstrap');
import Vue from "vue";
import App from "./components/App";
import VueRouter from 'vue-router';
import {router} from './routes'
Vue.use(VueRouter);
import store from "./store/store";
import api from './interceptor/axiosApi'
Vue.prototype.$http = api;
import 'bootstrap/dist/css/bootstrap.min.css'
import * as uiv from 'uiv'
Vue.use(uiv)
const token = localStorage.getItem('token')
if (!token) {
    localStorage.setItem('token', window.user.token);
}
store.commit('setUser', window.user);

const app = new Vue({
    el: '#app',
    store,
    router: router,
    render: h => h(App)
});
