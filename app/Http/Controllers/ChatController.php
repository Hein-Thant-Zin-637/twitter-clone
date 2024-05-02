<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function chat()
    {
        $users = User::all();
        $id = auth()->user()->id;
        $chatArray = Chat::all();
        $conversation = false;
        foreach($chatArray as $chat)
        {
            if($chat->user_one == $id || $chat->user_two == $id)
            {
                $conversation = true;
            }
            else{
                continue;
            }
        }
        return view('chat/index', ['id' => $id, 'users' => $users, 'chatArray'=> $chatArray, 'conversation' => $conversation]);
    }

    public function conversation($id)
    {   
        $condition = false;
        $hasChat = Chat::where('user_one', $id)->where('user_two', auth()->user()->id)->
        orWhere('user_one', auth()->user()->id)->where('user_two', $id)->first();

        if($hasChat != null)
        {   

            return redirect()->route('conversationDetail', ['sender_id' => $hasChat->id, 'reciever' => (int)$id]);
            // $this->conversationDetail($hasChat->id, (int)$id);
        }
        else{
            $users = User::all();
            $receiver = $id;
            $id = auth()->user()->id;
    
            $newChat = Chat::create([
                'user_one' => $id,
                'user_two' => $receiver,
            ]);
    
            $chatArray = Chat::all();
            $conversation = false;
            $condition = true;
            foreach($chatArray as $chat)
            {
                if($chat->user_one == $id || $chat->user_two == $id)
                {
                    $conversation = true;
                }
                else{
                    continue;
                }
                
            }
            // return redirect()->back()->with(['id' => $id, 'users' => $users, 'chatArray'=> $chatArray, 'conversation' => $conversation, 'receiver' => $receiver]);
            // return view('chat/index', ['id' => $id, 'users' => $users, 'chatArray'=> $chatArray, 'conversation' => $conversation, 'receiver' => $receiver, 'condition' => $condition]);
            // return Http::post(route('chat/index'));
            return redirect()->route('conversationDetail', ['sender_id' => $newChat->id, 'reciever' => $receiver]);
        }

    }
    public function deleteConversation($chat_id)
    {
        $delete = Chat::find($chat_id)->delete();
        return redirect()->route('chat');
    }

    public function conversationDetail($chat_id, $receiver)
    {
        $sender_id = auth()->user()->id;
        $message = Message::where('chat_id', $chat_id)->get();
        $users = User::all();
        $chatArray = Chat::all();
        $conversation = false;
        // $receiver = $request->receiver;

        foreach($chatArray as $chat)
        {
            if($chat->user_one == $sender_id || $chat->user_two == $sender_id)
            {
                $conversation = true;
            }
            else{
                continue;
            }
        }

        $chat = Chat::find($chat_id);
        return view('chat.conversation', ['id' => $sender_id, 'users' => $users, 'chatArray' => $chatArray, 'messages' => $message, 'conversation' => $conversation, 'chat' => $chat, 'recieverId' => $receiver ]);

    }

    public function sendMessage($sender_id, Request $request)
    {
        Message::create([
            'chat_id' => $request->chat_id,
            'sender_id' => $sender_id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->text,
        ]);
        return redirect()->route('conversationDetail', $request->chat_id);
    }
}
