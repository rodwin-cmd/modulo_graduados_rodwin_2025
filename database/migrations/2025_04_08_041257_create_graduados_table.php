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

        Schema::create('graduados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('tipo_documento');
            $table->unsignedBigInteger('numero_documento');
            $table->string('sexo');
            $table->date('fecha_nacimiento');
            $table->string('correo_personal');
            $table->string('correo_institucional');
            $table->string('telefono');
            $table->string('direccion');
            $table->foreignId('ciudad_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graduados');
    }
};
