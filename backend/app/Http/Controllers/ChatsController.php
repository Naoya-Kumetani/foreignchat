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
    public function rooms(){
        $rooms = Room::where('menber1_id', '=', Auth::user()->id)
        ->orWhere('menber2_id', '=', Auth::user()->id)
        ->get();

        $menbers = [];
        foreach($rooms as $room){
            if($room->menber1_id === Auth::user()->id){
                array_push($menbers,Menber::where('id', '=', $room->menber2_id)->first());
            }elseif($room->menber2_id === Auth::user()->id){
                array_push($menbers,Menber::where('id', '=', $room->menber1_id)->first());
            }
        }
        
        return view('chat.rooms',compact('menbers'));
    }

    public function room(Menber $menber)
    {   
        Room::findByMembers(Auth::user(),$menber);
        if(Auth::user()->id > $menber->id){
            $room=Room::where([
                ['menber1_id', '=', Auth::user()->id],
                ['menber2_id', '=', $menber->id]
                ])->first();
        }else{
            $room=Room::where([
                ['menber1_id', '=', $menber->id],
                ['menber2_id', '=', Auth::user()->id]
                ])->first();
        }
        // $chats = Chat::where('room_id', '=', $room->id)->get();
        // return view('chat.room', compact('chats','menber','room'));
        return view('chat.room', compact('menber','room'));
    }
    
    public function getData(Menber $menber)
    {
        Room::findByMembers(Auth::user(),$menber);
        if(Auth::user()->id > $menber->id){
            $room=Room::where([
                ['menber1_id', '=', Auth::user()->id],
                ['menber2_id', '=', $menber->id]
                ])->first();
        }else{
            $room=Room::where([
                ['menber1_id', '=', $menber->id],
                ['menber2_id', '=', Auth::user()->id]
                ])->first();
        }
        // $chats = Chat::where('room_id', '=', $room->id)->get();
        $chats = Chat::where('room_id', '=', $room->id)->with('menber')->orderBy('created_at', 'desc')->get();
        // $chats = Chat::with('menber')->get();
        $json = ["chats" => $chats];
        return response()->json($json);
    }
    
    public function add(Request $request,Menber $menber)
{   
    
    $room=Room::findByMembers(Auth::user(),$menber);
    
    $chat=new Chat;
    $chat->menber_id = Auth::user()->id;
    $chat->room_id = $room->id;
    $chat->body = $request->body;
    $chat->save();
    
    return redirect()->back();
}

}
