/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import FilmDetail from "./components/FilmDetail";


require('./bootstrap');

window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueRouter from 'vue-router'
import App from './components/App'
import Films from "./components/Films";
Vue.use(VueRouter)

const router = new VueRouter({
    routes: [
        {
            path: '/',
            component: Films,
            name: 'films.list',
        },
        {
            path: '/:slug',
            component: FilmDetail,
            name: 'films.detail',
        },
    ]
})

const app = new Vue({
    router,
    el: '#app',
    components: {App}
});
