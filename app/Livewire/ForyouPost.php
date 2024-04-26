<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ForyouPost extends Component
{
    public $posts;

    protected $listeners = ['refreshPosts' => 'refreshData'];

    
    public function mount()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->posts = Post::latest()->get();
    }
    
    public function render()
    {
        return view('livewire.foryou-post');
    }
}
