@extends('frontend.templates.default')

@section('content')
    @foreach ($articles as $article)
        <div class="card mb-4">
          <img class="card-img-top" src="{{ $article->getImage() }}" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title">{{ $article->title }}</h2>
            <p class="card-text">{{ str_limit($article->content, 100) }}</p>
            <a href="{{ route('frontend.article.show', $article) }}" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on {{ $article->created_at }} by
            <a href="#">{{ $article->user->name }}</a>
          </div>
        </div>
    @endforeach

    {{ $articles->links() }}
@endsection
