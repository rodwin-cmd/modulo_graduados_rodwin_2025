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

        Schema::create('graduados', function (Blueprint $table) {
            $table->id();
            $table->string('numero_documento')->unique();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('tipo_documento');
            $table->string('sexo');
            $table->date('fecha_nacimiento');
            $table->boolean('tiene_empleo')->nullable();
            $table->string('correo_personal', 100);
            $table->string('correo_institucional', 100);
            $table->string('telefono', 20);
            $table->string('direccion');
            $table->foreignId('ciudad_id')->constrained('ciudades');
            $table->foreignId('departamento_id')->constrained();
            $table->string('nombre_contacto')->nullable();
            $table->string('telefono_contacto')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('graduados');
    }
};
