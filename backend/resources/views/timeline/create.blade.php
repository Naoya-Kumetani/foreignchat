@extends('layouts.app')

@section('content')
  <form method="POST" action="{{route('timelines.store')}}">
    @csrf
    <input name="body" type="text" value="" />
    <button type="submit">post</button>
  </form>
@endsection