@extends('layouts.bantuan')

@section('content')
<div class="row mt-4">
    <div class="col-4">
        <div class="position-fixed col-3">
            <div id="list-example" class="list-group">
                <a class="list-group-item list-group-item-action" href="#list-item-1">Pendaftaran Anggota Awal</a>
                <a class="list-group-item list-group-item-action" href="#list-item-2">Pencatatan Kubik Air</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Pembayaran</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">Pengajuan Keluhan</a>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-offset="0" class="scrollspy-example" tabindex="0">
            <h4 id="list-item-1">PENDAFTARAN ANGGOTA AWAL</h4>

            <ol class="mb-5" style="text-align: justify;">
                <li>Pengguna baru masuk pada tampilan login</li>
                <li>
                    Lalu klik tombol “Disini” pada pembuatan akun baru.
                    Maka akan di arahkan ke Whatsapp, dimana sudah terdapat format
                    untuk mengisi data diri lengkap yang akan dikirim ke admin
                </li>
                <li>Pengguna baru menunggu konfirmasi dari admin</li>
                <li>
                    Setelah mendapatkan konfirmasi dari admin, pengguna baru dapat
                    login menggunakan username dan password
                </li>
                <li>
                    Pengguna baru dapat melihat perkembangan proses pemasangan alat
                    secara berkala pada menu “instalasi”
                </li>
                <li>
                    Setelah proses telah selesai maka pengguna diharapkan membayar
                    dengan cara memilih menu “Instalasi” lalu klik tombol “Bayar”.
                </li>
            </ol>


            <h4 id="list-item-2">PENCATATAN KUBIK AIR</h4>

            <ol class="mb-5" style="text-align: justify;">
                <li>
                    Pertama pengguna masuk pada aplikasi menggunakan username dan password.
                    Kemudian pilih menu “Buku Air”
                </li>
                <li>
                    Pengguna memilih bulan yang akan dilakukan pencatatan kubik air. Jika
                    pada bulan tersebut belum melakukan pengiriman gambar kubik air maka akan
                    menampilkan tombol “Upload”. Tombol tersebut akan memproses pencatatan buku
                    air milik anggota
                </li>
                <li>
                    Setelah klik tombol “Upload”, pengguna memfoto alat pengukur kubik air
                    di rumah
                </li>
                <li>Selanjutnya pengguna menyimpan foto tersebut</li>
                <li>Dan yang terakhir, pengguna menunggu konfirmasi dari admin sebelum melakukan pembayaran</li>
            </ol>


            <h4 id="list-item-3">PEMBAYARAN</h4>

            <ol class="mb-5" style="text-align: justify;">
                <li>Pertama pengguna masuk pada aplikasi menggunakan username dan password.
                    Kemudian pilih menu “Buku Air”</li>
                <li>Kemudian pengguna memilih bulan untuk melakukan pembayaran</li>
                <li>Setelah klik bulan yang dipilih, maka akan muncul di bawah nominal
                    yang harus di bayar</li>
                <li>Langkah selanjutnya, klik tombol “Bayar” untuk memproses pembayaran</li>
                <li>Pengguna akan diarahkan pada halaman midtrans untuk melakukan pengisian
                    data sebelum pembayaran sampai dengan kode yang digunakan untuk membayar tagihan air</li>
            </ol>


            <h4 id="list-item-4">PENGAJUAN KELUHAN</h4>

            <ol class="mb-5" style="text-align: justify;">
                <li>Langkah awal setelah melakukan login anggota, pilih menu “Ajukan Keluhan”</li>
                <li>Setelah menu tersebut muncul. Pengguna mengisikan jenis keluhan dan deskripsi
                    keluhan yang akan di berikan kepada petugas</li>
                <li>Selanjutnya klik tombol “Kirim”</li>
                <li>Lalu pengguna dapat melihat keluhan yang masih di dalam proses</li>
                <li>Pengguna menunggu konfirmasi dari petugas</li>
                <li>Jika keluhatan tersebut telah dikonfirmasi oleh petugas maka akan beralih
                    pada menu “Selesai”</li>
                <li>Keluhan telah berhasil diajukan</li>
            </ol>

        </div>
    </div>
</div>
@endsection