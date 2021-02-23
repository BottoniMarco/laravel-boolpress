@extends('layouts.main')

@section('content')
    @dump($tags)
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('posts.update', $post->id)}}" method="post">
        @csrf
        @method('PUT')
        @foreach ($tags as $tag)
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox"
                    id="tag-{{ $tag->id  }}" value="{{ $tag->id  }}" name="tags[]" {{ ($post->tags->contains($tag->id)) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="tag-{{ $tag->id  }}">{{ $tag->name  }}</label>
                </div>
            </div>
        @endforeach




<!-- c$post->title -->
        <div class="form-group">
            <div class="form-group">
                <label for="title"></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="subtitle"></label>
                <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="subtitle" value="{{ $post->subtitle }}">
            </div>
            <div class="form-group">
                <label for="author"></label>
                <input type="text" class="form-control" id="author"  name="author" placeholder="author" value="{{ $post->author }}">
            </div>
            {{-- <div class="form-group">
                <label for="publication_date"></label>
                <input type="text" class="form-control" id="publication_date" name="publication_date" placeholder="publication_date" value="{{ old('2021-02-22 16:54:28') }}">
            </div>
 --}}

            <h2>Images</h2>
            @foreach ($images as $image)
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox"
                    id="image-{{ $image->id  }}" value="{{ $image->id  }}" name="images[]" {{ ($post->images->contains($image->id)) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="image-{{ $image->id  }}">{{ $image->alt  }}</label>
                    <img src="{{ $image->link  }}" alt="{{ $image->alt  }}" style="width: 40px">
                </div>
            </div>
            @endforeach


            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="{{ route('posts.index') }}">home</a>

    </form>


@endsection
