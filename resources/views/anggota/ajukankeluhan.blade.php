<x-app-layout>
    <div class="ajukan-keluhan">
        <!-- navigation keluhan -->
        <ul class="nav-keluhan nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a id="pills-baru-tab" data-bs-toggle="pill" data-bs-target="#pills-baru" type="button" role="tab" aria-controls="pills-baru">Keluhan Baru</a>
            </li>
            <li class="nav-item" role="presentation">
                <a id="pills-proses-tab" data-bs-toggle="pill" data-bs-target="#pills-proses" type="button" role="tab" aria-controls="pills-proses">Dalam Proses</a>
            </li>
            <li class="nav-item" role="presentation">
                <a id="pills-selesai-tab" data-bs-toggle="pill" data-bs-target="#pills-selesai" type="button" role="tab" aria-controls="pills-selesai">Selesai</a>
            </li>
        </ul>
        <div class="row">
            <div class="col-md-6 col-sm-8 col-12 mb-3">
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
                @if ($message = Session::get('keluhansuccess'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
            </div>
        </div>
        <!-- konten keluhan -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active row" id="pills-baru" role="tabpanel" aria-labelledby="baru-tab">
                <form action="{{ route('ajukankeluhan.store') }}" method="POST" class="keluhan-baru col-md-6 col-sm-8 col-12">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="jeniskeluhan" class="form-label">Jenis Keluhan</label>
                        <select class="form-select" id="jeniskeluhan" name="jeniskeluhan">
                            <option value="Kerusakan Pipa" selected>Kerusakan Pipa</option>
                            <option value="Kerusakan Meteran Air">Kerusakan Meteran Air</option>
                            <option value="Masalah Keran">Masalah Keran</option>
                            <option value="Air Tidak Mengalir">Air Tidak Mengalir</option>
                            <option value="Aliran Air Kecil">Aliran Air Kecil</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsikeluhan" class="form-label">Jenis Keluhan</label>
                        <textarea class="form-control" name="deskripsikeluhan" id="deskripsikeluhan" cols="48" rows="4"></textarea>
                    </div>

                    <button type="submit" class="btn btn-warning">Kirim</button>
                </form>
            </div>

            <div class="tab-pane fade" id="pills-proses" role="tabpanel" aria-labelledby="proses-tab">
                @if($proses->isEmpty())
                <p class="text-secondary">Anda Tidak Memiliki Keluhan Dengan Status Dalam Proses</p>
                @endif
                @foreach($proses as $p)
                <div class="col-md-7 col-sm-12 col-12 dalam-proses mb-3">
                    <p class="dalam-proses1">{{ $p->tgl_pengajuan }}</p>
                    <h5 class="dalam-proses2"><b>{{ $p->jenis_keluhan }}</b></h5>
                    <p class="dalam-proses3">
                        {{ $p->deskripsi }}
                    </p>
                    <hr size="4" width="250" />
                    @if(is_null($p->tgl_survey))
                    <p class="dalam-proses4">Menunggu jadwal survey lokasi</p>
                    @else
                    <form action="{{ route('ajukankeluhan.update', $p->id) }}" method="post" class="d-flex justify-content-between">
                        @csrf
                        @method('PUT')
                        <span>Jadwal Survey {{ $p->tgl_survey }}</span> <button type="submit" class="btn btn-success">Selesai</button>
                    </form>
                    @endif
                </div>
                @endforeach
            </div>

            <div class="tab-pane fade" id="pills-selesai" role="tabpanel" aria-labelledby="selesai-tab">
                @if($selesai->isEmpty())
                <p class="text-secondary">Anda Tidak Memiliki Keluhan Dengan Status Selesai</p>
                @endif
                @foreach($selesai as $s)
                <div class="col-md-7 col-sm-12 col-12 dalam-selesai mb-3">
                    <p class="dalam-selesai1">{{ $s->tgl_pengajuan }}</p>
                    <h5 class="dalam-selesai2"><b>{{ $s->jenis_keluhan }}</b></h5>
                    <p class="dalam-selesai3">
                        {{ $s->deskripsi }}
                    </p>
                    <hr size="4" width="250" />
                    <p class="dalam-selesai4">Perbaikan selesai dilakukan</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>