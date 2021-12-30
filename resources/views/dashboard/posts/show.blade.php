@extends('dashboard.layouts.main')

@section('container')
    <h1>{{ $post->title }}</h1>
    <p>
      <a href="/dashboard/posts" class="badge bg-primary"><span data-feather="arrow-left"></span> back to Posts</a>
      <a href="" class="badge bg-warning"><span data-feather="edit"></span></a>
      <a href="" class="badge bg-danger"><span data-feather="trash"></span></a>
    </p>
    <p>{!! $post->body !!}</p>
@endsection