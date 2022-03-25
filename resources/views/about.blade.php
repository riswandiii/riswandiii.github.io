@extends('layouts.main')

@section('container')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-5">
          <h4>{{ $title }}</h4>
          <img src="https://source.unsplash.com/200x100?senja" width="150" class="img-fluid rounded-circle">
          <small>
          <p><i class="bi bi-person-circle"></i> {{ $name }}</p>
          <p><i class="bi bi-house-door"></i> {{ $alamat }}</p>
          <p><i class="bi bi-instagram"></i> {{ $ig }}</p>
          <p><i class="bi bi-facebook"></i> {{ $fb }}</p>
          <p><i class="bi bi-envelope-fill"></i> {{ $email }}</p>
        </small>
        </div>
    </div>
</div>
@endsection
