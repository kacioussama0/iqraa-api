<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function messages() {
        $messages = Message::latest()->get();
        return view('admin.messages',compact('messages'));
    }


    public function send(Request $request) {
        $validatedData = $request->validate([
           'name' => 'required|min:3',
           'subject' => 'required|min:3',
           'email' => 'required|email',
           'message' => 'required',
        ]);

        $created = Message::create($validatedData);

        if($created) {
            return response()->json([
                'success' => 'message created successfully'
            ]);
        }

        return response()->json([
            'success' => 'error was happened'
        ],500);


    }

}
