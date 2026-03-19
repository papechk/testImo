@extends('layouts.admin')

@section('title', 'Les biens')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4">Les biens</h2>
        <a href="{{ route('admin.property.create') }}" class="btn btn-sm btn-primary">
            Ajouter un bien
        </a>
    </div>

    <table class="table table-striped table-sm align-middle small">
        <thead class="table-light">
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Prix (€)</th>
                <th>Surface (m²)</th>
                <th>Ville</th>
                <th>Code postal</th>
                <th>Adresse</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>

            @if (isset($properties))
            @foreach ($properties as $property)
                <tr>
                    <td>{{ $property->titre }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($property->description, 50) }}</td>
                    <td>{{ number_format($property->prix, 0, ',', ' ') }} €</td>
                    <td>{{ $property->surface }}</td>
                    <td>{{ $property->ville }}</td>
                    <td>{{ $property->code_postal }}</td>
                    <td>{{ $property->adresse }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.property.edit', $property) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('admin.property.destroy', $property) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez vous vraiment supprimer ce bien ?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="8" class="text-center">Aucun bien trouvé.</td>
                </tr>

            @endif
        </tbody>
    </table>
    <div class="mt-3">
    {{ $properties->links('pagination::bootstrap-5') }}
</div>

@endsection
