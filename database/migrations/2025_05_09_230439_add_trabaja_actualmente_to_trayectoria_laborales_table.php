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
        Schema::table('trayectoria_laborales', function (Blueprint $table) {
            $table->boolean('trabaja_actualmente')->default(false)->after('relacion_formacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trayectoria_laborales', function (Blueprint $table) {
            $table->dropColumn('trabaja_actualmente');
        });
    }
};
