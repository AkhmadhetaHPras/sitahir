<x-app-layout>
    <div class="container-fluid buku-air-anggota">
        <div class="row">
            <h5 class="buku-air-title mb-3 ps-0">
                <span class="border-3 border-bottom border-primary">Buku Air Anggota</span>
            </h5>

            <table class="table table-responsives mt-3">
                <thead>
                    <tr class="header">
                        <td>NAMA ANGGOTA</td>
                        <td>METERAN</td>
                        <td>KUBIK</td>
                        <td>HARGA</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                @foreach ($bukuairanggota as $bk)
                    <tr class="content">
                        <td>{{ $bk ->anggota->nama }}</td>
                        <td>{{ $bk ->meteran_air }}</td>
                        <td>{{ $bk ->kubik }}</td>
                        <td>{{ $bk ->tarif }}</td>
                        <!-- <td>Ahmad Rafif A.</td>
                        <td>998</td>
                        <td>12</td>
                        <td>Rp. 30.000</td> -->
                        <td>
                            <a href="{{ route('bukuairanggotadetail') }}"><button class=" btn btn-warning ">DETAILS</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $paginate->links() !!}
        </div>
    </div>
</x-app-layout>