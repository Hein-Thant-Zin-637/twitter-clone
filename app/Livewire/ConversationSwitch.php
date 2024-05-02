<?php

namespace App\Livewire;

use App\Models\Chat;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ConversationSwitch extends Component
{
    public $conversation,$chatArray,$reciever,$chat;


    public function switch()
    {
        $hasChat = Chat::where('user_one', $this->reciever)->where('user_two', auth()->user()->id)->
        orWhere('user_one', auth()->user()->id)->where('user_two', $this->reciever)->first();
        $this->chat = $hasChat->id;
    }

    public function render()
    {
        return view('livewire.conversation-switch', [
            'conversation' => $this->conversation,
            'chatArray' => $this->chatArray,
            'chat' => $this->chat,
            'recieverId' => $this->reciever,
        ]);
    }
}
