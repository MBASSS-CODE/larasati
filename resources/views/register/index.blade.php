@extends('layouts.main')

@section('container')
  <main class="form-register">
    <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
    <form>

      <div class="form-floating">
        <input type="text" class="form-control rounded-top" id="floatingInput" placeholder="Name">
        <label for="floatingInput">Name</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="Username">
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control rounded-bottom" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary my-3" type="submit">Register</button>
    </form>
    <div class="text-center">
      <small>Already registered? <a href="/register">Login !</a></small>
    </div>
  </main>
@endsection