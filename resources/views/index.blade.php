@extends('layouts.app')

@section('content')

    <main class="py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5 g-4" id="masseursList">
                @include('list')
            </div>
        </div>
    </main>

@endsection