<?php

namespace Mauqah\Films\Actions;

use Carbon\Carbon;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Mauqah\Films\Interfaces\FilmInterface;
use Mauqah\Films\Services\CreateFilm as Service;
use Mauqah\Films\Transformers\FilmTransformer;
use Mauqah\Utils\ApiResponse;

class CreateFilm
{
    public function __invoke(Request $request, FilmInterface $film, Application $application, FilmTransformer $transformer)
    {
        $service = $application->make(Service::class, [
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'releaseDate' => Carbon::parse($request->get('release_date')),
            'rating' => $request->get('rating'),
            'ticketPrice' => $request->get('ticket_price'),
            'countryId' => $request->get('country_id'),
            'genreIds' => $request->get('genre_ids'),
            'photo' => $request->get('photo'),
        ]);

        $newFilm = $film->create($service);

        return ApiResponse::createWithItem($newFilm, $transformer);
    }
}
