<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('encuestas', function (Blueprint $table) {
            // Verifica si existe una clave foránea antes de intentar eliminarla
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $doctrineTable = $sm->listTableDetails('encuestas');
            if ($doctrineTable->hasForeignKey('encuestas_graduado_id_foreign')) {
                $table->dropForeign(['graduado_id']);
            }
        });
    }

    public function down(): void
    {
        Schema::table('encuestas', function (Blueprint $table) {
            $table->unsignedBigInteger('graduado_id')->nullable(false)->change();
            $table->foreign('graduado_id')->references('id')->on('graduados')->onDelete('cascade');
        });
    }
};
