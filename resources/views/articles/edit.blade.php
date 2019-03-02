@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form class="" action="{{ route('article.update', $article) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title') ?? $article->title }}">
                                @if ($errors->has('title'))
                                    <div class="form-control-feedback">{{ $errors->first('title') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" value="{{ old('image') }}">
                                @if ($errors->has('image'))
                                    <div class="form-control-feedback">{{ $errors->first('image') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Konten</label>
                                <textarea name="content" id="" cols="30" rows="5" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}">{{ old('content') ?? $article->content }}</textarea>
                                @if ($errors->has('content'))
                                    <div class="form-control-feedback">{{ $errors->first('content') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="tile-footer">
                        <input type="submit" value="Perbarui" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
