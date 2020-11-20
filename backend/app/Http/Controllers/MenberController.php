<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menber;
use Illuminate\Support\Facades\Auth;

class MenberController extends Controller
{
    public function menbers(){
        $menbers=Menber::orderBy('id', 'desc')->get();
        return view('menber',compact("menbers"));
    }

    public function show(Menber $menber){
        
        return view('menber.show',compact("menber"));
    }

    public function edit(){
        $menber = Auth::user();
        return view('menber.edit', compact('menber'));
    }

    public function update(Request $request){
        $menber = Auth::menber();
        $menber->name = $request->name;
        $menber->email = $request->email;
        $menber->password = $request->password;
        $menber->introduction = $request->introduction;
        $menber->birthday = $request->birthday;
        $menber->nationality = $request->nationality;
        $learning_language = new Learning_language;
        $learning_language->language = $request->learning_language;
        $learning_language->menber_id = $menber->id;
        $learning_language->save();
        $menber->save();

        return redirect()->back()->with(['message' => 'updated']);
    }
}
