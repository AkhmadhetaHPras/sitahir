<x-app-layout>
    <!-- OVERVIEW DAN PENGUMUMAN -->
    <div class="container-fluid overview-pengumuman">
        <div class="row">
            <!-- OVERVIEW -->
            <h5 class="overview-title mb-3 ps-0">
                <span class="border-3 border-bottom border-primary">Overview</span>
            </h5>
            <div class="overview col-md-8 col-12">
                <div class="row">
                    <div class="col-md-6 col-12 ps-0 mb-2">
                        <div class="card card-kubik p-2">
                            <h6 class="card-title">Total Kubik</h6>
                            <div class="card-body p-2">
                                <div class="row">
                                    <h2 class="col-8 d-flex align-items-center mb-0 justify-content-center">
                                        <b>1308 M3</b>
                                    </h2>
                                    <div class="col-4 align-middle">
                                        <div class="month">Juni</div>
                                        <div class="year">2021</div>
                                    </div>
                                </div>
                                <div class="divider border-3 border-bottom border-warning my-2"></div>
                                <div class="row">
                                    <h2 class="col-8 d-flex align-items-center mb-0 justify-content-center">
                                        <b>1308 M3</b>
                                    </h2>
                                    <div class="col-4 align-middle">
                                        <div class="month">Juni</div>
                                        <div class="year">2021</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 ps-0 mb-2">
                        <div class="card card-cart p-2">
                            <h6 class="card-title">Line Cart</h6>
                            <div class="card-body p-2">
                                <div class="chart-container" style="position: relative; height: 115px; width: 100%">
                                    <canvas id="myChart"></canvas>
                                </div>

                                <script>
                                    const labels = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun"];

                                    const data = {
                                        labels: labels,
                                        datasets: [{
                                            label: "Kubik Air",
                                            backgroundColor: "rgb(33, 150, 83, 0.2)",
                                            borderColor: "rgb(111, 207, 151)",
                                            data: [1158, 1580, 1536, 1102, 1200, 1308],
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
                    <div class="col-md-6 col-12 ps-0 mb-2" style="height: 100%">
                        <div class="card card-saldo p-2">
                            <h6 class="card-title">Saldo Kas</h6>
                            <div class="card-body p-2">
                                <h1 class="align-middle text-end">
                                    <b>Rp. 3.201.098</b>
                                </h1>
                                <h6 class="text-end">&emsp;</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 ps-0 mb-2">
                        <div class="card card-listrik p-2">
                            <h6 class="card-title">Anggaran Listrik</h6>
                            <div class="card-body p-2">
                                <h1 class="align-middle text-end">
                                    <b>Rp. 3.201.098</b>
                                </h1>
                                <h6 class="text-end">Juni 2021</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PENGUMUMAN -->
            <div class="pengumuman col-md-4 col-12 ps-0">
                <div class="card card-pengumuman p-3">
                    <h6 class="card-title">Pengumuman</h6>
                    <div class="card-body p-2">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Accordion Item #1
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the first item's accordion body.</strong>
                                        It is shown by default, until the collapse plugin adds
                                        the appropriate classes that we use to style each
                                        element. These classes control the overall appearance,
                                        as well as the showing and hiding via CSS transitions.
                                        You can modify any of this with custom CSS or overriding
                                        our default variables. It's also worth noting that just
                                        about any HTML can go within the
                                        <code>.accordion-body</code>, though the transition does
                                        limit overflow.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Accordion Item #2
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the second item's accordion body.</strong>
                                        It is hidden by default, until the collapse plugin adds
                                        the appropriate classes that we use to style each
                                        element. These classes control the overall appearance,
                                        as well as the showing and hiding via CSS transitions.
                                        You can modify any of this with custom CSS or overriding
                                        our default variables. It's also worth noting that just
                                        about any HTML can go within the
                                        <code>.accordion-body</code>, though the transition does
                                        limit overflow.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Accordion Item #3
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the third item's accordion body.</strong>
                                        It is hidden by default, until the collapse plugin adds
                                        the appropriate classes that we use to style each
                                        element. These classes control the overall appearance,
                                        as well as the showing and hiding via CSS transitions.
                                        You can modify any of this with custom CSS or overriding
                                        our default variables. It's also worth noting that just
                                        about any HTML can go within the
                                        <code>.accordion-body</code>, though the transition does
                                        limit overflow.
                                    </div>
                                </div>
                            </div>
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

    @if(Auth::user()->hasRole('admin') or Auth::user()->hasRole('pengurus'))
    <h1>Anda {{ Auth::user()->roles->first()->display_name }}</h1>
    @endif
</x-app-layout>