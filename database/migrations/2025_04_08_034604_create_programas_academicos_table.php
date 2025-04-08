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
        Schema::create('programas_academicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('idPrograma');
            $table->string('programa');
            $table->string('facultad');
            $table->string('nivel');
            $table->string('modalidad');
            $table->integer('codigo_SNIES');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programas_academicos');
    }
};
