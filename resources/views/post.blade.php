@extends('layouts.main')

@section('container')
    <h1>{{ $post->title }}</h1>
    <p>By Indra Kurniawan in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
    <p>{!! $post->body !!}</p>

    <a href="../blog">Back to blog</a>
@endsection