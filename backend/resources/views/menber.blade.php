
@foreach($menbers as $menber)
@if(Auth::user()->id!==$menber->id)
<a href="{{route('menbers.show',$menber)}}">{{$menber->name}}</a>/{{$menber->introduction}}/{{$menber->birthday}}/{{$menber->nationality}}/
@foreach($menber->learning_language as $lang)
{{$lang->language}}
@endforeach
<a href="{{route('chats.room',$menber)}}">Let's chat with {{$menber->name}}</a>
<br>
@endif
@endforeach
