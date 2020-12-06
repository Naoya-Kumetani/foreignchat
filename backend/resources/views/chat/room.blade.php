@extends('layouts.app')

@section('content')
<div class="chat-container row justify-content-center" id="room" data-member-id="{{$member->id}}">
    <div class="chat-area">
        <div class="card">
            <div class="card-header">Comment</div>
            <div class="card-body chat-card">
                <div id="comment-data">
                
                </div>
            </div>
        </div>
    </div>
</div>


<form id="new-message" method="POST" action="{{route('chats.add',$member)}}">
    @csrf
    <div class="comment-container row justify-content-center">
        <div class="input-group comment-area">
            <textarea id="form" class="form-control" id="chat" name="body" placeholder="push massage (shift + Enter)"
                aria-label="With textarea"
                onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
                <input type="file" name="file" id="file"> 
             <button type="submit" id="submit" class="btn btn-outline-primary comment-btn">Submit</button>
        </div>
    </div>
</form>


@endsection

@section('js')
    <script src="{{ asset('js/comment.js') }}"></script>
    <script src="{{ asset('js/post.js') }}"></script>
@endsection