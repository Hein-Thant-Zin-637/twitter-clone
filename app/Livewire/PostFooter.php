<?php

namespace App\Livewire;

use App\Models\Bookmark;
use App\Models\Like;
use App\Models\Notification;
use App\Models\Repost;
use Livewire\Component;

class PostFooter extends Component
{
    public $post;

    public function bookmark(int $post_id)
    {
        Bookmark::create([
            'post_id' => $post_id,
            'user_id' => auth()->user()->id,
        ]);
        $this->dispatch('refreshBookmarks');
    }

    public function unbookmark(int $post_id)
    {
        Bookmark::where('user_id', auth()->user()->id)->where('post_id', $post_id)->delete();
        $this->dispatch('refreshBookmarks');
    }

    public function like(int $post_id)
    {   
        $user = auth()->user();
        $user_name = $this->post->user->user_name;
        Like::create([
            'post_id' => $post_id,
            'user_id' => $user->id,
        ]);
        if($this->post->user->id !== auth()->user()->id){
            Notification::create([
                'user_id' => $this->post->user->id,
                'action_id' => $user->id,
                'message' => "$user->name is liked your post",
                'link' => "/$user_name/status/$post_id",
                'is_read' => false,
            ]);
        }
        $this->dispatch('refreshLikes');
    }

    public function unlike(int $post_id)
    {
        Like::where('user_id', auth()->user()->id)->where('post_id', $post_id)->delete();
        $this->dispatch('refreshLikes');
    }

    public function repost(int $post_id)
    {
        $user = auth()->user();
        $user_name = $this->post->user->user_name;
        Repost::create([
            'post_id' => $post_id,
            'user_id' => auth()->user()->id,
        ]);
        if($this->post->user->id !== auth()->user()->id){
            Notification::create([
                'user_id' => $this->post->user->id,
                'action_id' => $user->id,
                'message' => "$user->name is reposted your post",
                'link' => "/$user_name/status/$post_id",
                'is_read' => false,
            ]);
        }
        $this->dispatch('refreshReposts');
    }

    public function unrepost(int $post_id)
    {
        Repost::where('user_id', auth()->user()->id)->where('post_id', $post_id)->delete();
        $this->dispatch('refreshReposts');
    }

    
    public function render()
    {
        return view('livewire.post-footer');
    }
}
