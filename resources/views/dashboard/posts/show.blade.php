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
    <p>{!! $post->body !!}</p>
@endsection