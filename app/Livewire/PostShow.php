<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostShow extends Component
{

    public $posts;

    protected $listeners = ['postStored' => 'refreshPosts'];

    public function mount()
    {
        $this->refreshPosts();
    }

    public function refreshPosts()
    {
        $this->posts = Post::latest()->get();
    }

    public function bookmark(int $post_id)
    {
        $user = auth()->user();
        $user->bookmark()->attach($post_id);
    }

    public function unbookmark(int $post_id)
    {
        $user = auth()->user();
        $user->bookmark()->detach($post_id);
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

    public function deletePost(int $post_id)
    {
        Post::find($post_id)->delete();
        $this->refreshPosts();
    }
    public function render()
    {
        return view('livewire.post-show');
    }
}
