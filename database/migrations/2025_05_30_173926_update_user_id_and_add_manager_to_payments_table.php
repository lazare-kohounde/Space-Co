<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // Supprimer la contrainte de clé étrangère si elle existe
            $table->dropForeign(['user_id']);

            // Renommer la colonne user_id en author
            $table->renameColumn('user_id', 'author');

            // Ajouter le champ manager (non clé étrangère)
            $table->string('manager')->nullable()->after('author');
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // Inverser les changements : renommer author en user_id
            $table->renameColumn('author', 'user_id');

            // Supprimer la colonne manager
            $table->dropColumn('manager');

            // Restaurer la contrainte de clé étrangère si besoin
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }
};
