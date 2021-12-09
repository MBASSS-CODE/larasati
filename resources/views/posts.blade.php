@extends('layouts.main')

@section('container')
	<h1 class="mb-5 text-center">{{ $title }}</h1>

	<div class="card mb-3 text-center">
		<img src="http://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
		<div class="card-body">
			<h5 class="card-title">{{ $posts[0]->title }}</h5>
			<p>
				<small>
					By <a class="text-decoration-none" href="/author/{{ $posts[0]->author->username }}">{{ $posts[0]->author->name }} </a> in 
					<a class="text-decoration-none" href="/categories/{{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
					<span class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</span>
				</small>
			</p>
			<p class="card-text">{{ $posts[0]->excerpt }}</p>
			
			<a class="btn btn-primary" href="/post/{{ $posts[0]->slug }}">Read More...</a>
		</div>
	</div>

	<div class="row">
		@foreach ($posts->skip(1) as $post)
			<div class="col-md-3 mb-3">
				<div class="card border-0">
					<div class="position-absolute px-3 py-2" style="background-color: rgba(0,0, 0, 0.7)">
						<a class="text-decoration-none text-white" href="/categories/{{ $post->category->slug }}">
							{{ $post->category->name }}
						</a>
					</div>
					<img src="http://source.unsplash.com/400x300?{{ $post->category->name }}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><a href="/post/{{ $post->slug }}" class="text-decoration-none">
							{{ $post->title }}
						</a></h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More..</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection