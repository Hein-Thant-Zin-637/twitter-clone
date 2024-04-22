<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Component;

class TagList extends Component
{
    public $tags;

    protected $listeners = ['postStored' => 'refreshPosts'];

    public function mount()
    {
        $this->refreshPosts();
    }

    public function refreshPosts()
    {
        $this->tags = Tag::latest()->get();
    }
    public function render()
    {
        return view('livewire.tag-list');
    }
}
