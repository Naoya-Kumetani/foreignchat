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
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">birthday</label>

                            <div class="col-md-6">
                                <input id="birthday"  class="form-control" name="birthday" value="{{$menber->birthday}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nationality" class="col-md-4 col-form-label text-md-right">nationality</label>

                            <div class="col-md-6">
                                <input id="nationality"  class="form-control" name="nationality" value="{{$menber->nationality}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="learning_language_0" class="col-md-4 col-form-label text-md-right">learning_language</label>

                            <div class="col-md-6">
                                <input id="learning_language_0"  class="form-control" name="learning_language[0]" value="{{$menber->learning_language[0]->language}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="learning_language_1" class="col-md-4 col-form-label text-md-right">learning_language</label>

                            <div class="col-md-6">
                                <input id="learning_language_1"  class="form-control" name="learning_language[1]" value="{{$menber->learning_language[1]->language}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="learning_language_2" class="col-md-4 col-form-label text-md-right">learning_language</label>

                            <div class="col-md-6">
                                <input id="learning_language_2"  class="form-control" name="learning_language[2]" value="{{$menber->learning_language[2]->language}}">
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
