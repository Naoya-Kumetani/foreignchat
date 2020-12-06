@if(empty($searchedMembers))
    sorry, there are no members
@else
    @foreach($searchedMembers as $item)
    <a href="{{route('chats.room',$searchedMembers)}}">{{$item->name}}</a>
    @endforeach
@endif
