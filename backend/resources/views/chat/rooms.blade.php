@foreach($menbers as $menber)
<a href="{{route('chats.room',$menber)}}">{{$menber->name}}</a><br>
@endforeach