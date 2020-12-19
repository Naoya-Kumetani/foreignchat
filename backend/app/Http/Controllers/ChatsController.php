<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Member;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
// use App\http\Services\chatService;
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
        // if(Auth::user()->id > $member->id){
        //     $room=Room::where([
        //         ['member1_id', '=', Auth::user()->id],
        //         ['member2_id', '=', $member->id]
        //         ])->first();
        // }else{
        //     $room=Room::where([
        //         ['member1_id', '=', $member->id],
        //         ['member2_id', '=', Auth::user()->id]
        //         ])->first();
        // }

        $limit = 35;
        // $message=[];
        $messages = Chat::where('room_id', '=', $room->id)
        ->with('member')
        ->orderBy('created_at', 'desc')
        ->take($limit)
        ->get();

        $messages = $messages->sortBy('created_at');
        // dd($messages);

        // $sort=[];
        // foreach ($messages as $key => $value) {
        //     $sort[$key] = $value['id'];
        // }

        // array_multisort($sort, SORT_ASC, $messages);

        // $messages = $messages->sortBy('created_at');

        // dd($messages);
        // $chats = Chat::where('room_id', '=', $room->id)->get();
        // return view('chat.room', compact('chats','member','room'));
        return view('chat.room', compact('member','room','messages'));
    }
    
    // public function getNewMessage(Member $member)
    // {
    //     $room = Room::findByMembers(Auth::user(),$member);
    //     // if(Auth::user()->id > $member->id){
    //     //     $room=Room::where([
    //     //         ['member1_id', '=', Auth::user()->id],
    //     //         ['member2_id', '=', $member->id]
    //     //         ])->first();
    //     // }else{
    //     //     $room=Room::where([
    //     //         ['member1_id', '=', $member->id],
    //     //         ['member2_id', '=', Auth::user()->id]
    //     //         ])->first();
    //     // }
        
    //     $newMessage = Chat::where('room_id', '=', $room->id)
    //     ->where('id', '>',$latestId)
    //     ->with('member')
    //     ->get();

    //     $json = ["newMessage" => $newMessage];
    //     return response()->json($json);
    // }
    

    public function fetch(Member $member,Request $request) {
        $chats = Chat::getData($member,$request->beforeId);
        return response()->json(['chats' => $chats], 200);
    }

    // public function getData(Member $member,$beforeId){
    //     Room::findByMembers(Auth::user(),$member);
    //     if(Auth::user()->id > $member->id){
    //         $room=Room::where([
    //             ['member1_id', '=', Auth::user()->id],
    //             ['member2_id', '=', $member->id]
    //             ])->first();
    //     }else{
    //         $room=Room::where([
    //             ['member1_id', '=', $member->id],
    //             ['member2_id', '=', Auth::user()->id]
    //             ])->first();
    //     }

    //     $limit = 10; // 一度に取得する件数
    //     $chats = Chat::where('room_id', '=', $room->id)
    //     ->where('id', '<',$beforeId)
    //     ->with('member')
    //     ->orderBy('created_at', 'desc')
    //     ->take($limit)
    //     ->get();
        
    //     if (is_null($chats)) {
    //         return [];
    //     }
        
    //     return $chats;
    // }

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

    // $chat = Chat::getNewMessage($member,$request->latestId);
    // return response()->json(["chat" => $chat], 200);
    return redirect()->back();
}

public static function getNewMessages(Member $member,Request $request)
    {
        $room = Room::findByMembers(Auth::user(),$member);
        // if(Auth::user()->id > $member->id){
        //     $room=Room::where([
        //         ['member1_id', '=', Auth::user()->id],
        //         ['member2_id', '=', $member->id]
        //         ])->first();
        // }else{
        //     $room=Room::where([
        //         ['member1_id', '=', $member->id],
        //         ['member2_id', '=', Auth::user()->id]
        //         ])->first();
        // }
        
        $newMessages = Chat::where('room_id', '=', $room->id)
        ->where('id', '>',$request->latestId)
        ->with('member')
        ->get();
        
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
