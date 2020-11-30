<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chat;

class Room extends Model
{
    protected $fillable = ['menber1_id', 'menber2_id'];

    public function chat(){
        return $this->hasMany(Chat::class);
    }

    public function menber(){
        return $this->belongsTo(Menber::class);
    }

    public static function findByMembers(Menber $member1,Menber $member2){
        if($member1->id > $member2->id){
            $menber1_id = $member1->id;
            $menber2_id = $member2->id;
        }else{
            $menber1_id = $member2->id;
            $menber2_id = $member1->id;
        }

        return Room::firstOrCreate([
                'menber1_id' => $menber1_id,
                'menber2_id' => $menber2_id
            ]);
        
    }
}
