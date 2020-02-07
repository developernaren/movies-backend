<?php

use App\Models\Film;
use App\Models\FilmComment;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $films = Film::all();

        foreach ($films as $film) {
            factory(FilmComment::class)->create([
               'user_id' => $users->random()->id,
               'film_id' => $film->id,
            ]);
        }
    }
}
