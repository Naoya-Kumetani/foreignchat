@extends('layouts.app')

@section('content')
<div class="chat-container row justify-content-center" id="room" data-member-id="{{$member->id}}">
    <div class="chat-area col-md-8 offset-md-2 chat">
        <div id="comment-data">
        </div>
    </div>
</div>
<div class="row">
    <div class="chat-area col-md-8 offset-md-2 chat">
        <form id="new-message" method="POST" action="{{route('chats.add',$member)}}">
            <div class="form-group fixed-bottom">
                @csrf
                <div class="comment-container justify-content-center">
                    <div class="input-group comment-area row">
                        <div class="col-md-8 offset-md-2">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="validatedCustomFile" name="file">
                                <label class="custom-file-label" for="validatedCustomFile" id="label">Choose file...</label>
                            </div>
                        </div>
                        <div class="col-md-8 offset-md-2 row">
                            <div class="custom-file col-md-10">
                                <textarea id="form" class="form-control" id="chat" name="body" placeholder="push massage (shift + Enter)"
                                    aria-label="With textarea"
                                    onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return true};"></textarea>
                            </div>
                            <div class="custom-file col-md-2">
                                <button type="submit" id="submit" class="btn btn-outline-primary comment-btn form-control">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>





@endsection

@section('js')
    <script src="{{ asset('js/comment.js') }}"></script>
    <script src="{{ asset('js/post.js') }}"></script>
    <script src="{{ asset('js/image.js') }}"></script>
@endsection