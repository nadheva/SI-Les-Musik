<x-app-layout>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Data Level</h1>
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
                    <a class="btn btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#tambahLevel"><i class="bi bi-plus"></i>&nbsp;&nbsp;Tambah Level</a>
                  </div>
                  <!-- Table with stripped rows -->
                  <table class="table datatable align-items-center mb-0" id="datatable-search">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          <b>N</b>ama
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($level as $a)
                      <tr>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                        </td>
                        <td class="align-middle text-center">{{$a->nama}}</td>
                        <td class="align-middle text-center">{{$a->deskripsi}}</td>
                        <td class="align-middle text-center">
                            <div>
                            <form id="form-delete" action="{{route('level.destroy', $a->id)}}" method="POST" style="display: inline">
                              @csrf
                              @method("DELETE")
                              <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete' ><i class="bi bi-trash"></i></button>
                            </form>
                            <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#editLevel-{{$a->id}}"><i class="bi bi-pencil-square"></i></a>
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
        <div class="modal fade" id="tambahLevel" tabindex="-1" role="dialog" aria-labelledby="tambahLevelLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('level.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title card-title" id="tambahRoleLabel">Tambah Level</h5>
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
                              <label class="col-form-label">Deskripsi : </label>
                              <textarea type="text" class="form-control"  name="deskripsi" value="{{old('deskripsi')}}" placeholder="Masukkan Deskripsi" required></textarea>
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
    @foreach($level as $i)
    <div class="modal fade" id="editLevel-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="editLevelLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ url('level-update', $i->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editRoleLabel">Edit Level</h5>
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
                                <label class="col-form-label">Deskripsi : </label>
                                <textarea type="text" class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi">{{$i->deskripsi}}</textarea>
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
