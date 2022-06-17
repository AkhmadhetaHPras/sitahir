<x-app-layout>
    <div class="container-fluid buku-air-anggota">
        <div class="row">
            <h5 class="buku-air-title mb-3 ps-0">
                <span class="border-3 border-bottom border-primary">Buku Air Anggota</span>
            </h5>
            @if($baru == 'true' and Auth::user()->hasRole('admin'))
            <form action="{{ route('bukuairanggota.store') }}" method="post" class="p-0 mt-2">
                @csrf
                <button type="submit" class="btn btn-success">TAMBAH BUKU AIR BARU</button>
                <p class="p-0 text-secondary">*Lakukan penambahan data buku air baru di awal bulan ke semua anggota</p>
            </form>
            @endif
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{!! $message !!}</p>
            </div>
            @endif
            <table class="table table-responsives mt-3">
                <thead>
                    <tr class="header">
                        <td>NAMA ANGGOTA</td>
                        <td>BULAN</td>
                        <td>METERAN</td>
                        <td>KUBIK</td>
                        <td>HARGA</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bukuairanggota as $a)
                    <tr class="content">
                        <td>{{ $a->nama }}</td>
                        <td>{{ $a->buku_air->last()->bulan }}</td>
                        <td>{{ $a->buku_air->last()->meteran_air === null ? '-' : $a->buku_air->last()->meteran_air }}</td>
                        <td>{{ $a->buku_air->last()->kubik === null ? '-' : $a->buku_air->last()->kubik }}</td>
                        <td>{{ $a->buku_air->last()->tarif === null ? '-' : $a->buku_air->last()->tarif }}</td>
                        <td>
                            <a href="{{ route('bukuairanggota.show', $a->id) }}"><button class=" btn btn-warning ">DETAILS</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>