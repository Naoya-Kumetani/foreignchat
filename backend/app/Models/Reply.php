<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Timeline;
use App\Models\Member;

class Reply extends Model
{
    protected $fillable = ['body'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function timeline()
    {
        return $this->belongsTo(Timeline::class);
    }
}