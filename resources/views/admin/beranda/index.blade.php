<x-app-layout>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Dashboard</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
          <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
              <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                  <div class="card info-card sales-card">

                    {{-- <div class="filter">
                      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                          <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                      </ul>
                    </div> --}}

                    <div class="card-body">
                      <h5 class="card-title">Transaksi Berhasil <span>| Tahun ini</span></h5>
                      {{-- <h5 class="card-title">Transaksi</h5> --}}
                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                          <h6>{{count($transaksi)}}</h6>
                          {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">kenaikan</span> --}}

                        </div>
                      </div>
                    </div>

                  </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                  <div class="card info-card revenue-card">

                    {{-- <div class="filter">
                      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                          <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                      </ul>
                    </div> --}}

                    <div class="card-body">
                      <h5 class="card-title">Penghasilan <span>| Tahun ini</span></h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="ps-3">
                          <h6>{{Number::currency(($transaksi->sum('grand_total')) , 'Rp.')}}</h6>
                          {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">kenaikan</span> --}}

                        </div>
                      </div>
                    </div>

                  </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">

                  <div class="card info-card customers-card">

                    {{-- <div class="filter">
                      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                          <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                      </ul>
                    </div> --}}

                    <div class="card-body">
                      <h5 class="card-title">Siswa Aktif</h5>

                      <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                          <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                          <h6>{{$siswa_aktif}}</h6>
                          {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">penurunan</span> --}}

                        </div>
                      </div>

                    </div>
                  </div>

                </div><!-- End Customers Card -->


                <!-- Recent Sales -->
                <div class="col-12">
                  <div class="card recent-sales overflow-auto">


                    <div class="card-body">
                      <h5 class="card-title">Data Siswa Aktif</h5>

                      <table class="table table-borderless datatable">
                        <thead>
                          <tr>
                            <th scope="col">No.</th>
                            <th>Nama</th>
                            <th scope="col">Course</th>
                            <th scope="col">Level</th>
                            <th scope="col">Periode</th>
                            <th scope="col">Aktif Sampai</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($data_siswa_aktif as $d)
                          <tr>
                            <th scope="row"><a href="#">#{{ $loop->iteration }}</a></th>
                            <td>{{ $d->nama_depan." ".$d->nama_belakang}}</td>
                            <td><a href="#" class="text-primary">{{$d->judul_course}}</a></td>
                            <td>{{$d->level}}</td>
                            <td>{{$d->nama_periode}}</td>
                            <td><span class="badge bg-warning">{{\Carbon\Carbon::parse($d->tgl_left)->format('d-m-Y') }}</span></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                    </div>

                  </div>
                </div><!-- End Recent Sales -->



              </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

              <!-- Recent Activity -->
              <div class="card">
                {{-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> --}}

                <div class="card-body">
                  <h5 class="card-title">Aktivitas <span>| Tahun ini</span></h5>

                  <div class="activity">

                    @foreach ($notification as $i)
                    <div class="activity-item d-flex">
                      <div class="activite-label">{{\Carbon\Carbon::parse($i->created_at)->diffForHumans()}}</div>
                      <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                      <div class="activity-content">
                        {{$i->message}}
                      </div>
                    </div><!-- End activity item-->
                    @endforeach
                  </div>

                </div>
              </div><!-- End Recent Activity -->

            </div><!-- End Right side columns -->

          </div>
        </section>

      </main><!-- End #main -->

</x-app-layout>
