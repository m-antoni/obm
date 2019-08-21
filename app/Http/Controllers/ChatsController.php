<?php

namespace App\Http\Controllers;
use App\Events\MessageSent;

use App\Message;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function index()
    {
    		return view('chat.index');
    }

    public function fetchMessages()
    {
    		return Message::with('user')->get();
    }

    public function sendMessages(Request $request)
    {
    		$message = auth()->user()->messages()->create([
    				'message' => $request->message
    		]);

        broadcast(new MessageSent($message->load('user')))->toOthers();

    		return ['success' => 'success'];
    }
}
