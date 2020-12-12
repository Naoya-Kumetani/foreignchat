@extends('layouts.app')

@section('content')
    @if(empty($searchedMembers))
        sorry, there are no members
    @else
        <div class="row">
            <div class="col-md-8 offset-md-2 members">
                <div class="row">
                    <div class="col-md-2">
                        Members
                    </div>
                    <div class="col-md-2">
                        Native Language
                    </div>
                    <div class="col-md-1">
                        BirthYear
                    </div>
                    <div class="col-md-4">
                        Is learning
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>
            <hr>
            @foreach($searchedMembers as $member)
                @if(Auth::user()->id!==$member->id)
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="{{route('members.show',$member)}}">{{$member->name}}</a>
                                </div>
                                <div class="col-md-2">
                                    {{$member->native_language}}
                                </div>
                                <div class="col-md-1">
                                    {{$member->birth_year}}
                                </div>
                                <div class="col-md-4">
                                    @foreach($member->learning_language as $lang)
                                        @if($lang->language !== 'empty')
                                            {{$lang->language}}
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-3">
                                    <a href="{{route('chats.room',$member)}}">Let's chat with {{$member->name}}</a>
                                </div>
                            </div>
                            <hr>
                @endif
            @endforeach
    @endif

@endsection

