<x-app-layout>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Data Laporan</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active">Data</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row  mt-4">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex pb-0 p-3">
                            <h6 class="my-auto">Data Laporan</h6>
                            <div class="nav-wrapper position-relative ms-auto w-50">
                                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1"
                                            role="tab" aria-controls="cam1" aria-selected="true">
                                            Siswa Aktif
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam2" role="tab"
                                            aria-controls="cam2" aria-selected="false">
                                            Siswa Tidak Aktif
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body p-3 mt-2">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show position-relative active height-400 border-radius-lg"
                                    id="cam1" role="tabpanel" aria-labelledby="cam1">
                                    <div class="row mt-4">
                                        <div class="table-responsive">
                                            <table class="table datatable align-items-center mb-0" id="datatable-search">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th><b>N</b>o.</th>
                                                        <th><b>N</b>ama <b>S</b>iswa</th>
                                                        <th><b>C</b>ourse</th>
                                                        <th><b>L</b>evel</th>
                                                        <th><b>H</b>arga <b>C</b>ourse</th>
                                                        <th><b>P</b>eriode</th>
                                                        <th><b>T</b>anggal <b>J</b>oin</th>
                                                        <th><b>A</b>ksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($siswa_aktif as $i)
                                                        <tr>
                                                            <td class="text-sm font-weight-normal">{{ $loop->iteration }}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{ $i->nama_depan." ".$i->nama_belakang}}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{ $i->judul_course }}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{ $i->level }}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{ Number::currency($i->harga, 'Rp.') }}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{ $i->periode }}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{$i->tgl_join->format('d-m-Y')}}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#approveReservasi-">Detail
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show position-relative height-400 border-radius-lg"
                                    id="cam2" role="tabpanel" aria-labelledby="cam2">
                                    <div class="row mt-4">
                                        <div class="table-responsive">
                                            <table class="table datatable align-items-center mb-0" id="datatable-search1">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th><b>N</b>o.</th>
                                                        <th><b>N</b>ama <b>S</b>iswa</th>
                                                        <th><b>C</b>ourse</th>
                                                        <th><b>L</b>evel</th>
                                                        <th><b>H</b>arga <b>C</b>ourse</th>
                                                        <th><b>P</b>eriode</th>
                                                        <th><b>T</b>anggal <b>J</b>oin</th>
                                                        <th><b>A</b>ksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($siswa_tdk_aktif as $i)
                                                        <tr>
                                                            <td class="text-sm font-weight-normal">{{ $loop->iteration }}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{ $i->nama_depan." ".$i->nama_belakang}}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{ $i->judul_course }}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{ $i->level }}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{ Number::currency($i->harga, 'Rp.') }}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{ $i->periode }}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{$i->tgl_join->format('d-m-Y')}}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#approveReservasi-">Detail
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

      </main><!-- End #main -->

      @push('scripts')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

      <script type="text/javascript">
        const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
          searchable: true,
          fixedHeight: true
        });
        const dataTableSearch = new simpleDatatables.DataTable("#datatable-search1", {
          searchable: true,
          fixedHeight: true
        });

        $('.show_confirm').click(function(event) {
                var form =  $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: `Hapus Data?`,
                    text: "Jika data terhapus, data akan hilang selamanya!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    form.submit();
                  }
                });
            });

      </script>
      @endpush
</x-app-layout>
