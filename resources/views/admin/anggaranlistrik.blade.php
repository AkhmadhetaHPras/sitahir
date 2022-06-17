<x-app-layout>
    <div class="container-fluid buku-air">
        <div class="row">
            <h5 class="buku-air-title mb-5 ps-0">
                <span class="border-3 border-bottom border-primary">Anggaran Listrik</span>
            </h5>
            @if($tambah == 'true' and Auth::user()->hasRole('admin'))
            <!-- add -->
            <button type="button" class="btn btn-warning text-dark mb-3 col-12" data-bs-toggle="modal" data-bs-target="#tambahanggaran">
                <h5 class="mb-0 p-0 border-0">
                    TAMBAH ANGGARAN
                </h5>
                <p class="ket mb-0">Lakukan tambah anggaran pada tanggal 1</p>
            </button>
            @endif
            <div class="buku-air-first-col col-md-6 col-12 ps-0">
                @if($tambah == 'true' )
                <!-- add -->
                <div class="row mb-2 pe-0">
                    <div class="col-12 d-flex">
                        <h6 class="month-name mt-1">
                            <b>{{ strtoupper(substr(date('F', mktime(0, 0, 0, $bulan, 10)), 0, 3)) }}</b>
                        </h6>
                        <div class="card card-penggunaan-air-bulan bg-warning">
                            <div class="card-body py-2 d-flex align-items-center">
                                <div class="row row-air text-center">
                                    <h3 class="mb-0 p-0 border-0" data-bs-toggle="modal" data-bs-target="#tambahanggaran">
                                        TAMBAH ANGGARAN
                                    </h3>
                                    <p class="ket mb-0">Lakukan tambah anggaran pada tanggal 1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @foreach($data->slice(0,6) as $d)
                <!-- read -->
                <div class="row mb-2">
                    <div class="col-12 d-flex">
                        <h6 class="month-name mt-1">
                            <b>{{ strtoupper(substr(date('F', mktime(0, 0, 0, $d->bulan, 10)), 0, 3)) }}</b>
                        </h6>
                        <div class="card card-penggunaan-air-bulan bg-white">
                            <div class="card-body d-flex align-items-center">
                                <div class="row row-air">
                                    <div class="jumlah-anggaran col d-flex justify-content-center align-items-center">
                                        <b style="font-size: 2.3rem;">{{ $d->anggaran }}</b>
                                    </div>
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <div class="tanggal-bayar">{{ date('d/m/Y',strtotime(substr($d->tgl_bayar,0,10))) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="buku-air-second-col col-md-6 col-12 ps-0">
                @foreach($data->slice(6,12) as $d)
                <!-- read -->
                <div class="row mb-2">
                    <div class="col-12 d-flex">
                        <h6 class="month-name mt-1">
                            <b>{{ strtoupper(substr(date('F', mktime(0, 0, 0, $d->bulan, 10)), 0, 3)) }}</b>
                        </h6>
                        <div class="card card-penggunaan-air-bulan bg-white">
                            <div class="card-body d-flex align-items-center">
                                <div class="row row-air">
                                    <div class="jumlah-anggaran col d-flex justify-content-center align-items-center">
                                        <b style="font-size: 2.3rem;">{{ $d->anggaran }}</b>
                                    </div>
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <div class="tanggal-bayar">{{ date('d/m/Y',strtotime(substr($d->tgl_bayar,0,10))) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            {!! $data->links() !!}
        </div>
    </div>
    <!-- Anggaran Listrik end -->
    <!-- Tambah Data -->
    <div class="modal fade" id="tambahanggaran" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="10" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Tambah Data Anggaran Listrik
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('anggaranlistrik.store') }}" method="POST">
                @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingPassword" name="bulan" placeholder="eg : 3">
                            <label for="floatingPassword">Bulan Anggaran</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" name="tahun" placeholder="eg : 2022">
                            <label for="floatingInput">Tahun Anggaran</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" name="anggaran" placeholder="eg : 1200000">
                            <label for="floatingInput">Besar Anggaran</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="tgl_bayar" placeholder="eg : 1200000">
                            <label for="floatingInput">Tanggal Pembayaran</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">SIMPAN</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>