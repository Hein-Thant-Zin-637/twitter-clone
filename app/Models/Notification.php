<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action_id',
        'message',
        'link',
        'is_read'
    ];

    public function action_user()
    {
        return $this->belongsTo(User::class, 'action_id');
    }

    public function message($link)
    {
        $parts = explode('#', $link);
        if(count($parts)>1){
            return DB::table('comments')->find((int)$parts[1]);
        }else{
            return null;
        }
    }
}
