<?php

namespace App\Http\Controllers;
use App\Models\Messages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){

    }
    public function create(){

    }
    public function store(Request $request){

        $userId = Auth::user()->id;
        $request->validate([
            'content' => 'required|string',
            'conversation_id' => 'required|integer',
        ]);

        $message = Messages::create($request->only('content','conversation_id')+['user_id' => $userId]);

        return response()->json([
            'status' => 'Message sent successfully!',
           'message' => $message
        ]);
    }
    public function show($id){

    }
    public function edit($id){

    }
    public function update($id){

    }
    public function destroy($id){

    }

}
