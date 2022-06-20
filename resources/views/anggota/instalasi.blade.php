<x-app-layout>
    <div class="survey mb-4">
        <h5 class="dalam-judul">Jadwal Survey Lokasi</h5>
        <p>
            Jadwal survey lokasi akan dilaksanakan
            <b>{{ Carbon\Carbon::parse($instalasi->tgl_survey)->format('d M Y') }} Pukul {{ Carbon\Carbon::parse($instalasi->tgl_survey)->format('H:i') }} WIB</b>
        </p>
    </div>

    @if(!is_null($instalasi->tarif_instalasi))
    <div class="rincian-kebutuhan mb-4">
        <h5 class="dalam-judul">Rincian Kebutuhan</h5>

        <div class="table-responsive-sm">
            <table class="table">
                <thead class="ins-thead">
                    <tr>
                        <th scope="col" class="kol1">NAMA BARANG</th>
                        <th scope="col" class="">JUMLAH</th>
                        <th scope="col" class="">HARGA SATUAN</th>
                        <th scope="col" class="">SUB TOTAL</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($instalasi->form_instalasi_alat as $i)
                    <tr>
                        <td class="kol1 align-middle">{{ $i->nama_barang }}</td>
                        <td class="align-middle">{{ $i->jumlah }}</td>
                        <td class="align-middle">
                            <b>{{ $i->harga_satuan }}</b>
                            <div class="rupiah">rupiah</div>
                        </td>
                        <td class="align-middle">
                            <b>{{ $i->subtotal }}</b>
                            <div class="rupiah">rupiah</div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <!-- Kotak Total -->
        @if($instalasi->status == 'Dalam Proses')
        <div class="container-fluid tagihan">
            <div class="row pe-2 d-flex justify-content-end">
                <div class="total col-md-3 col-sm-7 col-12">
                    <p class="total-text">Rp. {{ $instalasi->tarif_instalasi }}</p>
                    <div class="bayar-con">
                        <button class="bayar" id="pay-button">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('instalasi.bayar', $instalasi->anggota->id) }}" method="post" id="submit_form">
            @csrf
            @method('POST')
            <input type="hidden" name="json" id="json_callback">
        </form>
        @elseif($instalasi->status == 'Lunas')
        <p>*Biaya instalasi lunas</p>
        @endif
    </div>
    @endif

    @if(!is_null($instalasi->tgl_pemasangan))
    <div class="survey">
        <h5 class="dalam-judul">Jadwal Pemasangan</h5>
        <p>
            Jadwal Pemasangan akan dilaksanakan
            <b>{{ Carbon\Carbon::parse($instalasi->tgl_pemasangan)->format('d M Y') }} Pukul {{ Carbon\Carbon::parse($instalasi->tgl_pemasangan)->format('H:i') }} WIB</b>, jika pengurus telah melakukan pemasangan silakan menekan tombol selesai
        </p>
        <form action="{{ route('instalasi.update', $instalasi) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="submit" class="btn btn-success" value="Selesai">
        </form>
    </div>
    @endif

    @if(!is_null($instalasi->tarif_instalasi) && $instalasi->status == 'Dalam Proses')
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snap_token }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */

                    // console.log(result);
                    send_response_to_form(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */

                    // console.log(result);
                    // alert('Maaf, Selesaikan pembayaran sebelum menutup jendela pembayaran');
                    // location.reload();
                    send_response_to_form(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */

                    // console.log(result);
                    // alert('Maaf, terjadi error. silakan coba lagi');
                    // location.reload();
                    send_response_to_form(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('Anda menutup jendela pembayaran sebelum menyelesaikan pembayaran');
                }
            })
        });

        function send_response_to_form(result) {
            document.getElementById('json_callback').value = JSON.stringify(result);
            $('#submit_form').submit();
        }
    </script>
    @endif
</x-app-layout>