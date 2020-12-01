<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Menber;

class Timeline extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['body']; 

    public function menber(){
    return $this->belongsTo(Menber::class);
}

public function replies(){
    return $this->hasMany(Reply::class);
}
}
