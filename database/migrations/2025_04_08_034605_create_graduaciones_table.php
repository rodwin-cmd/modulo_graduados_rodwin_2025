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
        Schema::create('graduaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_graduaciones');
            $table->unsignedInteger('graduado_id');
            $table->unsignedInteger('programa_id');
            $table->dateTime('fecha_grado');
            $table->integer('promediofinal');
            $table->string('mencion_honorifica');
            $table->foreignId('graduados_programas_academicos_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graduaciones');
    }
};
