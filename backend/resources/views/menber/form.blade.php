@extends('layouts.app')

@section('content')
<form id="ajax-button">
  <label for="myName">Send me your name:</label>
  <input id="myName" name="name" value="John">
  <input type="submit" value="Send Me!">
</form>
@endsection

@section('js')
    <script src="{{ asset('js/form.js') }}"></script>
@endsection



