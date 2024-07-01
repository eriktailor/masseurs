@extends('app')

@section('content')

<main class="py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5 g-4">
            @foreach($masseurs as $masseur)
                <div class="col">
                    @php
                        $imageExtension = getImageExtension('profile_images', $masseur->id);
                    @endphp
                    <div class="card position-relative text-center overflow-hidden rounded-4 h-100 p-4">
                        <button class="edit-masseur btn text-secondary position-absolute end-0 top-0 m-1 opacity-75" type="button" data-bs-toggle="modal" data-bs-target="#masseurModal" data-masseur-id="{{ $masseur->id }}">
                            <div data-bs-toggle="tooltip" title="Szerkesztés">
                                <x-icon name="edit"/>
                            </div>
                        </button>
                        <div class="py-2">
                            @if($imageExtension)
                                <img class="object-fit-cover rounded-circle mx-auto mb-4" src="{{ asset('profile_images/' . $masseur->id . '.' . $imageExtension) }}" alt="{{ $masseur->name }}" width="100" height="100">
                            @else
                                <img class="object-fit-cover rounded-circle border mx-auto mb-4" src="{{ asset('img/noimage.png') }}" alt="{{ $masseur->name }}" width="100" height="100">
                            @endif
                            <h3 class="h4">{{ $masseur->name }}</h3>
                            <p class="small opacity-75">{{ limitChars($masseur->full_name, 17) }}</p>
                            <div class="flex justify-content-center align-items-center">
                                <span class="badge bg-secondary text-dark me-1">
                                    {{ $masseur->salon->short_name }}
                                </span>
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