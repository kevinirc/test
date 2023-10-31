@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">User Page</h1>
  </div>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
{{ session('success')}}
</div>
@endif

  <a href="user/create" class="btn bg-success text-white">
   Create User
  </a>
  <div class="table-responsive ">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Username</th>
          <th scope="col">Role</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user as $users)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $users->name }}</td>
          <td>{{ $users->email }}</td>
          <td>{{ $users->username }}</td>
          <td>{{ $users->role }}</td>
          <td>
            <a href="/user/{{ $users->id }}/edit" class="badge bg-warning">
              <span data-feather="edit"></span>
            </a>
            <form  action="/user/{{ $users->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="trash-2"></span></button>
          </form>
          </td>
        </tr> 
        @endforeach 
      </tbody>
    </table>
  </div>
@endsection