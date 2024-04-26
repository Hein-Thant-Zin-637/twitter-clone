<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message_Media extends Model
{
    use HasFactory;

    protected $fillable = ['media'];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
