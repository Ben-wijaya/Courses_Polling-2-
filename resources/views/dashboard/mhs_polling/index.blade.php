@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Polling Mata Kuliah</h1>
</div>

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive">
    @if (auth()->user()->polling_status == 0)
      <a href="/dashboard/mhs_polling/create" class="btn btn-primary mb-3">Pilih Mata Kuliah</a>
    @else
      <button class="btn btn-danger mb-3" disabled>Terima kasih sudah melakukan polling</button>
    @endif
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Kode Mata Kuliah</th>
          <th scope="col">Nama Mata Kuliah</th>
          <th scope="col">SKS</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($polls as $polling)
          @if ( $polling->users_id == auth()->user()->id )
            <tr>
              <td>{{ $polling->matkul->kode }}</td>
              <td>{{ $polling->matkul->nama }}</td>
              <td>{{ $polling->matkul->sks }}</td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
  </div>

@endsection