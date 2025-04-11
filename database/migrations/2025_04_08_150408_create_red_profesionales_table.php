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


        Schema::create('red_profesionales', function (Blueprint $table) {
            $table->id();
            $table->string('red_social');
            $table->text('url_red_social');
            $table->string('portafolio')->nullable();
            $table->string('curriculum')->nullable();
            $table->foreignId('graduado_id')->constrained('graduados');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('red_profesionales');
    }
};
