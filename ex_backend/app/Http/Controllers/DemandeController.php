<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;

class DemandeController extends Controller
{
   public function index() {
    return response()->json(Demande::all());
}

public function store(Request $request)
{
    $validated = $request->validate([
        'reference' => 'required|string|max:255',
        'client' => 'required|string|max:255',
        'service' => 'required|string|max:255',
        'statut' => 'required|string|max:255',
    ]);
    $validated['user_id'] = auth()->id() ?? 1;
    $demande = Demande::create($validated);

    return response()->json($demande, 201);
}
public function update(Request $request, $id)
{
    $demande = Demande::findOrFail($id);
    $demande->update($request->all());
    return response()->json($demande);
}

public function destroy($id)
{
    $demande = Demande::findOrFail($id);
    $demande->delete();
    return response()->json(null, 204);
}



}


