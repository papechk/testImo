@extends('layouts.accueil')

@section('title', 'Accueil')

@section('navbar')
    <a class="navbar-brand" href="{{ url('/') }}">Accueil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/property') }}" style="color: :white">Propriétés</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/other') }}">Autres</a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <header class="mb-5 text-center">
        <h1 class="display-4 text-primary fw-bold">Bienvenue sur la page d'accueil</h1>
        <p class="lead">Découvrez nos propriétés disponibles.</p>
    </header>

    <div class="container">
        <div class="row g-4">
            @foreach ($properties as $property)
                @if (!$property->vendu)
                    <div class="col-md-4  mb-4">
                        <div class="card tilt-card border-0 shadow-lg h-100 border-rounded">
                            <div class="card-body d-flex flex-column">
                                <div class="mb-3 text-center">
                                    <span class="badge bg-success fs-5">
                                        {{ number_format($property->prix, 0, ',', ' ') }} €
                                    </span>
                                </div>

                                <h5 class="card-title text-primary fw-semibold">{{ $property->titre }}</h5>
                                <p class="card-text text-muted">{{ $property->description }}</p>

                                <ul class="list-group list-group-flush small mb-3">
                                    <li class="list-group-item"><strong>Ville :</strong> {{ $property->ville }}</li>
                                    <li class="list-group-item"><strong>Adresse :</strong> {{ $property->adresse }}</li>
                                    <li class="list-group-item"><strong>Code postal :</strong> {{ $property->code_postal }}</li>
                                    <li class="list-group-item"><strong>Surface :</strong> {{ $property->surface }} m²</li>
                                </ul>

                                <div class="mt-auto text-center">
                                    <a href="" class="btn btn-outline-primary w-100">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Vanilla Tilt for 3D hover effect -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.2/vanilla-tilt.min.js"></script>
    <script>
        VanillaTilt.init(document.querySelectorAll(".tilt-card"), {
            max: 15,
            speed: 400,
            glare: true,
            "max-glare": 0.2,
            scale: 1.05,
        });
    </script>
@endsection
