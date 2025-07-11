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
        Schema::table('materias', function (Blueprint $table) {
            // Solo agregar si NO existe aún
            if (! Schema::hasColumn('materias', 'carrera_id')) {
                $table->foreignId('carrera_id')
                    ->nullable()
                    ->after('id')
                    ->constrained('carrera');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('materias', function (Blueprint $table) {
            if (Schema::hasColumn('materias', 'carrera_id')) {
                $table->dropForeign(['carrera_id']);
                $table->dropColumn('carrera_id');
            }
        });
    }
};
