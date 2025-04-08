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
        Schema::create('evento_graduados', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('evento_id');
            $table->unsignedInteger('graduado_id');
            $table->foreignId('eventos_contacto_graduados_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evento_graduados');
    }
};
