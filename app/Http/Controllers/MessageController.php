<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function send(Request $request) {
        $validated_data = $request->validate([
           'first_name'=>'required',
           'last_name'=>'required',
           'email'=>'required|email',
           'subject'=>'required',
           'message'=>'required',
        ]);

       $created =  Message::create($validated_data);

       if($created) {
           return response()->json(['success'=>'Message Sended Successfully'],200);
       }
    }

    public function index() {
        $messages = Message::latest()->get();
        return view('admin.messages.index',compact('messages'));
    }

    public function destroy($id) {
        $message = Message::find($id);
        if($message->delete()){
            return redirect()->to('admin/messages')->with(['success' => 'message deleted successfully']);

        }
    }
}
