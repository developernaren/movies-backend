<template>
    <div>
        <div v-for="film in films" v-if="films.length > 0">
            <div v-if="!submitting">
                <h1>{{ film.name }}</h1>
                <p>{{ film.description }}</p>
                <p>
                    <router-link class="btn btn-lg btn-primary" href="" role="button" :to="{ name: 'films.detail', params: { slug: film.slug }}">
                        View Details
                    </router-link>
                </p>
            </div>
            <div v-else>
                Loading...
            </div>

        </div>
        <div v-else>
            Loading...
        </div>
        <div>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li v-if="pagination.current_page > 1">
                        <a href="#" aria-label="Previous" @click.prevent="goToPage(pagination.current_page-1)">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li v-for="page in pagination.total"
                        @click.prevent="goToPage(page)"
                        :class="{'active' : page == pagination.current_page}">
                        <a href="#">{{ page }}</a>
                    </li>
                    <li v-if="pagination.current_page < pagination.total">
                        <a href="#" aria-label="Next" @click.prevent="goToPage(pagination.current_page+1)">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>
<script>
    import axios from 'axios'

    export default {
        name: 'FilmList',
        mounted() {
            this.getFilms()
        },
        methods: {
            async getFilms() {
                this.submitting = true
                const response = (await axios.get('api/films?page=' + this.pagination.current_page)).data
                this.submitting = false
                this.films = response.data
                this.pagination = response.meta.pagination
            },
            goToPage(page) {
                this.pagination.current_page = page
                this.getFilms()
            }
        },
        data() {
            return {
                submitting: false,
                films: [],
                pagination: {
                    total: 0,
                    current_page: 1
                }
            }
        }
    }
</script>
