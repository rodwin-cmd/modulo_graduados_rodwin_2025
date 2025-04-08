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
        Schema::create('graduados', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('idgraduado');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('tipo_documento');
            $table->integer('numero_documento');
            $table->string('sexo');
            $table->dateTime('fecha_nacimiento');
            $table->string('correo_personal');
            $table->string('correo_institucional');
            $table->integer('telefono');
            $table->string('direccion');
            $table->foreignId('ciudad_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graduados');
    }
};
