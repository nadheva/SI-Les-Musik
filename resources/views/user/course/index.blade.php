<x-app-layout>
<style type="text/css">
    	body {
    margin-top: 20px;
}

.event .title {
    margin: 0px 0 0;
}

.event .nav-content {
    float: right;
    width: 70%;
}

.event .btn {
    background: #006eff;
}

.event .nav-content strong {
    display: block;
    font-family: Montserrat;
    font-size: 20px;
    color: #002691;
}

.event nav > div a.nav-item.nav-link.active .event .spicel-features {
    background: #fafaff;
}

.event .nav-fill .nav-item {
    text-align: left;
    text-transform: uppercase;
    margin: 0 5px;
    font-size: 12px;
    margin-right: 16px;
}

.event .nav-fill .nav-item text-t i {
    margin-right: 10px;
}

.event .nav-fill .nav-item i::before {
    font-size: 26px;
    margin-right: 13px;
    position: relative;
    top: 4px;
}

.event nav > .nav.nav-tabs {
    border: none;
    color: #fff;
    border-radius: 0;
    flex-wrap: inherit;
    padding: 0 30px;
}

.event .nav-item {
    margin: 0 0;
}

.event a.nav-item.nav-link.active {
    background: #ff007a !important;
    color: #fff !important;
}

.event a.nav-item.nav-link.active strong {
    color: #fff;
}

.event nav > div a.nav-item.nav-link,
.event nav > div a.nav-item.nav-link.active {
    border: none;
    padding: 18px 25px;
    color: #47759d;
    border-radius: 0;
    background: #fff;
    position: relative;
    background: #f5faff;
}

.event nav > div a.nav-item.nav-link.active:after {
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 15px 15px 0;
    border-color: transparent #e7015e transparent transparent;
    position: absolute;
    left: 0;
    bottom: -15px;
    content: '';
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    -ms-transition: all 0.4s ease;
    border-color: transparent #ff007a transparent transparent;
}

.event .tab-content {
    padding: 50px 25px 0 !important;
}

.event .user h5 {
    margin-top: 20px;
}

.event .user p {
    font-weight: bold;
    color: #ff007a;
}

.event .user ul {
    padding-top: 10px;
    border-top: 1px solid #edf5ff;
}

.event .user ul li {
    margin-top: 10px;
}

.event .user ul li i {
    margin-right: 5px;
}

.event-list-content {
    margin-left: 50px;
    margin-right: 20px;
    padding: 50px;
    position: relative;
    border: 10px solid #edf5ff;
    transition: all 0.3s ease 0s;
}

.event-list-content:hover {
    border: 10px solid #ff007a;
}

.event-list-content .crical {
    position: absolute;
    background: #ff007a;
    right: -66px;
    bottom: -73px;
    font-size: 30px;
    color: #fff;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    padding: 50px;
}

.event-list-content h2 {
    margin-bottom: 30px;
}

.event-list-content .btn {
    background: none;
    border: 2px solid #edf5ff;
    color: #47759d;
    font-weight: bold;
    font-size: 14px;
    margin-right: 10px;
}

.event-list-content .btn:hover {
    background: #ff007a;
    border: 2px solid #ff007a;
    color: #fff;
    font-weight: bold;
    font-size: 14px;
    margin-right: 10px;
    box-shadow: 0px 10px 19px 0px #ff007a66 !important;
}

.event-list-content ul li {
    display: inline-block;
    font-size: 16px;
    margin-right: 20px;
    margin-bottom: 20px;
    color: #ff007a;
}

.event-list-content ul li i {
    margin-right: 5px;
}

.event nav > div a.nav-item.nav-link .lgt-icon {
    display: none;
}

.event nav > div a.nav-item.nav-link.active .lgt-icon {
    display: inline-block;
}

.event nav > div a.nav-item.nav-link.active .drk-icon {
    display: none;
}

.event nav > div a.nav-item.nav-link.active .drk-icon {
    display: none;
}

.img, img {
    max-width: 100%;
    transition: all 0.3s ease-out 0s;
}

.event .user h5 {
    margin-top: 20px;
}
a, h1, h2, h3, h4, h5, h6, p, span {
    overflow-wrap: break-word;
}
h5 {
    font-size: 18px;
}
h1, h2, h3, h4, h5, h6 {
    font-family: 'Montserrat', sans-serif;
    color: #002691;
    margin-top: 0px;
    font-style: normal;
    font-weight: bold;
    text-transform: normal;
}

.event .user p {
    font-weight: bold;
    color: #ff007a;
}
.event .user ul {
    padding-top: 10px;
    border-top: 1px solid #edf5ff;
}
ul {
    margin: 0px;
    padding: 0px;
}

.event-list-content .crical {
    position: absolute;
    background: #ff007a;
    right: -66px;
    bottom: -73px;
    font-size: 30px;
    color: #fff;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    padding: 50px;
}
.fix {
    overflow: hidden;
}

.event nav > div a.nav-item.nav-link.active:after {
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 15px 15px 0;
    border-color: transparent #e7015e transparent transparent;
    position: absolute;
    left: 0;
    bottom: -15px;
    content: '';
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    -ms-transition: all 0.4s ease;
    border-color: transparent #ff007a transparent transparent;
}



    </style>
        <main id="main" class="main">

            <div class="pagetitle">
              <h1>Course</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item">Users</li>
                  <li class="breadcrumb-item active">Course</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
{{-- <div class="event">
<div class="container">
<div class="row">
<div class="col-lg-12 ">
<nav class="wow fadeInDown  animated" data-animation="fadeInDown animated" data-delay=".2s" style="visibility: visible; animation-name: fadeInDown;">
<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
<a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab" href="#one" role="tab" aria-selected="true">
<div class="nav-content">
<strong>First Day</strong>
<span>10th January 2019</span>
</div>
</a>
<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#two" role="tab" aria-selected="false">
<div class="nav-content">
<strong>Second Day</strong>
<span>10th January 2019</span>
</div>
</a>
<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#three" role="tab" aria-selected="false">
<div class="nav-content">
<strong>Third Day</strong>
<span>10th January 2019</span>
</div>
</a>
<a class="nav-item nav-link" id="nav-contact-tab2" data-toggle="tab" href="#four" role="tab" aria-selected="false">
<div class="nav-content">
<strong>Fourth Day</strong>
<span>10th January 2019</span>
</div>
</a>
</div>
</nav>
<div class="tab-content py-3 px-3 px-sm-0 wow fadeInDown  animated" data-animation="fadeInDown animated" data-delay=".2s" id="nav-tabContent" style="visibility: visible; animation-name: fadeInDown;">
<div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="nav-home-tab"> --}}
    @foreach($alatmusik as $c)
<div class="row mb-30">
<div class="col-lg-2">
<div class="user">
<div class="title">
<img src="{{asset($c->foto)}}" alt="img">
<h5>{{$c->nama}}</h5>
@if(count($c->course) > 0)
<span class="text-lg"></span>{{$c->periode->tgl_akhir_pendaftaran}}</p>
@else
<span class="text-lg"></span>Kelas Ditutup</p>
@endif
<p>Level:</p>
</div>
<ul>
@if(count($c->course) > 0)
@foreach($c->course as $key => $v)
<li>{{$v->level['nama']}}</li>
@endforeach
@else
<p>-</p>
@endif
</ul>
</div>
</div>
<div class="col-lg-10">
<div class="event-list-content fix">
<ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class>
@if(count($c->course) > 0)
<li>Batas Pendaftaran</li>
<li>{{$c->periode->tgl_akhir_pendaftaran}}</li>
@else
<li>Kelas Tidak Tersedia</li>
@endif
</ul>
<h2>Course {{$c->nama}}</h2>
<p>{{$c->deskripsi}}</p>
@if(count($c->course) > 0)
<a href="{{route('course.show', encrypt($c->id))}}" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i>Daftar</a>
@else
<a href="" class="btn mt-20 mr-10 disabled"><i class="far fa-ticket-alt"></i>Daftar</a>
@endif
{{-- <a href="#" class="btn mt-20">Read More</a> --}}
<div class="crical"> </div>
</div>
</div>
</div>
@endforeach
{{--
<div class="row mb-30">
<div class="col-lg-2">
<div class="user">
<div class="title">
<img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="img">
<h5>Kelian M. Bappe</h5>
<p>youtubing</p>
</div>
<ul>
<li>Coffe &amp; Snacks</li>
<li>Video Streming</li>
</ul>
</div>
</div>
<div class="col-lg-10">
<div class="event-list-content fix">
<ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class>
<li><i class="fas fa-map-marker-alt"></i> Waterfront Hotel, London</li>
<li><i class="far fa-clock"></i> 9.30 - 10.30 AM</li>
</ul>
<h2>Rokolo DJ Dancing 2019</h2>
<p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
<a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i> Buy Ticket</a>
<a href="#" class="btn mt-20">Read More</a>
<div class="crical"><i class="fal fa-magic"></i> </div>
</div>
</div>
</div>


<div class="row mb-30">
<div class="col-lg-2">
<div class="user">
<div class="title">
<img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="img">
<h5>Hiliniam Nelson</h5>
<p>UX Deisgn</p>
</div>
<ul>
<li>Coffe &amp; Snacks</li>
<li>Video Streming</li>
</ul>
</div>
</div>
<div class="col-lg-10">
<div class="event-list-content fix">
<ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class>
<li><i class="fas fa-map-marker-alt"></i> Waterfront Hotel, London</li>
<li><i class="far fa-clock"></i> 9.30 - 10.30 AM</li>
</ul>
<h2>Google Youtube Stratigic Party</h2>
<p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
<a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i> Buy Ticket</a>
<a href="#" class="btn mt-20">Read More</a>
<div class="crical"><i class="far fa-cogs"></i> </div>
</div>
</div>
</div>


<div class="row mb-30">
<div class="col-lg-2">
<div class="user">
<div class="title">
<img src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="img">
<h5>Kimjing J. Jalim</h5>
<p>UX Deisgn</p>
</div>
<ul>
<li>Coffe &amp; Snacks</li>
<li>Video Streming</li>
</ul>
</div>
</div>
<div class="col-lg-10">
<div class="event-list-content fix">
<ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class>
<li><i class="fas fa-map-marker-alt"></i> Waterfront Hotel, London</li>
<li><i class="far fa-clock"></i> 9.30 - 10.30 AM</li>
</ul>
<h2>Intro Jiknim Jikis 2019</h2>
<p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
<a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i> Buy Ticket</a>
<a href="#" class="btn mt-20">Read More</a>
<div class="crical"><i class="fal fa-ban"></i></div>
</div>
</div>
</div>

</div>
<div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="nav-profile-tab">

<div class="row mb-30">
<div class="col-lg-2">
<div class="user">
<div class="title">
<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="img">
<h5>Rosalina William</h5>
<p>UX Deisgn</p>
</div>
<ul>
<li><i class="fal fa-coffee"></i> Coffe &amp; Snacks</li>
<li><i class="fal fa-video"></i> Video Streming</li>
</ul>
</div>
</div>
<div class="col-lg-10">
<div class="event-list-content fix">
<ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class>
<li><i class="fas fa-map-marker-alt"></i> Waterfront Hotel, London</li>
<li><i class="far fa-clock"></i> 9.30 - 10.30 AM</li>
</ul>
<h2>UX Design Trend Party 2019</h2>
<p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
<a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i> Buy Ticket</a>
<a href="#" class="btn mt-20">Read More</a>
<div class="crical"><i class="fal fa-video"></i> </div>
</div>
</div>
</div>


<div class="row mb-30">
<div class="col-lg-2">
<div class="user">
<div class="title">
<img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="img">
<h5>Kelian M. Bappe</h5>
<p>youtubing</p>
</div>
<ul>
<li><i class="fal fa-coffee"></i> Coffe &amp; Snacks</li>
<li><i class="fal fa-video"></i> Video Streming</li>
</ul>
</div>
</div>
<div class="col-lg-10">
<div class="event-list-content fix">
<ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class>
<li><i class="fas fa-map-marker-alt"></i> Waterfront Hotel, London</li>
<li><i class="far fa-clock"></i> 9.30 - 10.30 AM</li>
</ul>
<h2>Rokolo DJ Dancing 2019</h2>
<p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
<a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i> Buy Ticket</a>
<a href="#" class="btn mt-20">Read More</a>
<div class="crical"><i class="fal fa-video"></i> </div>
</div>
</div>
</div>


<div class="row mb-30">
<div class="col-lg-2">
<div class="user">
<div class="title">
<img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="img">
<h5>Hiliniam Nelson</h5>
<p>UX Deisgn</p>
</div>
<ul>
<li><i class="fal fa-coffee"></i> Coffe &amp; Snacks</li>
<li><i class="fal fa-video"></i> Video Streming</li>
</ul>
</div>
</div>
<div class="col-lg-10">
<div class="event-list-content fix">
<ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class>
<li><i class="fas fa-map-marker-alt"></i> Waterfront Hotel, London</li>
<li><i class="far fa-clock"></i> 9.30 - 10.30 AM</li>
</ul>
<h2>Google Youtube Stratigic Party</h2>
<p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
<a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i> Buy Ticket</a>
<a href="#" class="btn mt-20">Read More</a>
<div class="crical"><i class="fal fa-video"></i> </div>
</div>
</div>
</div>


<div class="row mb-30">
<div class="col-lg-2">
<div class="user">
<div class="title">
<img src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="img">
<h5>Kimjing J. Jalim</h5>
<p>UX Deisgn</p>
</div>
<ul>
<li><i class="fal fa-coffee"></i> Coffe &amp; Snacks</li>
<li><i class="fal fa-video"></i> Video Streming</li>
</ul>
</div>
</div>
<div class="col-lg-10">
<div class="event-list-content fix">
<ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class>
<li><i class="fas fa-map-marker-alt"></i> Waterfront Hotel, London</li>
<li><i class="far fa-clock"></i> 9.30 - 10.30 AM</li>
</ul>
<h2>Intro Jiknim Jikis 2019</h2>
<p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
<a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i> Buy Ticket</a>
<a href="#" class="btn mt-20">Read More</a>
<div class="crical"><i class="fal fa-video"></i> </div>
</div>
</div>
</div>

</div>
<div class="tab-pane fade" id="three" role="tabpanel" aria-labelledby="nav-contact-tab">

<div class="row mb-30">
<div class="col-lg-2">
<div class="user">
<div class="title">
<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="img">
<h5>Rosalina William</h5>
<p>UX Deisgn</p>
</div>
<ul>
<li><i class="fal fa-coffee"></i> Coffe &amp; Snacks</li>
<li><i class="fal fa-video"></i> Video Streming</li>
</ul>
</div>
</div>
<div class="col-lg-10">
<div class="event-list-content fix">
<ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class>
<li><i class="fas fa-map-marker-alt"></i> Waterfront Hotel, London</li>
<li><i class="far fa-clock"></i> 9.30 - 10.30 AM</li>
</ul>
<h2>UX Design Trend Party 2019</h2>
<p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
<a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i> Buy Ticket</a>
<a href="#" class="btn mt-20">Read More</a>
<div class="crical"><i class="fal fa-video"></i> </div>
</div>
</div>
</div>


<div class="row mb-30">
<div class="col-lg-2">
<div class="user">
<div class="title">
<img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="img">
<h5>Kelian M. Bappe</h5>
<p>youtubing</p>
</div>
<ul>
<li><i class="fal fa-coffee"></i> Coffe &amp; Snacks</li>
<li><i class="fal fa-video"></i> Video Streming</li>
</ul>
</div>
</div>
<div class="col-lg-10">
<div class="event-list-content fix">
<ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class>
<li><i class="fas fa-map-marker-alt"></i> Waterfront Hotel, London</li>
<li><i class="far fa-clock"></i> 9.30 - 10.30 AM</li>
</ul>
<h2>Rokolo DJ Dancing 2019</h2>
<p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
<a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i> Buy Ticket</a>
<a href="#" class="btn mt-20">Read More</a>
<div class="crical"><i class="fal fa-video"></i> </div>
</div>
</div>
</div>


<div class="row mb-30">
<div class="col-lg-2">
<div class="user">
<div class="title">
<img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="img">
<h5>Hiliniam Nelson</h5>
<p>UX Deisgn</p>
</div>
<ul>
<li><i class="fal fa-coffee"></i> Coffe &amp; Snacks</li>
<li><i class="fal fa-video"></i> Video Streming</li>
</ul>
</div>
</div>
<div class="col-lg-10">
<div class="event-list-content fix">
<ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class>
<li><i class="fas fa-map-marker-alt"></i> Waterfront Hotel, London</li>
<li><i class="far fa-clock"></i> 9.30 - 10.30 AM</li>
</ul>
<h2>Google Youtube Stratigic Party</h2>
<p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
<a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i> Buy Ticket</a>
<a href="#" class="btn mt-20">Read More</a>
<div class="crical"><i class="fal fa-video"></i> </div>
</div>
</div>
</div>


<div class="row mb-30">
<div class="col-lg-2">
<div class="user">
<div class="title">
<img src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="img">
<h5>Kimjing J. Jalim</h5>
<p>UX Deisgn</p>
</div>
<ul>
<li><i class="fal fa-coffee"></i> Coffe &amp; Snacks</li>
<li><i class="fal fa-video"></i> Video Streming</li>
</ul>
</div>
</div>
<div class="col-lg-10">
<div class="event-list-content fix">
<ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class>
<li><i class="fas fa-map-marker-alt"></i> Waterfront Hotel, London</li>
<li><i class="far fa-clock"></i> 9.30 - 10.30 AM</li>
</ul>
<h2>Intro Jiknim Jikis 2019</h2>
<p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
<a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i> Buy Ticket</a>
<a href="#" class="btn mt-20">Read More</a>
<div class="crical"><i class="fal fa-video"></i> </div>
</div>
</div>
</div>

</div>
<div class="tab-pane fade" id="four" role="tabpanel" aria-labelledby="nav-contact-tab">

<div class="row mb-30">
<div class="col-lg-2">
<div class="user">
<div class="title">
<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="img">
<h5>Rosalina William</h5>
<p>UX Deisgn</p>
</div>
<ul>
<li><i class="fal fa-coffee"></i> Coffe &amp; Snacks</li>
<li><i class="fal fa-video"></i> Video Streming</li>
</ul>
</div>
</div>
<div class="col-lg-10">
<div class="event-list-content fix">
<ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class>
<li><i class="fas fa-map-marker-alt"></i> Waterfront Hotel, London</li>
<li><i class="far fa-clock"></i> 9.30 - 10.30 AM</li>
</ul>
<h2>UX Design Trend Party 2019</h2>
<p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
<a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i> Buy Ticket</a>
<a href="#" class="btn mt-20">Read More</a>
<div class="crical"><i class="fal fa-video"></i> </div>
</div>
</div>
</div>


<div class="row mb-30">
<div class="col-lg-2">
<div class="user">
<div class="title">
<img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="img">
<h5>Kelian M. Bappe</h5>
<p>youtubing</p>
</div>
<ul>
<li><i class="fal fa-coffee"></i> Coffe &amp; Snacks</li>
<li><i class="fal fa-video"></i> Video Streming</li>
</ul>
</div>
</div>
<div class="col-lg-10">
<div class="event-list-content fix">
<ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class>
<li><i class="fas fa-map-marker-alt"></i> Waterfront Hotel, London</li>
<li><i class="far fa-clock"></i> 9.30 - 10.30 AM</li>
</ul>
<h2>Rokolo DJ Dancing 2019</h2>
<p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
<a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i> Buy Ticket</a>
<a href="#" class="btn mt-20">Read More</a>
<div class="crical"><i class="fal fa-video"></i> </div>
</div>
</div>
</div>


<div class="row mb-30">
<div class="col-lg-2">
<div class="user">
<div class="title">
<img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="img">
<h5>Hiliniam Nelson</h5>
<p>UX Deisgn</p>
</div>
<ul>
<li><i class="fal fa-coffee"></i> Coffe &amp; Snacks</li>
<li><i class="fal fa-video"></i> Video Streming</li>
</ul>
</div>
</div>
<div class="col-lg-10">
<div class="event-list-content fix">
<ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class>
<li><i class="fas fa-map-marker-alt"></i> Waterfront Hotel, London</li>
<li><i class="far fa-clock"></i> 9.30 - 10.30 AM</li>
</ul>
<h2>Google Youtube Stratigic Party</h2>
<p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
<a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i> Buy Ticket</a>
<a href="#" class="btn mt-20">Read More</a>
<div class="crical"><i class="fal fa-video"></i> </div>
</div>
</div>
</div>


<div class="row mb-30">
<div class="col-lg-2">
<div class="user">
<div class="title">
<img src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="img">
<h5>Kimjing J. Jalim</h5>
<p>UX Deisgn</p>
</div>
<ul>
<li><i class="fal fa-coffee"></i> Coffe &amp; Snacks</li>
<li><i class="fal fa-video"></i> Video Streming</li>
</ul>
</div>
</div>
<div class="col-lg-10">
<div class="event-list-content fix">
<ul data-animation="fadeInUp animated" data-delay=".2s" style="animation-delay: 0.2s;" class>
<li><i class="fas fa-map-marker-alt"></i> Waterfront Hotel, London</li>
<li><i class="far fa-clock"></i> 9.30 - 10.30 AM</li>
</ul>
<h2>Intro Jiknim Jikis 2019</h2>
<p>In order to save time you have to break down the content strategy for the event or conference you are planning step by step. Creating this process from scratch will take the longest amount of time to build, but once you have content production foundation.</p>
<a href="#" class="btn mt-20 mr-10"><i class="far fa-ticket-alt"></i> Buy Ticket</a>
<a href="#" class="btn mt-20">Read More</a>
<div class="crical"><i class="fal fa-video"></i> </div>
</div>
</div>
</div> --}}

</div>
</div>
</div>
<div class="col-lg-12 justify-content-center text-center">
{{-- <a href="#" class="btn mt-20 mr-10">More Program +</a> --}}
</div>
</div>
</div>
</div>
                </div>
            </section>
        </main>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">

</script>
</x-app-layout>
