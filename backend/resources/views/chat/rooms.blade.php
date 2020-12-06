@foreach($members as $member)
<a href="{{route('chats.room',$member)}}">{{$member->name}}</a><br>
@endforeach