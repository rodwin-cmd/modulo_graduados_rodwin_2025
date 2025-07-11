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


        Schema::create('trayectoria_laborales', function (Blueprint $table) {
            $table->id();
            $table->string('empresa');
            $table->string('direccion');
            $table->string('cargo');
            $table->string('sector_productivo');
            $table->string('ciudad_id');
            $table->string('departamento_id');
            $table->string('area_desempeno');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->boolean('relacion_formacion');
            $table->foreignId('graduado_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trayectoria_laborales');
    }
};
