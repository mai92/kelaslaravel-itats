@extends('frontend.templates.default')

@section('content')
    <div class="card mb-4">
      <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
      <div class="card-body">
        <h2 class="card-title">{{ $article->title }}</h2>
        <p class="card-text">{{ $article->content }}</p>
      </div>
      <div class="card-footer text-muted">
        Posted on {{ $article->created_at }} by
        <a href="#">{{ $article->user->name }}</a>
      </div>
    </div>
@endsection
