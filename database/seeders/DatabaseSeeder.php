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

        // $tmp = FilmController::store();
        // foreach ($tmp as $tmp2){
        //     DB::table('films')->insert([
        //         'image_api_id' => $tmp2->{'id'},
        //         'name' => $tmp2->{'title'},
        //         'duration' => $tmp2->{'runtime'}, 
        //         'description' => $tmp2->{'overview'},
        //         'genre_id' => $tmp2->{'genres'}[0]->{'name'},
        //         'release_date' => $tmp2->{'release_date'},
        //         'puntuation' => $tmp2->{'vote_average'},
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]);
        // } 

        //Peliculas segun su genero (api : https://api.themoviedb.org/'.$contador.'/discover/movie?api_key=9d981b068284aca44fb7530bdd218c30&with_genres=27)
        // $tmp = FilmController::store();
        
        // foreach ($tmp as $tmp2){
            
        //     for ($i=0; $i < count($tmp2->{'results'}); $i++) { 
                
        //         DB::table('films')->insert([
        //             'original_id' => $tmp2->{'results'}[$i]->{'id'},
        //             'name' => $tmp2->{'results'}[$i]->{'title'},
        //             'genre_id' => '8',
        //             'description' => $tmp2->{'results'}[$i]->{'overview'},
        //             'poster_path' => $tmp2->{'results'}[$i]->{'backdrop_path'},
        //             'duration' => '0', 
        //             'release_date' => $tmp2->{'results'}[$i]->{'release_date'},
        //             'puntuation' => $tmp2->{'results'}[$i]->{'vote_average'},
        //             'created_at' => now(),
        //             'updated_at' => now()
        //         ]);

        //     }
            
        //     $count = count($tmp2->{'results'});
        //     for ($i=0; $i < $count; $i++) { 

        //         if($tmp2->{'results'}[$i]->{'genre_ids'}[0] == 10751) {
                
        //             DB::table('films')->insert([
        //                 'original_id' => $tmp2->{'results'}[$i]->{'id'},
        //                 'name' => $tmp2->{'results'}[$i]->{'title'},
        //                 'genre_id' => '20',
        //                 'description' => $tmp2->{'results'}[$i]->{'overview'},
        //                 'poster_path' => $tmp2->{'results'}[$i]->{'poster_path'},
        //                 'duration' => rand(90, 115), 
        //                 'release_date' => $tmp2->{'results'}[$i]->{'release_date'},
        //                 'puntuation' => $tmp2->{'results'}[$i]->{'vote_average'},
        //                 'created_at' => now(),
        //                 'updated_at' => now()
        //             ]);
        //         }

        //     }
        //     break;
        // }  

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
