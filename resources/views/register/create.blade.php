@extends('layouts.main')

@section('container')
  <main class="form-register">
    <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
    <form action="/register" method="post">
      @csrf
      <div class="form-floating">
        <input type="text" class="form-control rounded-top  @error('name') is-invalid @enderror" id="floatingInput" name="name" value="{{ old('name') }}" placeholder="Name">
        <label for="floatingInput">Name</label>
        @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingInput" name="username" value="{{ old('username') }}" placeholder="Username">
        <label for="floatingInput">Username</label>
        @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email" value="{{ old('email') }}" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
        @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password">
        <label for="floatingPassword">Password</label>
        @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>

      <button class="w-100 btn btn-lg btn-primary my-3" type="submit">Register</button>
    </form>
    <div class="text-center">
      <small>Already registered? <a href="/login">Login !</a></small>
    </div>
  </main>
@endsection