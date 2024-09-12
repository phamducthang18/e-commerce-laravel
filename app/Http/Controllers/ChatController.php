<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {   
        $user = $request->user(); 
        $message = $request->input('message');
        event(new MessageSent($user, $message));
        return response()->json(['status' => 'Message Sent!']);
    }
}
