<?php

namespace Database\Seeders;

use App\Http\Controllers\GenreController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\ImageController;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
        $tmp = GenreController::store();
        foreach ($tmp as $tmp2){
            DB::table('genres')->insert([
                'name' => $tmp2,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        */

        /* $tmp = SerieController::store();
        foreach ($tmp as $tmp2){
            DB::table('series')->insert([
                'image_api_id' => $tmp2->{'id'},
                'name' => $tmp2->{'name'}, 
                'description' => $tmp2->{'overview'},
                'genre_id' => $tmp2->{'genres'}[0]->{'name'},
                'release_date' => $tmp2->{'first_air_date'},
                'seasons' => $tmp2->{'number_of_seasons'},
                'total_episodes' => $tmp2->{'number_of_episodes'},
                'puntuation' => $tmp2->{'vote_average'},
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } */

        /* $tmp = FilmController::store();
        foreach ($tmp as $tmp2){
            DB::table('films')->insert([
                'image_api_id' => $tmp2->{'id'},
                'name' => $tmp2->{'original_title'},
                'duration' => $tmp2->{'runtime'}, 
                'description' => $tmp2->{'overview'},
                'genre_id' => $tmp2->{'genres'}[0]->{'name'},
                'release_date' => $tmp2->{'release_date'},
                'puntuation' => $tmp2->{'vote_average'},
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }  */

        /*
        $tmp = AnimeController::store();
        foreach ($tmp as $tmp2){
            DB::table('animes')->insert([
                'poster_path' => $tmp2->{'data'}->{'images'}->{'webp'}[2],
                'name' => $tmp2->{'original_title'},
                'duration' => $tmp2->{'runtime'}, 
                'description' => $tmp2->{'overview'},
                'genre_id' => $tmp2->{'genres'}[0]->{'name'},
                'release_date' => $tmp2->{'release_date'},
                'puntuation' => $tmp2->{'vote_average'},
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } 
        */

        $tmp = ImageController::profileImageStore();
        foreach ($tmp as $tmp2){
            DB::table('profile_images')->insert([
                'path' => $tmp2,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } 
    }
}
