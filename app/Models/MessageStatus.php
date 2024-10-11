<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageStatus extends Model
{
    use HasFactory;
    protected $table = 'message_status';
    public $timestamps = false; 

    protected $fillable = ['message_id', 'user_id', 'status'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
