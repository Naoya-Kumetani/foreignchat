<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menber;

class MenberController extends Controller
{
    public function menbers(){
        $menbers=Menber::all();
        return view('menber',compact("menbers"));
    }
}
