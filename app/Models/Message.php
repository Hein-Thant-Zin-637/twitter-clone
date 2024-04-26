<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['chat_id', 'sender_id', 'receiver_id', 'message', 'media_id' ];

    public function find_media(int $id)
    {
        return $this->media()->where('id',$id)->first();
    }

    public function media(){
        return $this->belongsTo(Message_Media::class);
    }

    public function time($id)
    {
        $today = Carbon::today();
        $temp = Message::where('id', $id)->first();
        $timestamp = $temp->created_at;
        $carbonInstance = Carbon::parse($timestamp);

        $dayDiff = $today->diffInDays($carbonInstance);

        if($dayDiff == 1){
            return "Yesterday " . $carbonInstance->format('h:i A');
        }
        elseif($dayDiff > 1){
            return $carbonInstance->format('d,M,Y h:i A');
        }
        else{
            return $carbonInstance->format('h:i A');

        }
    }

  
}
