<x-app-layout>
    <div class="container-fluid anggota">
        <div class="row">
            <h5 class="buku-air-title mb-3 ps-0">
                <span class="border-3 border-bottom border-primary">Daftar Pengurus</span>
            </h5>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{!! $message !!}</p>
            </div>
            @endif
            <button type="button" class="btn tambah mb-3 mt-4 col-md-3 col-sm-4 col-12" data-bs-toggle="modal" data-bs-target="#tambah">
                Tambah Pengurus
            </button>
            <br><br>
            <table class="table table-bordered">
                <tr class="header">
                    <td>ID</td>
                    <td>NAMA PENGURUS</td>
                    <td>JABATAN</td>
                    <td width="300px">AKSI</td>
                </tr>

                @foreach ($paginate as $p)
                <tr class="content">
                    <td>{{ $p ->id }}</td>
                    <td>{{ $p ->nama }}</td>
                    <td>{{ $p ->jabatan }}</td>
                    <td>
                        <form action="{{ route('pengurus.destroy', $p->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-warning me-1" data-bs-toggle="modal" data-bs-target="#detail{{$p->id}}">
                                DETAIL
                            </button>
                            <button type="button" class="btn edit me-1" data-bs-toggle="modal" data-bs-target="#edit{{$p->id}}">
                                EDIT
                            </button>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
                <!-- modal detail -->
                <div class="modal fade" id="detail{{$p->id}}" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="10" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content shadow-lg p-3 mb-5 bg-body rounded">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Detil Pengurus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <h6 class="border-3 border-p mt-2">Profil</h6>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="mb-2 row">
                                                <label for="foto" class="col-sm-4 col-form-label label-modal">Foto</label>
                                                <div class="col-sm-8">
                                                    <img src="{{ asset('storage/'.$p->foto) }}" alt="" width="80" height="80" id="preImg" class="rounded">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="nama" class="col-sm-4 col-form-label label-modal">Nama</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control-plaintext form-control-sm" value="{{ $p->nama }}" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-2 row d-flex align-items-center">
                                                <label for="nowa" class="col-sm-4 col-form-label">No Whatsapp</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control-plaintext form-control-sm" value="{{ $p->nowa }}" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-2 row d-flex align-items-center">
                                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control-plaintext form-control-sm" value="{{ $p->alamat }}" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-2 row d-flex align-items-center">
                                                <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control-plaintext form-control-sm" name="jabatan" value="{{ $p->jabatan }}" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control-plaintext form-control-sm" value="{{$p->user->email}}" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-2 row d-flex align-items-center">
                                                <label for="username" class="col-sm-4 col-form-label">Username</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control-plaintext form-control-sm" value="{{$p->user->username}}" readonly>
                                                </div>
                                            </div>
                                            <div class="mt-2 row d-flex justify-content-end">
                                                <div class="col-sm-3 text-end">
                                                    <button type="button" class="btn btn-outline-p" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal edit -->
                <div class="modal fade" id="edit{{$p->id}}" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="10" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content shadow-lg p-3 mb-5 bg-body rounded">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Pengurus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <h6 class="border-3 border-p mt-2">Profil</h6>
                                        </div>
                                        <div class="col-sm-10">
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <strong>Whoops!</strong> Ada beberapa masalah dengan input.<br><br>
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
                                            <form action="{{ route('pengurus.update', $p->user->id) }}" method="POST" id="formProfile" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-2 row">
                                                    <label for="foto" class="col-sm-4 col-form-label label-modal">Foto</label>
                                                    <div class="col-sm-8">
                                                        <img src="{{ asset('storage/'.$p->foto) }}" alt="" width="80" height="80" id="preImg" class="rounded">
                                                        <input type="file" class="form-control form-control-sm" id="foto" name="foto">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label for="nama" class="col-sm-4 col-form-label label-modal">Nama</label>
                                                    <div class="col-sm-8">
                                                        <input type="name" class="form-control form-control-sm" id="nama" name="nama" maxlength="50" required value="{{$p->nama}}">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row d-flex align-items-center">
                                                    <label for="nowa" class="col-sm-4 col-form-label">No Whatsapp</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control form-control-sm" id="nowa" name="nowa" maxlength="20" required value="{{$p->nowa}}">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row d-flex align-items-center">
                                                    <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" maxlength="50" required value="{{$p->alamat}}">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row d-flex align-items-center">
                                                    <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control-plaintext form-control-sm" id="jabatan" name="jabatan" value="{{$p->jabatan}}">
                                                    </div>
                                                </div>

                                                <div class="mb-5">
                                                    <div class="form-check d-flex justify-content-end mb-2">
                                                        <input type="checkbox" id="checkChangeCredentialsEditPengurus{{$p->id}}" name='checkChangeCredentialsEditPengurus' data-bs-toggle="collapse" data-bs-target="#changeCredentialsEditAnggota{{$p->id}}" aria-expanded="false" aria-controls="collapseCredentials" style="display: none;">
                                                        <label for="checkChangeCredentialsEditPengurus{{$p->id}}">
                                                            Change Credentials
                                                        </label>
                                                    </div>
                                                    <div class="collapse" id="changeCredentialsEditAnggota{{$p->id}}">
                                                        <div class="mb-2 row">
                                                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                                                            <div class="col-sm-8">
                                                                <input type="email" class="form-control form-control-sm" id="email" name="email" required value="{{$p->user->email}}">
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row d-flex align-items-center">
                                                            <label for="username" class="col-sm-4 col-form-label">Username</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control form-control-sm" id="username" name="username" required value="{{$p->user->username}}">
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
                @endforeach
            </table>
            {!! $paginate->links() !!}
        </div>

        <!-- modal tambah -->
        <div class="modal fade" id="tambah" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="10" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Pengurus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
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
                                    <form action="{{ route('pengurus.store') }}" method="POST" id="formProfile">
                                        @csrf
                                        @method('POST')
                                        <div class="mb-2 row">
                                            <label for="nama" class="col-sm-4 col-form-label label-modal">Nama</label>
                                            <div class="col-sm-8">
                                                <input type="name" class="form-control form-control-sm" id="nama" name="nama" maxlength="50" required value="">
                                            </div>
                                        </div>
                                        <div class="mb-2 row d-flex align-items-center">
                                            <label for="nowa" class="col-sm-4 col-form-label">No Whatsapp</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="nowa" name="nowa" maxlength="20" required value="">
                                            </div>
                                        </div>
                                        <div class="mb-2 row d-flex align-items-center">
                                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" maxlength="50" required value="">
                                            </div>
                                        </div>
                                        <div class="mb-2 row d-flex align-items-center">
                                            <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" id="jabatan" name="jabatan" maxlength="50" required value="">
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <div class="" id="">
                                                <div class="mb-2 row">
                                                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control form-control-sm" id="email" name="email" required value="">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row d-flex align-items-center">
                                                    <label for="username" class="col-sm-4 col-form-label">Username</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control form-control-sm" id="username" name="username" required value="">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row d-flex align-items-center">
                                                    <label for="newpassword" class="col-sm-4 col-form-label">Password</label>
                                                    <div class="col-sm-8">
                                                        <input type="password" class="form-control form-control-sm" id="password" name="password">
                                                    </div>
                                                </div>
                                                <div class="mb-2 row d-flex align-items-center">
                                                    <label for="password_confirmation" class="col-sm-4 col-form-label">Password Confirmation</label>
                                                    <div class="col-sm-8">
                                                        <input type="password" class="form-control form-control-sm" id="password_confirmation" name="password_confirmation">
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
</x-app-layout>