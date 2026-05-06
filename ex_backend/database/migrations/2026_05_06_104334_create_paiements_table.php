<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('paiements', function (Blueprint $table) {
    $table->id();
    $table->string('reference');
    $table->date('date');
    $table->decimal('prix_total', 12, 2);
    $table->integer('tranche_actuelle');
    $table->integer('tranches_total');
    $table->decimal('montant_a_payer', 12, 2);
    $table->decimal('reste_a_payer', 12, 2);
    $table->integer('progression');
    $table->json('methode');
    $table->date('prochaine_echeance');
    $table->string('statut')->default('En cours');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
