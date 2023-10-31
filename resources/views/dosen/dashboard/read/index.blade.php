@extends('dosen.dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Read Page</h1>
  </div>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
{{ session('success')}}
</div>
@endif

  <a href="lecture-read/create" class="btn bg-success text-white">
   Insert Text
  </a>
  <div class="table-responsive ">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Materi</th>
          <th scope="col">Pengirim Materi</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($read as $reads)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $reads->file_name }}</td>
          <td>{{ $reads->user_name }}</td>
          <td>
            <a href="/lecture-read/{{ $reads->file_id }}" class="badge bg-info">
              <span data-feather="eye"></span>
            </a>
            <a href="/lecture-read/{{ $reads->file_id }}/edit" class="badge bg-warning">
              <span data-feather="edit"></span>
            </a>
            <form  action="/lecture-read/{{ $reads->file_id }}" method="post" class="d-inline">
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