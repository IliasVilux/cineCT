<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Image extends Model
{
    use HasFactory;
    protected $table = 'profile_images';

    public function user() {
        return $this->belongsTo(User::class);
    }

}
