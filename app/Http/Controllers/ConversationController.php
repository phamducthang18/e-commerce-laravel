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

        $conversations = $user->conversations()
            ->with(['messages' => function ($query) {
                $query->latest()->limit(1);
            },'messages.user'])
            ->get();

        return response()->json($conversations);
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
        $messages = $conversation->messages()->skip($offset)->take($limit)->with('user')->get();
        $formattedMessages = $messages->map(function ($message) {
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
