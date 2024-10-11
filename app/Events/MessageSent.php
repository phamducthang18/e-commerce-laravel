<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $message;

    public function __construct($user, $message,$roomId)
    {
        $this->user = $user;
        $this->message = $message;
        $this->room = $roomId;
    }

    public function broadcastOn()
    {
       log::info("Broadcasting");       
        return new Channel('chat.',$this->room);
    }
    public function broadcastWith()
    {
        $data = [
            'user' => $this->user,
            'message' => $this->message,
            'timestamp' => now(),
        ];
        
        return $data;
    }
}
