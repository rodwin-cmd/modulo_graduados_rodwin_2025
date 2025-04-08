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
        Schema::create('redes_profesionales', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_redesp');
            $table->unsignedInteger('graduado_id');
            $table->string('red_social');
            $table->string('url_red_social');
            $table->foreignId('graduados_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redes_profesionales');
    }
};
