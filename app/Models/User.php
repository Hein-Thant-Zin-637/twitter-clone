<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function hasBookmark(int $post_id)
    {
        return $this->bookmark()->where('post_id',$post_id)->exists();
    }

    public function bookmark()
    {
        return $this->belongsToMany(Post::class , 'bookmarks')->withTimestamps();
    }

    public function hasLike(int $post_id)
    {
        return $this->like()->where('post_id',$post_id)->exists();
    }

    public function like()
    {
        return $this->belongsToMany(Post::class , 'likes')->withTimestamps();
    }

    public function hasFollow(int $followed_id)
    {
        return $this->following()->where('followed_id',$followed_id)->exists();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followings', 'followed_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followings', 'follower_id', 'followed_id');
    }

    public function hasRepost(int $post_id)
    {
        return $this->repost()->where('post_id',$post_id)->exists();
    }

    public function repost()
    {
        return $this->belongsToMany(Post::class , 'reposts')->withTimestamps();
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    
}
