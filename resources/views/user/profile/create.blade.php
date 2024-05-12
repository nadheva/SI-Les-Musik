<x-app-layout>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Profile</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->

      <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Data Profile User</h5>

                <!-- General Form Elements -->
                <form method="POST" action="{{ route('profile.store')}}" enctype="multipart/form-data">
                    @csrf

                  <div class="row mb-3">
                    <label for="nama_depan" class="col-md-4 col-lg-3 col-form-label">Nama Depan : </label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nama_depan" type="text" class="form-control" id="nama_depan" placeholder="Silahkan diisi" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="nama_belakang" class="col-md-4 col-lg-3 col-form-label">Nama Belakang : </label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" placeholder="Silahkan diisi" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="tempat_lahir" class="col-md-4 col-lg-3 col-form-label">Tempat Lahir : </label>
                    <div class="col-md-8 col-lg-9">
                      <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir" placeholder="Silahkan diisi" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="tanggal_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir : </label>
                    <div class="col-md-8 col-lg-9">
                      <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir" placeholder="Silahkan diisi" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat : </label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="alamat" class="form-control quill-editor-default" id="alamat" style="height: 100px" placeholder="Silahkan diisi" required></textarea>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="no_telp" class="col-md-4 col-lg-3 col-form-label">Nomor Telepon</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="no_telp" type="number" class="form-control" id="no_telp" placeholder="Silahkan diisi" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email : </label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="email" value="{{Auth::user()->email}}" readonly>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="instagram" class="col-md-4 col-lg-3 col-form-label">Instagram : </label>
                    <div class="col-md-8 col-lg-9">
                      <input name="instagram" type="text" class="form-control" id="instagram" placeholder="(Opsional)">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="nama_ortu" class="col-md-4 col-lg-3 col-form-label">Nama Orang Tua : </label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nama_ortu" type="text" class="form-control" id="nama_ortu" placeholder="Silahkan diisi" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="pekerjaan_ortu" class="col-md-4 col-lg-3 col-form-label">Pekerjaan Orang Tua : </label>
                    <div class="col-md-8 col-lg-9">
                      <input name="pekerjaan_ortu" type="text" class="form-control" id="pekerjaan_ortu" placeholder="Silahkan diisi" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="alat_musik_dimiliki" class="col-md-4 col-lg-3 col-form-label">Alat Musik Yang Dimiliki : </label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="alat_musik_dimiliki" class="form-control quill-editor-default" id="alat_musik_dimiliki" style="height: 100px" placeholder="(Opsional)"></textarea>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="foto" class="col-md-4 col-lg-3 col-form-label">Foto : </label>
                    <div class="col-md-8 col-lg-9">
                      <input name="foto" type="file" class="form-control" id="foto" placeholder="Silahkan diisi" required>
                    </div>
                  </div>
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>
            </div>

          </div>
        </section>
    </main><!-- End #main -->
</x-app-layout>
