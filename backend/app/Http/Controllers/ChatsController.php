<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Menber;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    // public function rooms(){
    //     return view('chat.room');
    // }

    public function room(Menber $menber)
    {   
        $chats = Chat::get();
        // 一度ルームが開かれたら同じルームは記録されないようにしたい
        Room::findByMembers(Auth::user(),$menber);
        return view('chat.room', compact('chats','menber'));
    }

    public function add(Request $request,Menber $menber)
{   
    // $menber = Auth::user();
        // 今いるroomのIDを入れたい
    $room=Room::findByMembers(Auth::user(),$menber);
    
    $chat=new Chat;
    $chat->menber_id = Auth::user()->id;
    $chat->room_id = $room->id;
    $chat->body = $request->body;

    $chat->save();
    
    return redirect()->back();
}

    public function getData()
    {
        $chats = Chat::orderBy('created_at', 'desc')->get();
        $json = ["chats" => $chats];
        return response()->json($json);
    }
}
