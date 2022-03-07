<?php

namespace Database\Seeders;

use App\Http\Controllers\Actorcontroller;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AnimeController;
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

        /*
        $tmp = SerieController::store();
        foreach ($tmp as $tmp2){
            DB::table('series')->insert([
                'original_id' => $tmp2->{'id'},
                'genre_id' => $tmp2->{'genres'}[0]->{'name'},
                'name' => $tmp2->{'name'}, 
                'description' => $tmp2->{'overview'},
                'poster_path' => $tmp2->{'poster_path'},
                'release_date' => $tmp2->{'first_air_date'},
                'seasons' => $tmp2->{'number_of_seasons'},
                'total_episodes' => $tmp2->{'number_of_episodes'},
                'puntuation' => $tmp2->{'vote_average'},
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } 
        */
        

        /*
        $tmp = FilmController::store();
        foreach ($tmp as $tmp2){
            DB::table('films')->insert([
                'original_id' => $tmp2->{'id'},
                'name' => $tmp2->{'original_title'},
                'description' => $tmp2->{'overview'},
                'poster_path' => $tmp2->{'poster_path'},
                'duration' => $tmp2->{'runtime'}, 
                'genre_id' => $tmp2->{'genres'}[0]->{'name'},
                'release_date' => $tmp2->{'release_date'},
                'puntuation' => $tmp2->{'vote_average'},
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }  
        */

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

        /*
        $tmp = Actorcontroller::filmActors();
        foreach ($tmp as $tmp2){
            DB::table('actors')->insert([
                'name' => $tmp2->{'cast'}[0]->{'name'},
                'film_id' => $tmp2->{'id'},
                'serie_id' => NULL, 
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } 
        
        $tmp = Actorcontroller::filmActors();
        foreach ($tmp as $tmp2){
            DB::table('actors')->insert([
                'name' => $tmp2->{'cast'}[1]->{'name'},
                'film_id' => $tmp2->{'id'},
                'serie_id' => NULL, 
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } 

        */

        /*

        /*-------------------------------------------------------------------------------------------------------*/
        /*
        $tmp = Actorcontroller::filmActors();
        foreach ($tmp as $tmp2){
            if(count($tmp2->{'cast'}) > 2){
                for ($i=0; $i <2 ; $i++) { 
                    DB::table('actors')->insert([
                        'name' => $tmp2->{'cast'}[$i]->{'name'},
                        'film_id' => $tmp2->{'id'},
                        'serie_id' => NULL, 
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }else{
                DB::table('actors')->insert([
                    'name' => $tmp2->{'cast'}[0]->{'name'},
                    'film_id' => $tmp2->{'id'},
                    'serie_id' => NULL, 
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        } 
        */
        
        $tmp = Actorcontroller::serieActors();
        foreach ($tmp as $tmp2){
            if(count($tmp2->{'cast'}) > 2){
                for ($i=0; $i <2 ; $i++) { 
                    DB::table('actors')->insert([
                        'name' => $tmp2->{'cast'}[$i]->{'name'},
                        'film_id' => NULL,
                        'serie_id' => $tmp2->{'id'}, 
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }else{
                DB::table('actors')->insert([
                    'name' => $tmp2->{'cast'}[0]->{'name'},
                    'film_id' => NULL,
                    'serie_id' => $tmp2->{'id'}, 
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        } 
        
        

        /*-------------------------------------------------------------------------------------------------------*/
        
    }
}
