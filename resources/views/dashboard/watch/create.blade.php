@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Insert Video</h1>
</div>
<form  action="/watch" method="post" enctype="multipart/form-data">
    @csrf
    <a href="/watch" class="badge bg-warning">
        <span data-feather="arrow-left"> </span>
      </a>
     <br>
     <br>
     <div class=" col-md-3 mb-3">
        <label class="form-label"> Sender </label>
        <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
        <input type="hidden" id="sender" name="sender" value="{{ auth()->user()->id }}" readonly>
    </div>
    <div class=" col-md-3 mb-3">
        <label class="form-label"> Name </label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class=" col-md-3 mb-3">
        <label class="form-label"> Script </label>
        <input type="text" class="form-control" id="script" name="script">
    </div>
    <div class=" col-md-3 mb-3">
        <label class="form-label"> File Type </label>
        <input type="text" class="form-control" id="file_type" name="file_type" value="Video" readonly="readonly">
    </div>
      <div class="col-md-3 mb-3">
        <label class="form-label">Video File</label>
        <input class="form-control" type="file" id="file" name="file">
      </div> 
      <br>
      <button type="submit" class="btn btn-primary">Insert Video</button>
</form>

@endsection