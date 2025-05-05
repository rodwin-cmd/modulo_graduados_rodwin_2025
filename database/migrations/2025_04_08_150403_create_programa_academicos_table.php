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
        Schema::create('programa_academicos', function (Blueprint $table) {
            $table->id();
            $table->string('programa');
            $table->unsignedBigInteger('facultad_id')->nullable();
            $table->string('nivel');
            $table->string('modalidad');
            $table->string('codigo_SNIES')->nullable();
            $table->timestamps();
            $table->foreign('facultad_id')
                ->references('id')
                ->on('facultades') // asegúrate que esta tabla exista y esté bien nombrada
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programa_academicos');
    }
};
