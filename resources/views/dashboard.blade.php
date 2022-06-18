<x-app-layout>
    <!-- OVERVIEW DAN PENGUMUMAN -->
    <div class="container-fluid overview-pengumuman mb-3">
        <div class="row">
            <!-- OVERVIEW -->
            <h5 class="overview-title mb-3 ps-0">
                <span class="border-3 border-bottom border-primary">Ulasan</span>
            </h5>
            <div class="overview col-md-8 col-12">
                <div class="row">
                    <div class="col-md-6 col-12 ps-0 mb-2">
                        <div class="card card-kubik p-2">
                            <h6 class="card-title">Total Kubik</h6>
                            <div class="card-body p-2">
                                <div class="row">
                                    <h2 class="col-8 d-flex align-items-center mb-0 justify-content-center">
                                        <b>{{ $data[0]->get(0)->kubik }} M3</b>
                                    </h2>
                                    <div class="col-4 align-middle">
                                        <div class="month">{{date('F', mktime(0, 0, 0, $data[0]->get(0)->bulan, 10))}}</div>
                                        <div class="year">{{ $data[0]->get(0)->tahun }}</div>
                                    </div>
                                </div>
                                <div class="divider border-3 border-bottom border-warning my-2"></div>
                                <div class="row">
                                    <h2 class="col-8 d-flex align-items-center mb-0 justify-content-center">
                                        <b>{{ $data[1]->get(0)->kubik }} M3</b>
                                    </h2>
                                    <div class="col-4 align-middle">
                                        <div class="month">{{date('F', mktime(0, 0, 0, $data[1]->get(0)->bulan, 10))}}</div>
                                        <div class="year">{{ $data[1]->get(0)->tahun }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 ps-0 mb-2">
                        <div class="card card-cart p-2">
                            <h6 class="card-title">Diagram</h6>
                            <div class="card-body p-2">
                                <div class="chart-container">
                                    <canvas id="myChart"></canvas>
                                </div>

                                <script>
                                    const labels = @json($data[2]);

                                    const data = {
                                        labels: labels,
                                        datasets: [{
                                            label: "Kubik Air",
                                            backgroundColor: "rgb(33, 150, 83, 0.2)",
                                            borderColor: "rgb(111, 207, 151)",
                                            data: @json($data[3]),
                                            fill: true,
                                        }, ],
                                    };

                                    const config = {
                                        type: "line",
                                        data: data,
                                        options: {
                                            plugins: {
                                                legend: {
                                                    display: false,
                                                },
                                            },
                                            maintainAspectRatio: false,
                                            scales: {
                                                x: {
                                                    grid: {
                                                        display: false,
                                                    },
                                                },
                                                y: {
                                                    grid: {
                                                        display: false,
                                                    },
                                                },
                                            },
                                        },
                                    };
                                </script>

                                <script>
                                    const myChart = new Chart(
                                        document.getElementById("myChart"),
                                        config
                                    );
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-12 ps-0 mb-2">
                        <div class="card card-saldo p-2">
                            <h6 class="card-title">Jumlah Anggota</h6>
                            <div class="card-body p-2">
                                <h1 class="align-middle text-end">
                                    <b>{{ $data[4]->get(0)->jumlah }}</b>
                                </h1>
                                <h6 class="text-end">Anggota</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 ps-0 mb-2">
                        <div class="card card-listrik p-2">
                            <h6 class="card-title">Anggaran Listrik</h6>
                            <div class="card-body p-2">
                                <h1 class="align-middle text-end">
                                    <b>Rp. {{ $data[5]->anggaran }}</b>
                                </h1>
                                <h6 class="text-end">{{ date('F', mktime(0, 0, 0, $data[5]->bulan , 10)) }} {{ $data[5]->tahun }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PENGUMUMAN -->
            <div class="pengumuman col-md-4 col-12 ps-0">
                <div class="card card-pengumuman p-3">
                    <h6 class="card-title">Pengumuman</h6>
                    <div class="card-body p-2 overflow-auto">
                        <div class="accordion" id="accordionPengumuman">
                            @foreach($data[6] as $p)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $p->id }}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $p->id }}" aria-expanded="false" aria-controls="collapse{{ $p->id }}">
                                        {{ $p->judul }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $p->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $p->id }}" data-bs-parent="#accordionPengumuman">
                                    <div class="accordion-body">
                                        {{ $p->isi }}
                                        @if(!is_null($p->file))
                                        <br><a href="{{ $p->file }}" target='_blank'>Unduh file</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tagihan Anda -->
    @if(Auth::user()->hasRole('anggota'))
    <div class="container-fluid tagihan">
        <div class="row pe-2">
            <h5 class="overview-title my-3 ps-0">
                <span class="border-3 border-bottom border-primary">Tagihan Anda</span>
            </h5>
            <div class="total col-md-3 col-sm-7 col-12">
                <p class="total-text">Rp. 35.000</p>
                <div class="bayar-con">
                    <a href="" class="bayar"><b>bayar</b></a>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(Auth::user()->hasRole('admin|pengurus'))
    <!-- Tabel Anggota Nunggak -->
    <h5 class="overview-title mb-3 ps-0 mt-5">
        <span class="border-3 border-bottom border-primary">Daftar Anggota Yang Memiliki Tagihan</span>
    </h5>

    <div class="table-responsive-sm">
        <table class="table table-hover tb-nunggak">
            <thead class="thead-dark thead-tb-nunggak">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAMA ANGGOTA</th>
                    <th scope="col">NO. WHATSAPP</th>
                    <th scope="col">BULAN</th>
                    <th scope="col">TAGIHAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data[7] as $t)
                <tr>
                    <td>{{ $t->anggota->id }}</td>
                    <td>{{ $t->anggota->nama }}</td>
                    <td><a href="https://wa.me/62{{ substr($t->anggota->nowa, 1) }}" target="_blank" class="no-wa"> <i class="lab la-whatsapp" style="color:#075e54;font-size:20px;"></i>
                            {{ $t->anggota->nowa }}</a>
                    </td>
                    <td>{{ $t->bulan }}</td>
                    <td>Rp. {{ $t->tarif }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</x-app-layout>