<?php

namespace Tests\Unit\Mauqah\Films\Actions;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Mauqah\Films\Actions\CreateFilm;
use Mauqah\Films\Entities\Film;
use Mauqah\Films\Interfaces\FilmInterface;
use Mauqah\Films\Transformers\FilmTransformer;
use Mockery;

class CreateFilmTest extends AbstractFilm
{
    public static $microTime;

    public function testCreateFilmWorks()
    {
        $now = Carbon::now();
        $movieName = 'Titanic';
        $description = 'Best Ever';
        $rating = 1;
        $ticketPrice = 12.12;
        $countryId = 1;
        $photo = 'photo.jpg';
        $genresIds = [1, 2];

        $request = Mockery::mock(Request::class);
        $request->shouldReceive('get')->with('name')->andReturn($movieName);
        $request->shouldReceive('get')->with('description')->andReturn($description);
        $request->shouldReceive('get')->with('release_date')->andReturn($now);
        $request->shouldReceive('get')->with('rating')->andReturn($rating);
        $request->shouldReceive('get')->with('ticket_price')->andReturn($ticketPrice);
        $request->shouldReceive('get')->with('country_id')->andReturn($countryId);
        $request->shouldReceive('get')->with('genre_ids')->andReturn($genresIds);
        $request->shouldReceive('get')->with('photo')->andReturn($photo);

        $film = Mockery::mock(FilmInterface::class);
        $filmModel = $this->getFilmModel();
        $film->shouldReceive('create')->andReturn(new Film($filmModel));
        $controller = new CreateFilm();

        $response = $controller($request, $film, app(), new FilmTransformer());
        $data = ($response->toResponse($request))['data'];

        $this->assertSame($filmModel->name, $data['name']);
        $this->assertSame($filmModel->description, $data['description']);
        $this->assertSame($filmModel->ticket_price, $data['price']);
        $this->assertSame($filmModel->slug, $data['slug']);
        $this->assertSame($filmModel->photo, $data['photo']);
        $this->assertSame($filmModel->country_id, $data['country_id']);
        $this->assertSame($filmModel->genres[0]->name, $data['genres']['data'][0]['name']);
        $this->assertSame($filmModel->genres[0]->id, $data['genres']['data'][0]['id']);
    }
}
