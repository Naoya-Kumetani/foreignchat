<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Member;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Validator;


class ChatsController extends Controller
{
    public function rooms(){
        $rooms = Room::where('member1_id', '=', Auth::user()->id)
        ->orWhere('member2_id', '=', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->get();

        $members = [];
        $lastMessages=[];
        foreach($rooms as $room){
            if($room->member1_id === Auth::user()->id){
                array_push($members,Member::where('id', '=', $room->member2_id)->first());
                array_push($lastMessages,Chat::where('room_id', '=', $room->id)->orderBy('created_at', 'desc')->first());
            }elseif($room->member2_id === Auth::user()->id){
                array_push($members,Member::where('id', '=', $room->member1_id)->first());
                array_push($lastMessages,Chat::where('room_id', '=', $room->id)->orderBy('created_at', 'desc')->first());
            }
        }

        // $json = ["lastMessages" => $lastMessages];
        // return response()->json($json);
        return view('chat.rooms',compact('members','lastMessages'));
    }

    public function room(Member $member)
    {   
        Room::findByMembers(Auth::user(),$member);
        if(Auth::user()->id > $member->id){
            $room=Room::where([
                ['member1_id', '=', Auth::user()->id],
                ['member2_id', '=', $member->id]
                ])->first();
        }else{
            $room=Room::where([
                ['member1_id', '=', $member->id],
                ['member2_id', '=', Auth::user()->id]
                ])->first();
        }
        // $chats = Chat::where('room_id', '=', $room->id)->get();
        // return view('chat.room', compact('chats','member','room'));
        return view('chat.room', compact('member','room'));
    }
    
    public function getData(Member $member)
    {
        Room::findByMembers(Auth::user(),$member);
        if(Auth::user()->id > $member->id){
            $room=Room::where([
                ['member1_id', '=', Auth::user()->id],
                ['member2_id', '=', $member->id]
                ])->first();
        }else{
            $room=Room::where([
                ['member1_id', '=', $member->id],
                ['member2_id', '=', Auth::user()->id]
                ])->first();
        }
        // $chats = Chat::where('room_id', '=', $room->id)->get();
        $chats = Chat::where('room_id', '=', $room->id)->with('member')->orderBy('created_at', 'asc')->get();
        // $chats = Chat::with('member')->get();
        $json = ["chats" => $chats];
        return response()->json($json);
    }
    
    public function add(Request $request,Member $member)
{   
    
    $room=Room::findByMembers(Auth::user(),$member);
    
    if (request()->file) {
        $file_name = time() . '.' . request()->file->getClientOriginalName();
        request()->file->storeAs('public', $file_name);
    }
    
    $chat=new Chat;
    $chat->member_id = Auth::user()->id;
    $chat->room_id = $room->id;
    $chat->body = $request->body;
    if (request()->file) {
        $chat->file = asset('/storage/'.$file_name);
    }
    
    $chat->save();
    
    return redirect()->back();
}

    public function delete(Member $member){
        $room = Room::where([
            ['member1_id', '=', Auth::user()->id],
            ['member2_id', '=', $member->id]
            ])
            ->orWhere([
            ['member1_id', '=', $member->id],
            ['member2_id', '=', Auth::user()->id]
            ])
            ->first();

            $chats = Chat::where('room_id','=',$room->id)
            ->get();

            $chats->each->delete();
            

            

            $room->delete();
            
            
        return redirect()->back();
    }

}
