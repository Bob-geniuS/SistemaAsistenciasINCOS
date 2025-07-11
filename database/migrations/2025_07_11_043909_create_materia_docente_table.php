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
        Schema::create('materia_docente', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materia_id')->constrained('materias');
            $table->foreignId('docente_id')->constrained('docentes');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materia_docente');
    }
};
