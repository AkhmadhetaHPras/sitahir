<x-app-layout>
  <div class="container-fluid anggota">
    <div class="row">
      <h5 class="buku-air-title mb-3 ps-0">
        <span class="border-3 border-bottom border-primary">Daftar Anggota</span>
      </h5>
      <button type="button" class="btn tambah mb-3 mt-4 col-md-3 col-sm-4 col-12" data-bs-toggle="modal" data-bs-target="#tambah">
        Tambah Anggota
      </button>
      <br><br>

      <table class="table table-bordered">
        <tr class="header">
          <td>NAMA ANGGOTA</td>
          <td>ALAMAT</td>
          <td width="300px"></td>
        </tr>
        
        @foreach ($paginate as $ang)
        <tr class="content">
        <td>{{ $ang ->nama }}</td>
        <td>{{ $ang ->alamat }}</td>
          <!-- <td>Ahmad Rafif Alaudin</td>
          <td>Jalam Anggraini RT 08/RW 02</td> -->
          <td>
            <form>
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#detail">
                DETAILS
              </button>&emsp;
              <button type="button" class="btn edit" data-bs-toggle="modal" data-bs-target="#edit">
                EDIT
              </button>&emsp;
              <button class="btn btn-danger">DELETE</button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
      {!! $paginate->links() !!}
    </div>

    <!-- modal tambah -->
    <div class="modal fade" id="tambah" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="10" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content shadow-lg p-3 mb-5 bg-body rounded">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Edit Anggota</h5>
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
                  <form action="" method="POST" id="formProfile" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-2 row">
                      <label for="foto" class="col-sm-4 col-form-label label-modal">Foto</label>
                      <div class="col-sm-8">
                        <img src="{{ asset('storage/img/profile/default.png') }}" alt="" width="80" height="80" id="preImg" class="rounded">
                        <input type="file" class="form-control form-control-sm" id="foto" name="foto">
                      </div>
                    </div>
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
                      <label for="tgl_gabung" class="col-sm-4 col-form-label">Tanggal Gabung</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control-plaintext form-control-sm" id="tgl_gabung" name="tgl_gabung" value="" readonly>
                      </div>
                    </div>

                    <div class="mb-5">
                      <div class="form-check d-flex justify-content-end mb-2">
                        <input type="checkbox" id="checkChangeCredentialsTambahAnggota" name='checkChangeCredentialsTambahAnggota' data-bs-toggle="collapse" data-bs-target="#changeCredentialsTambahAnggota" aria-expanded="false" aria-controls="collapseCredentials" style="display: none;">
                        <label for="checkChangeCredentialsTambahAnggota">
                          Change Credentials
                        </label>
                      </div>
                      <div class="collapse" id="changeCredentialsTambahAnggota">
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

    <!-- modal edit -->
    <div class="modal fade" id="edit" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="10" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content shadow-lg p-3 mb-5 bg-body rounded">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Edit Anggota</h5>
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
                  <form action="" method="POST" id="formProfile" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-2 row">
                      <label for="foto" class="col-sm-4 col-form-label label-modal">Foto</label>
                      <div class="col-sm-8">
                        <img src="{{ asset('storage/img/profile/default.png') }}" alt="" width="80" height="80" id="preImg" class="rounded">
                        <input type="file" class="form-control form-control-sm" id="foto" name="foto">
                      </div>
                    </div>
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
                      <label for="tgl_gabung" class="col-sm-4 col-form-label">Tanggal Gabung</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control-plaintext form-control-sm" id="tgl_gabung" name="tgl_gabung" value="" readonly>
                      </div>
                    </div>

                    <div class="mb-5">
                      <div class="form-check d-flex justify-content-end mb-2">
                        <input type="checkbox" id="checkChangeCredentialsEditAnggota" name='checkChangeCredentialsEditAnggota' data-bs-toggle="collapse" data-bs-target="#changeCredentialsEditAnggota" aria-expanded="false" aria-controls="collapseCredentials" style="display: none;">
                        <label for="checkChangeCredentialsEditAnggota">
                          Change Credentials
                        </label>
                      </div>
                      <div class="collapse" id="changeCredentialsEditAnggota">
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

    <!-- modal detail -->
    <div class="modal fade" id="detail" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="10" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content shadow-lg p-3 mb-5 bg-body rounded">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Detil Anggota</h5>
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
                      <img src="{{ asset('storage/img/profile/default.png') }}" alt="" width="80" height="80" id="preImg" class="rounded">
                    </div>
                  </div>
                  <div class="mb-2 row">
                    <label for="nama" class="col-sm-4 col-form-label label-modal">Nama</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control-plaintext form-control-sm" value="asdda" readonly>
                    </div>
                  </div>
                  <div class="mb-2 row d-flex align-items-center">
                    <label for="nowa" class="col-sm-4 col-form-label">No Whatsapp</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control-plaintext form-control-sm" value="asdda" readonly>
                    </div>
                  </div>
                  <div class="mb-2 row d-flex align-items-center">
                    <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control-plaintext form-control-sm" value="asdda" readonly>
                    </div>
                  </div>
                  <div class="mb-2 row d-flex align-items-center">
                    <label for="tgl_gabung" class="col-sm-4 col-form-label">Tanggal Gabung</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control-plaintext form-control-sm" id="tgl_gabung" name="tgl_gabung" value="asda" readonly>
                    </div>
                  </div>
                  <div class="mb-2 row">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control-plaintext form-control-sm" value="asdda" readonly>
                    </div>
                  </div>
                  <div class="mb-2 row d-flex align-items-center">
                    <label for="username" class="col-sm-4 col-form-label">Username</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control-plaintext form-control-sm" value="asdda" readonly>
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
</x-app-layout>