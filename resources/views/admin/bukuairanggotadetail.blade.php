<x-app-layout>
    <div class="container buku-air pt-3">
        <!-- nav -->
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('bukuairanggota') }}"><i class="las la-arrow-left"
                        style="font-size:2rem"></i></a>
                <form class="d-flex">
                    <h5>Ahmad Rafif</h5>
                </form>
            </div>
        </nav>
        <!-- nav end -->
    
        <div class="row">
            <div class="buku-air-first-col col-md-6 col-12 ps-0">
                <!-- status lunas -->
                <div class="row mb-2">
                    <div class="col-12 d-flex">
                        <h6 class="month-name mt-1">
                            <b>JAN</b>
                        </h6>
                        <div class="card card-penggunaan-air-bulan bg-white">
                            <div class="card-body d-flex align-items-center">
                                <div class="row row-air">
                                    <div class="meteran-air col d-flex justify-content-center">
                                        998
                                    </div>
                                    <div class="kubik-penggunaan col d-flex justify-content-center">
                                        15
                                    </div>
                                    <div class="tarif col d-flex justify-content-center">
                                        30000
                                    </div>
                                    <div class="ket col d-flex justify-content-center text-success">
                                        LUNAS
                                    </div>
                                    <div class="col d-flex justify-content-center">
                                        <div class="tanggal-bayar">12/02/2021</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- status kosong -->
                <div class="row mb-2">
                    <div class="col-12 d-flex">
                        <h6 class="month-name mt-1">
                            <b>JAN</b>
                        </h6>
                        <div class="card card-penggunaan-air-bulan bg-secondary">
                            <div class="card-body">
                                <div class="row row-air"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="buku-air-second-col col-md-6 col-12 ps-0">
                <!-- status belum lunas -->
                <div class="row mb-2 pe-0">
                    <div class="col-12 d-flex">
                        <h6 class="month-name mt-1">
                            <b>JAN</b>
                        </h6>
                        <div class="card card-penggunaan-air-bulan bg-white">
                            <div class="card-body d-flex align-items-center">
                                <div class="row row-air">
                                    <div class="meteran-air col d-flex justify-content-center">
                                        998
                                    </div>
                                    <div class="kubik-penggunaan col d-flex justify-content-center">
                                        15
                                    </div>
                                    <div class="tarif col d-flex justify-content-center">
                                        30000
                                    </div>
                                    <div class="ket col d-flex justify-content-center text-danger">
                                        BELUM
                                    </div>
                                    <!-- button delete dan edit -->
                                    <div class="col d-flex justify-content-center">
                                        <i class="lar la-edit" style="font-size: 1.5rem;" data-bs-toggle="modal"
                                            data-bs-target="#editdatameteran"></i>
                                        <i class="lar la-trash-alt" style="font-size: 1.5rem;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- status lihat file -->
                <div class="row mb-2 pe-0">
                    <div class="col-12 d-flex">
                        <h6 class="month-name mt-1">
                            <b>JAN</b>
                        </h6>
                        <div class="card card-penggunaan-air-bulan bg-warning">
                            <div class="card-body py-2 d-flex align-items-center">
                                <div class="row row-air text-center">
                                    <h3 class="mb-0 p-0 border-0" data-bs-toggle="modal"
                                        data-bs-target="#tambahdatameteran">
                                        TAMBAH DATA
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- buku air end -->
    
    <!-- modal Tambah Data -->
    <div class="modal fade" id="tambahdatameteran" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="10"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penggunaan Air</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body container">
                        <img src="../img/meteran air.jpg" alt="foto meteran" class="img-fluid">
                        <div class="mb-3 mt-4">
                            <label for="angkameteran" class="form-label">Angka Meteran Air</label>
                            <input type="number" class="form-control" id="angkameteran">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal tambah data meteran end -->
    
    
    <!-- modal edit Data meteran air -->
    <div class="modal fade" id="editdatameteran" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="10"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Penggunaan Air</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body container">
                        <img src="../img/meteran air.jpg" alt="foto meteran" class="img-fluid">
                        <div class="mb-3 mt-4">
                            <label for="angkameteran" class="form-label">Angka Meteran Air</label>
                            <input type="number" class="form-control" id="angkameteran" value="300">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal edit data meteran end -->
</x-app-layout>