<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = ['description'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function serie() {
        return $this->belongsTo(Serie::class);
    }
    
    public function film() {
        return $this->belongsTo(Film::class);
    }

    public function anime() {
        return $this->belongsTo(Anime::class);
    }

}
