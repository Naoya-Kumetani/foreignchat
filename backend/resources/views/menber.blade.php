search
<form method="GET" action="{{route('menbers.search')}}">
    @csrf
    <div class="form-group row">
        <label for="native_language" class="col-md-4 col-form-label text-md-right">native_language</label>
            <div class="col-md-6">
                <select id="native_language"  class="form-control" name="native_language">
                                    <option value="English">English</option>
                                    <option value="v">Chinese</option>
                                    <option value="Hindi">Hindi</option>
                                    <option value="Spanish">Spanish</option>
                                    <option value="Arabic">Arabic</option>
                                    <option value="Bengali">Bengali</option>
                                    <option value="Portuguese">Portuguese</option>
                                    <option value="Russian">Russian</option>
                                    <option value="Japanese">Japanese</option>
                                    <option value="French">French</option>
                                    <option value="German">German</option>
                                    <option value="Punjabi">Punjabi</option>
                                    <option value="Javanese">Javanese</option>
                                    <option value="Korean">Korean</option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="Vietnamese">Vietnamese</option>
                                    <option value="Telugu">Telugu</option>
                                    <option value="Marathi">Marathi</option>
                                    <option value="Urdu">Urdu</option>
                                    <option value="Italian">Italian</option>
                                    <option value="Turkish">Turkish</option>
                                    <option value="Polish">Polish</option>
                                    <option value="Gujarati">Gujarati</option>
                                    <option value="Persian">Persian</option>
                                    <option value="Thai">Thai</option>
                                    <option value="Ukrainian">Ukrainian</option>
                                    <option value="Malayalam">Malayalam</option>
                                    <option value="Kannada">Kannada</option>
                                    <option value="Azerbaijani">Azerbaijani</option>
                                    <option value="Odia">Odia</option>
                                    <option value="Burmese">Burmese</option>
                                    <option value="Others">Others</option>
                </select>     
            </div>
    </div>
    <div class="form-group row">
        <label for="learning_language" class="col-md-4 col-form-label text-md-right">learning_language</label>
            <div class="col-md-6">
                <select id="learning_language"  class="form-control" name="learning_language">
                                    <option value="English">English</option>
                                    <option value="v">Chinese</option>
                                    <option value="Hindi">Hindi</option>
                                    <option value="Spanish">Spanish</option>
                                    <option value="Arabic">Arabic</option>
                                    <option value="Bengali">Bengali</option>
                                    <option value="Portuguese">Portuguese</option>
                                    <option value="Russian">Russian</option>
                                    <option value="Japanese">Japanese</option>
                                    <option value="French">French</option>
                                    <option value="German">German</option>
                                    <option value="Punjabi">Punjabi</option>
                                    <option value="Javanese">Javanese</option>
                                    <option value="Korean">Korean</option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="Vietnamese">Vietnamese</option>
                                    <option value="Telugu">Telugu</option>
                                    <option value="Marathi">Marathi</option>
                                    <option value="Urdu">Urdu</option>
                                    <option value="Italian">Italian</option>
                                    <option value="Turkish">Turkish</option>
                                    <option value="Polish">Polish</option>
                                    <option value="Gujarati">Gujarati</option>
                                    <option value="Persian">Persian</option>
                                    <option value="Thai">Thai</option>
                                    <option value="Ukrainian">Ukrainian</option>
                                    <option value="Malayalam">Malayalam</option>
                                    <option value="Kannada">Kannada</option>
                                    <option value="Azerbaijani">Azerbaijani</option>
                                    <option value="Odia">Odia</option>
                                    <option value="Burmese">Burmese</option>
                                    <option value="Others">Others</option>
                </select>     
            </div>
    </div>
    <button type="submit">search</button>
</form>

@foreach($menbers as $menber)
@if(Auth::user()->id!==$menber->id)
<a href="{{route('menbers.show',$menber)}}">{{$menber->name}}</a>/{{$menber->introduction}}/{{$menber->birth_year}}/{{$menber->native_language}}/
@foreach($menber->learning_language as $lang)
{{$lang->language}}
@endforeach
<a href="{{route('chats.room',$menber)}}">Let's chat with {{$menber->name}}</a>
<br>
@endif
@endforeach

{{ $menbers->links('vendor.pagination.semantic-ui') }}