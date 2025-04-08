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
        Schema::create('trayectoria_laborals', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_trayectoria');
            $table->unsignedInteger('graduado_id');
            $table->string('empresa');
            $table->string('cargo');
            $table->string('sector');
            $table->string('ciudad');
            $table->string('pais');
            $table->string('area_desempeno');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->boolean('relacion_formacion');
            $table->foreignId('graduados_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trayectoria_laborals');
    }
};
