@extends('layouts.app')

@section('content')
  <div class="container">
    @foreach($timelines as $timeline)
      <div class="card">
        <div class="card-header">{{ $timeline->member->name }}</div>
        <div class="card-body">
          <p class="card-text">{{ $timeline->body }}</p>
          <p class="card-text"><a href="{{ route('timelines.show', $timeline->id) }}">detail</a></p>
          @if(Auth::id() === $timeline->member_id)
            <form method="POST" action="{{ route('timelines.delete', $timeline->id) }}">
              @csrf
              <button type="submit" class="btn btn-danger">delete</button>
            </form>
          @endif
        </div>
      </div>
    @endforeach
  </div>
@endsection