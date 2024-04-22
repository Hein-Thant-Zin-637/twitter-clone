<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ForyouPost extends Component
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
    
    public function render()
    {
        return view('livewire.foryou-post');
    }
}
