<x-app-layout>
    <div class="container-fluid buku-air">
        <div class="row">
            <h5 class="buku-air-title mb-3 ps-0">
                <span class="border-3 border-bottom border-primary">Buku Air</span>
            </h5>
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
            @if ($message = Session::get('bukuairsuccess'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            @if ($message = Session::get('bukuairfail'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="buku-air-first-col col-md-6 col-12 ps-0">
                @foreach($bukuairs->slice(0,6) as $b)

                @if($b->status === null)
                <!-- status upload file -->
                <div class="row mb-2 pe-0">
                    <div class="col-12 d-flex">
                        <h6 class="month-name mt-1">
                            <b>{{ strtoupper(substr(date('F', mktime(0, 0, 0, $b->bulan, 10)), 0, 3)) }}</b>
                        </h6>
                        <div class="card card-penggunaan-air-bulan bg-warning">
                            <div class="card-body py-2">
                                <div class="row row-air text-center">
                                    <form action="{{ route('bukuair.uploadfoto', $b->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <label for="inputfotometeran{{$b->id}}" class="form-label btn-upload mb-0 p-0">
                                            <h3 class="mb-0">UPLOAD</h3>
                                        </label>
                                        <input class="form-control" type="file" id="inputfotometeran{{$b->id}}" name="inputfotometeran{{$b->id}}" onchange="form.submit()" style="display: none" />
                                        <p class="ket mb-0">
                                            Lakukan unggah foto meteran air pada tangal 1 - 9
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @elseif($b->status === 'Uploaded')
                <!-- status lihat file -->
                <div class="row mb-2 pe-0">
                    <div class="col-12 d-flex">
                        <h6 class="month-name mt-1">
                            <b>{{ strtoupper(substr(date('F', mktime(0, 0, 0, $b->bulan, 10)), 0, 3)) }}</b>
                        </h6>
                        <div class="card card-penggunaan-air-bulan bg-warning">
                            <div class="card-body py-2 d-flex align-items-center">
                                <div class="row row-air text-center">
                                    <h3 class="mb-0 p-0 border-0" data-bs-toggle="modal" data-bs-target="#fotometeran{{$b->id}}">
                                        LIHAT FOTO
                                    </h3>
                                    <p class="ket mb-0">Lihat foto yang telah anda uanggah</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal foto meteran air -->
                <div class="modal fade" id="fotometeran{{$b->id}}" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="10" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">
                                    Edit Foto Meteran Air
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="{{ route('bukuair.uploadfoto', $b->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-2 row">
                                                    <div class="col-12">
                                                        <img src="{{ asset('storage/'.$b->foto) }}" alt="" width="100%" id="preImg" class="rounded mb-2" />
                                                        <input type="file" class="form-control form-control-sm" id="inputfotometeran{{$b->id}}" name="inputfotometeran{{$b->id}}" required />
                                                    </div>
                                                </div>

                                                <div class="mt-2 row d-flex justify-content-end">
                                                    <div class="col-sm-3 text-end">
                                                        <input class="btn btn-outline-p" type="submit" name="submitfotometeran" id="submitfotometeran" value="Submit" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"></div>
                        </div>
                    </div>
                </div>

                @elseif($b->status === 'Tagihan')
                <!-- status belum lunas -->
                <div class="row mb-2 pe-0">
                    <div class="col-12 d-flex">
                        <h6 class="month-name mt-1">
                            <b>{{ strtoupper(substr(date('F', mktime(0, 0, 0, $b->bulan, 10)), 0, 3)) }}</b>
                        </h6>
                        <div class="card card-penggunaan-air-bulan bg-white">
                            <div class="card-body d-flex align-items-center">
                                <div class="row row-air">
                                    <div class="meteran-air col d-flex justify-content-center">
                                        {{ $b->meteran_air }}
                                    </div>
                                    <div class="kubik-penggunaan col d-flex justify-content-center">
                                        {{ $b->kubik }}
                                    </div>
                                    <div class="tarif col d-flex justify-content-center">
                                        {{ $b->tarif }}
                                    </div>
                                    <div class="ket col d-flex justify-content-center text-danger">
                                        BELUM
                                    </div>
                                    <div class="col d-flex justify-content-center">
                                        <div class="checkout">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="idbukuair[]" value="{{$b->id}}" id="{{$b->tarif}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @elseif($b->status === 'Lunas')
                <!-- status lunas -->
                <div class="row mb-2">
                    <div class="col-12 d-flex">
                        <h6 class="month-name mt-1">
                            <b>{{ strtoupper(substr(date('F', mktime(0, 0, 0, $b->bulan, 10)), 0, 3)) }}</b>
                        </h6>
                        <div class="card card-penggunaan-air-bulan bg-white">
                            <div class="card-body d-flex align-items-center">
                                <div class="row row-air">
                                    <div class="meteran-air col d-flex justify-content-center">
                                        {{ $b->meteran_air }}
                                    </div>
                                    <div class="kubik-penggunaan col d-flex justify-content-center">
                                        {{ $b->kubik }}
                                    </div>
                                    <div class="tarif col d-flex justify-content-center">
                                        {{ $b->tarif }}
                                    </div>
                                    <div class="ket col d-flex justify-content-center text-success">
                                        LUNAS
                                    </div>
                                    <div class="col d-flex justify-content-center">
                                        <div class="tanggal-bayar">{{ date('d/m/Y',strtotime(substr($b->tgl_bayar,0,10))) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @endforeach
            </div>

            <div class="buku-air-second-col col-md-6 col-12 ps-0">
                @foreach($bukuairs->slice(6,12) as $b)

                @if($b->status === null)
                <!-- status upload file -->
                <div class="row mb-2 pe-0">
                    <div class="col-12 d-flex">
                        <h6 class="month-name mt-1">
                            <b>{{ strtoupper(substr(date('F', mktime(0, 0, 0, $b->bulan, 10)), 0, 3)) }}</b>
                        </h6>
                        <div class="card card-penggunaan-air-bulan bg-warning">
                            <div class="card-body py-2">
                                <div class="row row-air text-center">
                                    <form action="{{ route('bukuair.uploadfoto', $b->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <label for="inputfotometeran{{$b->id}}" class="form-label btn-upload mb-0 p-0">
                                            <h3 class="mb-0">UNGGAH</h3>
                                        </label>
                                        <input class="form-control" type="file" id="inputfotometeran{{$b->id}}" name="inputfotometeran{{$b->id}}" onchange="form.submit()" style="display: none" />
                                        <p class="ket mb-0">
                                            Lakukan unggah foto meteran air pada tangal 1 - 9
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @elseif($b->status === 'Uploaded')
                <!-- status lihat file -->
                <div class="row mb-2 pe-0">
                    <div class="col-12 d-flex">
                        <h6 class="month-name mt-1">
                            <b>{{ strtoupper(substr(date('F', mktime(0, 0, 0, $b->bulan, 10)), 0, 3)) }}</b>
                        </h6>
                        <div class="card card-penggunaan-air-bulan bg-warning">
                            <div class="card-body py-2 d-flex align-items-center">
                                <div class="row row-air text-center">
                                    <h3 class="mb-0 p-0 border-0" data-bs-toggle="modal" data-bs-target="#fotometeran{{$b->id}}">
                                        LIHAT FOTO
                                    </h3>
                                    <p class="ket mb-0">Lihat foto yang telah anda unggah</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal foto meteran air -->
                <div class="modal fade" id="fotometeran{{$b->id}}" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="10" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">
                                    Edit Foto Meteran Air
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="{{ route('bukuair.uploadfoto', $b->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-2 row">
                                                    <div class="col-12">
                                                        <img src="{{ asset('storage/'.$b->foto) }}" alt="" width="100%" id="preImg" class="rounded mb-2" />
                                                        <input type="file" class="form-control form-control-sm" id="inputfotometeran{{$b->id}}" name="inputfotometeran{{$b->id}}" required />
                                                    </div>
                                                </div>

                                                <div class="mt-2 row d-flex justify-content-end">
                                                    <div class="col-sm-3 text-end">
                                                        <input class="btn btn-outline-p" type="submit" name="submitfotometeran" id="submitfotometeran" value="Submit" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"></div>
                        </div>
                    </div>
                </div>

                @elseif($b->status === 'Tagihan')
                <!-- status belum lunas -->
                <div class="row mb-2 pe-0">
                    <div class="col-12 d-flex">
                        <h6 class="month-name mt-1">
                            <b>{{ strtoupper(substr(date('F', mktime(0, 0, 0, $b->bulan, 10)), 0, 3)) }}</b>
                        </h6>
                        <div class="card card-penggunaan-air-bulan bg-white">
                            <div class="card-body d-flex align-items-center">
                                <div class="row row-air">
                                    <div class="meteran-air col d-flex justify-content-center">
                                        {{ $b->meteran_air }}
                                    </div>
                                    <div class="kubik-penggunaan col d-flex justify-content-center">
                                        {{ $b->kubik }}
                                    </div>
                                    <div class="tarif col d-flex justify-content-center">
                                        {{ $b->tarif }}
                                    </div>
                                    <div class="ket col d-flex justify-content-center text-danger">
                                        BELUM
                                    </div>
                                    <div class="col d-flex justify-content-center">
                                        <div class="checkout">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="idbukuair[]" value="{{$b->id}}" id="{{$b->tarif}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @elseif($b->status === 'Lunas')
                <!-- status lunas -->
                <div class="row mb-2">
                    <div class="col-12 d-flex">
                        <h6 class="month-name mt-1">
                            <b>{{ strtoupper(substr(date('F', mktime(0, 0, 0, $b->bulan, 10)), 0, 3)) }}</b>
                        </h6>
                        <div class="card card-penggunaan-air-bulan bg-white">
                            <div class="card-body d-flex align-items-center">
                                <div class="row row-air">
                                    <div class="meteran-air col d-flex justify-content-center">
                                        {{ $b->meteran_air }}
                                    </div>
                                    <div class="kubik-penggunaan col d-flex justify-content-center">
                                        {{ $b->kubik }}
                                    </div>
                                    <div class="tarif col d-flex justify-content-center">
                                        {{ $b->tarif }}
                                    </div>
                                    <div class="ket col d-flex justify-content-center text-success">
                                        LUNAS
                                    </div>
                                    <div class="col d-flex justify-content-center">
                                        <div class="tanggal-bayar">{{ date('d/m/Y',strtotime(substr($b->tgl_bayar,0,10))) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            {!! $bukuairs->links() !!}
        </div>
    </div>
    <!-- buku air end -->

    <!-- Tagihan Anda -->
    <div class="container-fluid tagihan">
        <div class="row pe-2">
            <h5 class="overview-title my-3 ps-0">
                <span class="border-3 border-bottom border-primary">Tagihan Anda</span>
            </h5>
            <div class="total col-md-3 col-sm-7 col-12">
                <p class="total-text">Rp. 0</p>
                @if(App\Models\BukuAir::where('id_anggota', $anggota->id)->where('status', 'Tagihan')->count() > 0)
                <input type="hidden" id="total-bayar" name="total-bayar" value="0">
                <div class="bayar-con">
                    <button class="bayar" onclick="bayar()">Bayar</button>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let total = parseInt($('#total-bayar').val());
        let data = [];
        $(document).ready(function() {

            $('input[type=checkbox]').change(
                function() {
                    if (this.checked) {
                        total += parseInt($(this).attr('id'));
                        data.push($(this).val());
                    } else {
                        total -= parseInt($(this).attr('id'));
                        data.splice(data.indexOf($(this).val()), 1);
                    }

                    $('.total-text').text('Rp. ' + total);
                    $('#total-bayar').val(total);
                    console.log(data);
                });
        });

        function bayar() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: "/bukuair/bayar",
                data: {
                    data: data
                },
                success: function(response) {
                    window.location = '/bukuair/bayar/' + response.id;
                },
                error: function(response) {
                    window.location = '/bukuair/bayar/' + 'gagal';
                }
            });
        }
    </script>
</x-app-layout>