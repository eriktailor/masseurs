<!doctype html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Masszőrök Adatai | Saeng Tian Thai Masszázs</title>
<!--     <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/site.webmanifest') }}"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body class="bg-light">

    <nav class="navbar bg-dark py-3">
        <div class="container-fluid">
            <img src="{{ asset('img/logos/logo_full.svg') }}" alt="Saeng Tian" width="144" height="32">
            <button class="btn btn-warning">Új masszőr</button>
        </div>
    </nav>

    <nav class="navbar bg-white sticky-top py-3">
        <div class="container">
            <div class="d-flex justify-content-start gap-3 w-100">
                <div class="flex-grow-1">
                    <input class="form-control" id="searchField" type="text" placeholder="Keresés...">
                </div>
                <div class="col-12 col-lg-2">
                    <select class="form-select" id="salonSelect">
                        <option value="">Szalon</option>
                        @foreach($salons as $salon)
                            <option value="{{ $salon->id }}">{{ $salon->short_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-lg-2">
                    <select class="form-select" id="sortBySelect">
                        <option value="">Rendezés</option>
                        <option value="name">Becenév szerint</option>
                        <option value="full_name">Teljes név szerint</option>
                    </select>
                </div>
            </div>
        </div>
    </nav>

    @if (session('success'))
        <div class="alert alert-success text-center fw-medium mb-0">{{ session('success') }}</div>
    @endif

    @yield('content')

    @include('edit')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
