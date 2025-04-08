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

        Schema::create('satisfaccion_egresados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('encuesta_id')->constrained();
            $table->foreignId('graduado_id')->constrained();
            $table->string('satisfacion_formacion_acad');
            $table->boolean('recomendacion_programa');
            $table->string('comentarios_adicionales');
            $table->foreignId('encuesta_seguimiento_graduado_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satisfaccion_egresados');
    }
};
