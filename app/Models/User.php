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
        'user_name',
        'google_id',
        'phone',
        'bio',
        'location',
        'website',
        'dob',
        'profile',
        'cover_photo'
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

    public function hasChat($id)
    {
        $me = auth()->user()->id;
        return Chat::where(function ($query) use ($me, $id) {
            $query->where('user_one', $me)->where('user_two', $id)
                ->orWhere('user_one', $id)->where('user_two', $me);
        })->exists();
    }
   
    public function hasPin(int $post_id)
    {
        return $this->pins()->where('post_id',$post_id)->exists();
    }

    public function pins()
    {
        return $this->belongsToMany(Post::class , 'pins')->withTimestamps();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

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
        return $this->likes()->where('post_id',$post_id)->exists();
    }

    public function likes()
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

    public function hasBlock(int $blocked_id)
    {
        return $this->blocking()->where('blocked_id',$blocked_id)->exists();
    }

    public function hasBlocked(int $block_id)
    {
        return $this->blocker()->where('block_id',$block_id)->exists();
    }

    public function blocker()
    {
        return $this->belongsToMany(User::class, 'blocks', 'blocked_id', 'block_id');
    }

    public function blocking()
    {
        return $this->belongsToMany(User::class, 'blocks', 'block_id', 'blocked_id');
    }

    
    public function hasMute(int $mute_id)
    {
        return $this->mute()->where('mute_id',$mute_id)->exists();
    }

    public function mute()
    {
        return $this->belongsToMany(User::class, 'mutes', 'user_id', 'mute_id');
    }

    public function hasRepost(int $post_id)
    {
        return $this->reposts()->where('post_id',$post_id)->exists();
    }

    public function reposts()
    {
        return $this->belongsToMany(Post::class , 'reposts')->withTimestamps();
    }

    public function isRead(int $id)
    {
        return $this->notification()->where('id',$id)->pluck('is_read')->first();
    }

    public function hasNotification()
    {
        return $this->notification()->where('is_read',false)->get();
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
    
}
