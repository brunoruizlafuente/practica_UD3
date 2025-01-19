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
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // ID del producto
            $table->string('nombre', 150);
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 8, 2);
            $table->string('imagen_url')->nullable();

            // Relación con categorías
            $table->unsignedBigInteger('categoria_id');

            // clave foránea
            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias')
                ->onDelete('cascade'); // si se borra la categoría, se borran sus productos

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
