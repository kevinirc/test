@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Video Data</h1>
</div>
<form  action="/user/{{ $user->id }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <a href="/user" class="btn bg-warning">
        <span data-feather="arrow-left"></span>
        Back
      </a>
     <br>
     <br>
     <div class=" col-md-3 mb-3">
        <label class="form-label"> Name </label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" >
    </div>
    <div class=" col-md-3 mb-3">
        <label class="form-label"> Email </label>
        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
    </div>
    <div class=" col-md-3 mb-3">
        <label class="form-label"> Username </label>
        <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
    </div>
      <div class=" col-md-3 mb-3">
        <label class="form-label">Role</label>
        <select class="form-select" id="role" name="role">
            <option selected>{{ $user->role }}</option>
            <option value="dosen">Dosen</option>
            <option value="mahasiswa">Mahasiswa</option>
          </select>
    </div>
      <button type="submit" class="btn btn-primary">Edit</button>
</form>

@endsection