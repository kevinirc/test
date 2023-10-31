@extends('mahasiswa.dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Video Data</h1>
</div>
<form  action="/student-speak/{{ $speak->id }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <a href="/student-speak" class="btn bg-warning">
        <span data-feather="arrow-left"></span>
        Back
      </a>
     <br>
     <br>
    <div class=" col-md-3 mb-3">
        <label class="form-label"> Name </label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $speak->name }}">
    </div>
    <div class=" col-md-3 mb-3">
        <label class="form-label"> Script </label>
        <input type="text" class="form-control" id="script" name="script" value="{{ $speak->script }}">
    </div>
    <div class=" col-md-3 mb-3">
        <label class="form-label"> File Type </label>
        <input type="text" class="form-control" id="file_type" name="file_type" value="record" readonly="readonly">
    </div>
      <div class=" col-md-3 mb-3">
        <label class="form-label">Video File</label>
        <input class="form-control" type="file" id="file" name="file" value="{{ $speak->file }}">
      </div> 
      <br>
      <button type="submit" class="btn btn-primary">Edit</button>
</form>

@endsection