<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment as ModelsComment;

class Comment extends Component
{
    public $post;
    public $commentText;

    protected $rules = [
        'commentText' => 'required|min:3',
    ];

    public function submitComment()
    {
        $this->validate();

        ModelsComment::create([
            'post_id' => $this->post->id,
            'user_id' => auth()->user()->id,
            'content' => $this->commentText,
        ]);

        $this->commentText = '';
        $this->dispatch('close-modal');
        $this->dispatch('commentAdded');
    }
    public function render()
    {
        return view('livewire.comment');
    }
}
