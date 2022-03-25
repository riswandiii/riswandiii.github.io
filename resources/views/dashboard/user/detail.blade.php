@extends('dashboard.layouts.main')

@section('container')

<div class="row py-4">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title"><span data-feather="users"></span> {{ $user->username }}</h5>
              <h6 class="card-text"><i class="bi bi-envelope-fill"> </i>{{ $user->email }}</h6>
            </div>
          </div>
    </div>
</div>

@endsection