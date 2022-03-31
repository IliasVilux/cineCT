<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Anime;
use App\Models\Serie;
use App\Models\Film;

class FavoriteList extends Model
{
    use HasFactory;

    protected $table = 'favorites';

    public function animes(){
        return $this->hasMany(Anime::class);
    }

    public function series(){
        return $this->hasMany(Serie::class);
    }

    public function films(){
        return $this->hasMany(Film::class);
    }

}
