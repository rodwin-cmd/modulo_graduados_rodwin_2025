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

        Schema::create('encuestas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha_aplicacion');
            $table->date('fecha_respuesta');
            $table->string('tipo_encuesta');
            $table->string('medio_aplicacion');
            $table->foreignId('graduado_id')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('encuestas', function (Blueprint $table) {
            $table->foreignId('graduado_id')->nullable(false)->change();
        });
    }
};
