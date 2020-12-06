<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\Member;
use Carbon\Carbon;


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
}
