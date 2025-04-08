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

        Schema::create('evento_graduados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evento_id');
            $table->unsignedBigInteger('graduado_id');
            $table->string('nombre_evento');
            $table->string('lugar del evento');
            $table->date('fecha_evento');
            $table->text('descripcion_evento')->nullable();
            $table->boolean('asistio');
            $table->timestamps();

            $table->foreign('evento_id')->references('id')->on('eventos_contacto');
            $table->foreign('graduado_id')->references('id')->on('graduados');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evento_graduados');
    }
};
