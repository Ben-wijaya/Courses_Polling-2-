@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah User</h1>
</div>

<form method="POST" action="/dashboard/users">
    @csrf
    <div class="mb-3">
      <label for="nrp" class="form-label">NRP</label>
      <input type="text" class="form-control @error('nrp') is-invalid @enderror"
      id="nrp" name="nrp" placeholder="Contoh: 2272037" required>
      @error('nrp')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror"
      id="name" name="name" placeholder="Contoh: Budi Santoso" required>
      @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror"
      id="email" name="email" placeholder="Contoh: budi@test.com" required>
      @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="role">Role</label>
      <select name="role" class="form-select">
        <option value="Admin">Admin</option>
        <option value="Program Studi">Program Studi</option>
        <option value="Mahasiswa">Mahasiswa</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="fakultas_id">Fakultas</label>
      <select name="fakultas_id" class="form-select">
        @foreach ($fakultas as $faculty)
          <option value="{{ $faculty->id }}">{{ $faculty->kode }} - {{ $faculty->nama }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="prodi_id">Prodi</label>
      <select name="prodi_id" class="form-select">
        @foreach ($prodis as $prodi)
          <option value="{{ $prodi->id }}">{{ $prodi->kode }} - {{ $prodi->name }}</option>
        @endforeach
        <!-- <option value="72">Teknik Informatika</option>
        <option value="73">Sistem Informasi</option>
        <option value="31">Psikologi</option> -->
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection