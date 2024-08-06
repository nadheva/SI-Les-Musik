<x-app-layout>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Course</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item">Course</li>
              <li class="breadcrumb-item active">Course Detail</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
    <section>
        <div class="container-fluid py-4">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-3"></div>
                    <h5 class="mb-4"></h5>
                    <div class="row">
                      <div class="col-xl-5 col-lg-6 text-center">
                        <img class="w-100 border-radius-lg shadow-lg mx-auto" src="{{asset($course->alat_musik->foto)}}" alt="chair">
                        {{-- <div class="my-gallery d-flex mt-4 pt-2" itemscope itemtype="http://schema.org/ImageGallery">
                          <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                            <a href="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/chair-pink.jpg" itemprop="contentUrl" data-size="500x600">
                              <img class="w-75 min-height-100 max-height-100 border-radius-lg shadow" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/chair-pink.jpg" alt="Image description" />
                            </a>
                          </figure>
                          <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                            <a href="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/black-chair.jpg" itemprop="contentUrl" data-size="500x600">
                              <img class="w-75 min-height-100 max-height-100 border-radius-lg shadow" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/black-chair.jpg" itemprop="thumbnail" alt="Image description" />
                            </a>
                          </figure>
                          <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                            <a href="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/chair-steel.jpg" itemprop="contentUrl" data-size="500x600">
                              <img class="w-75 min-height-100 max-height-100 border-radius-lg shadow" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/chair-steel.jpg" itemprop="thumbnail" alt="Image description" />
                            </a>
                          </figure>
                          <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                            <a href="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/chair-wood.jpg" itemprop="contentUrl" data-size="500x600">
                              <img class="w-75 min-height-100 max-height-100 border-radius-lg shadow" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/chair-wood.jpg" itemprop="thumbnail" alt="Image description" />
                            </a>
                          </figure>
                        </div> --}}
                        <!-- Root element of PhotoSwipe. Must have class pswp. -->
                        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                          <!-- Background of PhotoSwipe.
      It's a separate element, as animating opacity is faster than rgba(). -->
                          <div class="pswp__bg"></div>
                          <!-- Slides wrapper with overflow:hidden. -->
                          <div class="pswp__scroll-wrap">
                            <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                            <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                            <div class="pswp__container">
                              <div class="pswp__item"></div>
                              <div class="pswp__item"></div>
                              <div class="pswp__item"></div>
                            </div>
                            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                            <div class="pswp__ui pswp__ui--hidden">
                              <div class="pswp__top-bar">
                                <!--  Controls are self-explanatory. Order can be changed. -->
                                <div class="pswp__counter"></div>

                                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                                <!-- element will get class pswp__preloader--active when preloader is running -->
                                <div class="pswp__preloader">
                                  <div class="pswp__preloader__icn">
                                    <div class="pswp__preloader__cut">
                                      <div class="pswp__preloader__donut"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                <div class="pswp__share-tooltip"></div>
                              </div>
                              <div class="pswp__caption">
                                <div class="pswp__caption__center"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-5 mx-auto">
                        <h3 class="mt-lg-0 mt-4">{{$course->judul}}</h3>
                        <div class="rating">
                          <i class="fas fa-star" aria-hidden="true"></i>
                          <i class="fas fa-star" aria-hidden="true"></i>
                          <i class="fas fa-star" aria-hidden="true"></i>
                          <i class="fas fa-star" aria-hidden="true"></i>
                          <i class="fas fa-star-half-alt" aria-hidden="true"></i>
                        </div>
                        <br>
                        <h6 class="mb-0 mt-3">Harga</h6>
                        <h5>{{Number::currency($course->harga, 'Rp.')}} /Semester</h5>
                        <span class="badge bg-success">{{$course->level->nama}}</span>
                        <br>
                        <label class="mt-4">Deskripsi :</label>
                        <ul>
                          <li>{{$course->alat_musik->deskripsi}}</li>
                          <li>{{$course->deskripsi}}</li>
                        </ul>
                        {{-- <div class="row mt-4">
                          <div class="col-lg-5 mt-lg-0 mt-2">
                            <label>Frame Material</label>
                            <select class="form-control" name="choices-material" id="choices-material">
                              <option value="Choice 1" selected="">Wood</option>
                              <option value="Choice 2">Steel</option>
                              <option value="Choice 3">Aluminium</option>
                              <option value="Choice 4">Carbon</option>
                            </select>
                          </div>
                          <div class="col-lg-5 mt-lg-0 mt-2">
                            <label>Color</label>
                            <select class="form-control" name="choices-colors" id="choices-colors">
                              <option value="Choice 1" selected="">White</option>
                              <option value="Choice 2">Gray</option>
                              <option value="Choice 3">Black</option>
                              <option value="Choice 4">Blue</option>
                              <option value="Choice 5">Red</option>
                              <option value="Choice 6">Pink</option>
                            </select>
                          </div>
                          <div class="col-lg-2">
                            <label>Quantity</label>
                            <select class="form-control" name="choices-quantity" id="choices-quantity">
                              <option value="Choice 1" selected="">1</option>
                              <option value="Choice 2">2</option>
                              <option value="Choice 3">3</option>
                              <option value="Choice 4">4</option>
                              <option value="Choice 5">5</option>
                              <option value="Choice 6">6</option>
                              <option value="Choice 7">7</option>
                              <option value="Choice 8">8</option>
                              <option value="Choice 9">9</option>
                              <option value="Choice 10">10</option>
                            </select>
                          </div>
                        </div> --}}
                        <div class="row mt-8">
                          <div class="col-lg-10">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formulirPendaftaran">Daftar Kelas
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>

            <!-- Modal Tambah Role -->
            <div class="modal fade bd-example-modal-xl" id="formulirPendaftaran" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form method="post" action="{{ route('reservasi.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title card-title" id="tambahRoleLabel">Formulir Pendaftaran Siswa</h5>
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
                                        <h5 class="card-title">Data Siswa</h5>

                                        <!-- Horizontal Form -->
                                        <div class="text-center">
                                            <img src="{{asset($profile->foto)}}" width="100" height="100" class="rounded" >
                                        </div>
                                        <div class="row mb-3"></div>
                                          <div class="row mb-3">
                                            <label for="name" class="form-label">Nama Lengkap : </label>
                                            <input type="text" name="nama" id="nama" class="form-control" value="{{$profile->nama_depan." ".$profile->nama_belakang}}" readonly>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="form-label">Tempat / Tanggal Lahir : </label>
                                            <input type="text" name="nama" id="nama" class="form-control" value="{{$profile->tempat_lahir.' / '.date('d-m-Y', strtotime($profile->tanggal_lahir))}}" readonly>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="form-label">Alamat : </label>
                                            <textarea type="text" name="nama" id="nama" class="form-control" value="{{$profile->alamat}}" readonly>{{$profile->alamat}}</textarea>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="form-label">Nomor Telepon : </label>
                                            <input type="text" name="nama" id="nama" class="form-control" value="{{$profile->no_telp}}" readonly>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="form-label">Email : </label>
                                            <input type="text" name="nama" id="nama" class="form-control" value="{{$profile->email}}" readonly>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="form-label">Instagram : </label>
                                            <input type="text" name="nama" id="nama" class="form-control" value="{{$profile->instagram}}" readonly>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="form-label">Nama Orang Tua : </label>
                                            <input type="text" name="nama" id="nama" class="form-control" value="{{$profile->nama_ortu}}" readonly>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="form-label">Pekerjaan Orang Tua : </label>
                                            <input type="text" name="nama" id="nama" class="form-control" value="{{$profile->pekerjaan_ortu}}" readonly>
                                        </div>
                                          <div class="row mb-3">
                                            <label for="inputNanme4" class="form-label">Alat musik yang dimiliki :</label>
                                            <textarea type="text" class="form-control" name="deskripsi" readonly>{{$profile->alat_musik_dimiliki}}</textarea>
                                          </div>
                                        {{-- </div> --}}
                                        <!-- End Horizontal Form -->

                                      </div>
                                    </div>

                                  </div>

                                  <div class="col-lg-6">

                                    <div class="card">
                                      <div class="card-body">
                                        <h5 class="card-title">Data Kelas</h5>

                                        <!-- Vertical Form -->
                                        <div class="row g-3">
                                            <div class="row mb-3">
                                                <label for="name" class="form-label">Kursus : </label>
                                                <input type="text" name="nama" id="nama" class="form-control" value="{{$course->alat_musik->nama}}" readonly>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="name" class="form-label">Period Start : </label>
                                                <input type="text" name="nama" id="nama" class="form-control" value="{{\Carbon\Carbon::parse($course->periode->tgl_awal_pembelajaran)->format('d/m/Y')}}" readonly>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="name" class="form-label">Period End : </label>
                                                <input type="text" name="nama" id="nama" class="form-control" value="{{\Carbon\Carbon::parse($course->periode->tgl_akhir_pembelajaran)->format('d/m/Y')}}" readonly>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="name" class="form-label">Nama Guru : </label>
                                                <input type="text" name="nama" id="nama" class="form-control" value="{{$profile->no_telp}}" readonly>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="name" class="form-label">Studio : </label>
                                                <input type="text" name="nama" id="nama" class="form-control" value="{{$profile->no_telp}}" readonly>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="name" class="form-label">Catatan : </label>
                                                <input type="text" name="catatan" id="catatan" class="form-control" placeholder="(Wajib Diisi)">
                                            </div>
                                            <input type="hidden" name="course_id" value="{{$course->id}}">
                                            <input type="hidden" name="grand_total" value="{{$course->harga}}">
                                            <div class="text-center">
                                              <button type="submit" class="btn btn-primary">Daftar</button>
                                              <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                          </form><!-- End No Labels Form -->
                                      </div>
                                    </div>
                                  </div>
    </main>
</x-app-layout>
