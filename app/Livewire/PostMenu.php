<?php

namespace App\Livewire;

use App\Models\Block;
use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\Following;
use App\Models\Like;
use App\Models\Mute;
use App\Models\Pin;
use App\Models\Post;
use App\Models\Post_Media;
use App\Models\Post_Tag;
use App\Models\Repost;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class PostMenu extends Component
{
    public $post;

    public function deletePost(int $post_id)
    {
        $post = Post::find($post_id);
        $images = Post_Media::where('post_id',$post->id)->get();
        if($images){
            foreach($images as $image){
                Storage::delete('public/'.$image->media);
                $image->delete();
            }
        }
        $post->delete();
        $this->dispatch('refreshPosts');
    }

    public function pin(int $post_id)
    {
        Pin::create([
            'post_id' => $post_id,
            'user_id' => auth()->user()->id,
        ]);
        $this->dispatch('refreshPins');
    }

    public function unpin(int $post_id)
    {
        Pin::where('user_id', auth()->user()->id)->where('post_id', $post_id)->delete();
        $this->dispatch('refreshPins');
    }

    public function follow(int $user_id)
    {
        Following::create([
            'followed_id' => $user_id,
            'follower_id' => auth()->user()->id,
        ]);
        $this->dispatch('userFollow');
    }

    public function unfollow(int $user_id)
    {
        Following::where('follower_id', auth()->user()->id)->where('followed_id', $user_id)->delete();
        $this->dispatch('userFollow');
    }

    public function mute(int $user_id)
    {
        Mute::create([
            'mute_id' => $user_id,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function unmute(int $user_id)
    {
        Mute::where('user_id', auth()->user()->id)->where('mute_id', $user_id)->delete();
    }

    
    public function block(int $user_id)
    {
        Block::create([
            'blocked_id' => $user_id,
            'block_id' => auth()->user()->id,
        ]);
    }


    public function render()
    {
        return view('livewire.post-menu');
    }
}
