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
        Schema::create('inventario', function (Blueprint $table) {
            $table->id(); // ID del inventario
            $table->unsignedBigInteger('producto_id');
            $table->integer('cantidad_stock')->default(0);
            $table->string('ubicacion_almacen')->nullable();
        
            // Foránea
            $table->foreign('producto_id')
                ->references('id')
                ->on('productos')
                ->onDelete('cascade');
        
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
