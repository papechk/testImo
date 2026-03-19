@extends('layouts.propertyForm')

@section('titre', 'Créer un bien')

@section('content')
<div class="container mt-5">
    <h2>Créer un bien</h2>
    <form action="{{ route('admin.properties.store') }}" method="POST">
        @csrf
        @method('POST')
        {{-- Titre --}}
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        {{-- Prix et Surface --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="prix" class="form-label">Prix (€)</label>
                <input type="number" class="form-control" id="prix" name="prix" number_format(value) required>
            </div>
            <div class="col-md-6">
                <label for="surface" class="form-label">Surface (m²)</label>
                <input type="number" class="form-control" id="surface" name="surface" required>
            </div>
        </div>

        {{-- Ville et Code postal --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" required>
            </div>
            <div class="col-md-6">
                <label for="code_postal" class="form-label">Code postal</label>
                <input type="text" class="form-control" id="code_postal" name="code_postal" required>
            </div>
        </div>

        {{-- Adresse --}}
        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" required>
        </div>
        <div class="mb-3 form-check">
    <input type="hidden" name="vendu" value="0">
    <input type="checkbox" id="vendu" name="vendu" class="form-check-input" value="1" >
    <label for="vendu" class="form-check-label">Vendu</label>
</div>

        {{-- Bouton --}}
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
