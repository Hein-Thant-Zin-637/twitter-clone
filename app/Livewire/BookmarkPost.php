<?php

namespace App\Livewire;

use App\Models\Bookmark;
use Livewire\Component;

class BookmarkPost extends Component
{
    public $posts;
    
    protected $listeners = ['refreshBookmark' => 'refreshData'];

    public function mount()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
         $this->posts = auth()->user()->bookmark;
    }

    public function render()
    {
        return view('livewire.bookmark-post');
    }
}
