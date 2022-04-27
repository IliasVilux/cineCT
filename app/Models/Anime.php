<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\Like;
use App\Models\Genre;
use App\Models\Character;


class Anime extends Model
{
    protected $table = 'animes';

    public function review(){
        return $this->hasMany(Review::class);
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function character(){
        return $this->hasMany(Character::class);
    }


    /*
    //Hay que rellenar la table 'episodes' y luego provar esta relación 
    public function episode(){
        return $this->hasMany(Episode::class);
    }
    */

}
