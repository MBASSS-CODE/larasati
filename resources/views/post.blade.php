@extends('layouts.main')

@section('container')
    <h1>{{ $post->title }}</h1>
    <p>
        By <a class="text-decoration-none" href="/posts?author={{ $post->author->username }}">{{ $post->author->name }} </a> in 
        <a class="text-decoration-none" href="/posts?categories={{ $post->category->slug }}">{{ $post->category->name }}</a>
    </p>
    @if ($post->image)
    <div stye="max-height: 360px; overfolw:hidden">
      <img class="img-fluid mt-3" src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}">    
    </div>
    @else
      <img class="img-fluid mt-3" src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}">
    @endif
    <p>{!! $post->body !!}</p>

    <a href="../blog">Back to blog</a>
@endsection