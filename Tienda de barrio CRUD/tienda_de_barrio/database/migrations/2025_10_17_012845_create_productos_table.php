<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre_producto', 150);
            $table->decimal('precio', 10, 2);
            $table->unsignedBigInteger('id_tipo');
            $table->integer('stock')->default(0);
            $table->timestamps();

            $table->foreign('id_tipo')
                  ->references('id_tipo')
                  ->on('tipos_productos')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
