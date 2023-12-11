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
        Schema::create('servicio', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->float('monto',8,2);
            $table->unsignedBigInteger('id_colaborador');
            $table->foreign('id_colaborador')->references('id')->on('colaboradores');
            $table->unsignedBigInteger('id_medio_pago');
            $table->foreign('id_medio_pago')->references('id')->on('medios_pago');
            $table->boolean('estado');
            $table->unsignedBigInteger('id_requerimiento');
            $table->foreign('id_requerimiento')->references('id')->on('requerimientos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio');
    }
};
