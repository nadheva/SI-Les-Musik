<x-app-layout>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Data User</h1>
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
                    <a class="btn btn btn-primary" href="" data-bs-toggle="modal" data-bs-target="#tambahUser"><i class="bi bi-plus"></i>&nbsp;&nbsp;Tambah User</a>
                  </div>
                  <!-- Table with stripped rows -->
                  <table class="table datatable align-items-center mb-0" id="datatable-search">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>N</b>o.</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          <b>U</b>sername
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>E</b>mail</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>R</b>ole</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" data-type="date" data-format="YYYY/DD/MM"><b>J</b>oin</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><b>A</b>ksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $u)
                      <tr>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                        </td>
                        <td class="align-middle text-center">{{$u->name}}</td>
                        <td class="align-middle text-center">{{$u->email}}</td>
                        <td class="align-middle text-center">{{$u->role->role}}</td>
                        <td>{{date('d-m-Y', strtotime($u->created_at))}}</td>
                        <td class="align-middle text-center">
                            <div>
                            <form id="form-delete" action="{{route('user.destroy', $u->id)}}" method="POST" style="display: inline">
                              @csrf
                              @method("DELETE")
                              <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete' ><i class="bi bi-trash"></i></button>
                            </form>
                            <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#editUser-{{$u->id}}"><i class="bi bi-pencil-square"></i></a>
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


            <!-- Modal Tambah User -->
        <div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="tambahUserLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title card-title" id="tambahPerangkatLabel">Tambah User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class="row g-3">
                            <div class="form-group">
                              <label class="col-form-label">Username</label>
                              <input type="text" class="form-control"  name="name" placeholder="Masukkan username" value="{{old('name')}}" required>
                            </div>
                            <div class="form-group">
                              <label class="col-form-label">Email</label>
                              <input type="email" class="form-control"  name="email" placeholder="Masukkan email" value="{{old('email')}}" required>
                            </div>
                            <div class="form-group">
                              <label class="col-form-label">Password</label>
                              <input type="password" class="form-control" name="password" placeholder="Masukkan password" value="{{old('password')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="col-form-label">Role</label>
                                <select class="form-control" name="role_id" id="exampleFormControlSelect1" required>
                                    <option value="">Pilih Role</option @disabled(true)>
                                  @foreach ($role as $item)
                                  <option value="{{$item->id}}">{{$item->role}}</option>
                                  @endforeach
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
            <!-- Modal Edit User -->
    @foreach($user as $i)
    <div class="modal fade" id="editUser-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="editUserLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ url('user-update', $i->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahPerangkatLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class="row g-3">
                            <div class="form-group">
                              <label class="col-form-label">Username</label>
                              <input type="text" class="form-control"  name="name" placeholder="Masukkan username" value="{{$i->name}}" required>
                            </div>
                            <div class="form-group">
                              <label class="col-form-label">Email</label>
                              <input type="email" class="form-control"  name="email" placeholder="Masukkan email" value="{{$i->email}}" required>
                            </div>
                            <div class="form-group">
                              <label class="col-form-label">Password</label>
                              <input type="password" class="form-control" name="password" placeholder="Masukkan password" value="{{$i->password}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="col-form-label">Role</label>
                                <select class="form-control" name="role_id" id="exampleFormControlSelect1" required>
                                    <option value="{{$i->role_id}}">{{$i->role->role}}</option @disabled(true)>
                                  @foreach ($role as $item)
                                  <option value="{{$item->id}}">{{$item->role}}</option>
                                  @endforeach
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
