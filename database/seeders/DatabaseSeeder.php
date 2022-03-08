<?php

namespace Database\Seeders;

use App\Http\Controllers\GenreController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\EpisodeController;
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
                'poster_path' => $tmp2->{'backdrop_path'},
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

        $tmp = AnimeController::store();
        foreach ($tmp as $tmp2){
            if (isset($tmp2->{'data'}->{'themes'}[0]->{'name'})){
                $genreValidation = $tmp2->{'data'}->{'themes'}[0]->{'name'};
            } else if (isset($tmp2->{'data'}->{'genres'}[0]->{'name'})){
                $genreValidation = $tmp2->{'data'}->{'genres'}[0]->{'name'};
            }
            DB::table('animes')->insert([
                'name' => $tmp2->{'data'}->{'title'},
                'original_id' => $tmp2->{'data'}->{'mal_id'},
                'description' => $tmp2->{'data'}->{'synopsis'},
                'poster_path' => $tmp2->{'data'}->{'images'}->{'webp'}->{'large_image_url'},
                'trailer_link' => $tmp2->{'data'}->{'trailer'}->{'youtube_id'},
                'release_date' => $tmp2->{'data'}->{'year'},
                'duration' => $tmp2->{'data'}->{'duration'}, 
                'total_episodes' => $tmp2->{'data'}->{'episodes'},
                'puntuation' => $tmp2->{'data'}->{'score'},
                'genre_id' => $genreValidation,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } 

        /* $tmp = CharacterController::store();
        foreach ($tmp as $tmp2){
            if (!empty($tmp2->{'data'}->{'nicknames'}) && isset($tmp2->{'data'}->{'nicknames'}[0])){
                $characterNickname = $tmp2->{'data'}->{'nicknames'}[0];
            } else { $characterNickname = ""; }
            DB::table('characters')->insert([
                'name' => $tmp2->{'data'}->{'name'},
                'surname' => $characterNickname,
                'anime_id' => $tmp2->{'data'}->{'mal_id'},
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } */

        /*
        $tmp = EpisodeController::store();
        $durationEpisode = array();
        foreach ($tmp[2] as $tmpDos2){
            array_push($durationEpisode, $tmpDos2);
        }
        $idAnime = array();
        foreach ($tmp[1] as $tmpTres3){
            array_push($idAnime, $tmpTres3);
        }
        $contEpisodes = 0;
        $contAnime = 0;
        $numRandom = 0;
        $numRandom = rand(-10, 10);
        for($i=0; $i<=count($tmp[0]); $i++){
            $durationFinal = $durationEpisode[$contEpisodes] + $numRandom;
            if ($tmp[0][$i]->{'mal_id'} < $tmp[0][$i+1]->{'mal_id'}){
                DB::table('episodes')->insert([
                    'title' => $tmp[0][$i]->{'title'},
                    'duration' => $durationFinal,
                    'description' => $tmp[0][$i]->{'title_japanese'},
                    'anime_id' => $idAnime[$contAnime],
                    'aired' => $tmp[0][$i]->{'aired'},
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } else if ($tmp[0][$i]->{'mal_id'} > $tmp[0][$i+1]->{'mal_id'}){
                $contAnime++;
                DB::table('episodes')->insert([
                    'title' => $tmp[0][$i]->{'title'},
                    'duration' => $durationEpisode[$contEpisodes],
                    'description' => $tmp[0][$i]->{'title_japanese'},
                    'anime_id' => $idAnime[$contAnime],
                    'aired' => $tmp[0][$i]->{'aired'},
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        */
    }
}
