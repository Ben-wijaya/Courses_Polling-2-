@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Fakultas</h1>
</div>

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive">
    <a href="/dashboard/fakultas/create" class="btn btn-primary mb-3">Tambah Fakultas</a>
    <table class="table table-responsive table-bordered">
      <thead class="table-dark">
        <tr>
          <th scope="col" class="text-center">No</th>
          <th scope="col">Kode Fakultas</th>
          <th scope="col">Nama Fakultas</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($fakultas as $faculty)
        <tr>
          <td class="text-center">{{ $loop->iteration }}</td>
          <td>{{ $faculty->kode }}</td>
          <td>{{ $faculty->nama }}</td>
          <td>
            {{-- <a href="/dashboard/fakultas/{{ $faculty->id }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
            <a href="/dashboard/fakultas/{{ $faculty->id }}/edit" class="badge bg-success"><span data-feather="edit"></span></a>
            <form action="/dashboard/fakultas/{{ $faculty->id }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Apakah Anda yakin ingin menghapus Fakultas ini?')"><span data-feather="x-circle"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection