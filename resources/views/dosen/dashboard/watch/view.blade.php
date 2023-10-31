@extends('dosen.dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $watch->name }}</h1>
</div>
<a href="/lecture-watch" class="badge bg-warning">
  <span data-feather="arrow-left"></span>
</a>
<br>
<br>
<video width="1280" height="720" controls>
  <source src="{{ asset('storage/'. $watch->file) }}">
</video>
@endsection