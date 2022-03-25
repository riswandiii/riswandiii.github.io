@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row py-3">
        <div class="col-12">
            <h1>{{ $title }} {{ $post->user->name }}</h1>
        </div>
    </div>
</div>

<div class="container py-3">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3">
                <div style="max-height: 350px; overflow:hidden">
                @if($post->image)   
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}">
                @else 
                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                @endif
                </div>

                <div class="card-body">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <p class="card-text"><small class="text-muted"> <a By href="/posts?user={{ $post->user->id }}" class="text-decoration-none">{{ $post->user->name }}</a> In <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a> {{ $post->created_at->diffForHumans() }} </small></p>
                  <p class="card-text">{!! $post->body !!}</p>
                </div>
                    <div class="py-3 text-center">
                        <a href="/posts"><button class="btn btn-primary btn-sm">Back To Post</button></a>
                    </div>
              </div>
        </div>
    </div>
</div>
@endsection