@extends('frontend.templates.default')

@section('content')
    <h5>{{ $comment->message }}</h5>

    <div class="form-horizontal">
        <form class="" action="{!! route('frontend.article.comment.update', [$comment->article_id, $comment]) !!}" method="post">
            @csrf

            <div class="form-group">
                <textarea name="message" id="" cols="30" rows="3" class="form-control">{{ $comment->message }}</textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Edit" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
