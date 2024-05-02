<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment as ModelsComment;
use App\Models\Notification;

class Comment extends Component
{
    public $post;
    public $commentText;

    protected $rules = [
        'commentText' => 'required|min:3',
    ];

    public function submitComment()
    {
        $user = auth()->user();
        $user_name = $this->post->user->user_name;
        $post_id = $this->post->id;
        $this->validate();
        $comment = ModelsComment::create([
            'post_id' => $post_id,
            'user_id' => auth()->user()->id,
            'content' => $this->commentText,
        ]);
        if($this->post->user->id !== auth()->user()->id){
            Notification::create([
                'user_id' => $this->post->user->id,
                'action_id' => $user->id,
                'message' => "Replying to @$user->name",
                'link' => "/$user_name/status/$post_id#$comment->id",
                'is_read' => false,
            ]);
        }
        $this->commentText = '';
        $this->dispatch('close-modal', id:$this->post->id);
        $this->dispatch('refreshComments');
    }
    public function render()
    {
        return view('livewire.comment');
    }
}
