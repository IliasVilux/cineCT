<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = ['description'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
