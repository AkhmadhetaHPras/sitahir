<x-app-layout>
    <div class="pengumuman">
        <p class="judul">Daftar Pengumuman</p><br>
        <div class="daftar">
          <button 
            type="button" 
            class="btn tambah" 
            data-bs-toggle="modal" 
            data-bs-target="#tambah"
            >
            Tambah Pengumuman
            </button>
          <br><br>
          <table class="table table-bordered">
            <tr class="header">
              <td>JUDUL</td>
              <td>FILE</td>
              <td width="400px" >AKSI</td>
            </tr>
    
            <tr class="content">
              <td>Batas Pembayaran Tanggal 10-24</td>
              <td><a href="#">preview</a></td>
              <td>
                <form>
                  <button 
                    type="button" 
                    class="btn btn-warning" 
                    data-bs-toggle="modal" 
                    data-bs-target="#detail"
                    >
                    DETAILS
                  </button>&emsp;&emsp;
                  <button 
                    type="button" 
                    class="btn edit" 
                    data-bs-toggle="modal" 
                    data-bs-target="#edit"
                    >
                    EDIT
                  </button>&emsp;&emsp;
                  <button class="btn btn-danger">DELETE</button>
                </form>
              </td>
            </tr>
          </table>
        </div>
      </div>

      {{-- MODAL --}}
      <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body detail-m">
              <button type="button" class="btn-close ext" data-bs-dismiss="modal" aria-label="Close"></button>
              <br>
              <h5 class="modal-title modal-judul" id="exampleModalLabel">DETAIL PENGUMUAMAN</h5><br>
              <h6 class="content-detail">JUDUL PENGUMUMAN</h6>
              <p class="detail-p">Surat Undangan Rapat 10 Juli</p>
              <h6 class="content-detail">ISI PENGUMUAM</h6>
              <textarea 
                class="form-control detail-p" 
                rows="3"
                >Untuk keamaman dan menghindari isolir layanan, lakukan pembayaran pada tanggal 10-20
              </textarea>
              <br>
              <h6 class="content-detail">FILE</h6>
              <a class="detail-p" href="">Undangan Rapat 10 Juli.pdf</a>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body edit-m">
              <button type="button" class="btn-close ext" data-bs-dismiss="modal" aria-label="Close"></button>
              <br>
              <h5 class="modal-title modal-judul" id="exampleModalLabel">EDIT PENGUMUAMN</h5><br>
              <h6 class="content-detail">JUDUL PENGUMUMAN</h6>
              <p class="detail-p">Surat Undangan Rapat 10 Juli</p>
              <h6 class="content-detail">ISI PENGUMUAM</h6>
              <textarea 
                class="form-control detail-p" 
                rows="3"
                >Untuk keamaman dan menghindari isolir layanan, lakukan pembayaran pada tanggal 10-20
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

      <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
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