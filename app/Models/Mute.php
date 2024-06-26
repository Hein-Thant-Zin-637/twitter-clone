<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mute extends Model
{
    use HasFactory;
    protected $fillable = [
        'mute_id',
        'user_id'
    ];
}
