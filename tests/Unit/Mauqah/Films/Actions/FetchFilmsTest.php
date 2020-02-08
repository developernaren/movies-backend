<?php

namespace Tests\Unit\Mauqah\Films\Actions;

use Illuminate\Http\Request;
use Mauqah\Films\Actions\FetchFilms;
use Mauqah\Films\Entities\Film;
use Mauqah\Films\Interfaces\FilmInterface;
use Mauqah\Films\Transformers\FilmTransformer;
use Mauqah\Utils\ApiResponse;
use Mauqah\Utils\Paginator;
use Mockery;

class FetchFilmsTest extends AbstractFilm
{
    public function testFilmReturnsCorrectResult()
    {
        $request = Mockery::mock(Request::class);
        $request->shouldReceive('get')->andReturn(1);

        $filmModel = $this->getFilmModel();

        $film = Mockery::mock(FilmInterface::class);
        $data = collect([new Film($filmModel)]);

        $film->shouldReceive('paginate')->andReturn(new Paginator(collect($data), 1, 1, 1));

        $controller = new FetchFilms();
        $response = $controller($request, $film, app(), new FilmTransformer());
        $this->assertInstanceOf(ApiResponse::class, $response);
        $responseArray = $response->toResponse($request);

        $firstArray = $responseArray['data'][0];
        $this->assertSame($filmModel->name, $firstArray['name']);
        $this->assertSame($filmModel->description, $firstArray['description']);
        $this->assertSame($filmModel->ticket_price, $firstArray['price']);
        $this->assertSame($filmModel->slug, $firstArray['slug']);
        $this->assertSame($filmModel->photo, $firstArray['photo']);
        $this->assertSame($filmModel->country_id, $firstArray['country_id']);
        $this->assertSame($filmModel->genres[0]->name, $firstArray['genres']['data'][0]['name']);
        $this->assertSame($filmModel->genres[0]->id, $firstArray['genres']['data'][0]['id']);
    }
}
