@extends('mahasiswa.dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Listen Page</h1>
  </div>

<div class="row row-cols-1 row-cols-md-5 g-5">

    @foreach ($listen as $listens)
    <div class="col"> 
      <div class="card h-100">
        <img src="listen.jpg" class="card-img-top">
        <div class="card-body">
          <h3 class="card-title">Audio {{ $loop->iteration }}</h3>
          <h5 class="card-title">{{ $listens->file_name }}</h5>
          <p class="card-text">Oleh {{ $listens->user_name }}</p>
          <a href="/student-listen/{{ $listens->file_id }}" class="btn btn-primary"><span data-feather="eye"></span></a>
        </div>
      </div>
    </div>

    @endforeach
</div>
@endsection