import Vue from 'vue';
import VueRouter from "vue-router";

Vue.use(VueRouter)

export default new VueRouter({
    routes: [
        {
            path: '/',
            component() {
                return import("./components/Films")
            },
            name: 'films.list',
        },

        {
            path: '/:slug',
            component() {
                return import("./components/FilmDetail")
            },
            name: 'films.detail',
        },
        {
            path: '/films/create',
            component() {
                return import("./components/CreateFilm")
            },
            name: 'films.create',
        },


    ]
})
