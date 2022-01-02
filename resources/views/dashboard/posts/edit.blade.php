@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 My border-bottom">
  <h1 class="h2">Edit Post</h1>
</div>
<div class="col-lg-8">
  <form action="/dashboard/posts/{{ $post->slug }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" autofocus>
      @error('title')
          <div class="is-invaid">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
      @error('slug')
          {{ $message }}
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
        @foreach ($categories as $category)  
          @if (old('category_id', $post->category_id) == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
          @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endif
        @endforeach
      </select>
      @error('category_id')
          {{ $message }}
      @enderror
    </div>
    <div class="mb-3">
      <label for="body" class="form-label">Body</label>
      <input type="hidden" id="body" name="body" value="{{ old('body', $post->body) }}">
      <trix-editor input="body"></trix-editor>
      @error('body')
          {{ $message }}
      @enderror
    </div>


    <button type="submit" class="btn btn-primary">Update Post</button>
  </form>
</div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/dashboard/posts/createSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });

  
  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  });
</script>

@endsection