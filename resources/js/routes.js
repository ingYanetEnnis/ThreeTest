import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);
import Quote from "./components/Quote";
import HistoryQuotes from "./components/HistoryQuotes";
export const routes = [
    {
        name: 'welcome',
        path: '/dashboard',
        component: HistoryQuotes
    },
    {
        name: 'quotes',
        path: '/quotes',
        component: Quote
    },
    { path: '*', redirect: '/welcome' }

];
export const router = new Router({
    mode: 'history',
    linkActiveClass: 'active',
    routes
});
