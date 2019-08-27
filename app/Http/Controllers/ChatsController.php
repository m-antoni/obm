<?php

namespace App\Http\Controllers;
use App\Events\MessageSent;

use App\Chat;
use App\ChatMessage;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function index()
    {   
        // dd(url()->full());
    	return view('chats.index');
    }

    public function fetchMessages()
    {
    	return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {    
       $chatMessage = new ChatMessage();
       $chatMessage->user_id = auth()->user()->id;
       $chatMessage->message =  Input::get('text');
       $chatMessage->save();
    }   


    public function is_typing()
    {
        $userID = auth()->user()->id;

        $chat = Chat::find(1);
        if($chat->user_id == $userID){
            $chat->user_is_typing = true;
        }else{
            $chat->user_is_typing = true;
            $chat->save();
        }

    }

    public function not_typing()
    {
        $userID = auth()->user()->id;

        $chat = Chat::find(1);
        if($chat->user_id == $userID){
            $chat->user_is_typing = false;
        }else{
            $chat->user_is_typing = false;
            $chat->save();
        }
    }


    public function retrieveChatMessages()
    {
        $userID = auth()->user()->id;

        $message = ChatMesage::where('user_id', '!=', $userID)
                            ->where('read', '=', false)->first();

        if(count($message) > 0)
        {
            $message->read = true;
            $message->save();
            return $message->message;
        }
    }

    public function retrieveTypingStatus()
    {
        $userID = auth()->user()->id;

        $chat = Chat::find(1);
        if($chat->user_id == $userID)
        {
            if($chat->csr_typing)
                return $chat->csr_typing;
        }else
        {
            if($chat->user_typing)
                return $chat->user_id;
        }
    }

}

    // public function sendMessages(Request $request)
    // {
    //  $message = auth()->user()->messages()->create([
    //      'message' => $request->message
    //  ]);

    //     broadcast(new MessageSent($message->load('user')))->toOthers();

    //  return ['success' => 'success'];
    // }