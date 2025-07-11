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

        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_evento', length: 60);
            $table->text("descripcion");
            $table->string('ciudad_evento');
            $table->string('departamento_evento');
            $table->string('lugar_evento');
            $table->dateTime('fecha_evento');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
