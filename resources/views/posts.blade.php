@extends('layouts.main')

@section('container')

<div class="container mt-3">
    <h1 class="text-center">{{ $title }}</h1>
</div>

<div class="container py-3">
    <div class="row">
        <div class="col-8 offset-2">
            <form action="">

                @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if(request('user'))
                <input type="hidden" name="user" value="{{ request('user') }}">
                @endif

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Serach</button>
            </div>
            </form>
        </div>
    </div>
</div>


@if($posts->count() > 0)

<div class="container">
    <div class="row tex-center">
        <div class="col-lg-12 text-center">
            <div class="card mb-3">
               
                @if($posts[0]->image)  
                <div style="max-height: 350px; overflow:hidden">
                <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top" alt="{{ $posts[0]->category->name }}" width="1000">
                </div> 
                @else 
                <div style="max-height: 350px; overflow:hidden">
                <img src="https://source.unsplash.com/500x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
                </div>
                @endif

                <div class="card-body">
                  <h5 class="card-title">{{ $posts[0]->title }}</h5>
                  <p class="card-text"><small class="text-muted">By <a href="/posts?user={{ $posts[0]->user->id }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> In <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForhumans() }} </small></p>
                  <p class="card-text">{{ $posts[0]->excerpt }}</p>
                </div>
                <div class="py-3">
                    <a href="/posts/{{ $posts[0]->slug }}"><button class="btn btn-primary btn-sm">Red More</button></a>
                </div>
              </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        @foreach($posts->skip(1) as $post)
        <div class="col-lg-4 col-md-6 py-3">
            <div class="card">

                @if($post->image)   
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}">
                @else 
                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                @endif

                <div class="card-body">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <small class="text-muted">
                      <p>By <a href="/posts?user={{ $post->user->id }}" class="text-decoration-none">{{ $post->user->name }}</a> {{ $post->created_at->diffForHumans() }} </p>
                  </small>
                  <p class="card-text">{{ $post->excerpt }}</p>
                  <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Red More</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>

    
@else
   <div class="container">
       <div class="row">
           <div class="col-lg-12 text-center">
            <h1 class="text-center text-danger">No Post Found</h1>
           </div>
       </div>
   </div>
@endif <br><br><br>




<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end py-3">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>

@endsection