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
        Schema::table('graduados', function (Blueprint $table) {
            $table->string('nombre_contacto')->nullable()->after('correo_institucional');
            $table->string('telefono_contacto')->nullable()->after('nombre_contacto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('graduados', function (Blueprint $table) {
            $table->dropColumn(['nombre_contacto', 'telefono_contacto']);
        });
    }
};
