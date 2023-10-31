@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create User</h1>
</div>
<form  action="/user" method="post" enctype="multipart/form-data">
    @csrf
    <a href="/user" class="badge bg-warning">
        <span data-feather="arrow-left"> </span>
      </a>
     <br>
     <br>
    <div class=" col-md-3 mb-3">
        <label class="form-label"> Name </label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class=" col-md-3 mb-3">
        <label class="form-label"> Email </label>
        <input type="text" class="form-control" id="email" name="email">
    </div>
    <div class=" col-md-3 mb-3">
        <label class="form-label"> Username </label>
        <input type="text" class="form-control" id="username" name="username">
    </div>
      <div class="col-md-3 mb-3">
        <label class="form-label">Password</label>
        <input type="text" class="form-control" id="password" name="password">
      </div> 
      <div class=" col-md-3 mb-3">
        <label class="form-label">Role</label>
        <select class="form-select" id="role" name="role">
            <option selected>Choose Role</option>
            <option value="dosen">Dosen</option>
            <option value="mahasiswa">Mahasiswa</option>
          </select>
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Insert User</button>
</form>

@endsection