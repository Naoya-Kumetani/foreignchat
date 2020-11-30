@extends('layouts.app')

@section('content')
<div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class="card">
            <div class="card-header">Comment</div>
            <div class="card-body chat-card">
                <div id="comment-data">
                @foreach ($chats as $item)
                    {{$item->body}}/{{$item->menber->name}}/{{$item->created_at}}<br>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<form method="POST" action="{{route('chats.add',$menber)}}">
    @csrf
    <div class="comment-container row justify-content-center">
        <div class="input-group comment-area">
            <textarea class="form-control" id="chat" name="body" placeholder="push massage (shift + Enter)"
                aria-label="With textarea"
                onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
            <button type="submit" id="submit" class="btn btn-outline-primary comment-btn">Submit</button>
        </div>
    </div>
</form>

@endsection

<!-- @section('js')
    <script src="{{ asset('js/comment.js') }}"></script>
@endsection -->