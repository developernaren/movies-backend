<?php

namespace Tests\Feature\Films;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FetchFilmTest extends TestCase
{
    use RefreshDatabase;

    public function testDefaultLimitIs1AndIsOrderByDescendingOrder()
    {
        factory(Genre::class, 3)->create();
        factory(Film::class, 3)->create();
        $lastFilm = Film::latest()->first();
        $response = $this->get('/api/films');
        $response->assertStatus(200);
        $response->assertJsonCount(2);
        $response->assertJsonStructure([
            'data',
            'meta' => [
                'pagination',
            ],
        ]);

        $content = json_decode($response->getContent(), 1);
        $firstFilm = $content['data'][0];
        $this->assertCount(1, $content['data']);
        $this->assertEquals($lastFilm->id, $firstFilm['id']);
        $this->assertEquals($lastFilm->name, $firstFilm['name']);
        $this->assertEquals($lastFilm->description, $firstFilm['description']);
        $this->assertEquals($lastFilm->country_id, $firstFilm['country_id']);
    }

    public function testPaginationWorks()
    {
        factory(Genre::class, 3)->create();
        factory(Film::class, 3)->create();
        $response = $this->get('/api/films?page=2');
        $response->assertStatus(200);
        $response->assertJsonCount(2);
        $response->assertJsonStructure([
            'data',
            'meta' => [
                'pagination',
            ],
        ]);

        $secondFilm = Film::take(1)->skip(1)->first();

        $content = json_decode($response->getContent(), 1);
        $this->assertCount(1, $content['data']);
        $this->assertEquals($secondFilm->id, $content['data'][0]['id']);
    }
}
