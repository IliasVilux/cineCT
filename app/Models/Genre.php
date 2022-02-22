<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    
}
