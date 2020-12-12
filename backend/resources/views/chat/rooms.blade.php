@extends('layouts.app')

@section('content')
    @foreach($members as $member)
        <div class="card container">
                <div class="row card-header">
                    <div class="col-sm-4 mem-name">
                        {{$member->name}}
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-sm-3">
                        @foreach($lastMessages as $lastMessage)
                            @if($lastMessage->member_id === $member->id)
                                {{$lastMessage->body}}
                            @endif
                        @endforeach
                    </div>
                    <div class="col-sm-6 row">
                        @foreach($lastMessages as $lastMessage)
                            @if($lastMessage->member_id === $member->id)
                                <div class="col-sm-6 row">
                                    {{$lastMessage->created_at}}
                                </div>
                                <div class="col-sm-6" style="text-align:right;">
                                    <p class="maru"></p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-sm-3 rooms-form row">
                        <div class="col-sm-6" style="text-align:right;">
                            <form method="POST" action="{{ route('chats.delete', $member->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <form method="GET" action="{{ route('chats.room',$member) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">Chat</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    @endforeach
@endsection