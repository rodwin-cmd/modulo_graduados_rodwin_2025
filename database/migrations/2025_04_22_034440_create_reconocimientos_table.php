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
        Schema::create('reconocimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('graduado_id')->constrained()->onDelete('cascade');
            $table->string('tipo'); // 'Académico' o 'Empresarial'
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('entidad_otorgante');
            $table->date('fecha');
            $table->string('archivo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reconocimientos');
    }
};
