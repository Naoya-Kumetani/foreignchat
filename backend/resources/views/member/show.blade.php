@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <div class="card">
            <div class="card-header">{{$member->name}}</div>
            <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">BirthYear : {{$member->birth_year}}</li>
                <li class="list-group-item">Native Language : {{$member->native_language}}</li>
                <li class="list-group-item">Is learning : @foreach($member->learning_language as $lang)
                                                            @if($lang->language !== 'empty')
                                                                {{$lang->language}}
                                                            @endif
                                                          @endforeach</li>
                <li class="list-group-item">Self-Introduction : {{ $member->introduction }}</li>
            </ul>
            </div>
        </div>
    </div>

    <div class="col-sm-4 offset-sm-4" style="text-align:center; margin-top:10px">
        <a  class="btn btn-primary" href="{{route('chats.room',$member)}}">Let's chat with {{$member->name}}</a>
    </div>
</div>
@endsection