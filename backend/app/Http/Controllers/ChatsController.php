<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Member;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Validator;

use function PHPUnit\Framework\isEmpty;

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
                array_push($lastMessages,Chat::where('room_id', '=', $room->id)->latest()->first());
            }elseif($room->member2_id === Auth::user()->id){
                array_push($members,Member::where('id', '=', $room->member1_id)->first());
                array_push($lastMessages,Chat::where('room_id', '=', $room->id)->latest()->first());
            }
        }
        return view('chat.rooms',compact('members','lastMessages'));
    }

    public function room(Member $member)
    {   
        $room = Room::findByMembers(Auth::user(),$member);


        $limit = 35;
        $messages = Chat::where('room_id', '=', $room->id)
        ->with('member')
        ->orderBy('created_at', 'desc')
        ->take($limit)
        ->get();
        $messages = $messages->sortBy('created_at');
        
        return view('chat.room', compact('member','room','messages'));
    }
    

    public function fetch(Member $member,Request $request) {
        $chats = Chat::getData($member,$request->beforeId);
        return response()->json(['chats' => $chats], 200);
    }

    public function add(Request $request,Member $member)
{   
    $room=Room::findByMembers(Auth::user(),$member);
    
    $chat=new Chat;
    $chat->member_id = Auth::user()->id;
    $chat->room_id = $room->id;
    $chat->body = $request->body;
   
    $chat->save();
    return redirect()->back();
}

public static function getNewMessages(Member $member,Request $request)
    {
    if($request->latestId){
        $room = Room::findByMembers(Auth::user(),$member);
        $newMessages = Chat::where('room_id', '=', $room->id)
        ->where('id', '>',$request->latestId)
        ->with('member')
        ->get();
    }

    if($request->newId){
        $room = Room::findByMembers(Auth::user(),$member);
        $newMessages = Chat::where('room_id', '=', $room->id)
        ->latest()
        ->with('member')
        ->first();
    }
        
        $json = ["newMessages" => $newMessages];
        return response()->json($json);
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
