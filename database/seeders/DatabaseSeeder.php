<?php

namespace Database\Seeders;

use App\Http\Controllers\GenreController;
use App\Http\Controllers\SerieController;
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

        $tmp = SerieController::store();
        foreach ($tmp as $tmp2){
            DB::table('series')->insert([
                'image_api_id' => $tmp2->{'id'},
                'name' => $tmp2->{'name'}, 
                'description' => $tmp2->{'overview'},
                'genre_id' => $tmp2->{'genres'}[0]->{'name'},
                'adult_content' => $tmp2->{'adult'},
                'release_date' => $tmp2->{'first_air_date'},
                'seasons' => $tmp2->{'number_of_seasons'},
                'total_episodes' => $tmp2->{'number_of_episodes'},
                'puntuation' => $tmp2->{'vote_average'},
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
