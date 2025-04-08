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
        Schema::create('satisfaccion_egresados', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_satisfaccion');
            $table->unsignedInteger('encuesta_id');
            $table->string('satisfacion_formacion_acad');
            $table->boolean('recomendacion_programa');
            $table->string('comentarios_adicionales');
            $table->foreignId('encuestas_seguimiento_graduados_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satisfaccion_egresados');
    }
};
