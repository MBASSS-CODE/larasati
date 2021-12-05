@extends('layouts.main')

@section('container')
    @foreach ($posts as $post)
        <a href="post/{{ $post->slug }}"><h1>{{ $post->title }}</h1></a>
        <p>{{ $post->body }}</p>
    @endforeach
@endsection