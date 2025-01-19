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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id(); // ID del pedido
            $table->unsignedBigInteger('cliente_id'); // FK cliente
            $table->dateTime('fecha_pedido')->useCurrent();
            $table->string('estado')->default('pendiente');

            // Clave foránea
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
