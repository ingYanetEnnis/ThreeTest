
import Vue from "vue";
import App from "./components/App";
import store from "./store/store";
import api from './interceptor/axiosApi'
Vue.prototype.$http = api;
import 'bootstrap/dist/css/bootstrap.min.css'
import vSelect from 'vue-select'
Vue.component('v-select', vSelect)
import 'vue-select/dist/vue-select.css';
store.commit('setUser', window.user);

const app = new Vue({
    el: '#app',
    store,
    render: h => h(App)
});
