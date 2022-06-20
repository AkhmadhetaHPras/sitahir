<x-app-layout>
    <div class="container-fluid">
        <div class="row">
            <h5 class="buku-air-title mb-3 ps-0">
                <span class="border-3 border-bottom border-primary">Pembayaran Buku Air</span>
            </h5>
            <table class="table table-hover tb-nunggak">
                <thead class="thead-dark thead-tb-nunggak">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">BULAN</th>
                        <th scope="col">KUBIK</th>
                        <th scope="col">TAGIHAN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tagihan as $t)
                    <tr>
                        <td>{{ $t['id'] }}</td>
                        <td>{{ $t['bulan'] }}</td>
                        <td>{{ $t['kubik'] }} M3</td>
                        <td>Rp. {{ $t['tagihan'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="container-fluid tagihan">
                <div class="row pe-2">
                    <div class="total col-md-3 col-sm-7 col-12">
                        <p class="total-text">Rp. {{ $total }}</p>
                        <div class="bayar-con">
                            <button class="bayar" id="pay-button">Bayar</button>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('bukuair.bayar') }}" method="post" id="submit_form">
                @csrf
                @method('POST')
                <input type="hidden" name="json" id="json_callback">
                @foreach($tagihan as $t)
                <input type="hidden" name="id[]" value="{{ $t['id'] }}">
                @endforeach
            </form>
        </div>
    </div>
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
</x-app-layout>