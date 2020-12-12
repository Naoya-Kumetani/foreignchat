@extends('layouts.app')

@section('content')
  <div class="container">
    <form method="POST" action="{{route('timelines.store')}}">
      @csrf
      <div class="form-group row">
        <div class="col-lg-11" style="padding:0;">
          <textarea  class="form-control" name="body" type="text"></textarea>
        </div>
        <div class="col-lg-1 timelines-btn-parent" style="text-align:right; padding:0;">
          <button class="btn btn-outline-primary timelines-btn-child" type="submit" style="height:62px;">post</button>
        </div>
      </div>
    </form>
    @foreach($timelines as $timeline)
    <div class="row">
      <div class="col-lg-12" style="padding:0;">
        <div class="card">
          <div class="card-header">
            @if($timeline->member->name !== Auth::user()->name)
              <a href="{{route('members.show',$timeline->member->id)}}">{{ $timeline->member->name }}</a>
            @else
              {{ $timeline->member->name }}
            @endif
          </div>
          <div class="card-body">
            <p class="card-text">{{ $timeline->body }}</p>
            <a class="btn btn-primary" href="{{ route('timelines.show', $timeline->id) }}">detail</a></p>
            @if(Auth::id() === $timeline->member_id)
              <form method="POST" action="{{ route('timelines.delete', $timeline->id) }}">
                @csrf
                <button type="submit" class="btn btn-danger">delete</button>
              </form>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection