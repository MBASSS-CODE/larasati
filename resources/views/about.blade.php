@extends('layouts.main')

@section('container')
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
        <div class="col-md-4">
            <img src="assets/images/{{ $image }}" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
            <h5 class="card-title">{{ $name }}</h5>
            <p class="card-text">{{ $email }}</p>
            <p class="card-text"><small class="text-muted">Mbasss Coorporation</small></p>
            </div>
        </div>
        </div>
    </div>
@endsection