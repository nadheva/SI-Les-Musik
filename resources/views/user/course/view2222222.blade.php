<x-app-layout>
    @vite(['resources/css/app.css','resources/js/app.js'])
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
        <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
            <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
              <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                  <img class="w-full dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg" alt="" />
                  <img class="w-full hidden dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg" alt="" />
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
                  <h1
                    class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"
                  >
                    {{$course->judul}}
                  </h1>
                  <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                    <p
                      class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white"
                    >
                      {{Number::currency($course->harga, 'Rp.')}} /Semester
                    </p>
                  </div>

                  <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                    <a
                      href="#"
                      title=""
                      class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                      role="button"
                    >
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4"/>
                      </svg>
                        <path
                          stroke="currentColor"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"
                        />
                      </svg>
                      Download Modul
                    </a>

                    <a
                      href=""
                      title=""
                      class="text-white mt-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"
                      data-bs-toggle="modal"
                      data-bs-target="#formulirPendaftaran"
                      role="button"
                    >
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z" clip-rule="evenodd"/>
                      </svg>

                      Daftar Kelas
                    </a>
                  </div>

                  <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                  <p class="mb-6 text-gray-500 dark:text-gray-400">
                    {{$course->deskripsi}}
                  </p>

                  <p class="text-gray-500 dark:text-gray-400">
                    {{$course->alat_musik->deskripsi}}
                  </p>
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
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap : </label>
                                            <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$profile->nama_depan." ".$profile->nama_belakang}}" readonly>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat / Tanggal Lahir : </label>
                                            <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$profile->tempat_lahir.' / '.date('d-m-Y', strtotime($profile->tanggal_lahir))}}" readonly>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat : </label>
                                            <textarea type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$profile->alamat}}" readonly>{{$profile->alamat}}</textarea>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon : </label>
                                            <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$profile->no_telp}}" readonly>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email : </label>
                                            <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$profile->email}}" readonly>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram : </label>
                                            <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$profile->instagram}}" readonly>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Orang Tua : </label>
                                            <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$profile->nama_ortu}}" readonly>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan Orang Tua : </label>
                                            <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$profile->pekerjaan_ortu}}" readonly>
                                        </div>
                                          <div class="row mb-3">
                                            <label for="inputNanme4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alat musik yang dimiliki :</label>
                                            <textarea type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="deskripsi" readonly>{{$profile->alat_musik_dimiliki}}</textarea>
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
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kursus : </label>
                                                <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$course->alat_musik->nama}}" readonly>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Period Start : </label>
                                                <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{\Carbon\Carbon::parse($course->periode->tgl_awal_pembelajaran)->format('d/m/Y')}}" readonly>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Period End : </label>
                                                <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{\Carbon\Carbon::parse($course->periode->tgl_akhir_pembelajaran)->format('d/m/Y')}}" readonly>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Guru : </label>
                                                <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$profile->no_telp}}" readonly>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Studio : </label>
                                                <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$profile->no_telp}}" readonly>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan : </label>
                                                <input type="text" name="catatan" id="catatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
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
