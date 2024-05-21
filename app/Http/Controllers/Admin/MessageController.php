<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function index()
    {
        $messages = Message::all();
        return view('admin-side.messages.index', [
            'messages' => $messages
        ]);
    }

    public function new()
    {
        $messages = Message::all();
        return view('admin-side.messages.new', [
            'messages' => $messages
        ]);
    }

    public function unreplied()
    {
        $messages = Message::all();
        return view('admin-side.messages.unreplied', [
            'messages' => $messages
        ]);
    }

    public function show($id)
    {
        $message = Message::find($id);
        if ($message->status == "new") {
            $message->status = "read";
        }
        $message->save();
        return view('admin-side.messages.show', [
            'message' => $message
        ]);
    }

    public function update(Request $request, $id)
    {
        $message = Message::find($id);
        $message->reply = $request->reply;
        $message->status = "replied";
        $message->save();
        return redirect()->route('admin.messages');
    }
}
