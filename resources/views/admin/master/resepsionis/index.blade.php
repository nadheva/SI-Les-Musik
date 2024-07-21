<x-app-layout>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Data Resepsionis</h1>
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
                    <a class="btn btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#tambahRole"><i class="bi bi-plus"></i>&nbsp;&nbsp;Tambah Data Resepsionis</a>
                  </div>
                  <!-- Table with stripped rows -->
                  <table class="table datatable align-items-center mb-0" id="datatable-search">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>N</b>o.</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          <b>N</b>ama
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>E</b>mail</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>N</b>o. <b>T</b>elepon</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>F</b>oto</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>D</b>eskripsi</th>
                        {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kursus</th> --}}
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>A</b>ksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($resepsionis as $r)
                      <tr>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                        </td>
                        <td class="align-middle text-center">{{$r->nama}}</td>
                        <td class="align-middle text-center">{{$r->email}}</td>
                        <td class="align-middle text-center">{{$r->no_telp}}</td>
                        <td class="align-middle text-center"><img src="{{asset($r->foto)}}" style="max-width: 70px" class="img-fluid shadow border-radius-xl"></td>
                        <td class="align-middle text-center" style="display:block;text-overflow: ellipsis;width: 200px;overflow: hidden; white-space: nowrap;">{!! $r->deskripsi !!}</td>
                        <td class="align-middle text-center">
                            <div>
                            <form id="form-delete" action="{{route('resepsionis.destroy', $r->id)}}" method="POST" style="display: inline">
                              @csrf
                              @method("DELETE")
                              <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete' ><i class="bi bi-trash"></i></button>
                            </form>
                            <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#editGuru-{{$r->id}}"><i class="bi bi-pencil-square"></i></a>
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
                        @foreach($resepsionis as $i)
                        <div class="modal fade" id="editGuru-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="editGuruLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form method="POST" action="{{ url('resepsionis-update', $i->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editRoleLabel">Edit Data Resepsionis</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row g-3">
                                                <div class="row mb-3">
                                                    <label for="inputNanme4" class="form-label">Nama :</label>
                                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="{{$i->nama}}">
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputNanme4" class="form-label">No. Telepon : </label>
                                                    <input type="number" class="form-control" name="no_telp" placeholder="Masukkan Nomor Telepon" value="{{$i->no_telp}}">
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputNanme4" class="form-label">Email : </label>
                                                    <input type="email" class="form-control" name="email" placeholder="Masukkan Email" value="{{$i->email}}">
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputNanme4" class="form-label">Foto :</label>
                                                    <input type="file" class="form-control" name="foto" placeholder="Upload Foto" value="{{$i->foto}}">
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputNanme4" class="form-label">Deskripsi :</label>
                                                    <textarea type="text" class="form-control quill-editor-default" name="deskripsi" placeholder="Masukkan Deskripsi" value="{{$i->deskripisi}}">{{$i->deskripsi}}</textarea>
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

            <!-- Modal Tambah Role -->
        <div class="modal fade bd-example-modal-xl" id="tambahRole" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('resepsionis.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title card-title" id="tambahRoleLabel">Tambah Data Resepsionis</h5>
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
                                    <h5 class="card-title">Data Resepsionis</h5>

                                    <!-- Horizontal Form -->
                                      <div class="row mb-3">
                                        <label for="inputNanme4" class="form-label">Nama :</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                                      </div>
                                      <div class="row mb-3">
                                        <label for="inputNanme4" class="form-label">No. Telepon : </label>
                                        <input type="number" class="form-control" name="no_telp" placeholder="Masukkan Nomor Telepon">
                                      </div>
                                      <div class="row mb-3">
                                        <label for="inputNanme4" class="form-label">Email :</label>
                                        <input type="text" class="form-control" name="email" placeholder="Masukkan Email">
                                      </div>
                                      <div class="row mb-3">
                                        <label for="inputNanme4" class="form-label">Foto :</label>
                                        <input type="file" class="form-control" name="foto" placeholder="Upload Foto">
                                      </div>
                                      <div class="row mb-3">
                                        <label for="inputNanme4" class="form-label">Deskripsi :</label>
                                        <textarea type="text" class="form-control quill-editor-default" name="deskripsi" placeholder="Masukkan Deskripsi"></textarea>
                                      </div>
                                    {{-- </div> --}}
                                    <!-- End Horizontal Form -->

                                  </div>
                                </div>

                              </div>

                              <div class="col-lg-6">

                                <div class="card">
                                  <div class="card-body">
                                    <h5 class="card-title">Data Akun</h5>

                                    <!-- Vertical Form -->
                                    <div class="row g-3">
                                        <div class="row mb-3">
                                            <label for="inputNanme4" class="form-label">Email :</label>
                                            <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
                                          </div>
                                          <div class="row mb-3">
                                            <label for="inputNanme4" class="form-label">Password :</label>
                                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                                          </div>
                                        <div class="text-center">
                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                          <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                      </form><!-- End No Labels Form -->
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
