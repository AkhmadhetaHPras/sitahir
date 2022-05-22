<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white navbar-phone" style="display: none;">
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
                <li class="nav-item">
                    <a class="nav-link active" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ajukan Keluhan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Bantuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Instalasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between profile" href="#">
                        <div data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <img class="rounded-circle" src="{{ asset('img/profile.jpg') }}" alt="profileImg" width="32px" />
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
            <img src="../img/logo.png" alt="" width="28px" />
        </i>
        <div class="logo_name">
            <h2>SI TAHIR</h2>
            <h6>Sistem Informasi Tagihan Air</h6>
        </div>
        <i class="las la-bars" id="btn"></i>
    </div>
    <ul class="nav-list">
        <!-- for ALL user -->
        <li class="active">
            <a href="#">
                <i class="las la-home"></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>

        <!-- for ANGGOTA user -->
        <li>
            <a href="bukuair.html">
                <i class="las la-book"></i>
                <span class="links_name">Buku Air</span>
            </a>
            <span class="tooltip">Buku Air</span>
        </li>
        <li>
            <a href="ajukankeluhan.html">
                <i class="las la-comments"></i>
                <span class="links_name">Ajukan Keluhan</span>
            </a>
            <span class="tooltip">Ajukan Keluhan</span>
        </li>
        <li>
            <a href="#">
                <i class="las la-question-circle"></i>
                <span class="links_name">Bantuan</span>
            </a>
            <span class="tooltip">Bantuan</span>
        </li>
        <li>
            <a href="instalasi.html">
                <i class="las la-tools"></i>
                <span class="links_name">Instalasi</span>
            </a>
            <span class="tooltip">Instalasi</span>
        </li>

        <li class="profile">
            <div class="profile-details" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <img src="{{ asset('img/profile.jpg') }}" alt="profileImg" />
                <div class="name_job">
                    <div class="name">{{ Auth::user()->username }}</div>
                    <div class="job">{{ $profile->jabatan }}</div>
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
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="10" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pengaturan Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="border-3 border-p mt-2">Profile</h6>
                        </div>
                        <div class="col-sm-9">
                            <form action="" method="POST" id="form" enctype="multipart/form-data">
                                <div class="mb-2 row">
                                    <label for="myImage" class="col-sm-3 col-form-label label-modal">Foto</label>
                                    <div class="col-sm-9">
                                        <img src="{{ asset('img/profile.jpg') }}" alt="" width="80" height="80" id="preImg" class="rounded">
                                        <input type="file" class="form-control form-control-sm" id="myImage" name="myImage" required>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="nama" class="col-sm-3 col-form-label label-modal">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="name" class="form-control form-control-sm" id="nama" name="nama" maxlength="50" required value="">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="tgl-lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control form-control-sm" id="tgl-lahir" name="tgl-lahir" required value="">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control form-control-sm" id="email" name="email" maxlength="50" required value="">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="nohp" class="col-sm-3 col-form-label">No HP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" id="nohp" name="nohp" maxlength="20" required value="">
                                    </div>
                                </div>
                                <div class="mb-5" id="pesan">

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