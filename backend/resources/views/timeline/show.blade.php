@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">{{ $timeline->menber->name }}</div>
      <div class="card-body">
        <p class="card-text">{{ $timeline->body }}</p>
      </div>
    </div>
  </div>

  <div class="container mt-4">
    @foreach($timeline->replies as $reply)
      <div class="card">
        <div class="card-header">{{ $reply->menber->name }}</div>
        <div class="card-body">
          <p class="card-text">{{ $reply->body }}</p>
        </div>
      </div>
    @endforeach

    @auth
      <div class="card">
        <div class="card-header">{{ Auth::user()->name }}</div>
          <div class="card-body">
            <form method="POST" action="{{ route('timelines.reply', $timeline->id) }}">
              @csrf
              <div class="form-group">
                <textarea name="body" class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">reply</button>
            </form>
          </div>
        </div>
      </div>
    @endauth
  </div>
  </div>
@endsection