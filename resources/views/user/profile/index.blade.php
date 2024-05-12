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
    <section class="section profile">
        <div class="row">
          <div class="col-xl-4">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="{{asset($profile->foto)}}" alt="Profile" class="rounded-circle">
                <h2>{{$profile->nama_depan.' '.$profile->nama_belakang}}</h2>
                <h3>Pelajar</h3>
                {{-- <div class="social-links mt-2">
                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div> --}}
              </div>
            </div>

          </div>

          <div class="col-xl-8">

            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Informasi</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Pengaturan</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ganti Password</button>
                  </li>

                </ul>
                <div class="tab-content pt-2">

                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">Tentang Saya</h5>
                    <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                    <h5 class="card-title">Detail Profile</h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                      <div class="col-lg-9 col-md-8">{{$profile->nama_depan.' '.$profile->nama_belakang}}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Tempat / Tanggal Lahir</div>
                      <div class="col-lg-9 col-md-8">{{$profile->tempat_lahir.' / '.date('d-m-Y', strtotime($profile->tanggal_lahir))}}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Alamat</div>
                      <div class="col-lg-9 col-md-8">{{$profile->alamat}}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Nomor Telepon</div>
                      <div class="col-lg-9 col-md-8">{{$profile->no_telp}}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8">{{$profile->email}}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Instagram</div>
                      <div class="col-lg-9 col-md-8">{{$profile->instagram}}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Nama Orang Tua</div>
                      <div class="col-lg-9 col-md-8">{{$profile->nama_ortu}}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Pekerjaan Orang Tua</div>
                        <div class="col-lg-9 col-md-8">{{$profile->pekerjaan_ortu}}</div>
                      </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Alat Musik Yang Dimiliki</div>
                      <div class="col-lg-9 col-md-8">{{$profile->alat_musik_dimiliki}}</div>
                    </div>

                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form -->
                    <form method="POST" action="{{ route('profile.update', $profile->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                      {{-- <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                          <img src="assets/img/profile-img.jpg" alt="Profile">
                          <div class="pt-2">
                            <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                            <input type="file" name="exmaple" id="inpFile" onchange="$('.image-preview__image')[0].src = window.URL.createObjectURL(this.files[0])"  required>
                            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                          </div>
                        </div>
                      </div> --}}

                      <div class="row mb-3">
                        <label for="nama_depan" class="col-md-4 col-lg-3 col-form-label">Nama Depan</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="nama_depan" type="text" class="form-control" id="nama_depan" value="{{$profile->nama_depan}}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="nama_belakang" class="col-md-4 col-lg-3 col-form-label">Nama Belakang</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" value="{{$profile->nama_belakang}}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="tempat_lahir" class="col-md-4 col-lg-3 col-form-label">Tempat Lahir</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir" value="{{$profile->tempat_lahir}}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="tanggal_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir" value="{{$profile->tanggal_lahir}}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                        <div class="col-md-8 col-lg-9">
                          <textarea name="alamat" class="form-control quill-editor-default" id="alamat" style="height: 100px">{{$profile->alamat}}</textarea>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="no_telp" class="col-md-4 col-lg-3 col-form-label">Nomor Telepon</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="no_telp" type="number" class="form-control" id="no_telp" value="{{$profile->no_telp}}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="email" type="email" class="form-control" id="email" value="{{$profile->email}}" disabled>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="instagram" class="col-md-4 col-lg-3 col-form-label">Instagram</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="instagram" type="text" class="form-control" id="instagram" value="{{$profile->instagram}}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="nama_ortu" class="col-md-4 col-lg-3 col-form-label">Nama Orang Tua</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="nama_ortu" type="text" class="form-control" id="nama_ortu" value="{{$profile->nama_ortu}}">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="pekerjaan_ortu" class="col-md-4 col-lg-3 col-form-label">Pekerjaan Orang Tua</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="pekerjaan_ortu" type="text" class="form-control" id="pekerjaan_ortu" value="{{$profile->pekerjaan_ortu}}">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="alat_musik_dimiliki" class="col-md-4 col-lg-3 col-form-label">Alat Musik Yang Dimiliki</label>
                        <div class="col-md-8 col-lg-9">
                          <textarea name="alat_musik_dimiliki" class="form-control quill-editor-default" id="alat_musik_dimiliki" style="height: 100px">{{$profile->alat_musik_dimiliki}}</textarea>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="foto" class="col-md-4 col-lg-3 col-form-label">Foto</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="foto" type="file" class="form-control" id="foto">
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                      </div>
                    </form><!-- End Profile Edit Form -->

                  </div>

                  <div class="tab-pane fade pt-3" id="profile-settings">

                    <!-- Settings Form -->
                    <form>

                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                        <div class="col-md-8 col-lg-9">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="changesMade" checked>
                            <label class="form-check-label" for="changesMade">
                              Changes made to your account
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="newProducts" checked>
                            <label class="form-check-label" for="newProducts">
                              Information on new products and services
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="proOffers">
                            <label class="form-check-label" for="proOffers">
                              Marketing and promo offers
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                            <label class="form-check-label" for="securityNotify">
                              Security alerts
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form><!-- End settings Form -->

                  </div>

                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form method="POST" action="{{url('change-password')}}" enctype="multipart/form-data">
                        @csrf
                      <div class="row mb-3">
                        <label for="old_password" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="old_password" type="password" class="form-control" id="old_password">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="new_password" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="new_password" type="password" class="form-control" id="new_password">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="new_password" class="col-md-4 col-lg-3 col-form-label">Ketik Ulang Password Baru</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="new_password" type="password" class="form-control" id="new_password">
                          </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                      </div>
                    </form><!-- End Change Password Form -->

                  </div>

                </div><!-- End Bordered Tabs -->

              </div>
            </div>

          </div>
        </div>
      </section>
    </main>
</x-app-layout>
