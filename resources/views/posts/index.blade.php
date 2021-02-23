
@extends('layouts.main')

@section('content')
    <div class="container">
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
                    <td><a class="btn btn-primary" href="{{ route('posts.show', $post->id) }}">gettaglio</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection