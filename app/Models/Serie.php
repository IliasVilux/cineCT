<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\Genre;
use App\Models\Review;
use App\Models\Character;

class Serie extends Model
{
    protected $table = 'series';

    public function genre() {
        return $this->belongsTo(Genre::class);
    }
    
    public function review(){
        return $this->hasMany(Review::class);
    }

    public function character(){
        return $this->hasMany(Character::class);
    }

}
