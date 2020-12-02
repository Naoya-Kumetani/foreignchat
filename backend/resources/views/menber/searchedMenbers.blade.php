@if(empty($searchedMenbers))
    sorry, there are no members
@else
    @foreach($searchedMenbers as $item)
    <a href="{{route('chats.room',$searchedMenbers)}}">{{$item->name}}</a>
    @endforeach
@endif
