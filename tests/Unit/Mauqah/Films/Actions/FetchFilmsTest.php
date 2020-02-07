<?php

namespace Tests\Unit\Mauqah\Films\Actions;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mauqah\Films\Actions\FetchFilms;
use Mauqah\Films\Interfaces\FilmInterface;
use Mauqah\Films\Responses\Api;
use Mauqah\Films\Transformers\FilmTransformer;
use Mauqah\Utils\Paginator;
use Mockery;
use Tests\TestCase;

class FetchFilmsTest extends TestCase
{
    public function testFilmReturnsCorrectResult()
    {
        $request = Mockery::mock(Request::class);
        $request->shouldReceive('get')->andReturn(1);

        $filmModel = $this->getFilmModel();

        $film = Mockery::mock(FilmInterface::class);
        $data = collect([new \Mauqah\Films\Entities\Film($filmModel)]);

        $film->shouldReceive('paginate')->andReturn(new Paginator(collect($data), 1, 1, 1));

        $controller = new FetchFilms();
        $response = $controller($request, $film, app(), new FilmTransformer());
        $this->assertInstanceOf(Api::class, $response);
        $responseArray = $response->toResponse($request);

        $firstArray = $responseArray['data'][0];
        $this->assertSame($filmModel->name, $firstArray['name']);
        $this->assertSame($filmModel->description, $firstArray['description']);
        $this->assertSame($filmModel->ticket_price, $firstArray['price']);
        $this->assertSame($filmModel->slug, $firstArray['slug']);
        $this->assertSame($filmModel->photo, $firstArray['photo']);
        $this->assertSame($filmModel->country_id, $firstArray['country_id']);
    }

    protected function getFilmModel()
    {
        $name = 'Test Movie';
        $description = 'Movie Description';
        $photoUrl = 'Photo Url';
        $price = 50.00;
        $slug = Str::slug($name);

        $filmModel = new Film();
        $filmModel->id = 12;
        $filmModel->name = $name;
        $filmModel->country_id = 5;
        $filmModel->description = $description;
        $filmModel->photo = $photoUrl;
        $filmModel->ticket_price = $price;
        $filmModel->slug = $slug;

        return $filmModel;
    }
}
