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
        Schema::create('dispositivos_nfcs', function (Blueprint $table) {
            $table->id();
            $table->string('uid_dispositivo')->unique();
            $table->string('descripcion')->nullable();
            $table->foreignId('aula_id')->constrained('aulas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositivos_nfcs');
    }
};
