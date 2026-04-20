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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug')->unique();
            $table->text('descripcion')->nullable();
            $table->string('sinopsis_corta', 500)->nullable();
            $table->year('anio_estreno')->nullable();
            $table->unsignedInteger('duracion')->nullable();
            $table->string('clasificacion_edad', 10)->nullable();
            $table->string('idioma_original', 50)->nullable();
            $table->string('pais_origen', 100)->nullable();
            $table->string('director')->nullable();
            $table->string('guionista')->nullable();
            $table->string('productora')->nullable();
            $table->decimal('presupuesto', 15, 2)->nullable();
            $table->decimal('recaudacion', 15, 2)->nullable();
            $table->decimal('calificacion_promedio', 3, 1)->nullable();
            $table->unsignedInteger('total_votos')->default(0);
            $table->decimal('popularidad', 5, 2)->nullable();
            $table->string('estado', 50)->nullable();
            $table->date('fecha_estreno_streaming')->nullable();
            $table->string('plataforma', 100)->nullable();
            $table->string('trailer_url', 500)->nullable();
            $table->string('poster_url', 500)->nullable();
            $table->string('fondo_url', 500)->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_actualizacion')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};