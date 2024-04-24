<?php

namespace App\Livewire;

use Livewire\Component;

class CommentList extends Component
{
    public $post ,$comments;
    protected $listeners = ['refreshComments' => 'refreshData'];

    
    public function mount()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->comments = $this->post->comments;
    }
    public function render()
    {
        return view('livewire.comment-list');
    }
}
