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

<main>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5 g-4">
            @foreach($masseurs as $masseur)
                <div class="col">
                    @php
                        $imageExtension = getImageExtension('profile_images', $masseur->id);
                    @endphp
                    <div class="card text-center overflow-hidden">
                        @if($imageExtension)
                            <img class="object-fit-cover rounded-circle mx-auto my-4" src="{{ asset('profile_images/' . $masseur->id . '.' . $imageExtension) }}" alt="{{ $masseur->name }}" width="100" height="100">
                        @else
                            <p>Image not found</p>
                        @endif
                        <h2>{{ $masseur->name }}</h2>
                        <p>Id: {{ $masseur->id }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>





@endsection