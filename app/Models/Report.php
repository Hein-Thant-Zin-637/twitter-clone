<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = [
        'message',
        'post_id',
    ];
=======
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
>>>>>>> aede73e4ac6dca81e9a4f775d375667ecb1031c7
}
