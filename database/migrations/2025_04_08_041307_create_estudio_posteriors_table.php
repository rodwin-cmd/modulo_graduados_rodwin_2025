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
        Schema::disableForeignKeyConstraints();

        Schema::create('estudio_posteriors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('graduado_id')->constrained();
            $table->string('nivel_estudios');
            $table->string('programa');
            $table->string('institucion');
            $table->string('pais');
            $table->string('ciudad');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudio_posteriors');
    }
};
