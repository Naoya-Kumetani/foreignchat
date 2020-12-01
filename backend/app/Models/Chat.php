<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class chat extends Model
{
    protected $fillable = [
        'menber_id',  'body', 'room_id'
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];
    
    public function room()
{
    return $this->belongsTo(Room::class);
    
}

    public function menber()
{
    return $this->belongsTo(Menber::class);
    
}
}