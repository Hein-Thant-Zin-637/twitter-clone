<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message_Media extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = ['media'];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
=======

>>>>>>> adfc5b0c2f77a478d4c316fb6bd7f2dc4d115947
}
