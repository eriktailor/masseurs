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
@foreach($masseurs as $masseur)
    <div>
        <h2>{{ $masseur->name }}</h2>
        <p>Id: {{ $masseur->id }}</p>
    </div>
@endforeach

</main>





@endsection