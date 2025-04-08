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

        Schema::create('red_profesionals', function (Blueprint $table) {
            $table->id();
            $table->string('red_social');
            $table->string('url_red_social');
            $table->string('portafolio');
            $table->string('curriculum_url');
            $table->foreignId('graduado_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('red_profesionals');
    }
};
