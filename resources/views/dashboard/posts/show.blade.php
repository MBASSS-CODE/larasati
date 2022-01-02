@extends('dashboard.layouts.main')

@section('container')
    <h1>{{ $post->title }}</h1>
    <p>
      <a href="/dashboard/posts" class="badge bg-primary"><span data-feather="arrow-left"></span> back to Posts</a>
      <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"> Edit</span></a>
      <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure ?')"><span data-feather="trash">Delete</span></button>
      </form>
    </p>
    @if ($post->image)
    <div stye="max-height: 360px; overfolw:hidden">
      <img class="img-fluid mt-3" src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}">    
    </div>
    @else
      <img class="img-fluid mt-3" src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}">
    @endif
    <p>{!! $post->body !!}</p>
@endsection