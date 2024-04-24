<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentModal extends Component
{
    public $post,$count;


    protected $listeners = ['refreshComments' => 'refreshData'];

    
    public function mount()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->count = $this->post->comments->count();
    }
    

    public function render()
    {
        return view('livewire.comment-modal');
    }
}
