<?php

namespace Tests\Feature\Films;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FetchFilmTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testDefaultLimitIs1AndIsOrderByDescendingOrder()
    {
        factory(Genre::class, 3)->create();
        factory(Film::class, 3)->create();
        $lastFilm = Film::latest()->first();
        $response = $this->get('/films');
        $response->assertStatus(200);
        $response->assertJsonCount(2);
        $response->assertJsonStructure([
            'data',
            'meta' => [
                'pagination',
            ],
        ]);

        $content = json_decode($response->getContent(), 1);
        $this->assertCount(1, $content['data']);
        $this->assertEquals($lastFilm->id, $content['data'][0]['id']);
    }

    public function testPaginationWorks()
    {
        factory(Genre::class, 3)->create();
        factory(Film::class, 3)->create();
        $response = $this->get('/films?page=2');
        $response->assertStatus(200);
        $response->assertJsonCount(2);
        $response->assertJsonStructure([
            'data',
            'meta' => [
                'pagination',
            ],
        ]);

        $content = json_decode($response->getContent(), 1);
        $this->assertCount(1, $content['data']);
        $this->assertEquals(2, $content['data'][0]['id']);
    }
}
