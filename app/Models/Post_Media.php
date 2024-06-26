<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'media'
    ];
}
