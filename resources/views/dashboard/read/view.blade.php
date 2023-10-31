@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $read->name }}</h1>
</div>
<a href="/read" class="badge bg-warning">
  <span data-feather="arrow-left"></span>
</a>
<br>
<br>
<div class="container">
  <iframe src="{{ asset('storage/'. $read->file) }}" width="1280" height="720"></iframe>
</div>

@endsection