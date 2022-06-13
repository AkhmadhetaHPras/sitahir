<x-app-layout>
  <div class="container-fluid pengumuman">
    <div class="row">
      <h5 class="buku-air-title mb-3 ps-0">
        <span class="border-3 border-bottom border-primary">Pengumuman</span>
      </h5>
      @if(Auth::user()->hasRole('admin'))
      <button type="button" class="btn tambah mb-3 mt-4 col-md-3 col-sm-4 col-12" data-bs-toggle="modal" data-bs-target="#tambahpengumuman">
        Tambah Pengumuman
      </button>
      @endif
      <br><br>
      <table class="table table-bordered">
        <tr class="header">
          <td>JUDUL</td>
          <td>FILE</td>
          <td width="400px">AKSI</td>
        </tr>
        @foreach ($paginate as $pg)
        <tr class="content">
          <td>{{ $pg ->judul }}</td>
          <td><a href='#'>{{ $pg ->file }}</a></td>
          <td>
            <form class="text-start">
              <button type="button" class="btn btn-warning me-1" data-bs-toggle="modal" data-bs-target="#detailpengumuman">
                DETAIL
              </button>
              @if(Auth::user()->hasRole('admin'))
              <button type="button" class="btn edit me-1" data-bs-toggle="modal" data-bs-target="#editpengumuman">
                EDIT
              </button>
              <button class="btn btn-danger">HAPUS</button>
              @endif
            </form>
          </td>
        </tr>
        @endforeach
      </table>
      {!! $paginate->links() !!}
    </div>
  </div>

  <div class="modal fade" id="detailpengumuman" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body detail-m">
          <button type="button" class="btn-close ext" data-bs-dismiss="modal" aria-label="Close"></button>
          <br>
          <h5 class="modal-title modal-judul" id="exampleModalLabel">DETAIL PENGUMUAMAN</h5><br>
          <h6 class="content-detail">JUDUL PENGUMUMAN</h6>
          <p class="detail-p">Surat Undangan Rapat 10 Juli</p>
          <h6 class="content-detail">ISI PENGUMUAM</h6>
          <textarea class="form-control detail-p" rows="3"></textarea>
          <br>
          <h6 class="content-detail">FILE</h6>
          <a class="detail-p" href="">Undangan Rapat 10 Juli.pdf</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editpengumuman" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body edit-m">
          <button type="button" class="btn-close ext" data-bs-dismiss="modal" aria-label="Close"></button>
          <br>
          <h5 class="modal-title modal-judul" id="exampleModalLabel">EDIT PENGUMUAMN</h5><br>
          <h6 class="content-detail">JUDUL PENGUMUMAN</h6>
          <p class="detail-p">Surat Undangan Rapat 10 Juli</p>
          <h6 class="content-detail">ISI PENGUMUAM</h6>
          <textarea class="form-control detail-p" rows="3">Untuk keamaman dan menghindari isolir layanan, lakukan pembayaran pada tanggal 10-20
              </textarea>
          <br>
          <h6 class="content-detail">FILE</h6>
          <a class="detail-p" href="">Undangan Rapat 10 Juli.pdf</a>
          <button class="btn btn-edit">EDIT</button>
          <div class="col-sm-4">
            <input class="form-control" type="file" id="formFile">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="tambahpengumuman" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body tambah-m">
          <button type="button" class="btn-close ext" data-bs-dismiss="modal" aria-label="Close"></button>
          <br>
          <h5 class="modal-title modal-judul" id="exampleModalLabel">TAMBAH PENGUMUMAN</h5><br>
          <h6 class="content-detail">JUDUL PENGUMUMAN</h6>
          <div class="col-sm-8">
            <input type="text" class="form-control">
          </div>
          <br>
          <h6 class="content-detail">ISI PENGUMUAM</h6>
          <textarea class="form-control detail-p" rows="3"></textarea>
          <br>
          <h6 class="content-detail">FILE</h6>
          <button class="btn btn-edit">EDIT</button>
          <div class="col-sm-4">
            <input class="form-control" type="file" id="formFile">
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>