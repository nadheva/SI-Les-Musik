<x-app-layout>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Data Periode</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active">Data</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->

        <section class="section">
          <div class="row">
            <div class="col-lg-12">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Datatables</h5>
                  {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p> --}}
                  <div class="col-12 text-end">
                    <a class="btn btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#tambahPeriode"><i class="bi bi-plus"></i>&nbsp;&nbsp;Tambah Periode</a>
                  </div>
                  <!-- Table with stripped rows -->
                  <table class="table datatable align-items-center mb-0" id="datatable-search">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>N</b>o.</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>K</b>ode</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          <b>N</b>ama Periode
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>T</b>gl. <b>A</b>wal <b>P</b>endaftaran</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>T</b>gl. <b>A</b>khir <b>P</b>endaftaran</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>T</b>gl. <b>A</b>wal <b>P</b>embelajaran</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>T</b>gl. <b>A</b>khir <b>P</b>embelajaran</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>T</b>gl. <b>A</b>wal <b>U</b>jian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>T</b>gl. <b>A</b>khir <b>U</b>jian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>S</b>tatus</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>A</b>ksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($periode as $a)
                      <tr>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                        </td>
                        <td class="align-middle text-center">{{$a->kode}}</td>
                        <td class="align-middle text-center">{{$a->nama_periode}}</td>
                        <td class="align-middle text-center">{{\Carbon\Carbon::parse($a->tgl_awal_pendaftaran)->format('d-m-Y')}}</td>
                        <td class="align-middle text-center">{{\Carbon\Carbon::parse($a->tgl_akhir_pendaftaran)->format('d-m-Y')}}</td>
                        <td class="align-middle text-center">{{\Carbon\Carbon::parse($a->tgl_awal_pembelajaran)->format('d-m-Y')}}</td>
                        <td class="align-middle text-center">{{\Carbon\Carbon::parse($a->tgl_akhir_pembelajaran)->format('d-m-Y')}}</td>
                        <td class="align-middle text-center">{{\Carbon\Carbon::parse($a->tgl_awal_ujian)->format('d-m-Y')}}</td>
                        <td class="align-middle text-center">{{\Carbon\Carbon::parse($a->tgl_akhir_ujian)->format('d-m-Y')}}</td>
                        @if($a->status = 1)
                        <td class="align-middle text-center">Aktif</td>
                        @elseif($a->status = 0)
                        <td class="align-middle text-center">Tidak Aktif</td>
                        @endif
                        <td class="align-middle text-center">
                            <div>
                            <form id="form-delete" action="{{route('periode.destroy', $a->id)}}" method="POST" style="display: inline">
                              @csrf
                              @method("DELETE")
                              <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete' ><i class="bi bi-trash"></i></button>
                            </form>
                            <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#editPeriode-{{$a->id}}"><i class="bi bi-pencil-square"></i></a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->

                </div>
              </div>

            </div>
          </div>
        </section>


            <!-- Modal Tambah Role -->
        <div class="modal fade" id="tambahPeriode" tabindex="-1" role="dialog" aria-labelledby="tambahPeriodeLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title card-title" id="tambahRoleLabel">Tambah Periode</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form class="row g-3"></form>
                        <form class="row g-3" method="post" action="{{ route('periode.store') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label class="col-form-label">Kode : </label>
                            <input type="number" class="form-control"  name="kode" placeholder="Masukkan Kode (4 Digit Angka)" value="{{old('kode')}}" required>
                          </div>
                          <div class="form-group">
                              <label class="col-form-label">Nama Periode : </label>
                              <input type="text" class="form-control"  name="nama_periode" placeholder="Masukkan Nama Periode" value="{{old('nama_periode')}}" required>
                          </div>
                        <div class="col-md-6">
                            <label for="input" class="form-label">Tgl. Awal Pendaftaran</label>
                            <input type="date" class="form-control" name="tgl_awal_pendaftaran" placeholder="Masukkan Tgl. Awal Pendaftaran" value="{{old('tgl_awal_pendaftaran')}}" required>
                          </div>
                          <div class="col-md-6">
                            <label for="input" class="form-label">Tgl. Akhir Pendaftaran</label>
                            <input type="date" class="form-control" name="tgl_akhir_pendaftaran" placeholder="Masukkan Tgl. Akhir Pendaftaran" value="{{old('tgl_akhir_pendaftaran')}}" required>
                          </div>
                          <div class="col-md-6">
                            <label for="input" class="form-label">Tgl. Awal Pembelajaran</label>
                            <input type="date" class="form-control" name="tgl_awal_pembelajaran" placeholder="Masukkan Tgl. Awal Pembelajaran" value="{{old('tgl_awal_pembelajaran')}}" required>
                          </div>
                          <div class="col-md-6">
                            <label for="input" class="form-label">Tgl. Akhir Pembelajaran</label>
                            <input type="date" class="form-control" name="tgl_akhir_pembelajaran" placeholder="Masukkan Tgl. Akhir Pembelajaran" value="{{old('tgl_akhir_pembelajaran')}}" required>
                          </div>
                          <div class="col-md-6">
                            <label for="input" class="form-label">Tgl. Awal Ujian</label>
                            <input type="date" class="form-control" name="tgl_awal_ujian" placeholder="Masukkan Tgl. Awal Ujian" value="{{old('tgl_awal_ujian')}}" required>
                          </div>
                          <div class="col-md-6">
                            <label for="input" class="form-label">Tgl. Akhir Ujian</label>
                            <input type="date" class="form-control" name="tgl_akhir_ujian" placeholder="Masukkan Tgl. Akhir Ujian" value="{{old('tgl_akhir_ujian')}}" required>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn btn-warning" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn btn-success">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
            <!-- Modal Edit Role -->
    @foreach($periode as $i)
    <div class="modal fade" id="editPeriode-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="editLevelLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="editRoleLabel">Edit Periode</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3"></form>
                            <form class="row g-3" method="POST" action="{{ url('periode-update', $i->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            <div class="form-group">
                              <label class="col-form-label">Kode : </label>
                              <input type="number" class="form-control"  name="kode" placeholder="Masukkan Kode" value="{{$i->kode}}" required>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Nama Periode : </label>
                                <input type="text" class="form-control"  name="nama_periode" placeholder="Masukkan Nama Periode" value="{{$i->nama_periode}}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="input" class="form-label">Tgl. Awal Pendaftaran</label>
                                <input type="date" class="form-control" name="tgl_awal_pendaftaran" placeholder="Masukkan Tgl. Awal Pendaftaran" value="{{$i->tgl_awal_pendaftaran}}" required>
                              </div>
                              <div class="col-md-6">
                                <label for="input" class="form-label">Tgl. Akhir Pendaftaran</label>
                                <input type="date" class="form-control" name="tgl_akhir_pendaftaran" placeholder="Masukkan Tgl. Akhir Pendaftaran" value="{{$i->tgl_akhir_pendaftaran}}" required>
                              </div>
                              <div class="col-md-6">
                                <label for="input" class="form-label">Tgl. Awal Pembelajaran</label>
                                <input type="date" class="form-control" name="tgl_awal_pembelajaran" placeholder="Masukkan Tgl. Awal Pembelajaran" value="{{$i->tgl_awal_pembelajaran}}" required>
                              </div>
                              <div class="col-md-6">
                                <label for="input" class="form-label">Tgl. Akhir Pembelajaran</label>
                                <input type="date" class="form-control" name="tgl_akhir_pembelajaran" placeholder="Masukkan Tgl. Akhir Pembelajaran" value="{{$i->tgl_akhir_pembelajaran}}" required>
                              </div>
                              <div class="col-md-6">
                                <label for="input" class="form-label">Tgl. Awal Ujian</label>
                                <input type="date" class="form-control" name="tgl_awal_ujian" placeholder="Masukkan Tgl. Awal Ujian" value="{{$i->tgl_awal_ujian}}" required>
                              </div>
                              <div class="col-md-6">
                                <label for="input" class="form-label">Tgl. Akhir Ujian</label>
                                <input type="date" class="form-control" name="tgl_akhir_ujian" placeholder="Masukkan Tgl. Akhir Ujian" value="{{$i->tgl_akhir_ujian}}" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1" class="col-form-label">Status</label>
                                <select class="form-control" name="status" id="exampleFormControlSelect1" required>
                                    @if($i->status = 1)
                                    <option value="{{$i->status}}">Aktif</option @disabled(true)>
                                    @elseif($i->status = 0)
                                    <option value="{{$i->status}}">Tidak Aktif</option @disabled(true)>
                                    @endif
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                              </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn btn-warning" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

      </main><!-- End #main -->

      @push('scripts')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

      <script type="text/javascript">
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
