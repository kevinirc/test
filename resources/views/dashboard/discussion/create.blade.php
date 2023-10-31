@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Insert Title</h1>
</div>
<form  action="/discuss" method="post">
    @csrf
    <a href="/discuss" class="badge bg-warning">
        <span data-feather="arrow-left"> </span>
      </a>
     <br>
     <br>
     <div class=" col-md-3 mb-3">
        <label class="form-label"> Maker </label>
        <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
        <input type="hidden" id="maker" name="maker" value="{{ auth()->user()->id }}" readonly>
    </div>
    <div class=" col-md-3 mb-3">
        <label class="form-label"> Title </label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class=" col-md-3 mb-3">
        <label class="form-label"> Content </label>
        <input type="text" class="form-control" id="content" name="content">
    </div>
      <br>
      <button type="submit" class="btn btn-primary">Insert Title</button>
</form>
@endsection