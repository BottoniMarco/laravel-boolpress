
@extends('layouts.main')

@section('content')
    <div class="container">
        <a class="btn btn-primary" href="{{ route('posts.create') }}">crea</a>

        <table class="table table-dark table-striped table-bordered">
            <thead>
                <tr>
                    <th>titolo</th>
                    <th>sottotitolo</th>
                    <th>autore</th>
                    <th>data di pub.</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)                    
                <tr>
                    <td>{{ $post->title}}</td>
                    <td>{{ $post->subtitle}}</td>
                    <td>{{ $post->author}}</td>
                    <td>{{ $post->publication_date}}</td>
                    <td><a class="btn btn-primary" href="{{ route('posts.show', $post->id) }}">dettaglio</a></td>
                    <td><a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">edit</a></td>
                    <td>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">elimina</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection