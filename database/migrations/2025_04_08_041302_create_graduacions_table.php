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

        Schema::create('graduacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('graduado_id')->constrained();
            $table->foreignId('programa_id')->constrained();
            $table->date('fecha_grado');
            $table->integer('promediofinal');
            $table->string('mencion_honorifica')->nullable();
            $table->foreignId('graduado_programa_academico_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graduacions');
    }
};
