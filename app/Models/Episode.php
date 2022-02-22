<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $table = 'episodes';

    public function serie() {
        return $this->hasMany(Serie::class);
    }
    
    public function film() {
        return $this->hasMany(Film::class);
    }
}
