<x-app-layout>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Data Transaksi</h1>
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
                  <!-- Table with stripped rows -->
                  <table class="table datatable align-items-center mb-0" id="datatable-search">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          <b>I</b>nvoice
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Course</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grand total</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $t)
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
                  <!-- End Table with stripped rows -->

                </div>
              </div>

            </div>
          </div>
        </section>
    </main>

    @push('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{$client}}"></script>
      <script type="text/javascript">
          document.getElementById('pay-button').onclick = function(){
              // SnapToken acquired from previous step
              snap.pay('{{$t->snap_token}}', {
                  // Optional
                  onSuccess: function(result){
                      document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                  },
                  // Optional
                  onPending: function(result){
                      document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                  },
                  // Optional
                  onError: function(result){
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                  }
              });
          };

      if (document.getElementById('products-list')) {
        const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
          searchable: true,
          fixedHeight: false,
          perPage: 7
        });

        document.querySelectorAll(".export").forEach(function(el) {
          el.addEventListener("click", function(e) {
            var type = el.dataset.type;

            var data = {
              type: type,
              filename: "soft-ui-" + type,
            };

            if (type === "csv") {
              data.columnDelimiter = "|";
            }

            dataTableSearch.export(data);
          });
        });
      };
    </script>
    @endpush
</x-app-layout>
