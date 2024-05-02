<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'reportmessage',
        'user_id',
        'message_id',
    ];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
