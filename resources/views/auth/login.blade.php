<x-guest-layout>
    <div class="login container-fluid">
        <div class="row">
            <div class="left col-md-6 col-12">
                <div class="container-card-login d-flex justify-content-center align-items-center">
                    <div class="card card-login rounded-3 my-5">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-3" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-3" :errors="$errors" />
                        <form action=" {{ route('login') }} " method="POST">
                            @csrf
                            <label for="loginAs" class="form-label">Login Sebagai</label>
                            <div class="input-group mb-2">
                                <input type="radio" class="btn-check" name="options" value="admin" id="option1" checked />
                                <label class="btn rounded me-2 my-1" for="option1">Admin</label>

                                <input type="radio" class="btn-check" name="options" value="pengurus" id="option2" />
                                <label class="btn rounded me-2 my-1" for="option2">Pengurus</label>

                                <input type="radio" class="btn-check" name="options" value="anggota" id="option3" />
                                <label class="btn rounded me-2 my-1" for="option3">Anggota</label>
                            </div>

                            <label for="username" class="form-label">Username</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="iusername"><i class="las la-user"></i></span>
                                <input type="text" class="form-control" id="username" name="username" :value="old('username')" required autofocus aria-describedby="iusername" />
                            </div>

                            <label for="password" class="form-label">Password</label>
                            <div class="input-group mb-2">
                                <span class="input-group-text" id="ipassword"><i class="las la-key"></i></span>
                                <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password" aria-describedby="ipassword" />
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="1" id="agreement" name="agreement" required />
                                <label class="form-check-label" for="agreement">
                                    Saya setuju
                                </label>
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-2">
                                <div class="form-check">
                                    <x-checkbox id="remember_me" name="remember" />

                                    <label class="form-check-label" for="remember_me">
                                        {{ __('Selalu Ingat') }}
                                    </label>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-warning col-12 mb-2" value="Login" />

                            <!-- Forgot Password -->
                            @if (Route::has('password.request'))
                            <p class="mb-2">Lupa Password ? <a href="{{ route('password.request') }}">Klik disini</a></p>
                            @endif
                            <p class="mb-2">
                                Belum Punya Akun ? <a href="https://wa.me/6285803056443?text=Untuk%20Melakukan%20Pendaftaran%20Silahkan%20Isi%20Data%20Diri%20Di%20Bawah%0A%0ANama%20%20%20%20%20%20%20%20%20%3A%20%0ANo.%20Whatsapp%20%3A%20%0AAlamat%20%20%20%20%20%20%20%3A%20%0AEmail%20%20%20%20%20%20%20%20%3A%20" target="_blank">Daftar disini</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="right col-md-6 col-12">
                <div class="container-about d-flex justify-content-center align-items-center">
                    <div class="container p-5">
                        <div class="logo-details d-flex justify-content-center mb-4">
                            <i class="icon">
                                <img src="{{ asset('img/logo.png') }}" alt="" width="60px" />
                            </i>
                            <div class="logo_name ms-2">
                                <h2>SI TAHIR</h2>
                                <h6>Sistem Informasi Tagihan Air</h6>
                            </div>
                        </div>
                        <div class="description text-center">
                            <p>
                                Sistem ini adalah sistem yang digunakan untuk melakukan
                                pengelolaan usaha kelompok air Desa Sumberarum Kecamatan Wates
                                Kabupaten Blitar
                            </p>
                            <p class="mt-2">
                                Informasi lebih lanjut klik
                                <a href="/informasiumum">di sini</a>
                            </p>
                        </div>
                    </div>
                    <img src="{{ asset('img/welcomehero.png') }}" alt="" class=" hero position-absolute bottom-0 end-0" />
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>