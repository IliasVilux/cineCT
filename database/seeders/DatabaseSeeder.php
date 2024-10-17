<?php

namespace Database\Seeders;

use App\Http\Controllers\GenreController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\CharacterController;
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
        $tmp = GenreController::store();
        foreach ($tmp as $tmp2){
            DB::table('genres')->insert([
                'name' => $tmp2,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $serieController = new SerieController();
        $tmp = $serieController->store();
        foreach ($tmp as $tmp2){
            DB::table('series')->insert([
                'poster_path' => $tmp2->{'poster_path'},
                'name' => $tmp2->{'name'}, 
                'description' => $tmp2->{'overview'},
                'genre_id' => $tmp2->{'genre_ids'},
                'release_date' => $tmp2->{'first_air_date'},
                'seasons' => $tmp2->{'season_number'},
                'total_episodes' => $tmp2->{'episode_count'},
                'puntuation' => $tmp2->{'vote_average'},
                'top' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]); 
        }

        $filmController = new FilmController();
        $tmp = $filmController->store();
        foreach ($tmp as $tmp2){
            DB::table('films')->insert([
                'name' => $tmp2->{'title'},
                'poster_path' => $tmp2->{'poster_path'},
                'duration' => $tmp2->{'duration'}, 
                'description' => $tmp2->{'overview'},
                'genre_id' => $tmp2->{'genre_ids'},
                'release_date' => $tmp2->{'release_date'},
                'puntuation' => $tmp2->{'vote_average'},
                'top' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } 

        // $tmp = AnimeController::store();
        // foreach ($tmp as $tmp2){
        //     if (isset($tmp2->{'data'}->{'themes'}[0]->{'name'})){
        //         $genreValidation = $tmp2->{'data'}->{'themes'}[0]->{'name'};
        //     } else if (isset($tmp2->{'data'}->{'genres'}[0]->{'name'})){
        //         $genreValidation = $tmp2->{'data'}->{'genres'}[0]->{'name'};
        //     }
        //     DB::table('animes')->insert([
        //         'name' => $tmp2->{'data'}->{'title'},
        //         'description' => $tmp2->{'data'}->{'synopsis'},
        //         'poster_path' => $tmp2->{'data'}->{'images'}->{'webp'}->{'large_image_url'},
        //         'trailer_link' => $tmp2->{'data'}->{'trailer'}->{'youtube_id'},
        //         'release_date' => $tmp2->{'data'}->{'year'},
        //         'duration' => $tmp2->{'data'}->{'duration'}, 
        //         'total_episodes' => $tmp2->{'data'}->{'episodes'},
        //         'puntuation' => $tmp2->{'data'}->{'score'},
        //         'genre_id' => $genreValidation,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]);
        // }

        // $tmp = CharacterController::store();
        // foreach ($tmp as $tmp2){
        //     if (!empty($tmp2->{'data'}->{'nicknames'}) && isset($tmp2->{'data'}->{'nicknames'}[0])){
        //         $characterNickname = $tmp2->{'data'}->{'nicknames'}[0];
        //     } else { $characterNickname = ""; }
        //     DB::table('characters')->insert([
        //         'name' => $tmp2->{'data'}->{'name'},
        //         'surname' => $characterNickname,
        //         'anime_id' => $tmp2->{'data'}->{'mal_id'},
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]);
        // }
    }
}
