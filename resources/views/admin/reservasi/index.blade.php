<x-app-layout>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Data Reservasi</h1>
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
                            <h6 class="my-auto">Data Reservasi</h6>
                            <div class="nav-wrapper position-relative ms-auto w-50">
                                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1"
                                            role="tab" aria-controls="cam1" aria-selected="true">
                                            Belum Disetujui
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam2" role="tab"
                                            aria-controls="cam2" aria-selected="false">
                                            Disetujui
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
                                            <table class="table table-flush" id="datatable-search">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Jenis Course</th>
                                                        <th>Nama Pemesan</th>
                                                        <th>Tanggal</th>
                                                        <th>Harga Course</th>
                                                        <th>Proses</th>
                                                        <th>Catatan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($reservasi->latest()->where('proses', '=', 'Dalam Proses', 'OR', 'proses', '=', 'Ditolak' )->get() as $i)
                                                        <tr>
                                                            <td class="text-sm font-weight-normal">{{ $loop->iteration }}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">
                                                                {{ $i->course->nama }}</td>
                                                            <td class="text-sm font-weight-normal">{{ $i->user->name }}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{$i->created_at->format('d.m.Y')}}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{Number::currency($i->grand_total, 'Rp.')}}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{$i->proses}}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{$i->catatan}}
                                                            </td>
                                                            <td><a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#approveReservasi-{{$i->id}}"><i class="bi bi-eye-square"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show position-relative  height-400 border-radius-lg" id="cam2"
                                    role="tabpanel" aria-labelledby="cam2">
                                    <div class="row mt-4">
                                        {{-- <div class="table-responsive"> --}}
                                            <table class="table table-flush" id="datatable-search1">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Jenis Course</th>
                                                        <th>Nama Pemesan</th>
                                                        <th>Tanggal</th>
                                                        <th>Approver</th>
                                                        <th>Tanggal Approve</th>
                                                        <th>Harga Course</th>
                                                        <th>Catatan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                            <td class="text-sm font-weight-normal">{{ $loop->iteration }}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">
                                                                {{ $i->course->nama }}</td>
                                                            <td class="text-sm font-weight-normal">{{ $i->user->name }}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{$i->created_at->format('d.m.Y')}}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{$i->approver}}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{$i->tgl_approve->format('d.m.Y')}}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{Number::currency($i->grand_total, 'Rp.')}}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{$i->proses}}
                                                            </td>
                                                            <td class="text-sm font-weight-normal">{{$i->catatan}}
                                                            </td>
                                                            <td><a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#approveReservasi-{{$i->id}}"><i class="bi bi-eye-square"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    @foreach($reservasi as $r)
    <div class="modal fade bd-example-modal-xl" id="approveReservasi-{{$r->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title card-title" id="approveReservasi">Detail Reservasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <section class="section">
                        <div class="row">
                          <div class="col-lg-6">

                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">Data Reservasi</h5>

                                <!-- Horizontal Form -->
                                <form>
                                  <div class="row mb-3">
                                    <label for="inputNanme4" class="form-label">Nama Lengkap :</label>
                                    <input type="text" class="form-control" value="{{$profile->nama_depan.' '.$profile->nama_belakang}}" disabled>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="inputNanme4" class="form-label">Tempat / Tanggal Lahir : </label>
                                    <input type="text" class="form-control" value="{{$profile->tempat_lahir / $profile->tanggal_lahir->format('d.m.Y')}}" disabled>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="inputNanme4" class="form-label">Alamat Rumah : </label>
                                    <textarea type="text" class="form-control" disabled>{{$profile->alamat}}</textarea>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="inputNanme4" class="form-label">No. Telepon :</label>
                                    <input type="number" class="form-control" value="{{$profile->no_telp}}" disabled>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="inputNanme4" class="form-label">Email :</label>
                                    <input type="email" class="form-control" value="{{$profile->email}}" disabled>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="inputNanme4" class="form-label">Akun Instagram :</label>
                                    <input type="text" class="form-control" value="'@'.{{$profile->instagram}}" disabled>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="inputNanme4" class="form-label">Nama Orang Tua :</label>
                                    <input type="text" class="form-control" value="{{$profile->nama_ortu}}" disabled>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="inputNanme4" class="form-label">Pekerjaan Orang Tua :</label>
                                    <input type="text" class="form-control" value="{{$profile->pekerjaan_ortu}}" disabled>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="inputNanme4" class="form-label">Alat Musik Yang Dimiliki :</label>
                                    <textarea type="text" class="form-control" disabled>{{$profile->alat_musik_dimiliki}}</textarea>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn btn-warning" data-bs-dismiss="modal">Tutup</button>
                                <form method="POST" action="{{ url('reservasi-approve', $r->id) }}">
                                    @csrf
                                    @method('PUT')
                                <button type="submit" class="btn btn btn-success">Setujui</button>
                                </form>
                                <form method="POST" action="{{ url('reservasi-reject', $r->id) }}">
                                    @csrf
                                    @method('PUT')
                                <button type="submit" class="btn btn btn-danger">Tolak</button>
                                </form>
                            </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            @endforeach

      </main><!-- End #main -->

      @push('scripts')
      <script>
        // const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        //   searchable: true,
        //   fixedHeight: true
        // });


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
