@extends('layouts.main')

@section('container')
  <main class="form-signin">

    @if (session()->has('success'))
      <div class="alert alert-success aler-dissmissable fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <form>
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>

    <div class="text-center mt-3">
      <small>Not Registeres? <a href="/register">Reginster Now !</a></small>
    </div>
  </main>
@endsection