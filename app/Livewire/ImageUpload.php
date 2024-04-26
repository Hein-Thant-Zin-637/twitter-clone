<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\Message_Media;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class ImageUpload extends Component
{
    use WithFileUploads;
    public $image, $message, $chat;
    public $hasMessage = true;

    public function render()
    {
        if(strlen($this->message)>0 || $this->image != null){
            $this->hasMessage = false;
        }
        return view('livewire.image-upload', [
            'messages' => Message::orderBy('id', 'desc')->where('chat_id',$this->chat->id)->get(),
        ]);
    }

    public function resetImage()
    {   
        $this->reset('image');
        $this->hasMessage = true;
    }

    public function save()
    {   
        if($this->image == null)
        {
            Message::create([
                'chat_id' => $this->chat->id,
                'sender_id' => auth()->user()->id,
                'receiver_id' => $this->chat->user_two,
                'message' => $this->message,
            ]);
            $this->resetExcept('chat');
        }
        elseif($this->message == null)
        {
            $path = $this->image->store('media', 'public');
            $media_id = Message_Media::create([
                'media' => $path,
            ]);
            Message::create([
                'chat_id' => $this->chat->id,
                'sender_id' => auth()->user()->id,
                'receiver_id' => $this->chat->user_two,
                'media_id' => $media_id->id,
            ]);
            $this->resetExcept('chat');
        }
        else{
            $path = $this->image->store('media', 'public');
            $media_id = Message_Media::create([
                'media' => $path,
            ]);
            Message::create([
                'chat_id' => $this->chat->id,
                'sender_id' => auth()->user()->id,
                'receiver_id' => $this->chat->user_two,
                'message' => $this->message,
                'media_id' => $media_id->id,
            ]);
            $this->resetExcept('chat');   

        }
    }


}
