<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class chat extends Model
{
    protected $fillable = [
        'member_id',  'body', 'room_id'
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format("m/d H:i");
    }
    
    public function room()
{
    return $this->belongsTo(Room::class);
    
}

    public function member()
{
    return $this->belongsTo(Member::class);
    
}
    public static function getData(Member $member,$beforeId){
        $room = Room::findByMembers(Auth::user(),$member);

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
