
@if(Auth::user()->role_id == 1)
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        @if(Route::is('beranda.*'))
        <a class="nav-link" href="{{route('beranda.index')}}">
        @else
        <a class="nav-link collapsed" href="{{route('beranda.index')}}">
        @endif
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Menu</li>

      <li class="nav-item">
        @if(Route::is('reservasi.*'))
        <a class="nav-link" href="{{route('reservasi.index')}}">
        @else
        <a class="nav-link collapsed" href="{{route('reservasi.index')}}">
        @endif
          <i class="bi bi-send"></i>
          <span>Reservasi Calon Siswa</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        @if(Route::is('transaksi.*'))
        <a class="nav-link" href="{{route('transaksi.index')}}">
        @else
        <a class="nav-link collapsed" href="{{route('transaksi.index')}}">
        @endif
          <i class="bi bi-coin"></i>
          <span>Transaksi</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        @if(Route::is('course.*'))
        <a class="nav-link" href="{{route('course.index')}}">
        @else
        <a class="nav-link collapsed" href="{{route('course.index')}}">
        @endif
          <i class="bi bi-book"></i>
          <span>Course</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        @if(Route::is('jadwal.*'))
        <a class="nav-link" href="{{route('jadwal.index')}}">
        @else
        <a class="nav-link collapsed" href="{{route('jadwal.index')}}">
        @endif
          <i class="bi bi-calendar"></i>
          <span>Jadwal</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        @if(Route::is('laporan.*'))
        <a class="nav-link" href="{{route('laporan.index')}}">
        @else
        <a class="nav-link collapsed" href="{{route('laporan.index')}}">
        @endif
          <i class="bi bi-journal-text"></i>
          <span>Laporan</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#administrator-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Administrator</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="administrator-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="nav-link {{ Route::is('role.*') ? 'active' : ''}}" href="{{route('role.index')}}">
              <i class="bi bi-circle"></i><span>Role</span>
            </a>
          </li>
          <li>
            <a class="nav-link {{ Route::is('user.*') ? 'active' : ''}}" href="{{route('user.index')}}">
              <i class="bi bi-circle"></i><span>Akun</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          {{-- <li>
            <a class="nav-link {{ Route::is('guru.*') ? 'active' : ''}}" href="{{route('guru.index')}}">
              <i class="bi bi-circle"></i><span>Guru</span>
            </a>
          </li> --}}
          <li>
            <a class="nav-link {{ Route::is('alat-musik.*') ? 'active' : ''}}" href="{{route('alat-musik.index')}}">
              <i class="bi bi-circle"></i><span>Alat Musik</span>
            </a>
          </li>
          <li>
            <a class="nav-link {{ Route::is('level.*') ? 'active' : ''}}" href="{{route('level.index')}}">
              <i class="bi bi-circle"></i><span>Level</span>
            </a>
          </li>
          <li>
            <a class="nav-link {{ Route::is('periode.*') ? 'active' : ''}}" href="{{route('periode.index')}}">
              <i class="bi bi-circle"></i><span>Periode</span>
            </a>
          </li>
          {{-- <li>
            <a class="nav-link {{ Route::is('resepsionis.*') ? 'active' : ''}}" href="{{route('resepsionis.index')}}">
              <i class="bi bi-circle"></i><span>Resepsionis</span>
            </a>
          </li>
          <li>
            <a class="nav-link {{ Route::is('studio.*') ? 'active' : ''}}" href="{{route('studio.index')}}">
              <i class="bi bi-circle"></i><span>Studio</span>
            </a>
          </li> --}}
        </ul>
      </li><!-- End Tables Nav -->

    </ul>


  </aside><!-- End Sidebar-->
  @elseif(Auth::user()->role_id == 2)
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        @if(Route::is('beranda.*'))
        <a class="nav-link" href="{{route('beranda.index')}}">
        @else
        <a class="nav-link collapsed" href="{{route('beranda.index')}}">
        @endif
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Menu</li>
      <li class="nav-item">
        @if(Route::is('course.*'))
        <a class="nav-link" href="{{route('course.index')}}">
        @else
        <a class="nav-link collapsed" href="{{route('course.index')}}">
        @endif
          <i class="bi bi-book"></i>
          <span>Daftar Course</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        @if(Route::is('reservasi.*'))
        <a class="nav-link" href="{{route('reservasi.index')}}">
        @else
        <a class="nav-link collapsed" href="{{route('reservasi.index')}}">
        @endif
          <i class="bi bi-send"></i>
          <span>Reservasi Saya</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        @if(Route::is('transaksi.*'))
        <a class="nav-link" href="{{route('transaksi.index')}}">
        @else
        <a class="nav-link collapsed" href="{{route('transaksi.index')}}">
        @endif
          <i class="bi bi-coin"></i>
          <span>Riwayat Transaksi</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        @if(Route::is('jadwal.*'))
        <a class="nav-link" href="{{route('jadwal.index')}}">
        @else
        <a class="nav-link collapsed" href="{{route('jadwal.index')}}">
        @endif
          <i class="bi bi-calendar"></i>
          <span>Jadwal</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        @if(Route::is('laporan.*'))
        <a class="nav-link" href="{{route('laporan.index')}}">
        @else
        <a class="nav-link collapsed" href="{{route('laporan.index')}}">
        @endif
          <i class="bi bi-journal-text"></i>
          <span>Laporan</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-heading">Support</li>

      <li class="nav-item">
        @if(Route::is('faq.*'))
        <a class="nav-link" href="{{route('faq.index')}}">
        @else
        <a class="nav-link collapsed" href="{{route('faq.index')}}">
        @endif
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        @if(Route::is('kontak.*'))
        <a class="nav-link" href="{{route('kontak.index')}}">
        @else
        <a class="nav-link collapsed" href="{{route('kontak.index')}}">
        @endif
          <i class="bi bi-envelope"></i>
          <span>Kontak</span>
        </a>
      </li><!-- End Contact Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->
@endif
