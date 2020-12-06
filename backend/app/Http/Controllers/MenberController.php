<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menber;
use App\Models\Learning_language;
use Illuminate\Support\Facades\Auth;

class MenberController extends Controller
{
    public function menbers(){
        $menbers=Menber::orderBy('id', 'asc')->paginate(10);
        return view('menber',compact("menbers"));
    }

    public function show(Menber $menber){
        
        return view('menber.show',compact("menber"));
    }

    public function edit(){
        $menber = Auth::user();
        foreach(range(0,2) as $i){
            if(empty($menber->learning_language[$i])){
                $menber->learning_language[$i] = new Learning_language;
            }
        }
        return view('menber.edit', compact('menber'));
    }

    public function update(Request $request){
        $menber = Auth::user();
        $menber->name = $request->name;
        $menber->email = $request->email;
        $menber->introduction = $request->introduction;
        $menber->birth_year = $request->birth_year;
        $menber->native_language = $request->native_language;
        foreach($request->learning_language as $i => $input_language){
            if(empty($menber->learning_language[$i])){
                $menber->learning_language[$i] = new Learning_language;
                $menber->learning_language[$i]->menber_id=$menber->id;
            }
            $learning_language = $menber->learning_language[$i];
            $learning_language->language = $input_language;
            if(empty($input_language)){
                $learning_language->delete();
            }else{
                $learning_language->save();
            }
        }
        
        $menber->save();

        return redirect()->back()->with(['message' => 'updated']);
    }

    public function search(Request $request){
        $menbers=Menber::where([
            ['native_language','=',"$request->native_language"]
        ])->get();
        
        $searchedMenbers=[];
        foreach($menbers as $menber){
            if($menber->learning_language[0]->language === $request->learning_language||
            $menber->learning_language[1]->language === $request->learning_language||
            $menber->learning_language[2]->language === $request->learning_language
            ){
                array_push($searchedMenbers,$menber);
            }
        }
        
        return view('menber.searchedMenbers',compact("searchedMenbers"));
    }

    public function form(){
        return view('menber.form');
    }
}
