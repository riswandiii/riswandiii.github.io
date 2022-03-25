@extends('layouts.main')

@section('container')

<div class="container py-3">
    <div class="row">

        <h1 class="text-center py-3">{{ $title }}</h1>

        @foreach($categories as $category)
        <div class="col-lg-12 mb-3">
            <a href="/posts?category={{ $category->slug }}">
                <div class="card bg-dark text-white">
                    <img src="http://source.unsplash.com/1200x700?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                    <div class="card-img-overlay d-flex align-items-center p-0">
                      <h5 class="card-title text-center flex-fill p-3" style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</h5>
                    </div>
                  </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection

