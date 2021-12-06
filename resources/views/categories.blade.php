@extends('layouts.main')

@section('container')

{{-- @dd($categories) --}}
    @foreach ($categories as $category)
      <a href="/categories/{{ $category->slug }}"><h1>{{ $category->name }}</h1></a>
    @endforeach
@endsection