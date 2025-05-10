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
        Schema::table('encuestas', function (Blueprint $table) {
            $table->dropColumn('fecha_respuesta'); // Eliminar columna
            $table->string('url')->nullable();     // Agregar nueva columna
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('encuestas', function (Blueprint $table) {
            $table->date('fecha_respuesta')->nullable(); // Restaurar columna si se revierte
            $table->dropColumn('url');                   // Eliminar columna url si se revierte
        });
    }
};
