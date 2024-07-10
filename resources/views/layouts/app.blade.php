@include('layouts.head')

<body class="bg-light">

    <nav class="navbar bg-white sticky-top py-3">
        <div class="container-fluid">
            <img src="{{ asset('img/logos/logo_emblem.png') }}" alt="Saeng Tian" width="38" height="38">
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
                        <select class="form-select" id="statusSelect">
                            <option value="">Státusz</option>
                            <option value="active">Aktív</option>
                            <option value="inactive">Inaktív</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-2">
                        <select class="form-select" id="sortBySelect">
                            <option value="">Rendezés</option>
                            <option value="name">Becenév szerint</option>
                            <option value="full_name">Teljes név szerint</option>
                            <option value="visa_expire">Visa lejárata szerint</option>
                            <option value="passport_expire">Útlevél lejárata szerint</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <button class="btn outline-none p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(Auth::check())
                    <img class="rounded-circle ms-2" src="{{ file_exists(public_path('user_images/'.Auth::user()->id.'.jpg')) ? asset('user_images/'.Auth::user()->id.'.jpg') : (file_exists(public_path('user_images/'.Auth::user()->id.'.png')) ? asset('user_images/'.Auth::user()->id.'.png') : asset('img/noimage.png')) }}" alt="{{ Auth::user()->name }}" width="38" height="38">
                    @endif
                </button>
                <ul class="dropdown-menu dropdown-menu-end mt-2">
                    <li>
                        <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                        <a class="dropdown-item" id="logoutButton" href="{{ route('logout') }}">
                            Kijelentkezés
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @if (session('success'))
        <div class="alert alert-success text-center fw-medium mb-0">{{ session('success') }}</div>
    @endif

    @yield('content')

    @include('edit')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
