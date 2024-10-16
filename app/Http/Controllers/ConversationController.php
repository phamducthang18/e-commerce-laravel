<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Conversation;

class ConversationController extends Controller
{
    public function index(){

        $user = Auth::user();

        // $conversations = $user->conversations()->with('messages')->get();

        // $conversations = $user->conversations()
        //     ->with(['messages' => function ($query) {
        //         $query->latest()->take(1);
        //     },'messages.user'])
        //     ->get();
        $conversations = $user->conversations()
        ->with(['latestMessage.user']) // Lấy tin nhắn mới nhất và thông tin người gửi
        ->get();
        $sortedConversations = $conversations->sortByDesc(function ($conversation) {
            return $conversation->latestMessage ? $conversation->latestMessage->created_at : null;
        });
        return response()->json($sortedConversations->values()->all());
    }
    public function create(){

    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:private,group',
            'users' => 'array',
        ]);

        $conversation = Conversation::create($request->only('name','type'));

        $conversation->users()->attach(Auth::id());
        if($request->has('users')){
            foreach($request->users as $user_id){
                $conversation->users()->attach($user_id);
            }
        }
        return response()->json([
            'message' => 'Room created successfully!',
            'conversation' => $conversation
        ]);
    }
    public function show(Request $request,$conversation){
        $limit = $request->input('limit', 10); 
        $offset = $request->input('offset', 0);
        $conversation = Conversation::find($conversation);
        $messages = $conversation->messages()->skip($offset)->orderBy('created_at', 'desc')->take($limit)->with('user')->get();
        $sortedMessages = $messages->sortBy('created_at')->values();
        $formattedMessages = $sortedMessages->map(function ($message) {
            return [
                'id' => $message->id,
                'content' => $message->content,
                'user' => [
                    'id' => $message->user->id,
                    'name' => $message->user->name, 
                ],
                'created_at' => $message->created_at,
            ];
        });
        return response()->json([
            'conversation' => $conversation,
            'messages' => $formattedMessages,
        ]); 
    }
    public function edit($id){

    }
    public function update($id){

    }
    public function destroy($id){

    }

}
