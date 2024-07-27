<x-app-layout>
    <style>
        body {
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 14px;
  line-height: 1.52857143;
  color: #515253;
  background-color: #f5f7fa;
  margin-top:20px;
}

.widget .panel, .widget.panel {
  overflow: hidden;
}

.widget {
  margin-bottom: 20px;
  border: 0;
}

.row-table {
  display: table;
  table-layout: fixed;
  height: 100%;
  width: 100%;
  margin: 0;
}

.row-flush>[class*=col-] {
  padding-left: 0;
  padding-right: 0;
}

.row-table>[class*=col-] {
  display: table-cell;
  float: none;
  table-layout: fixed;
  vertical-align: middle;
}

.widget .lateral-picture {
  position: relative;
  display: block;
  height: 240px;
  width: auto;
  overflow: hidden;
}

.widget .lateral-picture>img {
  position: absolute;
  top: 0;
  left: 0;
  max-height: 100%;
  width: auto;
}

.align-middle {
  vertical-align: middle;
}

.p-lg {
  padding: 15px!important;
}

.btn {
  border-radius: 3px;
  font-size: 13px;
  border-color: transparent;
  -webkit-appearance: none;
  outline: 0!important;
  -webkit-transition: all .1s;
  -o-transition: all .1s;
  transition: all .1s;
}
    </style>
        <main id="main" class="main">

            <div class="pagetitle">
              <h1>Kelas</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item">Users</li>
                  <li class="breadcrumb-item active">Kelas</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
    <div class="container">
        <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Daftar Kelas</h2>
            <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Sekolah Musik Yamaha menekankan pengembangan musik holistik untuk siswa usia muda. Tidak seperti les piano privat yang berfokus terutama pada membaca dan bermain musik, kurikulum kami meliputi "mendengarkan, menyanyi, bermain, membaca, dan mencipta", akan mengembangkan keterampilan musik dasar secara efektif. Meskipun mungkin tampak berbeda pada awalnya, pendekatan ini memberikan landasan yang kuat bagi usia 6 hingga 7 tahun, yang ujung jarinya berkembang pesat, sehingga membuka jalan bagi keterampilan bermain yang solid.</p>
        </div>
        <div class="row">
            @foreach($alatmusik as $c)
            <div class="col-md-6">
              <!-- START widget-->
              <div class="panel widget">
                 <div class="row row-table row-flush">
                    <div class="col-xs-5 text-center">
                       <picture class="lateral-picture">
                          <img src="{{asset($c->foto)}}" class="rounded" alt="..." width="200" height="200">
                       </picture>
                    </div>
                    <div class="col-xs-7 align-middle p-lg">
                        @if(count($c->course) > 0)
                        <div class="pull-right"><a href="{{route('course.show', encrypt($c->id))}}" class="btn btn-primary btn-sm">Daftar</a>
                        @else
                        <div class="pull-right"><a href="" class="btn btn-danger btn-sm" @disabled(true)>Daftar</a>
                        @endif
                       </div>
                       <p>
                        @if(count($c->course) > 0)
                          <span class="text-lg"></span>{{$c->periode->tgl_akhir_pendaftaran}}</p>
                        @else
                          <span class="text-lg"></span>Pendaftaran Kelas Ditutup</p>
                        @endif
                       <p>
                          <strong>{{$c->nama}}</strong>
                       </p>
                       <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{$c->deskripsi}}</p>
                    </div>
                 </div>
              </div>
              <!-- END widget-->
            </div>
            @endforeach
            {{-- <div class="col-md-6">
              <!-- START widget-->
              <div class="panel widget">
                 <div class="row row-table row-flush">
                    <div class="col-xs-5">
                       <picture class="lateral-picture">
                          <img src="https://www.bootdey.com/image/400x400/87CEFA/000000" alt="">
                       </picture>
                    </div>
                    <div class="col-xs-7 align-middle p-lg">
                       <div class="pull-right"><a href="#" class="btn btn-primary btn-sm">Register</a>
                       </div>
                       <p>
                          <span class="text-lg">16</span>Aug</p>
                       <p>
                          <strong>EVENT INVITATION</strong>
                       </p>
                       <p>Donec posuere neque in elit luctus tempor consequat enim egestas. Nulla dictum egestas leo at lobortis.</p>
                    </div>
                 </div>
              </div>
              <!-- END widget-->
            </div> --}}
        </div>
    </div>
    </section>
    </main>
</x-app-layout>
