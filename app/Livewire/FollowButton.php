<?php

namespace App\Livewire;

use App\Models\Following;
use App\Models\Notification;
use Livewire\Component;

class FollowButton extends Component
{
    public $user;
    public function follow(int $user_id)
    {
        $user = auth()->user();
        Following::create([
            'followed_id' => $user_id,
            'follower_id' => auth()->user()->id,
        ]);
        Notification::create([
            'user_id' => $user_id,
            'action_id' => $user->id,
            'message' => "$user->name is followed you",
            'link' => "/$user->user_name",
            'is_read' => false,
        ]);
        $this->dispatch('userFollow');
    }

    public function unfollow(int $user_id)
    {
        Following::where('follower_id', auth()->user()->id)->where('followed_id', $user_id)->delete();
        $this->dispatch('userFollow');
    }
    public function render()
    {
        return view('livewire.follow-button');
    }
}
