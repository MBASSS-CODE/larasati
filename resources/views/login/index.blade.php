@extends('layouts.main')

@section('container')
  <main class="form-signin">

    @if (session()->has('success'))
      <div class="alert alert-success aler-dissmissable fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if (session()->has('logginError'))
      <div class="alert alert-danger aler-dissmissable fade show" role="alert">
        {{ session('logginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <form action="/login" method="post">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
      @csrf
      <div class="form-floating">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="floatingInput" placeholder="nmbasame@example.com">
        <label for="floatingInput">Email address</label>
        @error('email')
            <div class="is-invalid">
              {{ $message }}
            </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
        @error('password')
            <div class="is-invalid">
              {{ $message }}
            </div>
        @enderror
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>

    <div class="text-center mt-3">
      <small>Not Registeres? <a href="/register">Reginster Now !</a></small>
    </div>
  </main>
@endsection