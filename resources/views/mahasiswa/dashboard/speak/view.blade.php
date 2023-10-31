@extends('mahasiswa.dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $speak->name }}</h1>
</div>
<a href="/student-speak" class="badge bg-warning">
  <span data-feather="arrow-left"></span>
</a>
<br>
<br>
<audio controls>
  <source src="{{ asset('storage/'. $speak->file) }}" type="audio/mpeg">
</audio>
@endsection