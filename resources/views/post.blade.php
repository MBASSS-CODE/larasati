@extends('layouts.main')

@section('container')
    <h1>{{ $post->title }}</h1>
    <p>
        By <a class="text-decoration-none" href="/author/{{ $post->author->username }}">{{ $post->author->name }} </a> in 
        <a class="text-decoration-none" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
    </p>
    <p>{!! $post->body !!}</p>

    <a href="../blog">Back to blog</a>
@endsection