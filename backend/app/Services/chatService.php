<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\chat;
use App\Models\Room;
use App\Models\Member;

class chatService {
    public function scroll(Member $member,$beforeId)
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

        $limit = 10; // 一度に取得する件数
        $chats = Chat::where('room_id', '=', $room->id)
        ->where('id', '<',$beforeId)
        ->with('member')
        ->orderBy('created_at', 'desc')
        ->take($limit)
        ->get();
        
        if (is_null($chats)) {
            return [];
        }
        
        return $chats;
    }
}