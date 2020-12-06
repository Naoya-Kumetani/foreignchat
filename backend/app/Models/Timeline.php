<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Member;

class Timeline extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['body']; 

    public function member(){
    return $this->belongsTo(Member::class);
}

public function replies(){
    return $this->hasMany(Reply::class);
}
}
