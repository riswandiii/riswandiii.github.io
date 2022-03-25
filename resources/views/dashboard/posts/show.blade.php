@extends('dashboard.layouts.main')

@section('container')

<div class="container py-3">
    <div class="row">
        <div class="col-lg-8">
            <a href="/dashboard/posts" class="btn btn-success btn-sm mb-3"><span data-feather="arrow-left"></span> Back To all My Posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning btn-sm mb-3"><span data-feather="edit"></span>Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
              @csrf 
              @method('delete')
              <button type="submit" class="btn btn-danger btn-sm mb-3" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span>Delete</button>
            </form>
            <div class="card mb-3">

                @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid mt-5">
                @else 
                <img src="https://source.unsplash.com/1200.400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid mt-5">
                @endif 

                <div class="card-body">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <p class="card-text">{!! $post->body !!}</p>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection