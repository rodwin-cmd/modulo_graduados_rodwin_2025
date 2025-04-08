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

        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_evento');
            $table->string("descripcion");
            $table->string('ciudad_evento');
            $table->string('departamento_evento');
            $table->string('lugar_evento');
            $table->string('fecha_evento');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
