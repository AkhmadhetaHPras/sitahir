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

    <!-- konten instalasi -->
    <div class="tab-content" id="myTabContent">
      <!-- Baru -->
      <div class="tab-pane fade show active row" id="pills-baru" role="tabpanel" aria-labelledby="baru-tab">
        @if ($message = Session::get('barusuccess'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif
        @if($baru->isEmpty())
        <p class="text-secondary">Tidak ada data instalasi baru</p>
        @else
        @foreach($baru as $i)
        <div class="mb-2">
          <div class="col-md-7 col-sm-12 col-12 ins-baru">
            <h5 class="content1"><b>{{ $i->anggota->nama }}</b></h5>
            <p class="content2">
              {{ $i->anggota->alamat }}
            </p>
            <hr size="4" width="250" />
            <button type="button" class="btn btn-ins" data-bs-toggle="modal" data-bs-target="#ins{{$i->id}}">
              Instalasi
            </button>
            <p class="content3">Lakukan survey lokasi pada {{ Carbon\Carbon::parse($i->tgl_survey)->format('d M Y') }} pukul {{ Carbon\Carbon::parse($i->tgl_survey)->format('H:i') }} WIB</p>
          </div>
        </div>
        <!-- modal instalasi -->
        <div class="modal fade" id="ins{{$i->id}}" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulir Instalasi Alat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body ins-m">
                <p class="nama">{{ $i->anggota->nama }}</p>
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
                    <input type="hidden" name="idanggota" value="{{$i->anggota->id}}">
                    <div class="row g-3 mb-2">
                      <div class="col-sm-4">
                        <input type="text" class="form-control nama-isi" placeholder="eg : Meteran Air" name="nama_barang[]" required>
                      </div>
                      <div class="col-sm-2">
                        <input type="number" class="form-control" name="jumlah[]" min='1' required>
                      </div>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="harga_satuan[]" required>
                      </div>
                      <div class="col">
                        <i class="las la-plus-circle float-end add_item_btn" style="font-size: 2rem;"></i>
                      </div>
                    </div>
                  </div>
                  <br><br>
                  <p class="price"></p>
                  <button type="submit" class="btn btn-kirim" id="add_btn">KIRIM</button>
                  <p class="price"></p>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>

      <!-- Pending -->
      <div class="tab-pane fade row" id="pills-pending" role="tabpanel" aria-labelledby="pending-tab">
        @if ($message = Session::get('pendingsuccess'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif
        @if($pending->isEmpty())
        <p class="text-secondary">Tidak ada data instalasi pending</p>
        @else
        @foreach($pending as $i)
        <div class="mb-2">
          <div class="col-md-7 col-sm-12 col-12 pending">
            <h5 class="content1"><b>{{ $i->anggota->nama }}</b></h5>
            <p class="content2">
              {{ $i->anggota->alamat }}
            </p>
            <hr size="4" width="250" />
            <form action="{{ route('instalasianggota.batalkan', $i->anggota->id) }}" method="POST">
              @csrf
              @method('delete')
              <input class="btn btn-danger batal" type="submit" value="Batalkan">
            </form>
            <form action="{{ route('instalasianggota.checkout', $i->anggota->id) }}" method="POST">
              @csrf
              @method('put')
              <input type="submit" class="btn me-md-2 edit" value="Bayar">
            </form>
            <p class="content3">Rp. {{ number_format($i->tarif_instalasi) }}</p>
          </div>
        </div>
        @endforeach
        @endif
      </div>

      <!-- Lunas -->
      <div class="tab-pane fade row" id="pills-lunas" role="tabpanel" aria-labelledby="lunas-tab">
        @if ($message = Session::get('lunassuccess'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif
        @if($lunas->isEmpty())
        <p class="text-secondary">Tidak ada data instalasi lunas</p>
        @else
        @foreach($lunas as $i)
        <div class="mb-2">
          <div class="col-md-7 col-sm-12 col-12 lunas">
            <h5 class="content1"><b>{{ $i->anggota->nama }}</b></h5>
            <p class="content2">
              {{ $i->anggota->alamat }}
            </p>
            <hr size="4" width="250" />
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#jadwal{{$i->id}}">
              Jadwalkan
            </button>
            <p class="content3">Lakukan penjadwalan untuk pemasangan</p>
          </div>
        </div>
        <!-- modal jadwal -->
        <div class="modal fade" id="jadwal{{$i->id}}" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Jadwal Pemasangan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body jadwal-m">
                <form action="{{ route('instalasianggota.jadwal', $i->anggota->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <p>Tanggal Pemasangan</p>
                  <div class="col-sm-7">
                    <input type="datetime-local" class="form-control" name="tgl_pemasangan" required><br>
                  </div>
                  <center><input type="submit" class="btn btn-send" value="SIMPAN"></center>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>

      <!-- Jadwal Pasang -->
      <div class="tab-pane fade row" id="pills-pasang" role="tabpanel" aria-labelledby="pasang-tab">
        @if ($message = Session::get('jadwalsuccess'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif
        @if($pemasangan->isEmpty())
        <p class="text-secondary">Tidak ada data jadwal pemasangan</p>
        @else
        @foreach($pemasangan as $i)
        <div class="mb-2">
          <div class="col-md-7 col-sm-12 col-12 pasang">
            <h5 class="content1"><b>{{ $i->anggota->nama }}</b></h5>
            <p class="content2">
              {{ $i->anggota->alamat }}
            </p>
            <hr size="4" width="250" />
            <p class="content3">Segera lakukan pemasangan instalasi baru pada {{ Carbon\Carbon::parse($i->tgl_pemasangan)->format('d M Y') }} pukul {{ Carbon\Carbon::parse($i->tgl_pemasangan)->format('H:i') }} WIB</p>
          </div>
        </div>
        @endforeach
        @endif
      </div>

      <!-- Selesai -->
      <div class="tab-pane fade row" id="pills-selesai" role="tabpanel" aria-labelledby="selesai-tab">
        @if($selesai->isEmpty())
        <p class="text-secondary">Tidak ada data instalasi selesai</p>
        @else
        @foreach($selesai as $i)
        <div class="mb-2">
          <div class="col-md-7 col-sm-12 col-12 selesai">
            <h5 class="content1"><b>{{ $i->anggota->nama }}</b></h5>
            <h5 class="content-selesai1">{{ Carbon\Carbon::parse($i->tgl_buat)->format('d M y') }}</h5>
            <p class="content2">
              {{ $i->anggota->alamat }}
            </p>
            <hr size="4" width="250" />
            <h5 class="content-selesai2">{{ Carbon\Carbon::parse($i->tgl_selesai)->format('d M y') }}</h5>
            <p class="content3">Pemasangan telah dilakukan</p>
          </div>
        </div>
        @endforeach
        @endif
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
                                <input type="text" class="form-control nama-isi" placeholder="eg : Meteran Air" name="nama_barang[]" required>
                            </div>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" name="jumlah[]" min='1' required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="harga_satuan[]" required>
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
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $("#add_form").submit(function(e) {
        e.preventDefault();
        $("#add_btn").val('adding...');
        $.ajax({
          url: '/instalasianggota',
          method: 'POST',
          data: $(this).serialize(),
          dataType: "json",
          success: function(response) {
            console.log(response.data);
            $('.modal').modal('hide');
            $("#add_btn").val('Add');
            $("#add_form")[0].reset();
            $(".append_item").remove();

            window.location = '/instalasianggota/' + 'Informasi instalasi berhasil disimpan';
          }
        });
      });

    });
  </script>
</x-app-layout>