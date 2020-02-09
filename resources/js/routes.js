import Vue from 'vue';
import VueRouter from "vue-router";
import Films from "./components/Films";
import FilmDetail from "./components/FilmDetail";
import CreateFilm from "./components/CreateFilm";

Vue.use(VueRouter)

export default new VueRouter({
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
        {
            path: '/films/create',
            component: CreateFilm,
            name: 'films.create',
        },


    ]
})
