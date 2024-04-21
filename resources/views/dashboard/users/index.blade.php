@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Users</h1>
</div>

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

<div class="table-responsive">
    <a href="/dashboard/users/create" class="btn btn-primary mb-3">Tambah User</a>
    <table class="table table-responsive table-bordered">
      <thead class="table-dark">
        <tr>
          <th scope="col" class="text-center w-1">No</th>
          <th scope="col">NRP</th>
          <th scope="col">Nama</th>
          <th scope="col">Role</th>
          <th scope="col">Fakultas</th>
          <th scope="col">Program Studi</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td class="text-center">{{ $loop->iteration }}</td>
          <td>{{ $user->nrp }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->role }}</td>
          <td>{{ $user->fakultas->nama }}</td>
          <td>{{ $user->prodi->name }}</td>
          <td>
            {{-- <a href="/dashboard/users/{{ $user->id }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
            <a href="/dashboard/users/{{ $user->id }}/edit" class="badge bg-success"><span data-feather="edit"></span></a>
            <form action="/dashboard/users/{{ $user->id }}" method="POST" class="d-inline">
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