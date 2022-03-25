
@extends('layouts.main')

@section('container')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="css/login.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;  
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      </style>
      

  </head>
<body class="text-center">

  @include('sweetalert::alert')
    
<div class="container py-4">
  <main class="form-signin">
<br>
    <form action="/login" method="post">
      @csrf
      <i class="bi bi-person-circle"></i>
      <h1 class="h3 mb-3 fw-normal">Please {{ $title }}</h1>
  
      <div class="form-floating">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" value="{{ old('email') }}" placeholder="name@example.com" name="email" >
        <label for="floatingInput">Email address</label>
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
        @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
  
      <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Sign in</button>
      
      <small class="d-block py-4">Don't have an account? <a href="/registrasi">Sign up here!</a></small>

    </form>
  </main>
  
</div>

<script src="js/warna.js"></script>

  </body>
</html>


@endsection