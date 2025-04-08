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
        Schema::create('estudios_posteriores', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_estudios_post');
            $table->unsignedInteger('graduado_id');
            $table->string('nivel_estudios');
            $table->string('programa');
            $table->string('institucion');
            $table->string('pais');
            $table->string('ciudad');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->foreignId('graduados_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudios_posteriores');
    }
};
