<x-app-layout>
  <div class="transaksi-ins">
    <!-- navigation keluhan -->
    <ul class="nav-keluhan nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <a id="pills-baru-tab" data-bs-toggle="pill" data-bs-target="#pills-baru" type="button" role="tab" aria-controls="pills-baru">Instalasi Baru</a>
      </li>
      <li class="nav-item" role="presentation">
        <a id="pills-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending">Pending</a>
      </li>
      <li class="nav-item" role="presentation">
        <a id="pills-lunas-tab" data-bs-toggle="pill" data-bs-target="#pills-lunas" type="button" role="tab" aria-controls="pills-lunas">Lunas</a>
      </li>
      <li class="nav-item" role="presentation">
        <a id="pills-pasang-tab" data-bs-toggle="pill" data-bs-target="#pills-pasang" type="button" role="tab" aria-controls="pills-pasang">Pemasangan</a>
      </li>
      <li class="nav-item" role="presentation">
        <a id="pills-selesai-tab" data-bs-toggle="pill" data-bs-target="#pills-selesai" type="button" role="tab" aria-controls="pills-selesai">Selesai</a>
      </li>
    </ul>

    <!-- konten keluhan -->
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active row" id="pills-baru" role="tabpanel" aria-labelledby="baru-tab">
        @if(Auth::user()->hasRole('admin'))
        <div>
          <button type="button" class="btn baru" data-bs-toggle="modal" data-bs-target="#tambah">
            Tambah Baru
          </button>
          <br><br>
        </div>
        @endif
        <div>
          <div class="col-md-7 col-sm-12 col-12 ins-baru">
            <h5 class="content1"><b>Muhammad Sadani</b></h5>
            <p class="content2">
              Jl.Melati No.25 RT 03, RW 01
            </p>
            <hr size="4" width="250" />
            <button type="button" class="btn btn-ins" data-bs-toggle="modal" data-bs-target="#ins">
              Instalasi
            </button>
            <p class="content3">Lakukan survey lokasi pada 13 Maret 2022 pukul 13.00 WIB</p>
          </div>
        </div>
      </div>

      <div class="tab-pane fade row" id="pills-pending" role="tabpanel" aria-labelledby="pending-tab">
        <div>
          <div class="col-md-7 col-sm-12 col-12 pending">
            <h5 class="content1"><b>Muhammad Sadani</b></h5>
            <p class="content2">
              Jl.Melati No.25 RT 03, RW 01
            </p>
            <hr size="4" width="250" />
            <button class="btn btn-danger batal" type="button">Batalkan</button>
            <button class="btn me-md-2 edit" type="button">Edit</button>
            <p class="content3">Rp 170.000</p>
          </div>
        </div>
      </div>

      <div class="tab-pane fade row" id="pills-lunas" role="tabpanel" aria-labelledby="lunas-tab">
        <div>
          <div class="col-md-7 col-sm-12 col-12 lunas">
            <h5 class="content1"><b>Muhammad Sadani</b></h5>
            <p class="content2">
              Jl.Melati No.25 RT 03, RW 01
            </p>
            <hr size="4" width="250" />
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#jadwal">
              Jadwalkan
            </button>
            <p class="content3">Lakukan penjadwalan untuk pemasangan</p>
          </div>
        </div>
      </div>

      <div class="tab-pane fade row" id="pills-pasang" role="tabpanel" aria-labelledby="pasang-tab">
        <div>
          <div class="col-md-7 col-sm-12 col-12 pasang">
            <h5 class="content1"><b>Muhammad Sadani</b></h5>
            <p class="content2">
              Jl.Melati No.25 RT 03, RW 01
            </p>
            <hr size="4" width="250" />
            <p class="content3">Segera lakukan instalasi baru pada 13 maret</p>
          </div>
        </div>

      </div>

      <div class="tab-pane fade row" id="pills-selesai" role="tabpanel" aria-labelledby="selesai-tab">
        <div>
          <div class="col-md-7 col-sm-12 col-12 selesai">
            <h5 class="content1"><b>Muhammad Sadani</b></h5>
            <h5 class="content-selesai1">10 MAR 2022</h5>
            <p class="content2">
              Jl.Melati No.25 RT 03, RW 01
            </p>
            <hr size="4" width="250" />
            <h5 class="content-selesai2">15 MAR 2022</h5>
            <p class="content3">Pemasangan telah dilakukan</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="jadwal" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Jadwal Pemasangan Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body jadwal-m">
          <p>Tanggal Pemasangan</p>
          <div class="col-sm-7">
            <input type="datetime-local" class="form-control"><br>
          </div>
          <center><button type="submit" class="btn btn-send">KIRIM</button></center>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Jadwal Survey Instalasi Anggota Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body tambah-m">
          <p>Anggota Baru</p>
          <div class="col-sm-7 mb-2">
            <select class="form-select">
              <option>Muhammad Sadani</option>
              <option>Muhammad Sadani</option>
              <option>Muhammad Sadani</option>
              <option>Muhammad Sadani</option>
            </select>
          </div>
          <p>Tanggal Survey</p>
          <div class="col-sm-7">
            <input type="datetime-local" class="form-control"><br>
          </div>
          <center><button type="submit" class="btn btn-send">KIRIM</button></center>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="ins" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Formulir Instalasi Alat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ins-m">
          <p class="nama">Muhammad Sadani</p>
          <p class="isi"> </p>
          <div class="row g-3">

            <div class="col-sm-5">
              <label class="isi">Nama Barang</label>
            </div>
            <div class="col-sm-3">
              <label class="isi">Jumlah</label>
            </div>
            <div class="col-sm-4">
              <label class="isi">Harga</label>
            </div>
          </div>
          <br>

          <form class="" id="add_form">

            <div id="show_item">
              <div class="row g-3 mb-2">
                <div class="col-sm-4">
                  <input type="text" class="form-control nama-isi" placeholder="eg : Meteran Air" name="nama_barang">
                </div>
                <div class="col-sm-2">
                  <input type="number" class="form-control" name="jumlah">
                </div>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="harga_satuan">
                </div>
                <div class="col">
                  <i class="las la-plus-circle float-end add_item_btn" style="font-size: 2rem;"></i>
                </div>
              </div>
            </div>

            <br><br>
            <p class="price">Total Biaya</p>
            <button type="submit" class="btn btn-kirim" id="add_btn">KIRIM</button>
            <p class="price">Rp.0</p>

          </form>

        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script>
    $(document).ready(function() {

      $(".add_item_btn").click(function(e) {
        e.preventDefault();
        $("#show_item").prepend(`
                        <div class="row g-3 mb-2 append_item">
                            <div class="col-sm-4">
                                <input type="text" class="form-control nama-isi" placeholder="eg : Meteran Air" name="nama_barang">
                            </div>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" name="jumlah">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="harga_satuan">
                            </div>
                            <div class="col">
                                <i class="las la-minus-circle float-end remove_item_btn" style="font-size: 2rem;"></i>
                            </div>
                        </div>
                    `);
      });

      $(document).on('click', '.remove_item_btn', function(e) {
        e.preventDefault();
        let row_item = $(this).parent().parent();
        $(row_item).remove();
      });

      // ajax request to insert all form data
      $("#add_form").submit(function(e) {
        e.preventDefault();
        $("#add_btn").val('adding...');
        // $.ajax({
        //     url: 'action.php',
        //     method: 'POST', 
        //     data: $(this).serialize(),
        //     success: function(response) {
        //         $("#add_btn").val('Add');
        //         $("#add_form")[0].reset();
        //         $(".append_item").remove():
        //     }
        // });
      });

    });
  </script>
</x-app-layout>