<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{
    background:#eee;
}

.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}

.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.5rem 1.5rem;
}
    </style>

    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Detail Transaksi</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">User</li>
              <li class="breadcrumb-item">Transaksi</li>
              <li class="breadcrumb-item active">Detail Transaksi</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->

        <section class="section">
          <div class="row">
            <div class="col-lg-12">

<div class="container">
{{-- <h1 class="h3 mb-5">Pembayaran</h1> --}}
<div class="row">

<div class="col-lg-9">
<div class="accordion" id="accordionPayment">

<div class="accordion-item mb-3">
<h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
<div class="form-check w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseCC" aria-expanded="false">
<label class="form-check-label pt-1" for="payment1">
Detail Transaksi
</label>
</div>
<span>
{{-- <svg width="34" height="25" xmlns="http://www.w3.org/2000/svg">
<g fill-rule="nonzero" fill="#333840">
<path d="M29.418 2.083c1.16 0 2.101.933 2.101 2.084v16.666c0 1.15-.94 2.084-2.1 2.084H4.202A2.092 2.092 0 0 1 2.1 20.833V4.167c0-1.15.941-2.084 2.102-2.084h25.215ZM4.203 0C1.882 0 0 1.865 0 4.167v16.666C0 23.135 1.882 25 4.203 25h25.215c2.321 0 4.203-1.865 4.203-4.167V4.167C33.62 1.865 31.739 0 29.418 0H4.203Z"></path>
<path d="M4.203 7.292c0-.576.47-1.042 1.05-1.042h4.203c.58 0 1.05.466 1.05 1.042v2.083c0 .575-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.467-1.05-1.042V7.292Zm0 6.25c0-.576.47-1.042 1.05-1.042H15.76c.58 0 1.05.466 1.05 1.042 0 .575-.47 1.041-1.05 1.041H5.253c-.58 0-1.05-.466-1.05-1.041Zm0 4.166c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042H5.253c-.58 0-1.05-.466-1.05-1.042Zm6.303 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.051.466 1.051 1.041 0 .576-.47 1.042-1.05 1.042h-2.102c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.051-1.041h2.101c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Zm6.304 0c0-.575.47-1.041 1.05-1.041h2.102c.58 0 1.05.466 1.05 1.041 0 .576-.47 1.042-1.05 1.042h-2.101c-.58 0-1.05-.466-1.05-1.042Z"></path>
</g>
</svg> --}}
@if($transaksi->status == "success")
<a class="btn btn-success w-100 mt-2" href="{{route('get-invoice', encrypt($transaksi->id))}}" target="_blank">Invoice</a>
@else
<a class="btn btn-danger w-100 mt-2" disabled>Invoice</a>
@endif
</span>
</h2>
<div id="collapseCC" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment" style>
<div class="accordion-body">
<div class="mb-3">
<label class="form-label">Nomor Invoice</label>
<input type="text" class="form-control" value="{{$transaksi->invoice}}" readonly>
</div>
<div class="row">
<div class="col-lg-6">
<div class="mb-3">
<label class="form-label">Judul Course</label>
<input type="text" class="form-control" value="{{$transaksi->reservasi->course->judul}}" readonly>
</div>
</div>
<div class="col-lg-3">
<div class="mb-3">
<label class="form-label">Level Course</label>
<input type="text" class="form-control" value="{{$transaksi->reservasi->course->level->nama}}" readonly>
</div>
</div>
<div class="col-lg-3">
<div class="mb-3">
    <label class="form-label">Harga Course</label>
    <input type="text" class="form-control" value="{{Number::currency($transaksi->reservasi->course->harga, 'Rp.')}}" readonly>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="accordion-item mb-3 border">
<h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
<div class="form-check w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#collapsePP" aria-expanded="false">
{{-- <input class="form-check-input" type="radio" name="payment" id="payment2"> --}}
<label class="form-check-label pt-1" for="payment2">
Data Formulir
</label>
</div>
{{-- <span>
<svg width="103" height="25" xmlns="http://www.w3.org/2000/svg">
<g fill="none" fill-rule="evenodd">
<path d="M8.962 5.857h7.018c3.768 0 5.187 1.907 4.967 4.71-.362 4.627-3.159 7.187-6.87 7.187h-1.872c-.51 0-.852.337-.99 1.25l-.795 5.308c-.052.344-.233.543-.505.57h-4.41c-.414 0-.561-.317-.452-1.003L7.74 6.862c.105-.68.478-1.005 1.221-1.005Z" fill="#009EE3"></path>
<path d="M39.431 5.542c2.368 0 4.553 1.284 4.254 4.485-.363 3.805-2.4 5.91-5.616 5.919h-2.81c-.404 0-.6.33-.705 1.005l-.543 3.455c-.082.522-.35.779-.745.779h-2.614c-.416 0-.561-.267-.469-.863l2.158-13.846c.106-.68.362-.934.827-.934h6.263Zm-4.257 7.413h2.129c1.331-.051 2.215-.973 2.304-2.636.054-1.027-.64-1.763-1.743-1.757l-2.003.009-.687 4.384Zm15.618 7.17c.239-.217.482-.33.447-.062l-.085.642c-.043.335.089.512.4.512h2.323c.391 0 .581-.157.677-.762l1.432-8.982c.072-.451-.039-.672-.38-.672H53.05c-.23 0-.343.128-.402.48l-.095.552c-.049.288-.18.34-.304.05-.433-1.026-1.538-1.486-3.08-1.45-3.581.074-5.996 2.793-6.255 6.279-.2 2.696 1.732 4.813 4.279 4.813 1.848 0 2.674-.543 3.605-1.395l-.007-.005Zm-1.946-1.382c-1.542 0-2.616-1.23-2.393-2.738.223-1.507 1.665-2.737 3.206-2.737 1.542 0 2.616 1.23 2.394 2.737-.223 1.508-1.664 2.738-3.207 2.738Zm11.685-7.971h-2.355c-.486 0-.683.362-.53.808l2.925 8.561-2.868 4.075c-.241.34-.054.65.284.65h2.647a.81.81 0 0 0 .786-.386l8.993-12.898c.277-.397.147-.814-.308-.814H67.6c-.43 0-.602.17-.848.527l-3.75 5.435-1.676-5.447c-.098-.33-.342-.511-.793-.511h-.002Z" fill="#113984"></path>
<path d="M79.768 5.542c2.368 0 4.553 1.284 4.254 4.485-.363 3.805-2.4 5.91-5.616 5.919h-2.808c-.404 0-.6.33-.705 1.005l-.543 3.455c-.082.522-.35.779-.745.779h-2.614c-.417 0-.562-.267-.47-.863l2.162-13.85c.107-.68.362-.934.828-.934h6.257v.004Zm-4.257 7.413h2.128c1.332-.051 2.216-.973 2.305-2.636.054-1.027-.64-1.763-1.743-1.757l-2.004.009-.686 4.384Zm15.618 7.17c.239-.217.482-.33.447-.062l-.085.642c-.044.335.089.512.4.512h2.323c.391 0 .581-.157.677-.762l1.431-8.982c.073-.451-.038-.672-.38-.672h-2.55c-.23 0-.343.128-.403.48l-.094.552c-.049.288-.181.34-.304.05-.433-1.026-1.538-1.486-3.08-1.45-3.582.074-5.997 2.793-6.256 6.279-.199 2.696 1.732 4.813 4.28 4.813 1.847 0 2.673-.543 3.604-1.395l-.01-.005Zm-1.944-1.382c-1.542 0-2.616-1.23-2.393-2.738.222-1.507 1.665-2.737 3.206-2.737 1.542 0 2.616 1.23 2.393 2.737-.223 1.508-1.665 2.738-3.206 2.738Zm10.712 2.489h-2.681a.317.317 0 0 1-.328-.362l2.355-14.92a.462.462 0 0 1 .445-.363h2.682a.317.317 0 0 1 .327.362l-2.355 14.92a.462.462 0 0 1-.445.367v-.004Z" fill="#009EE3"></path>
<path d="M4.572 0h7.026c1.978 0 4.326.063 5.895 1.45 1.049.925 1.6 2.398 1.473 3.985-.432 5.364-3.64 8.37-7.944 8.37H7.558c-.59 0-.98.39-1.147 1.449l-.967 6.159c-.064.399-.236.634-.544.663H.565c-.48 0-.65-.362-.525-1.163L3.156 1.17C3.28.377 3.717 0 4.572 0Z" fill="#113984"></path>
<path d="m6.513 14.629 1.226-7.767c.107-.68.48-1.007 1.223-1.007h7.018c1.161 0 2.102.181 2.837.516-.705 4.776-3.793 7.428-7.837 7.428H7.522c-.464.002-.805.234-1.01.83Z" fill="#172C70"></path>
</g>
</svg> --}}
</span>
</h2>
<div id="collapsePP" class="accordion-collapse collapse" data-bs-parent="#accordionPayment" style>
<div class="accordion-body">
<div class="px-2 col-lg-6 mb-3">
</div>
<div class="text-center">
    <img src="{{asset($transaksi->reservasi->user->profile->foto)}}" width="100" height="100" class="rounded" >
</div>
<div class="row mb-3">
</div>
  <div class="row mb-3">
    <label for="name" class="form-label">Nama Lengkap : </label>
    <input type="text" name="nama" id="nama" class="form-control" value="{{$transaksi->reservasi->user->profile->nama_depan." ".$transaksi->reservasi->user->profile->nama_belakang}}" readonly>
</div>
<div class="row mb-3">
    <label for="name" class="form-label">Tempat / Tanggal Lahir : </label>
    <input type="text" name="nama" id="nama" class="form-control" value="{{$transaksi->reservasi->user->profile->tempat_lahir.' / '.date('d-m-Y', strtotime($transaksi->reservasi->user->profile->tanggal_lahir))}}" readonly>
</div>
<div class="row mb-3">
    <label for="name" class="form-label">Alamat : </label>
    <textarea type="text" name="nama" id="nama" class="form-control" value="{{$transaksi->reservasi->user->profile->alamat}}" readonly>{{$transaksi->reservasi->user->profile->alamat}}</textarea>
</div>
<div class="row mb-3">
    <label for="name" class="form-label">Nomor Telepon : </label>
    <input type="text" name="nama" id="nama" class="form-control" value="{{$transaksi->reservasi->user->profile->no_telp}}" readonly>
</div>
<div class="row mb-3">
    <label for="name" class="form-label">Email : </label>
    <input type="text" name="nama" id="nama" class="form-control" value="{{$transaksi->reservasi->user->profile->email}}" readonly>
</div>
<div class="row mb-3">
    <label for="name" class="form-label">Instagram : </label>
    <input type="text" name="nama" id="nama" class="form-control" value="{{$transaksi->reservasi->user->profile->instagram}}" readonly>
</div>
<div class="row mb-3">
    <label for="name" class="form-label">Nama Orang Tua : </label>
    <input type="text" name="nama" id="nama" class="form-control" value="{{$transaksi->reservasi->user->profile->nama_ortu}}" readonly>
</div>
<div class="row mb-3">
    <label for="name" class="form-label">Pekerjaan Orang Tua : </label>
    <input type="text" name="nama" id="nama" class="form-control" value="{{$transaksi->reservasi->user->profile->pekerjaan_ortu}}" readonly>
</div>
  <div class="row mb-3">
    <label for="inputNanme4" class="form-label">Alat musik yang dimiliki :</label>
    <textarea type="text" class="form-control" name="deskripsi" readonly>{{$transaksi->reservasi->user->profile->alat_musik_dimiliki}}</textarea>
  </div>
</div>
</div>
</div>
</div>
</div>


<div class="col-lg-3">
<div class="card position-sticky top-0">
<div class="p-3 bg-light bg-opacity-10">
<h6 class="card-title mb-3">Rincian Pembayaran</h6>
<div class="d-flex justify-content-between mb-1 small">
<span>Subtotal</span> <span>{{Number::currency($transaksi->reservasi->course->harga, 'Rp.')}}</span>
</div>
<div class="d-flex justify-content-between mb-1 small">
<span>Admin Fee</span> <span>RP. 4,000.00</span>
</div>
<div class="d-flex justify-content-between mb-1 small">
<span>Kupon (Kode: -)</span> <span class="text-danger">RP. 0.00</span>
</div>
<hr>
<div class="d-flex justify-content-between mb-4 small">
<span>TOTAL</span> <strong class="text-dark">{{Number::currency(($transaksi->reservasi->course->harga)+4000, 'Rp.')}}</strong>
</div>
@if($transaksi->status == 'pending')
<div class="form-check mb-1 small">
<input class="form-check-input" type="checkbox" value id="tnc">
<label class="form-check-label" for="tnc">
Saya menyetujui <a href="#">syarat dan ketentuan</a>
</label>
</div>
<button class="btn btn-primary w-100 mt-2" id="pay-button">Bayar</button>
</div>
</div>
@elseif($transaksi->status == 'success')
<button class="btn btn-success w-100 mt-2 readonly">Lunas</button>
@endif
</div>
</div>
</div>
            </div>
          </div>
        </section>
    </main>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    </script>
    <script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{$client}}" type="text/javascript"></script>
    <script type="text/javascript">
   document.getElementById('pay-button').onclick = function(){
         // SnapToken acquired from previous step
        snap.pay('{{$transaksi->snap_token}}', {
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
