@extends('dosen.dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Speak Page</h1>
  </div>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
{{ session('success')}}
</div>
@endif

  <div class="table-responsive ">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Materi</th>
          <th scope="col">Pengirim</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($speak as $speaks)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $speaks->file_name }}</td>
          <td>{{ $speaks->user_name }}</td>
          <td>
            <a href="/lecture-speak/{{ $speaks->file_id }}" class="badge bg-info">
              <span data-feather="eye"></span>
            </a>
          </td>
        </tr> 
        @endforeach 
      </tbody>
    </table>
  </div>
@endsection