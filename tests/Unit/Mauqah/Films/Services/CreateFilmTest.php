<?php

namespace {
    $mockMicroTime = false;
}

namespace Mauqah\Films\Services {
    function microtime(...$args)
    {
        global $mockMicroTime;
        if (isset($mockMicroTime) && true === $mockMicroTime) {
            return 12345;
        }

        return \call_user_func_array('\microtime', \func_get_args());
    }
}

namespace Tests\Unit\Mauqah\Films\Services {
    use Carbon\Carbon;
    use Mauqah\Films\Services\CreateFilm;
    use Tests\Unit\Mauqah\Films\Actions\AbstractFilm;

    class CreateFilmTest extends AbstractFilm
    {
        public function setUp(): void
        {
            parent::setUp();
            global $mockMicroTime;
            $mockMicroTime = true;
        }

        public function tearDown(): void
        {
            parent::tearDown();
            global $mockMicroTime;
            $mockMicroTime = false;
        }

        public function testCreateFilmServiceWorks()
        {
            $now = Carbon::now();
            $movieName = 'Titanic';
            $description = 'Best Ever';
            $rating = 1;
            $ticketPrice = 12.12;
            $countryId = 1;
            $photo = 'photo.jpg';

            $service = new CreateFilm($movieName, $description, $now, $rating, $ticketPrice, $countryId, $photo, [1, 2]);

            $this->assertSame([
                'name' => $movieName,
                'description' => $description,
                'release_date' => $now->format('Y-m-d'),
                'rating' => $rating,
                'ticket_price' => $ticketPrice,
                'country_id' => $countryId,
                'photo' => $photo,
                'slug' => 'titanic-12345',
            ], $service->toArray());
        }
    }
}
