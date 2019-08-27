<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chatbox;
use App\Message;
use App\User;

class MessagesController extends Controller
{
	 public function index()
    {   
        // dd(url()->full());
        // $messages = Message::where('chat_box_id', auth()->user()->chatbox->id)
        //                 ->where('user_id', auth()->user()->id)
        //                 ->orderBy('id', 'ASC')
        //                 ->get();

    	return view('messaging.index');
    }

    public function sendMessage(Request $request)
    {  
    	$message = Message::create([
            'chat_box_id' => $request->chat_box_id,
            'user_id' => $request->user_id,
            'message' => $request->message
        ]);

        return response()->json(['success' => true]);
    }

    public function fetchMessage()
    {
        $messages = Message::where('chat_box_id', auth()->user()->chatbox->id)
                            ->where('user_id', auth()->user()->id)
                            ->orderBy('id', 'asc')
                            ->latest()
                            ->get();
                                        
        return $messages;
         
    }

    public function fetchCSR()
    {
        $csr = Message::where('chat_box_id', auth()->user()->chatbox->id)
                            ->where('user_id', auth()->user()->id)
                            ->where('csr_id', '!=', 0)
                            ->orderBy('id', 'asc')
                            ->get();  
        return $csr;
    }
}
