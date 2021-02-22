@dump($tags)
<form action="{{ route('posts.edit')}}" method="post">
    @csrf
    @method('POST') 
    @foreach ($tags as $tag)
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox"
                id="tag-{{ $tag->id  }}" value="{{ $tag->id  }}" name="tags[]" @if ($post->$tags->contains($tag->id)) checked @endif>
                <label class="custom-control-label" for="tag-{{ $tag->id  }}">{{ $tag->name  }}</label>
            </div>
        </div>    
    @endforeach
    <div>
        <button class="btn btn-success">SALVA</button>
    </div>
</form>