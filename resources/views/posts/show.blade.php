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
                <tr>
                    <td>{{ $post->title}}</td>
                    <td>{{ $post->subtitle}}</td>
                    <td>{{ $post->author}}</td>
                    <td>{{ $post->publication_date}}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection