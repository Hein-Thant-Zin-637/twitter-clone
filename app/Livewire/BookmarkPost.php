<?php

namespace App\Livewire;

use App\Models\Bookmark;
use Livewire\Component;

class BookmarkPost extends Component
{
    public $posts;
    
    protected $listeners = ['storeBookmark' => 'refreshPosts'];

    public function mount()
    {
        $this->refreshPosts();
    }

    public function refreshPosts()
    {
        // dd(auth()->user()->bookmark);
         $this->posts = auth()->user()->bookmark;
    }

    public function render()
    {
        return view('livewire.bookmark-post');
    }
}
