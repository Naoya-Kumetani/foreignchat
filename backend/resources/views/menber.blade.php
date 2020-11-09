@foreach($menbers as $menber)
{{$menber->name}}/{{$menber->introduction}}/{{$menber->birthday}}/{{$menber->nationality}}/{{$menber->learning_language->language}}
@endforeach