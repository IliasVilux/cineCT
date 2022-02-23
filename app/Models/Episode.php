<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Serie;
use App\Models\Anime;

class Episode extends Model
{
    use HasFactory;

    protected $table = 'episodes';

    public function serie() {
        return $this->belongsTo(Serie::class);
    }
    
    public function anime() {
        return $this->belongsTo(Anime::class);
    }
}
