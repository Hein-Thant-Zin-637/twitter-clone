<?php

namespace App\Livewire;

use App\Models\Bookmark;
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
        $this->dispatch('storeBookmark');
    }

    public function unbookmark(int $post_id)
    {
        Bookmark::where('user_id', auth()->user()->id)->where('post_id', $post_id)->delete();
        $this->dispatch('storeBookmark');
    }

    public function like(int $post_id)
    {
        $user = auth()->user();
        $user->like()->attach($post_id);
    }

    public function unlike(int $post_id)
    {
        $user = auth()->user();
        $user->like()->detach($post_id);
    }

    public function repost(int $post_id)
    {
        $user = auth()->user();
        $user->repost()->attach($post_id);
    }

    public function unrepost(int $post_id)
    {
        $user = auth()->user();
        $user->repost()->detach($post_id);
    }
    
    public function render()
    {
        return view('livewire.post-footer');
    }
}
