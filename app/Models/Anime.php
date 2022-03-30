<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\Image;
use App\Models\Episode;


class Anime extends Model
{
    use HasFactory;
    protected $table = 'animes';

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function episode(){
        return $this->hasMany(Episode::class);
    }

    public function image() {
        return $this->hasMany(Image::class);
    }

}
