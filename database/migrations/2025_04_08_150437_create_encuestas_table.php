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

        Schema::create('encuestas', function (Blueprint $table) {
            $table->id();
            $table->string('id_encuesta');
            $table->string('nombre');
            $table->date('fecha_aplicacion');
            $table->date('fecha_respuesta');
            $table->string('tipo_encuesta');
            $table->string('medio_aplicacion');
            $table->foreignId('graduado_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuestas');
    }
};
