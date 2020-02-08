<template>
    <div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="film.name">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea v-model="film.description" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Release Date</label>
            <input type="date" v-model="film.release_date" class="form-control">
        </div>
        <div class="form-group">
            <label>Rating</label>
            <input type="text" v-model="film.rating" class="form-control">
        </div>
        <div class="form-group">
            <label>Ticket Price</label>
            <input type="text" v-model="film.ticket_price" class="form-control">
        </div>
        <div class="form-group">
            <label>Country</label>
            <select v-model="film.country_id" class="form-control">
                <option value="null">Select Country</option>
                <option :value="country.id" v-for="country in countries">
                    {{ country.name }}
                </option>
            </select>
        </div>
        <div class="form-group">
            <label>Genre</label>
            <select v-model="film.genre_id" class="form-control">
                <option value="null">Select Multiple Genres( {{ selectedGenres.length }} selected )</option>
                <option :value="genre.id" v-for="genre in genres" @click="addGenre(genre)"
                        v-if="selectedGenres.indexOf(genre) === -1">
                    {{ genre.name }}
                </option>
            </select>
        </div>
        <span v-for="genre in selectedGenres" class="chip">
                {{ genre.name }} <i class="remove" @click="removeGenre(genre)">x</i>
        </span>
        <div class="form-group">
            <label>Photo</label>
            <input type="file" @change="fileSelected" class="form-control">
        </div>

        <button type="button" class="btn btn-default primary" @click.prevent="save">Submit</button>
    </div>
</template>
<script>
    import axios from 'axios'

    export default {

        async mounted() {
            const fetchCountries = axios.get('/api/countries')
            const fetchGenres = axios.get('/api/genres')
            const responses = await Promise.all([fetchCountries, fetchGenres])
            this.countries = responses[0].data.data
            this.genres = responses[1].data.data

        },
        methods: {
            removeGenre(genre) {
                const index = this.selectedGenres.indexOf(genre)
                if (index > -1) {
                    this.selectedGenres.splice(index, 1)
                }

            },
            async save() {

                const mapIds = this.selectedGenres.map( genre => genre.id )
                this.film.genre_ids = mapIds
                const response = await axios.post('/api/films', this.film)

            },
            fileSelected() {

            },
            addGenre(genre) {
                this.selectedGenres = [...this.selectedGenres, genre]
                this.film.genre_id = 'null'
            }
        },
        data() {
            return {
                countries: [],
                genres: [],
                selectedGenres: [],
                film: {
                    name: 'Naren',
                    description: 'Naren',
                    ticket_price: 12,
                    rating: 5,
                    release_date: '',
                    genre_ids: [],
                    genre_id: 'null',
                    country_id: null,
                    photo: 'asdasd'
                }
            }
        }
    }
</script>

<style scoped>
    .remove {
        cursor: pointer;
    }

    .chip {
        display: inline-block;
        margin: 5px;
        padding: 10px;
        background: #e7e7e7;
        border-radius: 20px;
    }
</style>
