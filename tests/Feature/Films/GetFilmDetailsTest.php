<?php

namespace Tests\Feature\Films;

use App\Models\Film;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetFilmDetailsTest extends TestCase
{
    use RefreshDatabase;

    public function testGetDetailPageWorksCorrectly()
    {
        $film = factory(Film::class)->create();
        $response = $this->get(sprintf('/api/films/%s', $film->slug));
        $response->assertStatus(200);
        $response->assertJsonStructure([
             'data' => [
                 'id',
                 'country_id',
                 'name',
                 'description',
                 'photo',
                 'price',
                 'slug',
                 'links',
                 'genres',
             ],
        ]);
    }
}
