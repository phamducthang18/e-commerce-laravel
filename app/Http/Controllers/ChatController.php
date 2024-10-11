<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Events\SimpleEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {   
        
        $user =Auth::user(); 
        $message = $request->input('message');
        $roomId = $request->input('roomId');
        // echo "<pre>";print_r($roomId);echo "</pre>";die;
        if (empty($message)) {
            return response()->json(['status' => 'Message is empty!'], 400);
        }
        event(new MessageSent($user, $message,$roomId));
        
        Log::info('Chat sent message', ['message' => $message]);
        return response()->json(['status' => 'Message Sent!']);
    }
}
