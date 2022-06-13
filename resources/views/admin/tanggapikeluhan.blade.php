<x-app-layout>
  <div class="tanggapi-keluhan">
    <!-- navigation keluhan -->
    <ul class="nav-keluhan nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <a id="pills-baru-tab" data-bs-toggle="pill" data-bs-target="#pills-baru" type="button" role="tab" aria-controls="pills-baru">Keluhan Masuk</a>
      </li>
      <li class="nav-item" role="presentation">
        <a id="pills-proses-tab" data-bs-toggle="pill" data-bs-target="#pills-proses" type="button" role="tab" aria-controls="pills-proses">Jadwal Penanganan</a>
      </li>
      <li class="nav-item" role="presentation">
        <a id="pills-selesai-tab" data-bs-toggle="pill" data-bs-target="#pills-selesai" type="button" role="tab" aria-controls="pills-selesai">Selesai</a>
      </li>
    </ul>
    <!-- konten keluhan -->
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active row" id="pills-baru" role="tabpanel" aria-labelledby="baru-tab">
        @foreach($masuk as $m)
        <div>
          <div class="col-md-7 col-sm-12 col-12 keluhan-masuk">
            <p class="dalam-proses1">{{ $m->tgl_pengajuan }}</p>
            <h5 class="dalam-proses2"><b>{{ $m->jenis_keluhan }}</b></h5>
            <p class="dalam-proses3">
              {{ $m->deskripsi }}
            </p>
            <hr size="4" width="250" />
            <button type="button" class="btn btn-masuk" data-bs-toggle="modal" data-bs-target="#jadwal">
              Jadwalkan
            </button>
            <p class="dalam-proses4">Akhmadheta Hafid - Jl,Merdeka No.16 RT 02,RW 01</p>
          </div>
        </div>
        @endforeach
      </div>

      <div class="tab-pane fade" id="pills-proses" role="tabpanel" aria-labelledby="proses-tab">
        @foreach($proses as $p)
        <div>
          <div class="col-md-7 col-sm-12 col-12 dalam-proses">
            <h6 class="dalam-proses2"><b>13 Maret 2022</b></h6>
            <h5 class="dalam-proses2"><b>Kerusakan Pipa</b></h5>
            <p class="dalam-proses3">
              Pipa disamping meteran air pecah sepanjang 30 cm
            </p>
            <hr size="4" width="250" />
            <p class="dalam-proses4">Akhmadheta Hafid - Jl,Merdeka No.16 RT 02,RW 01</p>
          </div>
        </div>
        @endforeach
      </div>


      <div class="tab-pane fade" id="pills-selesai" role="tabpanel" aria-labelledby="selesai-tab">
        @foreach($selesai as $s)
        <div class="col-md-7 col-sm-12 col-12 dalam-selesai">
          <h5 class="dalam-selesai1"><b>Kerusakan Pipa</b></h5>
          <h5 class="dalam-selesai2">12 MAR 2022</h5>
          <p class="dalam-selesai3">
            Pipa disamping meteran air pecah sepanjang 30 cm
          </p>
          <hr size="4" width="250" />
          <h5 class="dalam-selesai6">13 MAR 2022</h5>
          <p class="dalam-selesai5">Akhmadheta Hafid - Jl,Merdeka No.16 RT 02,RW 01</p>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- Modal  -->
  <div class="modal fade" id="jadwal" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="font-size: 1rem">Jadwal Penaganan Keluhan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body jadwal-m">
          <p>Tanggal Penangan</p>
          <input type="date" class="form-control"><br>
          <center><button type="submit" class="btn btn-send">KIRIM</button></center>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>