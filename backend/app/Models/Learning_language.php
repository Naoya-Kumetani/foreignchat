<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learning_language extends Model
{
    use HasFactory;

    public function member(){
        return $this->belongsTo('App\Models\member');
    }
}
