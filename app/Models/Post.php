<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'description',
        'user_id'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function medias()
    {
        return $this->hasMany(Post_Media::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function reposts()
    {
        return $this->hasMany(Repost::class);
    }

}
