<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white navbar-phone">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <div class="logo-details">
                <i class="icon">
                    <img src="{{ asset('img/logo.png') }}" alt="" width="32px" />
                </i>
                <div class="logo_name ms-2">
                    <h2>SI TAHIR</h2>
                    <h6>Sistem Informasi Tagihan Air</h6>
                </div>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <!-- for ANGGOTA user where instalasi belum selesai -->
                @if(Auth::user()->hasRole('anggota') and $instalasi->status != 'selesai')
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('instalasi')) ? 'active' : '' }}" href="{{ route('instalasi') }}">Instalasi</a>
                </li>
                @else
                <!-- for ALL user kecuali Anggota where instalasi belum selesai -->
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                <!-- for ANGGOTA user -->
                @if(Auth::user()->hasRole('anggota'))
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('ajukankeluhan')) ? 'active' : '' }}" href="{{ route('ajukankeluhan') }}">Ajukan Keluhan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('bukuair')) ? 'active' : '' }}" href="{{ route('bukuair') }}">Buku Air</a>
                </li>
                @endif
                <!-- for ADMIN and PENGURUS user -->
                @if((Auth::user()->hasRole('admin')) or (Auth::user()->hasRole('pengurus')))
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('anggota')) ? 'active' : '' }}" href="{{ route('anggota') }}">Anggota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('bukuairanggota')) ? 'active' : '' }}" href="{{ route('bukuairanggota') }}">Buku Air Anggota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('anggaranlistrik')) ? 'active' : '' }}" href="{{ route('anggaranlistrik') }}">Anggaran Listrik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('tanggapikeluhan')) ? 'active' : '' }}" href="{{ route('tanggapikeluhan') }}">Tanggapi Keluhan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('pengumuman')) ? 'active' : '' }}" href="{{ route('pengumuman') }}">Pengumuman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('instalasianggota')) ? 'active' : '' }}" href="{{ route('instalasianggota') }}">Instalasi Anggota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('tarif')) ? 'active' : '' }}" href="{{ route('tarif') }}">Tarif</a>
                </li>
                @endif
                <!-- for PENGURUS user -->
                @if(Auth::user()->hasRole('pengurus'))
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('pengurus')) ? 'active' : '' }}" href="{{ route('pengurus') }}">Pengurus</a>
                </li>
                @endif
                @endif
                <li class="nav-item">
                    <a class="nav-link " href="#">Bantuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between profile" href="#">
                        <div data-bs-toggle="modal" data-bs-target="#profilemodal">
                            <img class="rounded-circle" src="{{ asset('storage/'.$profile->foto) }}" alt="profileImg" width="32px" />
                            <span class="ms-2"> {{ Auth::user()->username  }}</span>
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="logout" type="submit"><i class="las la-sign-out-alt" id="log_out"></i></button>
                        </form>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- SIDEBAR -->
<div class="sidebar sidebar-comp">
    <div class="logo-details">
        <i class="icon">
            <img src="{{ asset('img/logo.png') }}" alt="" width="28px" />
        </i>
        <div class="logo_name">
            <h2>SI TAHIR</h2>
            <h6>Sistem Informasi Tagihan Air</h6>
        </div>
        <i class="las la-bars" id="btn"></i>
    </div>
    <ul class="nav-list">
        <!-- for ANGGOTA user where instalasi belum selesai -->
        @if(Auth::user()->hasRole('anggota') and $instalasi->status != 'Selesai')
        <li class="{{ (request()->is('instalasi')) ? 'active' : '' }}">
            <a href="{{ route('instalasi') }}">
                <i class="las la-tools"></i>
                <span class="links_name">Instalasi</span>
            </a>
            <span class="tooltip">Instalasi</span>
        </li>
        @else
        <!-- for ALL user KECUALI anggota user where instalasi belum selesai-->
        <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">
                <i class="las la-home"></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>

        <!-- for ANGGOTA user -->
        @if(Auth::user()->hasRole('anggota'))
        <li class="{{ (request()->is('bukuair')) ? 'active' : '' }}">
            <a href="{{ route('bukuair') }}">
                <i class="las la-book"></i>
                <span class="links_name">Buku Air</span>
            </a>
            <span class="tooltip">Buku Air</span>
        </li>
        <li class="{{ (request()->is('ajukankeluhan')) ? 'active' : '' }}">
            <a href="{{ route('ajukankeluhan') }}">
                <i class="las la-comments"></i>
                <span class="links_name">Ajukan Keluhan</span>
            </a>
            <span class="tooltip">Ajukan Keluhan</span>
        </li>
        @endif

        <!-- for ADMIN user -->
        @if((Auth::user()->hasRole('admin')) or (Auth::user()->hasRole('pengurus')))
        <li class="{{ (request()->is('anggota')) ? 'active' : '' }}">
            <a href="{{ route('anggota') }}">
                <i class="las la-user"></i>
                <span class="links_name">Anggota</span>
            </a>
            <span class="tooltip">Anggota</span>
        </li>
        <li class="{{ (request()->is('bukuairanggota')) ? 'active' : '' }}">
            <a href="{{ route('bukuairanggota') }}">
                <i class="las la-tools"></i>
                <span class="links_name">Instalasi Anggota</span>
            </a>
            <span class="tooltip">Instalasi Anggota</span>
        </li>
        <li class="{{ (request()->is('instalasianggota')) ? 'active' : '' }}">
            <a href="{{ route('instalasianggota') }}">
                <i class="las la-book"></i>
                <span class="links_name">Buku Air Anggota</span>
            </a>
            <span class="tooltip">Buku Air Anggota</span>
        </li>
        <li class="{{ (request()->is('anggaranlistrik')) ? 'active' : '' }}">
            <a href="{{ route('anggaranlistrik') }}">
                <i class="las la-bolt"></i>
                <span class="links_name">Anggaran Listrik</span>
            </a>
            <span class="tooltip">Anggaran Listrik</span>
        </li>
        <li class="{{ (request()->is('tanggapikeluhan')) ? 'active' : '' }}">
            <a href="{{ route('tanggapikeluhan') }}">
                <i class="las la-comments"></i>
                <span class="links_name">Tanggapi Keluhan</span>
            </a>
            <span class="tooltip">Tanggapi Keluhan</span>
        </li>
        <li class="{{ (request()->is('pengumuman')) ? 'active' : '' }}">
            <a href="{{ route('pengumuman') }}">
                <i class="las la-bullhorn"></i>
                <span class="links_name">Pengumuman</span>
            </a>
            <span class="tooltip">Pengumuman</span>
        </li>
        <li class="{{ (request()->is('tarif')) ? 'active' : '' }}">
            <a href="{{ route('tarif') }}">
                <i class="las la-tags"></i>
                <span class="links_name">Tarif</span>
            </a>
            <span class="tooltip">Tarif</span>
        </li>
        @endif

        <!-- for PENGURUS user -->
        @if(Auth::user()->hasRole('pengurus'))
        <li class="{{ (request()->is('pengurus')) ? 'active' : '' }}">
            <a href="{{ route('pengurus') }}">
                <i class="las la-user-tie"></i>
                <span class="links_name">Pengurus</span>
            </a>
            <span class="tooltip">Pengurus</span>
        </li>
        @endif
        @endif

        <!-- for ALL user -->
        <li>
            <a href="#">
                <i class="las la-question-circle"></i>
                <span class="links_name">Bantuan</span>
            </a>
            <span class="tooltip">Bantuan</span>
        </li>
        <li class="profile">
            <div class="profile-details" data-bs-toggle="modal" data-bs-target="#profilemodal">
                <img src="{{ asset('storage/'.$profile->foto) }}" alt="profileImg" />
                <div class="name_job">
                    <div class="name">{{ Auth::user()->username }}</div>
                    <div class="job">{{ $profile->nowa }}</div>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"><i class="las la-sign-out-alt" id="log_out"></i></button>
            </form>
        </li>
    </ul>
</div>

<!-- PROFILE MODAL -->
<div class="modal fade" id="profilemodal" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="10" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content shadow-lg p-3 mb-5 bg-body rounded">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pengaturan Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <h6 class="border-3 border-p mt-2">Profile</h6>
                        </div>
                        <div class="col-sm-10">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                            @endif
                            <form action="{{ route('dashboard.myprofile', $profile->user->username) }}" method="POST" id="formProfile" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-2 row">
                                    <label for="foto" class="col-sm-4 col-form-label label-modal">Foto</label>
                                    <div class="col-sm-8">
                                        <img src="{{ asset('storage/'.$profile->foto) }}" alt="" width="80" height="80" id="preImg" class="rounded">
                                        <input type="file" class="form-control form-control-sm" id="foto" name="foto">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="nama" class="col-sm-4 col-form-label label-modal">Nama</label>
                                    <div class="col-sm-8">
                                        <input type="name" class="form-control form-control-sm" id="nama" name="nama" maxlength="50" required value="{{ $profile->nama }}">
                                    </div>
                                </div>
                                <div class="mb-2 row d-flex align-items-center">
                                    <label for="nowa" class="col-sm-4 col-form-label">No Whatsapp</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="nowa" name="nowa" maxlength="20" required value="{{ $profile->nowa }}">
                                    </div>
                                </div>
                                <div class="mb-2 row d-flex align-items-center">
                                    <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" maxlength="50" required value="{{ $profile->alamat }}">
                                    </div>
                                </div>
                                @if(Auth::user()->hasRole('pengurus'))
                                <div class="mb-2 row d-flex align-items-center">
                                    <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext form-control-sm" id="jabatan" name="jabatan" value="{{ $profile->jabatan }}" readonly>
                                    </div>
                                </div>
                                @endif
                                @if(Auth::user()->hasRole('anggota'))
                                <div class="mb-2 row d-flex align-items-center">
                                    <label for="tgl_gabung" class="col-sm-4 col-form-label">Tanggal Gabung</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext form-control-sm" id="tgl_gabung" name="tgl_gabung" value="{{ $profile->tgl_gabung }}" readonly>
                                    </div>
                                </div>
                                @endif

                                <div class="mb-5">
                                    <div class="form-check d-flex justify-content-end mb-2">
                                        <input type="checkbox" id="checkChangeCredentials" name='checkChangeCredentials' data-bs-toggle="collapse" data-bs-target="#changeCredentials" aria-expanded="false" aria-controls="collapseCredentials" style="display: none;">
                                        <label for="checkChangeCredentials">
                                            Change Credentials
                                        </label>
                                    </div>
                                    <div class="collapse" id="changeCredentials">
                                        <div class="mb-2 row">
                                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control form-control-sm" id="email" name="email" required value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>
                                        <div class="mb-2 row d-flex align-items-center">
                                            <label for="username" class="col-sm-4 col-form-label">Username</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="username" name="username" required value="{{ Auth::user()->username }}">
                                            </div>
                                        </div>

                                        <div class="mb-2 row d-flex align-items-center">
                                            <label for="current_password" class="col-sm-4 col-form-label">Current Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control form-control-sm" id="current_password" name="current_password">
                                            </div>
                                        </div>
                                        <div class="mb-2 row d-flex align-items-center">
                                            <label for="newpassword" class="col-sm-4 col-form-label">New Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control form-control-sm" id="newpassword" name="newpassword">
                                            </div>
                                        </div>
                                        <div class="mb-2 row d-flex align-items-center">
                                            <label for="password_confirmation" class="col-sm-4 col-form-label">Password Confirmation</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control form-control-sm" id="newpassword_confirmation" name="newpassword_confirmation">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 row d-flex justify-content-end">
                                    <div class="col-sm-3 text-end">
                                        <input class="btn btn-outline-p" type="submit" name="submitProfile" id="submitProfile" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>