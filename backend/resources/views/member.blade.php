@extends('layouts.app')

@section('content')
<form method="GET" action="{{route('members.search')}}">
    @csrf
    <div class="form-group row">
        <div class="col-md-8 offset-md-2">
            <div class="form-group row">
                <div class="col-md-5">
                        <label for="native_language" class="col-form-label">Native Language</label>
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
                <div class="col-md-5">
                        <label for="learning_language" class="col-form-label">Is learning</label>
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
                <div class="col-md-2 button-parent">
                    <button type="submit" class="btn btn-primary  button-child">search</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-md-8 offset-md-2 members">
        <div class="row">
            <div class="col-md-2">
                Members
            </div>
            <div class="col-md-2">
                Native Language
            </div>
            <div class="col-md-2">
                BirthYear
            </div>
            <div class="col-md-3">
                Is learning
            </div>
            <div class="col-md-3">

            </div>
        </div>
    <hr>
        @foreach($members as $member)
            @if(Auth::user()->id !== $member->id)
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{route('members.show',$member)}}">{{$member->name}}</a>
                    </div>
                    <div class="col-md-2">
                        {{$member->native_language}}
                    </div>
                    <div class="col-md-2">
                        {{$member->birth_year}}
                    </div>
                    <div class="col-md-3">
                        @foreach($member->learning_language as $lang)
                            @if($lang->language !== 'empty')
                                {{$lang->language}}
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-3">
                        <a href="{{route('chats.room',$member)}}">Let's chat with {{$member->name}}</a>
                    </div>
                </div>
                <hr>
            @endif
        @endforeach
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-md-2">
    {{ $members->links('') }}
    </div>
</div>

@endsection 