<?php

namespace Tests\Unit\Mauqah\Films\Actions;

use Illuminate\Http\Request;
use Mauqah\Films\Actions\GetFilmDetails;
use Mauqah\Films\Entities\Film;
use Mauqah\Films\Interfaces\FilmInterface;
use Mauqah\Films\Transformers\FilmTransformer;
use Mauqah\Utils\ApiResponse;
use Mockery;

class GetFilmDetailsTest extends AbstractFilm
{
    public function testFilmDetailsAreCorrect()
    {
        $request = Mockery::mock(Request::class);

        $filmModel = $this->getFilmModel();

        $film = Mockery::mock(FilmInterface::class);
        $data = collect([new \Mauqah\Films\Entities\Film($filmModel)]);

        $film->shouldReceive('findBySlug')->andReturn(new Film($filmModel));

        $controller = new GetFilmDetails();
        $response = $controller('slug', $film, new FilmTransformer());
        $this->assertInstanceOf(ApiResponse::class, $response);
        $responseArray = $response->toResponse($request);

        $firstArray = $responseArray['data'];
        $this->assertSame($filmModel->name, $firstArray['name']);
        $this->assertSame($filmModel->description, $firstArray['description']);
        $this->assertSame($filmModel->ticket_price, $firstArray['price']);
        $this->assertSame($filmModel->slug, $firstArray['slug']);
        $this->assertSame($filmModel->photo, $firstArray['photo']);
        $this->assertSame($filmModel->country_id, $firstArray['country_id']);
    }
}
