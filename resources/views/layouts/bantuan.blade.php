<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title>{{ config('app.name', 'SITAHIR') }}</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light border-bottom">
        <div class="container">
            <a class="navbar-brand me-3" href="/dashboard"><i class="icon"> <img src="{{ asset('img/logo.png') }}" alt="" width="40px" />
                </i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-itemx me-3">
                        <a class="nav-link {{ $title == 'informasiumum' ? 'active' : '' }}" href="/informasiumum">Informasi Umum</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link {{ $title == 'panduan' ? 'active' : '' }}" href="/panduan">Panduan</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link {{ $title == 'kepengurusan' ? 'active' : '' }}" href="/kepengurusan">Kepengurusan</a>
                    </li>
                </ul>
                @auth

                @else
                <a class="d-flex justify-content-center btn btn-warning" href="/">
                    Login
                </a>
                @endauth

            </div>
        </div>
    </nav>
    <!-- content -->
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>