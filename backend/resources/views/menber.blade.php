search
<form method="GET" action="{{route('menbers.search')}}">
    @csrf
    <div class="form-group row">
        <label for="nationality" class="col-md-4 col-form-label text-md-right">nationality</label>
            <div class="col-md-6">
                <select id="nationality"  class="form-control" name="nationality">
                    <option value="United Satates">United Satates</option>
                    <option value="Japan">Japan</option>
                    <option value="Korea">Korea</option>
                    <option value="China">China</option>
                </select>     
            </div>
    </div>
    <div class="form-group row">
        <label for="learning_language" class="col-md-4 col-form-label text-md-right">learning_language</label>
            <div class="col-md-6">
                <select id="learning_language"  class="form-control" name="learning_language">
                    <option value="English">English</option>
                    <option value="Japanese">Japanese</option>
                    <option value="Korean">Korean</option>
                    <option value="Chinese">Chinese</option>
                </select>     
            </div>
    </div>
    <button type="submit">search</button>
</form>

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
