<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model {
    protected $fillable = [
        'reference','date','prix_total','tranche_actuelle',
        'tranches_total','montant_a_payer','reste_a_payer',
        'progression','methode','prochaine_echeance','statut'
    ];
    protected $casts = ['methode' => 'array'];
}

