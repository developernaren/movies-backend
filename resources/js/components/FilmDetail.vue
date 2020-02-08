<template>

    <div class="jumbotron">
        <div v-if="film.id">
            <h1>{{ film.name }}</h1>
            <p>{{ film.description }}</p>
            <p>
                Genres:
                <span v-for="genre in film.genres.data" class="chip">
                    {{ genre.name }}
                </span>
            </p>

            <p>
                <router-link class="btn btn-lg btn-primary" href="" role="button" :to="{name: 'films.list'}">
                    Go to listing
                </router-link>
            </p>
        </div>
        <div v-else>
            Loading...
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        async mounted() {
            const slug = this.$route.params.slug
            this.film = (await axios.get(`api/films/${slug}`)).data.data
        },
        data() {
            return {
                film: {}
            }
        }
    }
</script>
<style>
    .chip {
        display: inline-block;
        margin: 5px;
        padding: 10px;
        background: #e7e7e7;
        border-radius: 20px;
    }
</style>
