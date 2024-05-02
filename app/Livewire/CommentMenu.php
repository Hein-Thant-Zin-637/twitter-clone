<?php

namespace App\Livewire;

use App\Models\Block;
use App\Models\Comment;
use App\Models\Following;
use App\Models\Mute;
use Livewire\Component;

class CommentMenu extends Component
{
    public $comment;

    public function deleteComment(int $comment_id)
    {
        $comment = Comment::find($comment_id)->delete();
        $this->dispatch('refreshComments');
    }

    public function follow(int $user_id)
    {
        Following::create([
            'followed_id' => $user_id,
            'follower_id' => auth()->user()->id,
        ]);
        $this->dispatch('userFollow');
    }

    public function unfollow(int $user_id)
    {
        Following::where('follower_id', auth()->user()->id)->where('followed_id', $user_id)->delete();
        $this->dispatch('userFollow');
    }

    public function mute(int $user_id)
    {
        Mute::create([
            'mute_id' => $user_id,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function unmute(int $user_id)
    {
        Mute::where('user_id', auth()->user()->id)->where('mute_id', $user_id)->delete();
    }

    
    public function block(int $user_id)
    {
        Block::create([
            'blocked_id' => $user_id,
            'block_id' => auth()->user()->id,
        ]);
    }
    
    public function render()
    {
        return view('livewire.comment-menu');
    }
}
