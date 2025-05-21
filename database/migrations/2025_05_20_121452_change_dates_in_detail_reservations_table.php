<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('detail_reservations', function (Blueprint $table) {
            // Modification des types de champs
            $table->dateTime('start_date')->change();
            $table->dateTime('end_date')->change();
        });
    }

    public function down(): void
    {
        Schema::table('detail_reservations', function (Blueprint $table) {
            // Revenir aux types précédents
            $table->date('start_date')->change();
            $table->date('end_date')->change();
        });
    }
};

