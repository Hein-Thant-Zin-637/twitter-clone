<?php

namespace App\Livewire;

use App\Models\Block;
use App\Models\Mute;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Setting extends Component
{
    public $blockList, $muteList;
    public $email,$phone;

    public function unblock($user_id)
    {
        Block::where('block_id', auth()->user()->id)->where('blocked_id', $user_id)->delete();
        $this->refreshData();
    }

    public function unmute(int $user_id)
    {
        Mute::where('user_id', auth()->user()->id)->where('mute_id', $user_id)->delete();
        $this->refreshData();
    }

    public function changeEmail(){
        $user = User::find(auth()->user()->id);
        $user->email = $this->email;
        $user->save();
    }

    public function changePhone(){
        $user = User::find(auth()->user()->id);
        $user->phone = $this->phone;
        $user->save();
    }


    public function mount()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->blockList = auth()->user()->blocking;
        $this->muteList = auth()->user()->mute;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->phone;
    }

    public function render()
    {
        return view('livewire.setting');
    }
}
