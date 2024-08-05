<?php
        use App\Http\Controllers\BerandaController;
        $controller = new BerandaController();
        $notification_approver = $controller->notification_approver();
        $notification_user = $controller->notification_user();

        use App\Http\Controllers\ProfileController;
        $profilecontroller = new ProfileController();
        $profile_id = $profilecontroller->getProfile();

?>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{asset('template/NiceAdmin/assets/img/LOGO-SINCERE.png')}}" alt="">
        <span class="d-none d-lg-block">Sincere Music</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->


        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
        @if(Auth::user()->role_id == 1)
            @if($notification_approver->count() !== 0)
            <span class="badge bg-primary badge-number">{{$notification_approver->count()}}</span>
            @endif
        @elseif(Auth::user()->role_id == 2)
            @if($notification_approver->count() !== 0)
            <span class="badge bg-primary badge-number">{{$notification_user->count()}}</span>
            @endif
        @endif
          </a><!-- End Notification Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        @if(Auth::user()->role_id == 1)
            <li class="dropdown-header">
              Anda memiliki {{$notification_approver->count()}} notifikasi baru!
              <a href="read_notification_user"><span class="badge rounded-pill bg-primary p-2 ms-2">Tandai telah dibaca</span></a>
              </form>
            </li>
        @elseif(Auth::user()->role_id == 2)
            <li class="dropdown-header">
              Anda memiliki {{$notification_user->count()}} notifikasi baru!
              <a href="read_notification_user"><span class="badge rounded-pill bg-primary p-2 ms-2">Tandai telah dibaca</span></a>
            </li>
        @endif
            <li>
              <hr class="dropdown-divider">
            </li>
        @if(Auth::user()->role_id == 1)
            @foreach($notification_approver as $i)
            <li class="notification-item">
                @if($i->reservasi->proses = 'Disetujui')
                <i class="bi bi-info-circle text-primary"></i>
                @elseif($i->reservasi->proses = 'Ditolak')
                <i class="bi bi-x-circle text-danger"></i>
                @else
                <i class="bi bi-exclamation-circle text-warning"></i>
                @endif
              <div>
                <h4>Reservasi Sekolah Musik</h4>
                <p>{{$i->message}}</p>
                <p>{{\Carbon\Carbon::parse($i->created_at)->diffForHumans()}}</p>
              </div>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            @endforeach
            @elseif(Auth::user()->role_id == 2)
            @foreach($notification_user as $i)
            <li class="notification-item">
                @if($i->reservasi->proses = 'Disetujui')
                <i class="bi bi-info-circle text-primary"></i>
                @elseif($i->reservasi->proses = 'Ditolak')
                <i class="bi bi-x-circle text-danger"></i>
                @else
                <i class="bi bi-exclamation-circle text-warning"></i>
                @endif
              <div>
                <h4>Reservasi Sekolah Musik</h4>
                <p>{{$i->message}}</p>
                <p>{{\Carbon\Carbon::parse($i->created_at)->diffForHumans()}}</p>
              </div>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            @endforeach
         @endif
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Lihat semua notifikasi</a>
            </li>
          </ul><!-- End Notification Dropdown Items -->
        </li><!-- End Notification Nav -->
        {{-- @elseif(Auth::user()->role_id = 2)
        <li class="nav-item dropdown">
            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-bell"></i>
              @if($notification_user->count() !== 0)
              <span class="badge bg-primary badge-number">{{$notification_user->count()}}</span>
              @endif
            </a><!-- End Notification Icon -->
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
              <li class="dropdown-header">
                Anda memiliki {{$notification_user->count()}} notifikasi baru!
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Tandai telah dibaca</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              @foreach($notification_user as $a)
              <li class="notification-item">
                  @if($a->reservasi->proses = 'Ditolak')
                  <i class="bi bi-x-circle text-danger"></i>
                  @elseif($a->reservasi->proses = 'Disetujui')
                  <i class="bi bi-info-circle text-primary"></i>
                  @else
                  <i class="bi bi-exclamation-circle text-warning"></i>
                  @endif
                <div>
                  <h4>Reservasi Sekolah Musik</h4>
                  <p>{{$a->message}}</p>
                  <p>{{\Carbon\Carbon::parse($a->created_at)->diffForHumans()}}</p>
                </div>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              @endforeach
              <li class="notification-item">
                <i class="bi bi-check-circle text-success"></i>
                <div>
                  <h4>Sit rerum fuga</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>2 hrs. ago</p>
                </div>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li class="dropdown-footer">
                <a href="#">Lihat semua notifikasi</a>
              </li>
            </ul><!-- End Notification Dropdown Items -->
          </li><!-- End Notification Nav -->
          @endif --}}

        {{-- <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav --> --}}

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('template/NiceAdmin/assets/img/default-profile.jpg')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{Auth::user()->name}}</h6>
              {{-- <span>{{Auth::user()->r}}</span> --}}
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            @if(is_null($profile_id) && Auth::user()->role_id == 2)
            <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.create') }}">
                  <i class="bi bi-person"></i>
                  <span>Profile Saya</span>
                </a>
              </li>
            @elseif(Auth::user()->role_id == 2)
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.show', $profile_id) }}">
                <i class="bi bi-person"></i>
                <span>Profile Saya</span>
              </a>
            </li>
            @endif
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Pengaturan Akun</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('kontak.index')}}">
                <i class="bi bi-question-circle"></i>
                <span>Butuh Bantuan?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  <script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $(document).on('click', 'a.jquery-postback', function(e) {
        e.preventDefault(); // does not go through with the link.

        var $this = $(this);

        $.post({
            type: $this.data('method'),
            url: $this.attr('href')
        }).done(function (data) {
            alert('success');
            console.log(data);
        });
    });
    </script>
