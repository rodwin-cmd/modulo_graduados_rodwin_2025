<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('encuestas', function (Blueprint $table) {
            // Elimina la foreign key primero
            $table->dropForeign(['graduado_id']);
        });

        Schema::table('encuestas', function (Blueprint $table) {
            // Ahora sí se puede volver nullable
            $table->unsignedBigInteger('graduado_id')->nullable()->change();

            // Y se vuelve a agregar la foreign key (ahora con nullable)
            $table->foreign('graduado_id')->references('id')->on('graduados')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('encuestas', function (Blueprint $table) {
            $table->dropForeign(['graduado_id']);
            $table->unsignedBigInteger('graduado_id')->nullable(false)->change();
            $table->foreign('graduado_id')->references('id')->on('graduados')->onDelete('cascade');
        });
    }
};
