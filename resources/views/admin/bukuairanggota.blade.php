<x-app-layout>
    <div class="text">
        <h1><b>Buku Air Anggota</b></h4>
    </div>
    <div class="card">
        <div class="row">
            <div class="card-body">
                <table class="table table-responsives">
                    <thead>
                        <tr class="verti">
                            <td>
                                NAMA ANGGOTA
                            </td>
                            <td>
                                METERAN
                            </td>
                            <td>
                                KUBIK
                            </td>
                            <td>
                                HARGA
                            </td>
                            <td>
    
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="horizon">
                                Ahmad Rafif A.
                            </th>
                            <th>
                                998
                            </th>
                            <th>
                                12
                            </th>
                            <th>
                                Rp. 30.000
                            </th>
                            <th>
                                <a href="{{ route('bukuairanggotadetail') }}" ><button class=" btn btn-warning ">DETAILS</button></a>
                            </th>
                        </tr>
                        <tr>
                            <th class="horizon">
                                Muh. Irfan Ali
                            </th>
                            <th>
                                998
                            </th>
                            <th>
                                12
                            </th>
                            <th>
                                Rp. 30.000
                            </th>
                            <th>
                                <a href="{{ route('bukuairanggotadetail') }}" ><button class=" btn btn-warning ">DETAILS</button></a>
                            </th>
                        </tr>
                        <tr>
                            <th class="horizon">
                                Akhmadeta Hafidz S.
                            </th>
                            <th>
                                998
                            </th>
                            <th>
                                12
                            </th>
                            <th>
                                Rp. 30.000
                            </th>
                            <th>
                                <a href="{{ route('bukuairanggotadetail') }}" ><button class=" btn btn-warning ">DETAILS</button></a>
                            </th>
                        </tr>
                    </tbody>
    
                </table>
            </div>
        </div>
    </div>
</x-app-layout>