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
        Schema::create('encuestas_seguimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_encuestas');
            $table->unsignedInteger('graduado_id');
            $table->dateTime('anio_aplicacion');
            $table->dateTime('fecha_respuesta');
            $table->string('tipo_encuesta');
            $table->string('medio_aplicacion');
            $table->foreignId('graduados_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuestas_seguimientos');
    }
};
