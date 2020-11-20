@foreach($menbers as $menber)
<a href="{{route('menbers.show',$menber)}}">{{$menber->name}}</a>/{{$menber->introduction}}/{{$menber->birthday}}/{{$menber->nationality}}/
@foreach($menber->learning_language as $lang)
{{$lang->language}}
@endforeach
<br>
@endforeach