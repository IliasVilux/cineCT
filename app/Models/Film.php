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
        return $this->belongsTo(Actor::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function image() {
        return $this->hasMany(Image::class);
    }

}
