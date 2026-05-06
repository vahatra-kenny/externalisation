<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement;

class PaiementController extends Controller
{
    public function index() {
        return Paiement::all();
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'reference' => 'required|string|max:255',
            'date' => 'required|date',
            'prix_total' => 'required|numeric',
            'tranche_actuelle' => 'required|integer',
            'tranches_total' => 'required|integer',
            'montant_a_payer' => 'required|numeric',
            'reste_a_payer' => 'required|numeric',
            'progression' => 'required|integer',
            'methode' => 'required|array',
            'prochaine_echeance' => 'required|date',
            'statut' => 'required|string',
        ]);

        $paiement = Paiement::create($validated);
        return response()->json($paiement, 201);
    }

    public function show($id) {
        return Paiement::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $paiement = Paiement::findOrFail($id);
        $paiement->update($request->all());
        return response()->json($paiement);
    }

    public function destroy($id) {
        Paiement::destroy($id);
        return response()->json(null, 204);
    }
}

