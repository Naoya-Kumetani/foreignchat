@extends('layouts.app')

@section('content')
<div class="chat-container row justify-content-center" id="bottom"
    style="width:100%;overflow-y:scroll;position:absolute;bottom:200px;top:56px;margin:0;padding:0;height:75vh;">
        <div class="chat-area"  class="col-md-8 offset-md-2" id="room" data-member-id="{{$member->id}}" data-chats="{{json_encode(array_values($messages->all()))}}">
            <div style="text-align:center">
                <button type="button" v-on:click="fetchChats" >past 20 messages</button>
            </div>
            <div v-for="chat in chats">
                @{{ chat.body }}
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
    <!-- <script src="{{ asset('js/comment.js') }}"></script> -->
    <script src="{{ asset('js/post.js') }}"></script>
    <script src="{{ asset('js/image.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/scroll.js') }}"></script>
@endsection