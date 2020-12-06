<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Learning_language;
use Illuminate\Support\Facades\Auth;
use App\Models\Timeline;
use App\Models\Reply;

class TimelinesController extends Controller
{
    public function timelines(){
        $timelines = Timeline::with(['member'])->orderBy('created_at', 'desc')->get();
        return view('timeline.timelines', compact('timelines'));
    }

    public function create(){
        return view('timeline.create');
    }

    public function store(Request $request)
    {
    $timeline = new Timeline;
    $timeline->fill($request->all());
    $timeline->member()->associate(Auth::user()); 
    $timeline->save();

    return redirect()->to('/timelines'); // '/' へリダイレクト
    }

    public function delete(Timeline $timeline){
        $timeline->delete();

        return redirect()->to('/timelines');
    }

    public function show(Timeline $timeline){
    $timeline->load('replies.member');
    $member= Member::where('id','=' ,$timeline->member_id)->get();
    return view('timeline.show', compact('timeline','member'));
    }

    public function reply(Request $request, Timeline $timeline)
    {
    $reply = new Reply;
    $reply->fill($request->all());
    $reply->member()->associate(Auth::user());
    $reply->timeline()->associate($timeline);
    $reply->save();

    return redirect()->back();
}
}
