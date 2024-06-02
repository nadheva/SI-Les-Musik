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
                                            Belum Dibayar
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam2" role="tab"
                                            aria-controls="cam2" aria-selected="false">
                                            Dibayar
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
                                                        <th>No</th>
                                                        <th>Invoice</th>
                                                        <th>Course</th>
                                                        <th>Status</th>
                                                        <th>Harga Course</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($transaksi->where('status', '=', 'pending', 'OR', 'status', '=', 'failed', 'OR', 'status', '=', 'failed') as $t)
                                                  <tr>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">{{$t->invoice}}</td>
                                                    <td class="align-middle text-center">{{$t->reservasi->course->judul}}</td>
                                                    @if($t->status == 'pending')
                                                    <td class="text-xs font-weight-bold">
                                                      <div class="d-flex align-items-center">
                                                        <button class="btn btn-icon-only btn-rounded btn-outline-info mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="bi bi-info-circle" aria-hidden="true"></i></button>
                                                        <span>Belum dibayar</span>
                                                      </div>
                                                    </td>
                                                    @elseif($t->status == 'success')
                                                    <td class="text-xs font-weight-bold">
                                                      <div class="d-flex align-items-center">
                                                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="bi bi-check" aria-hidden="true"></i></button>
                                                        <span>Sudah dibayar</span>
                                                      </div>
                                                    </td>
                                                    @elseif($t->status == 'failed')
                                                    <td class="text-xs font-weight-bold">
                                                      <div class="d-flex align-items-center">
                                                        <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="bi bi-times" aria-hidden="true"></i></button>
                                                        <span>Gagal</span>
                                                      </div>
                                                    </td>
                                                    @elseif($t->status == 'expired')
                                                    <td class="text-xs font-weight-bold">
                                                      <div class="d-flex align-items-center">
                                                        <button class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="bi bi-undo" aria-hidden="true"></i></button>
                                                        <span>Kadaluarsa</span>
                                                      </div>
                                                    </td>
                                                    @endif
                                                    <td class="align-middle text-center">{{Number::currency($t->grand_total, 'Rp.')}}</td>
                                                    <td class="align-middle text-center">
                                                                @if($t->status == "pending")
                                                                <button class="btn btn-info" id="pay-button">Bayar</button>
                                                                @elseif($t->status == "success")
                                                                <button class="btn btn-success" id="pay-button">Sudah Bayar</button>
                                                                @elseif($t->status == "failed")
                                                                <button class="btn btn-danger" id="pay-button">Gagal</button>
                                                                @elseif($t->status == "expired")
                                                                <button class="btn btn-warning" id="pay-button">Kadaluarsa</button>
                                                                @endif
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
                                                        <th>No</th>
                                                        <th>Invoice</th>
                                                        <th>Course</th>
                                                        <th>Status</th>
                                                        <th>Harga Course</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($transaksi->where('status', '=', 'success') as $t)
                                                  <tr>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">{{$t->invoice}}</td>
                                                    <td class="align-middle text-center">{{$t->reservasi->course->judul}}</td>
                                                    @if($t->status == 'pending')
                                                    <td class="text-xs font-weight-bold">
                                                      <div class="d-flex align-items-center">
                                                        <button class="btn btn-icon-only btn-rounded btn-outline-info mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="bi bi-info-circle" aria-hidden="true"></i></button>
                                                        <span>Belum dibayar</span>
                                                      </div>
                                                    </td>
                                                    @elseif($t->status == 'success')
                                                    <td class="text-xs font-weight-bold">
                                                      <div class="d-flex align-items-center">
                                                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="bi bi-check" aria-hidden="true"></i></button>
                                                        <span>Sudah dibayar</span>
                                                      </div>
                                                    </td>
                                                    @elseif($t->status == 'failed')
                                                    <td class="text-xs font-weight-bold">
                                                      <div class="d-flex align-items-center">
                                                        <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="bi bi-times" aria-hidden="true"></i></button>
                                                        <span>Gagal</span>
                                                      </div>
                                                    </td>
                                                    @elseif($t->status == 'expired')
                                                    <td class="text-xs font-weight-bold">
                                                      <div class="d-flex align-items-center">
                                                        <button class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="bi bi-undo" aria-hidden="true"></i></button>
                                                        <span>Kadaluarsa</span>
                                                      </div>
                                                    </td>
                                                    @endif
                                                    <td class="align-middle text-center">{{Number::currency($t->grand_total, 'Rp.')}}</td>
                                                    <td class="align-middle text-center">
                                                                @if($t->status == "pending")
                                                                <button class="btn btn-info" id="pay-button">Bayar</button>
                                                                @elseif($t->status == "success")
                                                                <button class="btn btn-success" id="pay-button">Sudah Bayar</button>
                                                                @elseif($t->status == "failed")
                                                                <button class="btn btn-danger" id="pay-button">Gagal</button>
                                                                @elseif($t->status == "expired")
                                                                <button class="btn btn-warning" id="pay-button">Kadaluarsa</button>
                                                                @endif
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
