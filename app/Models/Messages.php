<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;

    protected $fillable = ['conversation_id', 'user_id', 'content'];

    public function conversation(){
        return $this->belongsTo(Conversation::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function messageStatuses(){
        return $this->hasMany(MessageStatus::class,'message_id');
    }
}
