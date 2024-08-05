<x-app-layout>
<style type="text/css">
    	body{margin-top:20px;}
.pricing-box {
  -webkit-box-shadow: 0px 5px 30px -10px rgba(0, 0, 0, 0.1);
          box-shadow: 0px 5px 30px -10px rgba(0, 0, 0, 0.1);
  padding: 35px 50px;
  border-radius: 20px;
  position: relative;
}

.pricing-box .plan {
  font-size: 34px;
}

.pricing-badge {
  position: absolute;
  top: 0;
  z-index: 999;
  right: 0;
  width: 100%;
  display: block;
  font-size: 15px;
  padding: 0;
  overflow: hidden;
  height: 100px;
}

.pricing-badge .badge {
  float: right;
  -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
  right: -67px;
  top: 17px;
  position: relative;
  text-align: center;
  width: 200px;
  font-size: 13px;
  margin: 0;
  padding: 7px 10px;
  font-weight: 500;
  color: #ffffff;
  background: #fb7179;
}
.mb-2, .my-2 {
    margin-bottom: .5rem!important;
}
p {
    line-height: 1.7;
}


    </style>
    <main id="main" class="main">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
        <div class="pagetitle">
          <h1>Kelas</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item ">Course</li>
              <li class="breadcrumb-item active">Daftar Level Course</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
        <section class="section" id="pricing">
            <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="title-box text-center">
            <h3 class="title-heading mt-4">Pilih kelas sesuai level </h3>
            <p class="text-muted f-17 mt-3">Pada level mana anda sekarang?<br> Silahkan pilih level sesuai kemampuan dan standar yang anda miliki.</p>
            <img src="images/home-border.png" height="15" class="mt-3" alt>
            </div>
            </div>
            </div>
            <div class="row mt-5 pt-4">
            <div class="col-lg-4">
            <div class="pricing-box mt-4">
            <i class="mdi mdi-account h1"></i>
            <h4 class="f-20">Beginner</h4>
            <div class="mt-4 pt-2">
            <p class="mb-2 f-18">Detail</p>
            <p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i>
            New member of music school.</p>
            <p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i>
            Belum mengetahui dasar-dasar note.</p>
            <p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i>
            Untuk anak yang ingin menambah skill baru.</p>
            {{-- <p class="mb-2"><i class="mdi mdi-close-circle text-danger f-18 mr-2"></i><b>100+</b>
            Video Tuts</p>
            <p class="mb-2"><i class="mdi mdi-close-circle text-danger f-18 mr-2"></i><b>Public</b>
            Displays
            </p> --}}
            </div>
            {{-- <p class="mt-4 pt-2 text-muted">Semper urna veal tempus pharetra elit habisse platea dictumst.
            </p> --}}
            {{-- <div class="pricing-plan mt-4 pt-2">
                <h4 class="text-muted"> <span class="plan pl-3 text-dark">{{Number::currency($course[0]->harga, 'Rp.')}}/semester</span></h4>
                <p class="text-muted mb-0">Per Semester</p>
            </div> --}}
            @if(count($course->where('level', '=', '1')->where('status', '=', '1')) > 0)
            @foreach($course->where('level', '=', '1')->where('status', '=', '1') as $c)
            <a href="{{url('course-view', encrypt($c->id))}}" class="btn btn-primary btn-rounded">Daftar</a>
            @endforeach
            @else
            <p class="mb-2"><i class="mdi mdi-close-circle text-danger f-18 mr-2"></i><b>Tidak tersedia</b>
                </p>
            @endif
            <div class="mt-4 pt-3">
            </div>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="pricing-box mt-4">
            <div class="pricing-badge">
            {{-- <span class="badge">Featured</span> --}}
            </div>
            <i class="mdi mdi-account-multiple h1"></i>
            <h4 class="f-20">Intermediate</h4>
            <div class="mt-4 pt-2">
            <p class="mb-2 f-18">Detail:</p>
            <p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i>
            Sudah mengenal dasar-dasar musik.</p>
            <p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i>
            Sudah menyelesaikan ujian beginner 2x atau mengikuti les lebih dari 1 tahun.</p>
            {{-- <p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>100+</b>
            Video Tuts</p>
            <p class="mb-2"><i class="mdi mdi-close-circle text-danger f-18 mr-2"></i><b>Public</b>
            Displays
            </p> --}}
            </div>
            {{-- <p class="mt-4 pt-2 text-muted">Semper urna veal tempus pharetra elit habisse platea dictumst.
            </p> --}}
            {{-- <div class="pricing-plan mt-4 pt-2">
                <h4 class="text-muted"> <span class="plan pl-3 text-dark">{{Number::currency($course[0]->harga, 'Rp.')}}/semester</span></h4>
                <p class="text-muted mb-0">Per Semester</p>
            </div> --}}
            <div class="mt-4 pt-3">
                @if(count($course->where('level', '=', '2')->where('status', '=', '1')) > 0)
                @foreach($course->where('level', '=', '2')->where('status', '=', '1') as $c)
                <a href="{{url('course-view', encrypt($c->id))}}" class="btn btn-primary btn-rounded">Daftar</a>
                @endforeach
                @else
                <p class="mb-2"><i class="mdi mdi-close-circle text-danger f-18 mr-2"></i><b>Tidak tersedia</b>
                    </p>
                @endif
            </div>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="pricing-box mt-4">
            <i class="mdi mdi-account-multiple-plus h1"></i>
            <h4 class="f-20">Advance</h4>
            <div class="mt-4 pt-2">
            <p class="mb-2 f-18">Detail:</p>
            <p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i>
            High Grade.</p>
            <p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i>
            Sudah melewati level intermediate.</p>
            <p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i>
            Sudah mengikuti les lebih dari 2 tahun.</p>
            {{-- <p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>Public</b>
            Displays
            </p> --}}
            {{-- </div>
            <p class="mt-4 pt-2 text-muted">Semper urna veal tempus pharetra elit habisse platea dictumst.
            </p> --}}
            {{-- <div class="pricing-plan mt-4 pt-2">
            <h4 class="text-muted"> <span class="plan pl-3 text-dark">{{Number::currency($course[0]->harga, 'Rp.')}}/semester</span></h4>
            <p class="text-muted mb-0">Per Semester</p>
            </div> --}}
            <div class="mt-4 pt-3">
                @if(count($course->where('level', '=', '3')->where('status', '=', '1')) > 0)
                @foreach($course->where('level', '=', '3')->where('status', '=', '1') as $c)
                <a href="{{url('course-view', encrypt($c->id))}}" class="btn btn-primary btn-rounded">Daftar</a>
                @endforeach
                @else
                <p class="mb-2"><i class="mdi mdi-close-circle text-danger f-18 mr-2"></i><b>Tidak tersedia</b>
                    </p>
                @endif
            </div>
            </div>
            </div>
            </div>
            </div>
            </section>
    </main>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">

</script>
</x-app-layout>
