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
        Schema::table('trayectoria_laborales', function (Blueprint $table) {
            $table->string('tipo_contrato')->nullable();
            $table->string('nivel_salarial')->nullable();
            $table->enum('sector', ['público', 'privado', 'mixto'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropColumn(['tipo_contrato', 'nivel_salarial', 'sector']);
    }
};
