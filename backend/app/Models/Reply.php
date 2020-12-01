<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Timeline;
use App\Models\Menber;

class Reply extends Model
{
    protected $fillable = ['body'];

    public function menber()
    {
        return $this->belongsTo(Menber::class);
    }

    public function timeline()
    {
        return $this->belongsTo(Timeline::class);
    }
}