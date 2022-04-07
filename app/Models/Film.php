<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = 'films';

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function actor() {
        return $this->hasMany(Actor::class, 'id', 'film_id');
    }

    public function review(){
        return $this->hasMany(Review::class);
    }

}
