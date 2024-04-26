<?php

namespace App\Livewire;

use App\Models\Block;
use App\Models\Mute;
use Livewire\Component;

class ProfileMenu extends Component
{
    public $user;

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
        return view('livewire.profile-menu');
    }
}
