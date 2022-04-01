<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
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
