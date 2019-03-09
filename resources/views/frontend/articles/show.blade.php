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

    <div class="card mb-4">
      <div class="card-body">
        <h2 class="card-title">Komentar</h2>
        <div class="">
            @foreach ($comments as $comment)
                <ul>
                    <li>
                        <p>{{ $comment->user->name }}</p>
                        <p>
                            {{ $comment->message }} |
                            {{-- @if ($comment->user_id === auth()->id()) --}}
                                <a href="{!! route('frontend.article.comment.edit', [$comment->article_id, $comment]) !!}">Edit</a>
                            {{-- @endif --}}
                        </p>
                        <p><span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span></p>
                    </li>
                </ul>
            @endforeach
        </div>
        @auth ()
            <form class="" action="{{ route('frontend.article.comment', $article) }}" method="post">
                @csrf
                <div class="form-group">
                    <textarea name="message" id="" cols="30" rows="4" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <input type="submit" value="Komentar" class="btn btn-primary">
                </div>
            </form>
        @endauth
        @guest
            <div class="">
                <h5><a href="{{ route('login') }}">Login</a> dulu untuk komentar</h5>
            </div>
        @endguest
      </div>
    </div>
@endsection
