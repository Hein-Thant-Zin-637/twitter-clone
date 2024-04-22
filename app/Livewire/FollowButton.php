<?php

namespace App\Livewire;

use App\Models\Following;
use Livewire\Component;

class FollowButton extends Component
{
    public $user;
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
    public function render()
    {
        return view('livewire.follow-button');
    }
}
