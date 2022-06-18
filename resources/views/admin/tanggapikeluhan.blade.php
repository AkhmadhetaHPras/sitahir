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
      @if ($message = Session::get('keluhansuccess'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif
      <div class="tab-pane fade show active row" id="pills-baru" role="tabpanel" aria-labelledby="baru-tab">
        @if($masuk->isEmpty())
        <p class="text-secondary">Tidak ada data keluhan baru</p>
        @else
        @foreach($masuk as $m)
        <div class="mb-2">
          <div class="col-md-7 col-sm-12 col-12 keluhan-masuk">
            <p class="dalam-proses1">{{ $m->tgl_pengajuan }}</p>
            <h5 class="dalam-proses2"><b>{{ $m->jenis_keluhan }}</b></h5>
            <p class="dalam-proses3">
              {{ $m->deskripsi }}
            </p>
            <hr size="4" width="250" />
            <button type="button" class="btn btn-masuk" data-bs-toggle="modal" data-bs-target="#jadwal{{$m->id}}">
              Jadwalkan
            </button>
            <p class="dalam-proses4">{{ $m->anggota->nama }} - {{ $m->anggota->alamat }}</p>
          </div>
        </div>
        <!-- Modal  -->
        <div class="modal fade" id="jadwal{{$m->id}}" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-size: 1rem">Jadwal Penaganan Keluhan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ route('tanggapikeluhan.jadwalkan', $m->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body jadwal-m">
                  <p>Tanggal Penanganan</p>
                  <input type="date" class="form-control" name="tgl_survey"><br>
                  <center><input type="submit" class="btn btn-send" value="SIMPAN"></center>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>

      <div class="tab-pane fade" id="pills-proses" role="tabpanel" aria-labelledby="proses-tab">
        @if($proses->isEmpty())
        <p class="text-secondary">Tidak ada data jadwal penanganan keluhan</p>
        @else
        @foreach($proses as $p)
        <div class="mb-2">
          <div class="col-md-7 col-sm-12 col-12 dalam-proses">
            <h6 class="dalam-proses2"><b>{{ $p->tgl_survey }}</b></h6>
            <h5 class="dalam-proses2"><b>{{ $p->jenis_keluhan }}</b></h5>
            <p class="dalam-proses3">
              {{ $p->deskripsi }}
            </p>
            <hr size="4" width="250" />
            <p class="dalam-proses4">{{ $p->anggota->nama }} - {{ $p->anggota->alamat }}</p>
          </div>
        </div>
        @endforeach
        @endif
      </div>

      <div class="tab-pane fade" id="pills-selesai" role="tabpanel" aria-labelledby="selesai-tab">
        @if($selesai->isEmpty())
        <p class="text-secondary">Tidak ada data keluhan selesai</p>
        @else
        @foreach($selesai as $s)
        <div class="col-md-7 col-sm-12 col-12 dalam-selesai mb-2">
          <h5 class="dalam-selesai1"><b>{{ $s->jenis_keluhan }}</b></h5>
          <h5 class="dalam-selesai2">{{ Carbon\Carbon::parse($s->tgl_pengajuan)->format('d M y') }}</h5>
          <p class="dalam-selesai3">
            {{ $s->deskripsi }}
          </p>
          <hr size="4" width="250" />
          <h5 class="dalam-selesai6">{{ Carbon\Carbon::parse($s->tgl_selesai)->format('d M y') }}</h5>
          <p class="dalam-selesai5">{{ $s->anggota->nama }} - {{ $s->anggota->alamat }}</p>
        </div>
        @endforeach
        @endif
      </div>

    </div>
  </div>
</x-app-layout>