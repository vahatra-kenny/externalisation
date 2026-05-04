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
   Schema::create('demandes', function (Blueprint $table) {
    $table->id();
    $table->string('reference');
    $table->string('client');
    $table->string('service');
    $table->string('statut');
    $table->foreignId('user_id')->nullable()->onDelete('cascade'); // lien avec l’utilisateur
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
