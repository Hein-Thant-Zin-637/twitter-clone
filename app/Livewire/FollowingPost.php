<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class FollowingPost extends Component
{
    public $posts;
    
    protected $listeners = ['refreshPosts' => 'refreshPosts'];

    public function mount()
    {
        $this->refreshPosts();
    }

    public function refreshPosts()
    {
        $this->posts = Post::latest()->get();
    }
    
    public function render()
    {
        return view('livewire.following-post');
    }
}
