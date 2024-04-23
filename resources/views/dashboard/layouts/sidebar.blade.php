<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      @if(Auth::user()->role == 'Admin')
      <p class="text-center" aria-current="page"><b>Admin Menu</b></p>
      @endif
      @if(Auth::user()->role == 'Program Studi')
      <p class="text-center" aria-current="page"><b>Program Studi Menu</b></p>
      @endif
      @if(Auth::user()->role == 'Mahasiswa')
      <p class="text-center" aria-current="page"><b>Mahasiswa Menu</b></p>
      @endif
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        @if(Auth::user()->role == 'Admin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
            <span data-feather="users"></span>
            Users
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/fakultas*') ? 'active' : '' }}" href="/dashboard/fakultas">
            <span data-feather="briefcase"></span>
            Fakultas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/prodi*') ? 'active' : '' }}" href="/dashboard/prodi">
            <span data-feather="file"></span>
            Program Studi
          </a>
        </li>
        @endif
        @if(Auth::user()->role == 'Program Studi')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/matkul*') ? 'active' : '' }}" href="/dashboard/matkul">
            <span data-feather="book-open"></span>
            Mata Kuliah
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/prodi_mahasiswa*') ? 'active' : '' }}" href="/dashboard/prodi_mahasiswa">
            <span data-feather="users"></span>
            Mahasiswa
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/prodi_polling*') ? 'active' : '' }}" href="/dashboard/prodi_polling">
            <span data-feather="file-text"></span>
            Polling
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/prodi_hasil*') ? 'active' : '' }}" href="/dashboard/prodi_hasil">
            <span data-feather="file-text"></span>
            Hasil Polling
          </a>
        </li> -->
        @endif
        @if(Auth::user()->role == 'Mahasiswa')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/mhs_polling*') ? 'active' : '' }}" href="/dashboard/mhs_polling">
            <span data-feather="folder-plus"></span>
            Polling Matkul
          </a>
        </li>
        @endif
      </ul>
    </div>
  </nav>