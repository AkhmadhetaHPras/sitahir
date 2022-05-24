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
        <!-- konten keluhan -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active row" id="pills-baru" role="tabpanel" aria-labelledby="baru-tab">
                <form class="keluhan-baru col-md-6 col-sm-8 col-12">
                    <div class="mb-3">
                        <label for="jeniskeluhan" class="form-label">Jenis Keluhan</label>
                        <select class="form-select" id="jeniskeluhan">
                            <option>Kerusakan Pipa</option>
                            <option>Kerusakan Meteran</option>
                            <option>Masalah Air</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsikeluhan" class="form-label">Jenis Keluhan</label>
                        <textarea class="form-control" name="" id="deskripsikeluhan" cols="48" rows="4"></textarea>
                    </div>

                    <button type="submit" class="btn btn-warning">Kirim</button>
                </form>
            </div>

            <div class="tab-pane fade" id="pills-proses" role="tabpanel" aria-labelledby="proses-tab">
                <div class="col-md-7 col-sm-12 col-12 dalam-proses">
                    <p class="dalam-proses1">12/Mar/2022</p>
                    <h5 class="dalam-proses2"><b>Kerusakan Pipa</b></h5>
                    <p class="dalam-proses3">
                        Pipa disamping meteran air pecah sepanjang 30 cm
                    </p>
                    <hr size="4" width="250" />
                    <p class="dalam-proses4">Menunggu jadwal survey lokasi</p>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-selesai" role="tabpanel" aria-labelledby="selesai-tab">
                <div class="col-md-7 col-sm-12 col-12 dalam-selesai">
                    <p class="dalam-selesai1">12/Mar/2022</p>
                    <h5 class="dalam-selesai2"><b>Kerusakan Pipa</b></h5>
                    <p class="dalam-selesai3">
                        Pipa disamping meteran air pecah sepanjang 30 cm
                    </p>
                    <hr size="4" width="250" />
                    <p class="dalam-selesai4">Perbaikan selesai dilakukan</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>