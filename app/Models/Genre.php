<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\Film;
use App\Models\Anime;

class Genre extends Model
{
    use HasFactory;
    protected $table = 'genres';

    public function serie() {
        return $this->hasMany(Serie::class);
    }

    public function film() {
        return $this->hasMany(Film::class);
    }

    public function anime() {
        return $this->hasMany(Anime::class);
    }

    
}
