@extends('layouts.main')

@section('container')
<div class="container py-3">

    <div class="row text-center py-3">
        <div class="col-8 offset-2">
            <h1>{{ $title }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-8 offset-2">
            <form action="/registrasi" method="post">

                @csrf 

                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" name="name" value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Name" name="username" value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Name" name="email" value="{{ old('email') }}">
                    <label for="email">Email</label>
                    @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password" name="password">
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <button class="w-100 btn btn-lg btn-primary" type="submit" name="registrasi">Registrasi</button>

                  <small class="d-block py-4 text-center">Already have an account? <a href="/login">Login!</a></small>
        
            </form>
        </div>
    </div>
</div>

@endsection