<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Supprimer la colonne booléenne existante
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        // Ajouter une nouvelle colonne enum à la place
        Schema::table('reservations', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'cancelled'])->default('pending');
        });
    }

    public function down(): void
    {
        // Revenir à l'ancien champ booléen
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->boolean('status')->default(false);
        });
    }
};

