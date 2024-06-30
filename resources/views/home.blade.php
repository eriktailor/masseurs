@extends('app')

@section('content')
<nav class="navbar bg-dark">
    <div class="container-fluid">
        <img src="{{ asset('img/logos/logo_full.svg') }}" alt="Saeng Tian" width="144" height="32">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</nav>

<main class="py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5 g-4">
            @foreach($masseurs as $masseur)
                <div class="col">
                    @php
                        $imageExtension = getImageExtension('profile_images', $masseur->id);
                    @endphp
                    <div class="card text-center overflow-hidden rounded-4 h-100 p-4">
                        <div class="py-2">
                            @if($imageExtension)
                                <img class="object-fit-cover rounded-circle mx-auto mb-4" src="{{ asset('profile_images/' . $masseur->id . '.' . $imageExtension) }}" alt="{{ $masseur->name }}" width="100" height="100">
                            @else
                                <img class="object-fit-cover rounded-circle border mx-auto mb-4" src="{{ asset('img/noimage.png') }}" alt="{{ $masseur->name }}" width="100" height="100">
                            @endif
                            <h3 class="h4">{{ $masseur->name }}</h3>
                            <p class="small opacity-75">{{ $masseur->full_name }}</p>
                            <div class="flex justify-content-center align-items-center">
                                <span class="badge bg-light text-dark me-1">{{ $masseur->salon->short_name }}</span>
                                @if($masseur->deleted)
                                    <span class="badge bg-danger text-white">Inaktív</span>
                                @else
                                    <span class="badge bg-success text-white">Aktív</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>





@endsection