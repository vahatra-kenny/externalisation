<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Liste des services
    public function index()
    {
        return Service::all();
    }

    // Ajouter un service
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|string',
        ]);

        return Service::create($validated);
    }

    // Afficher un service
    public function show($id)
    {
        return Service::findOrFail($id);
    }

    // Modifier un service
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'service' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|string',
        ]);

        $service->update($validated);

        return $service;
    }

    // Supprimer un service
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return response()->json(['message' => 'Service supprimé avec succès']);
    }
}
