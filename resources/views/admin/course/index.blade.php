<x-app-layout>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Data Course</h1>
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
                    <a class="btn btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#tambahCourse"><i class="bi bi-plus"></i>&nbsp;&nbsp;Tambah Data Course</a>
                  </div>
                  <!-- Table with stripped rows -->
                  <table class="table datatable align-items-center mb-0" id="datatable-search">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          <b>J</b>udul
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Level</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Expired</th>
                        {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kursus</th> --}}
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($course as $c)
                      <tr>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                        </td>
                        <td class="align-middle text-center">{{$c->judul}}</td>
                        <td class="align-middle text-center">Guru {{$c->alat_musik->nama}}</td>
                        <td class="align-middle text-center">{{$c->level->nama}}</td>
                        <td class="align-middle text-center">{{$c->deskripsi}}</td>
                        @if($c->status == '0')
                        <td class="align-middle text-center">Tidak Aktif</td>
                        @elseif($c->status == '1')
                        <td class="align-middle text-center">Aktif</td>
                        @endif
                        <td class="align-middle text-center">{{Number::currency($c->harga, 'Rp.')}}</td>
                        <td class="align-middle text-center">{{$c->expired_date}}</td>
                        {{-- <td class="align-middle text-center">{{$g->alat_musik->nama}}</td> --}}
                        <td class="align-middle text-center">
                            <div>
                            <form id="form-delete" action="{{route('course.destroy', $c->id)}}" method="POST" style="display: inline">
                              @csrf
                              @method("DELETE")
                              <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete' ><i class="bi bi-trash"></i></button>
                            </form>
                            <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#editCourse-{{$c->id}}"><i class="bi bi-pencil-square"></i></a>
                            {{-- <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#editRole-{{$g->id}}"><i class="bi bi-eye"></i></a> --}}
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

        <!--Modal tambah course-->
        <div class="modal fade bd-example-modal-lg" id="tambahCourse" tabindex="-1" role="dialog" aria-labelledby="tambahCourse"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('course.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title card-title" id="tambahRoleLabel">Tambah Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="row mb-3">
                                <label for="inputNanme4" class="form-label">Judul :</label>
                                <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul">
                              </div>
                              <div class="row mb-3">
                                <label for="inputNanme4" class="form-label">Jenis Course :</label>
                                <select id="inputState" class="form-select" name="alat_musik_id">
                                    <option selected>Silahkan Pilih Jenis Course</option>
                                    @foreach($alatmusik as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="row mb-3">
                                <label for="inputNanme4" class="form-label">Level Course :</label>
                                <select id="inputState" class="form-select" name="level_id">
                                    <option selected>Silahkan Pilih Level Course</option>
                                    @foreach($level as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="row mb-3">
                                <label for="inputNanme4" class="form-label">Harga : </label>
                                <input type="number" class="form-control" name="harga" placeholder="Masukkan Harga">
                              </div>
                              <div class="row mb-3">
                                <label for="inputNanme4" class="form-label">Tanggal Expired :</label>
                                <input type="date" class="form-control" name="expired_date" placeholder="Masukkan Tanggal Expired">
                              </div>
                              <div class="row mb-3">
                                <label for="inputNanme4" class="form-label">Period Start :</label>
                                <input type="date" class="form-control" name="period_start" placeholder="Masukkan Period Start">
                              </div>
                              <div class="row mb-3">
                                <label for="inputNanme4" class="form-label">Period End :</label>
                                <input type="date" class="form-control" name="period_end" placeholder="Masukkan Period End">
                              </div>
                              <div class="row mb-3">
                                <label for="inputNanme4" class="form-label">Header :</label>
                                <input type="file" class="form-control" name="header" placeholder="Upload Header">
                              </div>
                              <div class="row mb-3">
                                <label for="inputNanme4" class="form-label">Modul :</label>
                                <input type="file" class="form-control" name="modul" placeholder="Upload Modul">
                              </div>
                              <div class="row mb-3">
                                <label for="inputNanme4" class="form-label">Deskripsi :</label>
                                <textarea type="text" class="form-control quill-editor-default" name="deskripsi" placeholder="Masukkan Deskripsi"></textarea>
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
