@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="introduction" class="col-md-4 col-form-label text-md-right">self-introduction</label>

                            <div class="col-md-6">
                                <input id="introduction"  class="form-control" name="introduction">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">birthday</label>

                            <div class="col-md-6">
                                <input id="birthday"  class="form-control" name="birthday">
                            </div>
                        </div>

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
                            <label for="learning_language_0" class="col-md-4 col-form-label text-md-right">learning_language</label>

                            <div class="col-md-6">
                                <select id="learning_language_0"  class="form-control" name="learning_language[0]">
                                    <option value="English">English</option>
                                    <option value="Japanese">Japanese</option>
                                    <option value="Korean">Korean</option>
                                    <option value="Chinese">Chinese</option>
                                </select>     
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="learning_language_1" class="col-md-4 col-form-label text-md-right">learning_language</label>

                            <div class="col-md-6">
                                <select id="learning_language_1"  class="form-control" name="learning_language[1]">
                                    <option value="English">English</option>
                                    <option value="Japanese">Japanese</option>
                                    <option value="Korean">Korean</option>
                                    <option value="Chinese">Chinese</option>
                                </select>     
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="learning_language_2" class="col-md-4 col-form-label text-md-right">learning_language</label>

                            <div class="col-md-6">
                                <select id="learning_language_2"  class="form-control" name="learning_language[2]">
                                    <option value="English">English</option>
                                    <option value="Japanese">Japanese</option>
                                    <option value="Korean">Korean</option>
                                    <option value="Chinese">Chinese</option>
                                </select>     
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
