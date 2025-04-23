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
        Schema::create('estudios', function (Blueprint $table) {
            $table->id();
            $table->string('nivel_estudios');
            $table->foreignId('programa_id')->nullable()->constrained('programa_academicos')->onDelete('set null');;
            $table->string('institucion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->foreignId('graduado_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudios');
    }
};
