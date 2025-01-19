<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); // ID del cliente
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('email')->unique();
            $table->string('direccion_envio')->nullable();
            $table->string('direccion_facturacion')->nullable();
            $table->string('telefono', 20)->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
