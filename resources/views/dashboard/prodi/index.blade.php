@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Program Studi</h1>
</div>

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive">
    <a href="/dashboard/prodi/create" class="btn btn-primary mb-3">Tambah Program Studi</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Kode Program Studi</th>
          <th scope="col">Program Studi</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($prodis as $prodi)
        <tr>
          <td>{{ $prodi->id }}</td>
          <td>{{ $prodi->name }}</td>
          <td>
            {{-- <a href="/dashboard/prodi/{{ $prodi->id }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
            <a href="/dashboard/prodi/{{ $prodi->id }}/edit" class="badge bg-success"><span data-feather="edit"></span></a>
            <form action="/dashboard/prodi/{{ $prodi->id }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')"><span data-feather="x-circle"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection