@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  
    <h1 class="h2">Test</h1>
    
</div>
<div class="mb-3"><a href="/discuss" class="badge bg-warning">
  <span data-feather="arrow-left"></span>
</a></div>

<div class="row">
  <div class="row mb-3">
    @foreach ($discuss as $discusss)
    <div class="card">
      <div class="card-header">
        Made by {{ $discusss->user_name }}
      </div>
      <div class="card-body">
        <h5 class="card-title">{{ $discusss->title }}</h5>
        <p class="card-text">{{ $discusss->content }}</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-primary" type="button" href="/comment/create">Reply</a>
        </div>
      </div>
    </div>
  
    @endforeach 
  </div>
</div>

@endsection