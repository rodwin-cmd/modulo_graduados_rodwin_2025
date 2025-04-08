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
            $table->foreignId('evento_contacto_id')->constrained();
            $table->foreignId('graduado_id')->constrained();
            $table->foreignId('evento_contacto_graduado_id');
            $table->timestamps();
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
