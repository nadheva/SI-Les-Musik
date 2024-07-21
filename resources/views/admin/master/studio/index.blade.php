<x-app-layout>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Data Studio</h1>
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
                    <a class="btn btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#tambahAlatMusik"><i class="bi bi-plus"></i>&nbsp;&nbsp;Tambah Studio</a>
                  </div>
                  <!-- Table with stripped rows -->
                  <table class="table datatable align-items-center mb-0" id="datatable-search">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>N</b>o.</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          <b>N</b>ama
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>F</b>oto</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>J</b>enis</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>D</b>eskripsi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>A</b>ksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($studio as $a)
                      <tr>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                        </td>
                        <td class="align-middle text-center">{{$a->nama}}</td>
                        <td class="align-middle text-center"><img src="{{asset($a->foto)}}" style="max-width: 70px" class="img-fluid shadow border-radius-xl"></td>
                        <td class="align-middle text-center">Studio {{$a->alatmusik->nama}}</td>
                        <td class="align-middle text-center" style="display:block;text-overflow: ellipsis;width: 200px;overflow: hidden; white-space: nowrap;">{!! $a->deskripsi !!}</td>
                        <td class="align-middle text-center">
                            <div>
                            <form id="form-delete" action="{{route('studio.destroy', $a->id)}}" method="POST" style="display: inline">
                              @csrf
                              @method("DELETE")
                              <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete' ><i class="bi bi-trash"></i></button>
                            </form>
                            <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#editAlatMusik-{{$a->id}}"><i class="bi bi-pencil-square"></i></a>
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
        <div class="modal fade" id="tambahAlatMusik" tabindex="-1" role="dialog" aria-labelledby="tambahAlatMusikLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('studio.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title card-title" id="tambahRoleLabel">Tambah Studio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <div class="form-group">
                              <label class="col-form-label">Nama : </label>
                              <input type="text" class="form-control"  name="nama" placeholder="Masukkan Nama" value="{{old('nama')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="inputNanme4" class="col-form-label">Jenis :</label>
                                <select id="inputState" class="form-control" name="alat_musik_id">
                                    <option selected>Silahkan Pilih Jenis</option>
                                    @foreach($alatmusik as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                  </select>
                              </div>
                            <div class="form-group">
                                <label class="col-form-label">Foto : </label>
                                <input type="file" class="form-control"  name="foto" placeholder="Masukkan Foto" value="{{old('foto')}}" required>
                              </div>
                              <div class="form-group">
                                <label class="col-form-label">Foto Detail: </label>
                                <input type="file" class="form-control"  name="foto_detail[]" placeholder="Masukkan Foto Detail" value="{{old('foto_detail')}}" multiple required>
                              </div>
                            <div class="form-group">
                              <label class="col-form-label">Deskripsi : </label>
                              <textarea type="text" class="form-control quill-editor-default"  name="deskripsi" value="{{old('deskripsi')}}" placeholder="Masukkan Deskripsi" required></textarea>
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
            <!-- Modal Edit Role -->
    @foreach($studio as $i)
    <div class="modal fade" id="editAlatMusik-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="editAlatMusikLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ url('studio-update', $i->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editRoleLabel">Edit Alat Musik</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class="row g-3">
                            <div class="form-group">
                                <label class="col-form-label">Nama : </label>
                                <input type="text" class="form-control"  name="nama" placeholder="Masukkan Nama" value="{{$i->nama}}" required>
                              </div>
                              <div class="form-group">
                                <label for="inputNanme4" class="col-form-label">Jenis :</label>
                                <select id="inputState" class="form-control" name="alat_musik_id">
                                    <option selected value="{{$i->alat_musik_id}}">{{$i->alatmusik->nama}}</option>
                                    @foreach($alatmusik as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                <label class="col-form-label">Foto : </label>
                                <input type="file" class="form-control"  name="foto" placeholder="Masukkan Foto" value="{{$i->foto}}" required>
                              </div>
                              <div class="form-group">
                                <label class="col-form-label">Foto Detail: </label>
                                <input type="file" class="form-control"  name="foto_detail[]" placeholder="Masukkan Foto Detail" value="{{$i->foto_detail}}" multiple required>
                              </div>
                              <div class="form-group">
                                <label class="col-form-label">Deskripsi : </label>
                                <textarea type="text" class="form-control quill-editor-default" name="deskripsi" placeholder="Masukkan Deskripsi">{{$i->deskripsi}}</textarea>
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
