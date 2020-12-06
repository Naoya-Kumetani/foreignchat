@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                @if(Session::has('message'))
                    <div>{{ Session::get('message') }}</div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('menbers.update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$menber->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$menber->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="introduction" class="col-md-4 col-form-label text-md-right">self-introduction</label>

                            <div class="col-md-6">
                                <input id="introduction"  class="form-control" name="introduction" value="{{$menber->introduction}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birth_year" class="col-md-4 col-form-label text-md-right">Birth Year</label>
                            <div class="col-md-6">
                                <select id="birth_year"  class="form-control" name="birth_year">
                                    <?php for($i=1900;$i<=date('Y');$i++): ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php endfor ?>
                                </select>               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="native_language" class="col-md-4 col-form-label text-md-right">Native Language</label>

                            <div class="col-md-6">
                                <select id="native_language"  class="form-control" name="native_language" value="{{$menber->native_language}}">
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
                            <label for="learning_language_0" class="col-md-4 col-form-label text-md-right">learning_language</label>

                            <div class="col-md-6">
                                <select id="learning_language_0"  class="form-control" name="learning_language[0]" value="{{$menber->learning_language[0]->language}}" required>
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
                            <label for="learning_language_1" class="col-md-4 col-form-label text-md-right">learning_language</label>

                            <div class="col-md-6">
                                <select id="learning_language_1"  class="form-control" name="learning_language[1]" value="{{$menber->learning_language[1]->language}}" required>
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
                            <label for="learning_language_2" class="col-md-4 col-form-label text-md-right">learning_language</label>

                            <div class="col-md-6">
                                <select id="learning_language_2"  class="form-control" name="learning_language[2]" value="{{$menber->learning_language[2]->language}}" required>
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('change') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
