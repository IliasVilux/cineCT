<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Film;

class Actor extends Model
{
    use HasFactory;

    protected $table = 'actors';

    public function film() {
        return $this->hasMany(Film::class, 'film_id');
    }

    
}
