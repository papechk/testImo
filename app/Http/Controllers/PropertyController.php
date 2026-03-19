<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::paginate(3);
        return view('admin.property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.property.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'surface' => 'required|numeric|min:0',
            'ville' => 'required|string|max:255',
            'code_postal' => 'required|string|max:10',
            'adresse' => 'required|string|max:255',
        ]);

        Property::create($validated);

        return redirect()->route('admin.property.index')->with('success', 'Bien créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $property = Property::findOrFail($id);
        return view('admin.property.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'nullable|string',
        'prix' => 'required|numeric|min:0',
        'surface' => 'required|numeric|min:0',
        'ville' => 'required|string|max:255',
        'code_postal' => 'required|integer|min:5',
        'adresse' => 'required|string|max:255',
        'vendu' => 'boolean', // Assuming 'vendu' is a boolean field
    ]);

    $property = Property::findOrFail($id);
    $property->update($validated);

    return redirect()->route('admin.property.index')->with('success', 'Bien mis à jour avec succès.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->route('admin.property.index')->with('success', 'Bien supprimé avec succès.');
    }
}
