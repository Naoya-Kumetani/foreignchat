<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Learning_language;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function members(){
        $members=Member::orderBy('id', 'asc')->paginate(10);
        return view('member',compact("members"));
    }

    public function show(Member $member){
        
        return view('member.show',compact("member"));
    }

    public function edit(){
        $member = Auth::user();
        foreach(range(0,2) as $i){
            if(empty($member->learning_language[$i])){
                $member->learning_language[$i] = new Learning_language;
            }
        }
        return view('member.edit', compact('member'));
    }

    public function update(Request $request){
        $member = Auth::user();
        $member->name = $request->name;
        $member->email = $request->email;
        $member->introduction = $request->introduction;
        $member->birth_year = $request->birth_year;
        $member->native_language = $request->native_language;
        foreach($request->learning_language as $i => $input_language){
            if(empty($member->learning_language[$i])){
                $member->learning_language[$i] = new Learning_language;
                $member->learning_language[$i]->member_id=$member->id;
            }
            $learning_language = $member->learning_language[$i];
            $learning_language->language = $input_language;
            if(empty($input_language)){
                $learning_language->delete();
            }else{
                $learning_language->save();
            }
        }
        
        $member->save();

        return redirect()->back()->with(['message' => 'updated']);
    }

    public function search(Request $request){
        $members=Member::where([
            ['native_language','=',"$request->native_language"]
        ])->get();
        
        $searchedMembers=[];
        foreach($members as $member){
            if($member->learning_language[0]->language === $request->learning_language||
            $member->learning_language[1]->language === $request->learning_language||
            $member->learning_language[2]->language === $request->learning_language
            ){
                array_push($searchedMembers,$member);
            }
        }
        
        return view('member.searchedMembers',compact("searchedMembers"));
    }

    public function form(){
        return view('member.form');
    }
}
