<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menber;

class MenberController extends Controller
{
    public function menber(){
        $menbers=Menber::Auth();
        return view('menber',compact("menbers"));
    }
}
