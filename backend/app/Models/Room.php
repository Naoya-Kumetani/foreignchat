<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chat;
use App\Models\Member;

class Room extends Model
{
    protected $fillable = ['member1_id', 'member2_id'];

    public function chat(){
        return $this->hasMany(Chat::class);
    }

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public static function findByMembers(Member $member1,Member $member2){
        if($member1->id > $member2->id){
            $member1_id = $member1->id;
            $member2_id = $member2->id;
        }else{
            $member1_id = $member2->id;
            $member2_id = $member1->id;
        }

        return Room::firstOrCreate([
                'member1_id' => $member1_id,
                'member2_id' => $member2_id
            ]);
        
    }
}
